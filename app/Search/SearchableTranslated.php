<?php

namespace App\Search;

use Laravel\Scout\Searchable;

trait SearchableTranslated
{
    use Searchable;

    public static array $searchLocales = ['en', 'zh', 'zh-Hant'];

    public function searchableAs(): string
    {
        $base = $this->searchIndexBase();
        $locale = $this->currentSearchLocale ?? app()->getLocale();

        return $base.'_'.str_replace('-', '_', $locale);
    }

    abstract protected function searchIndexBase(): string;

    abstract protected function searchType(): string;

    abstract protected function searchUrl(): string;

    abstract protected function searchImage(): ?string;

    public function toSearchableArray(): array
    {
        $locale = $this->currentSearchLocale ?? app()->getLocale();
        $translation = $this->translations->firstWhere('locale', $locale)
            ?? $this->translations->firstWhere('locale', 'en')
            ?? $this->translations->first();

        $title = $this->resolveTranslatedField($translation, ['name', 'title']);
        $description = $this->resolveTranslatedField($translation, ['description', 'content', 'excerpt', 'head']);

        return [
            'id' => $this->getKey(),
            'type' => $this->searchType(),
            'title' => $title,
            'description' => $description ? mb_substr(strip_tags((string) $description), 0, 240) : null,
            'url' => $this->searchUrl(),
            'image' => $this->searchImage(),
            'locale' => $locale,
        ];
    }

    public function indexAcrossLocales(): void
    {
        foreach (self::$searchLocales as $locale) {
            $this->currentSearchLocale = $locale;
            $this->searchable();
        }
        $this->currentSearchLocale = null;
    }

    public static function reindexAllLocales(): void
    {
        foreach (self::$searchLocales as $locale) {
            $instance = new static;
            $instance->currentSearchLocale = $locale;
            static::query()->with('translations')->chunk(100, function ($models) use ($locale) {
                foreach ($models as $model) {
                    $model->currentSearchLocale = $locale;
                }
                $models->searchable();
            });
        }
    }

    private function resolveTranslatedField($translation, array $candidates): ?string
    {
        if (! $translation) {
            return null;
        }
        foreach ($candidates as $field) {
            if (! empty($translation->{$field})) {
                return (string) $translation->{$field};
            }
        }

        return null;
    }

    public ?string $currentSearchLocale = null;
}
