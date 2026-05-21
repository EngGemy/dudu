<?php

namespace App\Services;

use App\Services\AutoTranslator\DeeplDriver;
use App\Services\AutoTranslator\DriverInterface;
use Illuminate\Support\Facades\File;

class AutoTranslator
{
    private DriverInterface $driver;

    public function __construct()
    {
        $this->driver = match (config('services.translator.driver', 'deepl')) {
            'deepl' => new DeeplDriver(),
            default => new DeeplDriver(),
        };
    }

    /**
     * Translate all missing keys in a target locale by comparing with the source locale.
     */
    public function translateMissing(string $sourceLocale, string $targetLocale, ?string $onlyFile = null): array
    {
        $results = [
            'created' => 0,
            'skipped' => 0,
            'failed' => 0,
            'details' => [],
        ];

        $sourcePath = resource_path("lang/{$sourceLocale}");
        $targetPath = resource_path("lang/{$targetLocale}");

        if (! File::isDirectory($sourcePath)) {
            return $results;
        }

        if (! File::isDirectory($targetPath)) {
            File::makeDirectory($targetPath, 0755, true);
        }

        $sourceFiles = $onlyFile
            ? collect([$sourcePath.DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $onlyFile).'.php'])
            : collect(File::allFiles($sourcePath));

        foreach ($sourceFiles as $file) {
            $sourceFilePath = is_string($file) ? $file : $file->getPathname();

            if (! File::exists($sourceFilePath) || pathinfo($sourceFilePath, PATHINFO_EXTENSION) !== 'php') {
                continue;
            }

            $relativePath = $onlyFile ?: str_replace(
                ['\\', '.php'],
                ['/', ''],
                $file->getRelativePathname()
            );
            $targetFilePath = "{$targetPath}/{$relativePath}.php";
            $targetDir = dirname($targetFilePath);

            if (! File::isDirectory($targetDir)) {
                File::makeDirectory($targetDir, 0755, true);
            }

            $sourceArray = File::exists($sourceFilePath) ? include $sourceFilePath : [];
            $targetArray = File::exists($targetFilePath) ? include $targetFilePath : [];

            $newTarget = $this->fillArray($sourceArray, $targetArray, $targetLocale, $sourceLocale, $results);

            $export = "<?php\n\nreturn ".var_export($newTarget, true).";\n";
            File::put($targetFilePath, $export);
        }

        return $results;
    }

    private function fillArray(array $source, array $target, string $targetLocale, string $sourceLocale, array &$results): array
    {
        foreach ($source as $key => $value) {
            if (is_array($value)) {
                $target[$key] = $this->fillArray($value, $target[$key] ?? [], $targetLocale, $sourceLocale, $results);

                continue;
            }

            if (isset($target[$key]) && ! empty($target[$key])) {
                $results['skipped']++;

                continue;
            }

            $translated = $this->driver->translate((string) $value, $targetLocale, $sourceLocale);

            if ($translated !== null) {
                $target[$key] = $translated;
                $results['created']++;
                $results['details'][] = "[{$targetLocale}] {$key}: {$translated}";
            } else {
                $target[$key] = $value; // fallback to source
                $results['failed']++;
            }
        }

        return $target;
    }
}
