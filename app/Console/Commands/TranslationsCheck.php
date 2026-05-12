<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class TranslationsCheck extends Command
{
    protected $signature = 'translations:check';

    protected $description = 'Check that translation keys are consistent across all locales (exits 1 on divergence)';

    public function handle(): int
    {
        $locales = collect(File::directories(resource_path('lang')))
            ->map(fn ($d) => basename($d))
            ->values()
            ->toArray();

        if (count($locales) < 2) {
            $this->info('Only one locale found — nothing to compare.');

            return SymfonyCommand::SUCCESS;
        }

        $allFiles = [];
        foreach ($locales as $locale) {
            foreach (File::allFiles(resource_path("lang/{$locale}")) as $file) {
                if ($file->getExtension() !== 'php') {
                    continue;
                }
                $relative = str_replace(['\\', '.php'], ['/', ''], $file->getRelativePathname());
                $allFiles[$relative] = true;
            }
        }

        $hasError = false;
        $referenceLocale = 'en';

        foreach (array_keys($allFiles) as $relativeFile) {
            $keysByLocale = [];
            foreach ($locales as $locale) {
                $path = resource_path("lang/{$locale}/{$relativeFile}.php");
                $arr = File::exists($path) ? include $path : [];
                $keysByLocale[$locale] = $this->flattenKeys((array) $arr);
            }

            $refKeys = $keysByLocale[$referenceLocale] ?? reset($keysByLocale);
            foreach ($locales as $locale) {
                if ($locale === $referenceLocale) {
                    continue;
                }
                $missing = array_diff($refKeys, $keysByLocale[$locale]);
                $extra = array_diff($keysByLocale[$locale], $refKeys);

                if (! empty($missing) || ! empty($extra)) {
                    $hasError = true;
                    $this->error("Divergence in {$relativeFile}.php (ref: {$referenceLocale} vs {$locale})");
                    foreach ($missing as $k) {
                        $this->line("  <fg=red>MISSING</>  {$k}");
                    }
                    foreach ($extra as $k) {
                        $this->line("  <fg=yellow>EXTRA</>    {$k}");
                    }
                }
            }
        }

        if ($hasError) {
            $this->error('Translation key divergence detected.');

            return SymfonyCommand::FAILURE;
        }

        $this->info('All translation keys are consistent across locales.');

        return SymfonyCommand::SUCCESS;
    }

    private function flattenKeys(array $array, string $prefix = ''): array
    {
        $keys = [];
        foreach ($array as $key => $value) {
            $full = $prefix ? "{$prefix}.{$key}" : $key;
            if (is_array($value)) {
                $keys = array_merge($keys, $this->flattenKeys($value, $full));
            } else {
                $keys[] = $full;
            }
        }

        return $keys;
    }
}
