<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

abstract class BaseTranslatableSeeder extends Seeder
{
    private array $imageCache = [];

    private array $imageCounters = [];

    protected function getImage(string $type): string
    {
        $dir = public_path("assets/images/{$type}");

        if (! isset($this->imageCache[$type])) {
            $files = [];
            if (is_dir($dir)) {
                foreach (glob("{$dir}/*.{jpg,jpeg,png,webp}", GLOB_BRACE) ?: [] as $f) {
                    $files[] = basename($f);
                }
            }
            $this->imageCache[$type] = $files;
        }

        if (empty($this->imageCache[$type])) {
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $filename = "seeded_{$type}_".uniqid().'.jpg';
            $path = "{$dir}/{$filename}";
            try {
                $ctx = stream_context_create(['http' => ['timeout' => 15]]);
                $contents = @file_get_contents(
                    'https://picsum.photos/800/600?random='.rand(1, 9999),
                    false,
                    $ctx
                );
                if ($contents !== false) {
                    file_put_contents($path, $contents);
                    $this->imageCache[$type][] = $filename;
                }
            } catch (\Throwable $e) {
                // silence — fall through to fallback
            }

            // Hard fallback: borrow any tour image
            if (empty($this->imageCache[$type])) {
                $fallback = glob(public_path('assets/images/tours/*.jpg')) ?: [];
                if (! empty($fallback)) {
                    return basename($fallback[0]);
                }

                return '';
            }
        }

        $idx = ($this->imageCounters[$type] ?? 0) % count($this->imageCache[$type]);
        $this->imageCounters[$type] = ($this->imageCounters[$type] ?? 0) + 1;

        return $this->imageCache[$type][$idx];
    }

    protected function translationExists(string $modelClass, string $enValue, string $field = 'name'): bool
    {
        return $modelClass::whereHas('translations', function ($q) use ($enValue, $field) {
            $q->where('locale', 'en')->where($field, $enValue);
        })->exists();
    }
}
