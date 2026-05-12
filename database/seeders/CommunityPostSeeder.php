<?php

namespace Database\Seeders;

use App\Models\CommunityPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class CommunityPostSeeder extends Seeder
{
    public function run(): void
    {
        $samples = [
            ['username' => '@kate_hogg',     'platform' => 'instagram', 'caption' => 'Sunset over the pyramids — pure magic.',                'ig' => 'https://www.instagram.com/'],
            ['username' => '@nile_diaries',  'platform' => 'instagram', 'caption' => 'Nile cruise mornings hit different.',                    'ig' => 'https://www.instagram.com/'],
            ['username' => '@wanderwithjo',  'platform' => 'tiktok',    'caption' => 'POV: you\'re inside Abu Simbel. Worth every step.',     'ig' => null],
            ['username' => '@globe_lara',    'platform' => 'instagram', 'caption' => 'Khan El Khalili after dark — saffron, silk and tea.',    'ig' => 'https://www.instagram.com/'],
            ['username' => '@trippy_tariq',  'platform' => 'twitter',   'caption' => 'Day 4: hot-air balloon over Luxor at sunrise.',          'ig' => null],
            ['username' => '@beachy_amira',  'platform' => 'instagram', 'caption' => 'Red Sea blues. Sharm has my heart.',                     'ig' => 'https://www.instagram.com/'],
            ['username' => '@hannahexplores', 'platform' => 'tiktok',    'caption' => 'Five days, three cities, a lifetime of memories.',       'ig' => null],
            ['username' => '@adel.travel',   'platform' => 'manual',    'caption' => 'Camel selfies are mandatory. I don\'t make the rules.', 'ig' => null],
        ];

        foreach ($samples as $i => $row) {
            $n = $i + 1;
            CommunityPost::updateOrCreate(
                ['username' => $row['username']],
                [
                    'avatar_url' => "https://i.pravatar.cc/120?img={$n}",
                    'image_url' => "https://picsum.photos/seed/community-{$n}/600/750",
                    'instagram_post_url' => $row['ig'],
                    'platform' => $row['platform'],
                    'caption' => $row['caption'],
                    'is_active' => true,
                    'sort_order' => $n,
                ]
            );
        }

        Cache::forget('community_posts');
    }
}
