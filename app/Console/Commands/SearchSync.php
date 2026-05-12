<?php

namespace App\Console\Commands;

use App\Models\Blog\Blog;
use App\Models\City;
use App\Models\Event;
use App\Models\Tour;
use App\Models\TravelService\TravelService;
use Illuminate\Console\Command;
use Meilisearch\Client;

class SearchSync extends Command
{
    protected $signature = 'search:sync {--configure-only : Only configure index settings, skip import}';

    protected $description = 'Configure Meilisearch indexes and bulk-index all models for every locale.';

    public function handle(): int
    {
        $host = config('scout.meilisearch.host');
        $client = new Client($host, config('scout.meilisearch.key'));

        // Connectivity check before doing any work
        try {
            $client->health();
        } catch (\Throwable $e) {
            $this->error('Cannot connect to Meilisearch at '.$host);
            $this->newLine();
            $this->line('  1. Download  https://github.com/meilisearch/meilisearch/releases/latest');
            $this->line('               → meilisearch-windows-amd64.exe');
            $this->line('  2. Start it  meilisearch.exe --master-key '.config('scout.meilisearch.key'));
            $this->line('  3. Re-run    php artisan search:sync');
            $this->newLine();
            $this->warn('Search is still functional via the database fallback in SearchController.');

            return self::FAILURE;
        }

        $locales = ['en', 'zh', 'zh-Hant'];
        $resources = ['tours', 'cities', 'events', 'blogs', 'services'];

        foreach ($resources as $resource) {
            foreach ($locales as $locale) {
                $uid = $resource.'_'.str_replace('-', '_', $locale);
                $this->info("Configuring index {$uid}");
                $client->createIndex($uid, ['primaryKey' => 'id']);
                $index = $client->index($uid);
                $index->updateSettings([
                    'searchableAttributes' => ['title', 'description'],
                    'displayedAttributes' => ['id', 'type', 'title', 'description', 'url', 'image', 'locale'],
                    'filterableAttributes' => ['type', 'locale'],
                    'rankingRules' => ['words', 'typo', 'proximity', 'attribute', 'sort', 'exactness'],
                    'typoTolerance' => [
                        'enabled' => true,
                        'minWordSizeForTypos' => ['oneTypo' => 4, 'twoTypos' => 8],
                    ],
                ]);
            }
        }

        if ($this->option('configure-only')) {
            $this->info('Configuration done.');

            return self::SUCCESS;
        }

        $models = [
            Tour::class => 'tours',
            City::class => 'cities',
            Event::class => 'events',
            Blog::class => 'blogs',
            TravelService::class => 'services',
        ];

        foreach ($models as $class => $resource) {
            $count = $class::query()->count();
            $this->info("Indexing {$count} {$resource} across ".count($locales).' locales');
            $class::reindexAllLocales();
        }

        $this->info('Done. Open http://localhost:7700 to inspect.');

        return self::SUCCESS;
    }
}
