<?php

namespace App\Console\Commands;

use App\Models\CommunityPost;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateCommunityPostCaptions extends Command
{
    protected $signature = 'migrate:community-post-captions';

    protected $description = 'Copy existing community_posts.caption into community_post_translations for all 3 locales (idempotent)';

    public function handle(): int
    {
        $locales = ['en', 'zh', 'zh-Hant'];
        $posts = CommunityPost::with('translations')->get();
        $created = 0;
        $skipped = 0;

        foreach ($posts as $post) {
            foreach ($locales as $locale) {
                $exists = $post->translations()->where('locale', $locale)->exists();

                if ($exists) {
                    $skipped++;

                    continue;
                }

                DB::table('community_post_translations')->insert([
                    'community_post_id' => $post->id,
                    'locale' => $locale,
                    'caption' => $post->getRawOriginal('caption') ?? '',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $created++;
            }
        }

        $this->info("Done. Created: {$created}, Skipped (already present): {$skipped}.");

        return self::SUCCESS;
    }
}
