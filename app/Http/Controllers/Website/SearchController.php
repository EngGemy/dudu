<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\City;
use App\Models\Event;
use App\Models\Tour;
use App\Models\TravelService\TravelService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Meilisearch\Client;
use Meilisearch\Contracts\SearchQuery;

class SearchController extends Controller
{
    private const RESOURCES = ['tours', 'cities', 'events', 'blogs', 'services'];

    public function suggest(Request $request): JsonResponse
    {
        $query = trim((string) $request->input('q', ''));
        $locale = app()->getLocale();

        if ($query === '') {
            return response()->json(['query' => '', 'groups' => []]);
        }

        $client = new Client(
            config('scout.meilisearch.host'),
            config('scout.meilisearch.key')
        );

        // Hit the current-locale index AND the English index so a user browsing in
        // Chinese can still find "cairo" (Latin name) and an English visitor can
        // still find a record only translated into Chinese.
        $localesToSearch = array_unique([$locale, 'en']);

        $queries = [];
        foreach (self::RESOURCES as $resource) {
            foreach ($localesToSearch as $loc) {
                $sq = new SearchQuery();
                $sq->setIndexUid($resource.'_'.str_replace('-', '_', $loc));
                $sq->setQuery($query);
                $sq->setLimit(5);
                $sq->setAttributesToHighlight(['title', 'description']);
                $sq->setHighlightPreTag('<mark>');
                $sq->setHighlightPostTag('</mark>');
                $queries[] = $sq;
            }
        }

        try {
            $response = $client->multiSearch($queries);
        } catch (\Throwable) {
            // Meilisearch unavailable — degrade to database LIKE search
            return $this->databaseFallback($query, $locale);
        }

        // Group by resource, dedupe by id, prefer the current locale's hit.
        $groups = [];
        foreach ($response['results'] ?? [] as $result) {
            $indexUid = $result['indexUid'] ?? '';
            $resource = $this->resourceFromIndex($indexUid);
            if (! $resource) {
                continue;
            }
            $localePriority = str_ends_with($indexUid, '_'.str_replace('-', '_', $locale)) ? 0 : 1;
            foreach ($result['hits'] ?? [] as $hit) {
                $id = $hit['id'] ?? null;
                $key = $resource.':'.$id;
                $existing = $groups[$resource][$key] ?? null;
                if ($existing && $existing['priority'] <= $localePriority) {
                    continue;
                }
                $formatted = $hit['_formatted'] ?? [];
                $groups[$resource][$key] = [
                    'priority' => $localePriority,
                    'hit' => [
                        'id' => $id,
                        'type' => $hit['type'] ?? $resource,
                        'title' => $formatted['title'] ?? $hit['title'] ?? '',
                        'description' => $formatted['description'] ?? $hit['description'] ?? '',
                        'url' => $hit['url'] ?? '#',
                        'image' => $hit['image'] ?? null,
                    ],
                ];
            }
        }

        $output = [];
        foreach (self::RESOURCES as $resource) {
            $bucket = $groups[$resource] ?? [];
            if (! $bucket) {
                continue;
            }
            usort($bucket, fn ($a, $b) => $a['priority'] <=> $b['priority']);
            $hits = array_slice(array_map(fn ($x) => $x['hit'], $bucket), 0, 5);
            $output[] = [
                'resource' => $resource,
                'label' => $this->groupLabel($resource),
                'hits' => $hits,
            ];
        }

        if (empty($output)) {
            return response()->json($this->databaseFallbackPayload($query, $locale));
        }

        return response()->json([
            'query' => $query,
            'locale' => $locale,
            'groups' => $output,
        ]);
    }

    private function databaseFallback(string $query, string $locale): JsonResponse
    {
        return response()->json($this->databaseFallbackPayload($query, $locale));
    }

    private function databaseFallbackPayload(string $query, string $locale): array
    {
        $like = '%'.$query.'%';
        $output = [];

        // Tours
        $tours = Tour::with('translations')
            ->where(function ($q) use ($like) {
                $q->whereHas('translations', fn ($t) => $t
                    ->where('name', 'LIKE', $like)
                    ->orWhere('description', 'LIKE', $like)
                )
                    ->orWhere('slug', 'LIKE', $like);
            })
            ->where(function ($q) {
                $q->where('publish', 1)->orWhere('is_active', 1);
            })
            ->limit(5)->get();

        if ($tours->isNotEmpty()) {
            $hits = $tours->map(function ($tour) use ($locale) {
                $t = $tour->translate($locale, true) ?? $tour->translate('en', true);

                return [
                    'id' => $tour->id,
                    'type' => 'tour',
                    'title' => $t?->name ?? '',
                    'description' => $t?->description ? mb_substr(strip_tags($t->description), 0, 150) : '',
                    'url' => url('/tours/details/'.$tour->slug),
                    'image' => $tour->getRawOriginal('photo') ? asset('assets/images/tours/'.$tour->getRawOriginal('photo')) : null,
                ];
            })->filter(fn ($h) => $h['title'])->values()->all();

            if (! empty($hits)) {
                $output[] = ['resource' => 'tours', 'label' => $this->groupLabel('tours'), 'hits' => $hits];
            }
        }

        // Events
        $events = Event::with('translations')
            ->whereHas('translations', fn ($q) => $q->where('name', 'LIKE', $like))
            ->where('is_active', true)
            ->limit(5)->get();

        if ($events->isNotEmpty()) {
            $hits = $events->map(function ($event) use ($locale) {
                $t = $event->translate($locale, true) ?? $event->translate('en', true);

                return [
                    'id' => $event->id,
                    'type' => 'event',
                    'title' => $t?->name ?? '',
                    'description' => $t?->description ? mb_substr(strip_tags($t->description), 0, 150) : '',
                    'url' => url('/event_details/'.$event->slug),
                    'image' => $event->getRawOriginal('photo') ? asset('assets/images/events/'.$event->getRawOriginal('photo')) : null,
                ];
            })->filter(fn ($h) => $h['title'])->values()->all();

            if (! empty($hits)) {
                $output[] = ['resource' => 'events', 'label' => $this->groupLabel('events'), 'hits' => $hits];
            }
        }

        // Blogs
        $blogs = Blog::with('translations')
            ->where(function ($q) use ($like) {
                $q->whereHas('translations', fn ($t) => $t
                    ->where('title', 'LIKE', $like)
                    ->orWhere('description', 'LIKE', $like)
                    ->orWhere('slug', 'LIKE', $like)
                );
            })
            ->limit(5)->get();

        if ($blogs->isNotEmpty()) {
            $hits = $blogs->map(function ($blog) use ($locale) {
                $t = $blog->translate($locale, true) ?? $blog->translate('en', true);
                $enT = $blog->translate('en', true);
                $slug = $t?->slug ?? $enT?->slug ?? $blog->id;

                return [
                    'id' => $blog->id,
                    'type' => 'blog',
                    'title' => $t?->title ?? '',
                    'description' => $t?->description ? mb_substr(strip_tags($t->description), 0, 150) : '',
                    'url' => url('/blogs/'.$slug),
                    'image' => $blog->image ? asset('assets/images/blogs/'.$blog->image) : null,
                ];
            })->filter(fn ($h) => $h['title'])->values()->all();

            if (! empty($hits)) {
                $output[] = ['resource' => 'blogs', 'label' => $this->groupLabel('blogs'), 'hits' => $hits];
            }
        }

        // Cities
        $cities = City::with('translations')
            ->where(function ($q) use ($like) {
                $q->whereHas('translations', fn ($t) => $t
                    ->where('name', 'LIKE', $like)
                );
            })
            ->limit(5)->get();

        if ($cities->isNotEmpty()) {
            $hits = $cities->map(function ($city) use ($locale) {
                $t = $city->translate($locale, true) ?? $city->translate('en', true);

                return [
                    'id' => $city->id,
                    'type' => 'city',
                    'title' => $t?->name ?? '',
                    'description' => '',
                    'url' => url('/tours'),
                    'image' => $city->image_url ?? null,
                ];
            })->filter(fn ($h) => $h['title'])->values()->all();

            if (! empty($hits)) {
                $output[] = ['resource' => 'cities', 'label' => $this->groupLabel('cities'), 'hits' => $hits];
            }
        }

        // Travel Services
        $services = TravelService::with('translations')
            ->where(function ($q) use ($like) {
                $q->whereHas('translations', fn ($t) => $t
                    ->where('title', 'LIKE', $like)
                    ->orWhere('description', 'LIKE', $like)
                    ->orWhere('slug', 'LIKE', $like)
                );
            })
            ->limit(5)->get();

        if ($services->isNotEmpty()) {
            $hits = $services->map(function ($service) use ($locale) {
                $t = $service->translate($locale, true) ?? $service->translate('en', true);
                $enT = $service->translate('en', true);
                $slug = $t?->slug ?? $enT?->slug ?? '';

                return [
                    'id' => $service->id,
                    'type' => 'service',
                    'title' => $t?->title ?? '',
                    'description' => $t?->description ? mb_substr(strip_tags($t->description), 0, 150) : '',
                    'url' => $slug ? url('/services/'.$slug) : url('/services'),
                    'image' => $service->image_url ?? null,
                ];
            })->filter(fn ($h) => $h['title'])->values()->all();

            if (! empty($hits)) {
                $output[] = ['resource' => 'services', 'label' => $this->groupLabel('services'), 'hits' => $hits];
            }
        }

        return ['query' => $query, 'groups' => $output];
    }

    private function resourceFromIndex(string $indexUid): ?string
    {
        foreach (self::RESOURCES as $resource) {
            if (str_starts_with($indexUid, $resource.'_')) {
                return $resource;
            }
        }

        return null;
    }

    private function groupLabel(string $resource): string
    {
        return match ($resource) {
            'tours' => __('front.site.sections.egypt_tours'),
            'cities' => __('front.site.sections.top_egypt_destinations'),
            'events' => __('front.site.footer.events'),
            'blogs' => __('front.site.footer.blogs'),
            'services' => __('front.site.footer.services'),
            default => ucfirst($resource),
        };
    }
}
