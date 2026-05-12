<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(190);

        $translationToParent = [
            \App\Models\TourTranslation::class => 'tour',
            \App\Models\CityTranslation::class => 'city',
            \App\Models\EventTranslation::class => 'event',
            \App\Models\Blog\BlogTranslation::class => 'blog',
            \App\Models\TravelService\TravelServiceTranslation::class => 'travelService',
        ];
        foreach ($translationToParent as $translationClass => $parentRel) {
            if (class_exists($translationClass)) {
                $translationClass::saved(function ($t) use ($parentRel) {
                    $parent = $t->{$parentRel} ?? null;
                    if ($parent && method_exists($parent, 'indexAcrossLocales')) {
                        $parent->indexAcrossLocales();
                    }
                });
            }
        }
    }
}
