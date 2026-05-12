<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\AutoTranslator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    private function langPath(): string
    {
        return resource_path('lang');
    }

    private function getLocales(): array
    {
        return collect(File::directories($this->langPath()))
            ->map(fn ($d) => basename($d))
            ->values()
            ->toArray();
    }

    private function getFilesForLocale(string $locale): array
    {
        $base = $this->langPath().DIRECTORY_SEPARATOR.$locale;
        if (! File::isDirectory($base)) {
            return [];
        }

        return collect(File::allFiles($base))
            ->filter(fn ($f) => $f->getExtension() === 'php')
            ->map(fn ($f) => str_replace(
                ['\\', '.php'],
                ['/',  ''],
                $f->getRelativePathname()
            ))
            ->values()
            ->toArray();
    }

    private function resolveFilePath(string $locale, string $file): string
    {
        // Prevent path traversal
        $locale = preg_replace('/[^a-zA-Z0-9_\-]/', '', $locale);
        $file = ltrim(str_replace('..', '', $file), '/\\');

        return $this->langPath()
            .DIRECTORY_SEPARATOR.$locale
            .DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $file)
            .'.php';
    }

    /**
     * Recursively flatten a translation array into a list of display rows.
     * Each row has: html_name, display_path, group, value, is_long.
     */
    private function flattenForDisplay(array $array, string $htmlBase = '', string $displayBase = ''): array
    {
        $rows = [];
        foreach ($array as $key => $value) {
            if ($key === '' || $key === null) {
                continue;
            }
            $key = (string) $key;
            $htmlName = $htmlBase.'['.$key.']';
            $displayPath = $displayBase ? $displayBase.' › '.$key : $key;
            $group = $displayBase ? explode(' › ', $displayBase)[0] : '— General —';

            if (is_array($value)) {
                $rows = array_merge($rows, $this->flattenForDisplay($value, $htmlName, $displayPath));
            } else {
                $rows[] = [
                    'html_name' => 'translations'.$htmlName,
                    'display_path' => $displayPath,
                    'group' => $group,
                    'value' => (string) $value,
                    'is_long' => mb_strlen((string) $value) > 80,
                ];
            }
        }

        return $rows;
    }

    /**
     * Pretty-print a PHP translation array as source code.
     */
    private function exportPhp(array $array, int $depth = 0): string
    {
        $pad = str_repeat('    ', $depth);
        $inner = str_repeat('    ', $depth + 1);
        $lines = [];

        foreach ($array as $key => $value) {
            $k = "'".addslashes((string) $key)."'";
            if (is_array($value)) {
                $lines[] = $inner.$k.' => '.$this->exportPhp($value, $depth + 1);
            } else {
                $v = "'".addslashes((string) $value)."'";
                $lines[] = $inner.$k.' => '.$v;
            }
        }

        return "[\n".implode(",\n", $lines).",\n".$pad.']';
    }

    // ── Index ──────────────────────────────────────────────────────────────────

    public function index()
    {
        $locales = $this->getLocales();
        $files = [];

        foreach ($locales as $locale) {
            foreach ($this->getFilesForLocale($locale) as $file) {
                $path = $this->resolveFilePath($locale, $file);
                try {
                    $translations = File::exists($path) ? include $path : [];
                    $count = count($this->flattenForDisplay((array) $translations));
                    $files[$locale][] = ['file' => $file, 'count' => $count];
                } catch (\Throwable) {
                    $files[$locale][] = ['file' => $file, 'count' => '?'];
                }
            }
        }

        return view('dashboard.translations.index', compact('locales', 'files'));
    }

    // ── Edit ───────────────────────────────────────────────────────────────────

    public function edit(string $locale, string $file)
    {
        $path = $this->resolveFilePath($locale, $file);

        if (! File::exists($path)) {
            return redirect()->route('translations.index')
                ->with('error', 'Translation file not found.');
        }

        $raw = include $path;
        $rows = $this->flattenForDisplay((array) $raw);

        // Group rows for visual separation in the view
        $grouped = collect($rows)->groupBy('group')->toArray();

        $locales = $this->getLocales();
        $currentFile = $file;

        return view('dashboard.translations.edit', compact(
            'locale', 'file', 'grouped', 'locales', 'currentFile'
        ));
    }

    // ── Update ─────────────────────────────────────────────────────────────────

    public function update(Request $request, string $locale, string $file)
    {
        $path = $this->resolveFilePath($locale, $file);

        if (! File::exists($path)) {
            return redirect()->route('translations.index')
                ->with('error', 'Translation file not found.');
        }

        // PHP parses translations[key1][key2] into a nested array automatically
        $translations = $request->input('translations', []);

        $content = "<?php\n\nreturn ".$this->exportPhp((array) $translations).";\n";
        File::put($path, $content);

        return redirect()->back()->with('success', 'Translations saved successfully!');
    }

    // ── Auto-fill via DeepL ────────────────────────────────────────────────────

    public function autoFill(Request $request, string $locale, string $file)
    {
        $sourceLocale = $request->input('source', 'en');

        $translator = new AutoTranslator();
        $results = $translator->translateMissing($sourceLocale, $locale);

        $message = sprintf(
            'Auto-fill complete: %d created, %d skipped, %d failed.',
            $results['created'],
            $results['skipped'],
            $results['failed']
        );

        return redirect()
            ->route('translations.edit', ['locale' => $locale, 'file' => $file])
            ->with('success', $message);
    }
}
