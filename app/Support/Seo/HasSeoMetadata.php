<?php

namespace App\Support\Seo;

use Illuminate\Support\Str;

trait HasSeoMetadata
{
    public function seoTitle(?string $fallback = null): string
    {
        return $this->cleanSeoText(
            $this->firstSeoValue(['meta_title', 'title', 'name', 'head']) ?: $fallback ?: config('app.name', 'Doudou'),
            70
        );
    }

    public function seoDescription(?string $fallback = null): string
    {
        return $this->cleanSeoText(
            $this->firstSeoValue(['meta_description', 'excerpt', 'head', 'description']) ?: $fallback ?: $this->seoTitle(),
            160
        );
    }

    public function seoImage(?string $fallback = null): ?string
    {
        $image = $this->firstSeoValue(['meta_img', 'image_url', 'photo', 'image']) ?: $fallback;

        if (! $image) {
            return null;
        }

        if (Str::startsWith($image, ['http://', 'https://'])) {
            return $image;
        }

        return asset(ltrim($image, '/'));
    }

    public function seoJsonLd(string $type, string $url, ?string $fallbackImage = null): array
    {
        return array_filter([
            '@context' => 'https://schema.org',
            '@type' => $type,
            'name' => $this->seoTitle(),
            'description' => $this->seoDescription(),
            'url' => $url,
            'image' => $this->seoImage($fallbackImage),
            'datePublished' => optional($this->created_at)->toIso8601String(),
            'dateModified' => optional($this->updated_at)->toIso8601String(),
        ]);
    }

    protected function firstSeoValue(array $fields): ?string
    {
        foreach ($fields as $field) {
            $value = $this->{$field} ?? null;

            if (is_string($value) && trim(strip_tags($value)) !== '') {
                return $value;
            }
        }

        return null;
    }

    protected function cleanSeoText(string $value, int $limit): string
    {
        $value = preg_replace('/\s+/u', ' ', trim(strip_tags($value))) ?: '';

        return Str::limit($value, $limit, '');
    }
}
