<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\AutoTranslator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    private const SOURCE_LOCALE = 'en';

    private const DISPLAY_SEPARATOR = ' > ';

    private function langPath(): string
    {
        return resource_path('lang');
    }

    private function getLocales(): array
    {
        $configured = (array) config('translatable.locales', []);
        $fromDisk = File::isDirectory($this->langPath())
            ? collect(File::directories($this->langPath()))
                ->map(fn ($path) => basename($path))
                ->all()
            : [];

        return collect($configured)
            ->merge($fromDisk)
            ->filter()
            ->unique()
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
            ->filter(fn ($file) => $file->getExtension() === 'php')
            ->map(fn ($file) => str_replace(
                ['\\', '.php'],
                ['/', ''],
                $file->getRelativePathname()
            ))
            ->values()
            ->toArray();
    }

    private function getAllFiles(): array
    {
        $files = [];

        foreach ($this->getLocales() as $locale) {
            $files = array_merge($files, $this->getFilesForLocale($locale));
        }

        return collect($files)
            ->unique()
            ->sort()
            ->values()
            ->toArray();
    }

    private function resolveFilePath(string $locale, string $file): string
    {
        $locale = preg_replace('/[^a-zA-Z0-9_\-]/', '', $locale);
        $file = ltrim(str_replace('..', '', $file), '/\\');

        return $this->langPath()
            .DIRECTORY_SEPARATOR.$locale
            .DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $file)
            .'.php';
    }

    private function loadTranslationFile(string $locale, string $file): array
    {
        $path = $this->resolveFilePath($locale, $file);

        if (! File::exists($path)) {
            return [];
        }

        $translations = include $path;

        return is_array($translations) ? $translations : [];
    }

    private function flattenKeys(array $array, string $base = ''): array
    {
        $keys = [];

        foreach ($array as $key => $value) {
            $path = $base === '' ? (string) $key : $base.'.'.$key;

            if (is_array($value)) {
                $keys = array_merge($keys, $this->flattenKeys($value, $path));
            } else {
                $keys[] = $path;
            }
        }

        return $keys;
    }

    private function mergeWithSourceKeys(array $source, array $target): array
    {
        $merged = [];

        foreach ($source as $key => $sourceValue) {
            if (is_array($sourceValue)) {
                $targetValue = isset($target[$key]) && is_array($target[$key]) ? $target[$key] : [];
                $merged[$key] = $this->mergeWithSourceKeys($sourceValue, $targetValue);
            } else {
                $merged[$key] = array_key_exists($key, $target) ? $target[$key] : '';
            }
        }

        foreach ($target as $key => $targetValue) {
            if (! array_key_exists($key, $merged)) {
                $merged[$key] = $targetValue;
            }
        }

        return $merged;
    }

    /**
     * Recursively flatten a translation array into display rows.
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
            $displayPath = $displayBase ? $displayBase.self::DISPLAY_SEPARATOR.$key : $key;
            $group = $displayBase ? explode(self::DISPLAY_SEPARATOR, $displayBase)[0] : 'General';

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

    private function exportPhp(array $array, int $depth = 0): string
    {
        $pad = str_repeat('    ', $depth);
        $inner = str_repeat('    ', $depth + 1);
        $lines = [];

        foreach ($array as $key => $value) {
            $exportedKey = "'".addslashes((string) $key)."'";

            if (is_array($value)) {
                $lines[] = $inner.$exportedKey.' => '.$this->exportPhp($value, $depth + 1);
            } else {
                $lines[] = $inner.$exportedKey.' => '."'".addslashes((string) $value)."'";
            }
        }

        return "[\n".implode(",\n", $lines).",\n".$pad.']';
    }

    public function index()
    {
        $locales = $this->getLocales();
        $allFiles = $this->getAllFiles();
        $files = [];

        foreach ($locales as $locale) {
            foreach ($allFiles as $file) {
                $path = $this->resolveFilePath($locale, $file);
                $translations = $this->loadTranslationFile($locale, $file);
                $sourceTranslations = $this->loadTranslationFile(self::SOURCE_LOCALE, $file);
                $sourceCount = count($this->flattenKeys($sourceTranslations ?: $translations));
                $count = count($this->flattenKeys($translations));

                $files[$locale][] = [
                    'file' => $file,
                    'count' => $count,
                    'source_count' => $sourceCount,
                    'missing' => max($sourceCount - $count, 0),
                    'exists' => File::exists($path),
                ];
            }
        }

        return view('dashboard.translations.index', compact('locales', 'files'));
    }

    public function edit(string $locale, string $file)
    {
        $path = $this->resolveFilePath($locale, $file);
        $raw = $this->loadTranslationFile($locale, $file);
        $source = $this->loadTranslationFile(self::SOURCE_LOCALE, $file);

        if (! File::exists($path) && empty($source)) {
            return redirect()->route('translations.index')
                ->with('error', 'Translation file not found.');
        }

        if ($locale !== self::SOURCE_LOCALE && ! empty($source)) {
            $raw = $this->mergeWithSourceKeys($source, $raw);
        }

        $rows = $this->flattenForDisplay($raw);
        $grouped = collect($rows)->groupBy('group')->toArray();
        $locales = $this->getLocales();
        $currentFile = $file;
        $separator = self::DISPLAY_SEPARATOR;

        return view('dashboard.translations.edit', compact(
            'locale',
            'file',
            'grouped',
            'locales',
            'currentFile',
            'separator'
        ));
    }

    public function update(Request $request, string $locale, string $file)
    {
        $path = $this->resolveFilePath($locale, $file);

        if (! File::exists($path) && empty($this->loadTranslationFile(self::SOURCE_LOCALE, $file))) {
            return redirect()->route('translations.index')
                ->with('error', 'Translation file not found.');
        }

        $translations = (array) $request->input('translations', []);
        $directory = dirname($path);

        if (! File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $content = "<?php\n\nreturn ".$this->exportPhp($translations).";\n";
        File::put($path, $content);

        return redirect()->back()->with('success', 'Translations saved successfully.');
    }

    public function autoFill(Request $request, string $locale, string $file)
    {
        $sourceLocale = $request->input('source', self::SOURCE_LOCALE);

        $translator = new AutoTranslator();
        $results = $translator->translateMissing($sourceLocale, $locale, $file);

        $message = sprintf(
            'Auto-fill complete for %s: %d created, %d skipped, %d failed.',
            $file,
            $results['created'],
            $results['skipped'],
            $results['failed']
        );

        return redirect()
            ->route('translations.edit', ['locale' => $locale, 'file' => $file])
            ->with('success', $message);
    }
}
