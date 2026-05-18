<?php

namespace Database\Seeders;

use App\Enum\PopularVideoStatus;
use App\Models\PopularVideo\PopularVideo;

class PopularVideoSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        foreach ($this->videoData() as $spec) {
            if (PopularVideo::where('link', $spec['link'])->exists()) {
                $this->command->line("  skip PopularVideo: {$spec['en']['title']}");

                continue;
            }

            PopularVideo::create([
                'link' => $spec['link'],
                'status' => PopularVideoStatus::ACTIVE->value,
                'en' => $spec['en'],
                'zh' => $spec['zh'],
                'zh-Hant' => $spec['zh-Hant'],
            ]);
        }
    }

    private function videoData(): array
    {
        return [
            [
                'link' => 'https://www.youtube.com/embed/8mW2mTESEsE',
                'en' => ['title' => 'Egypt Travel Inspiration'],
                'zh' => ['title' => '埃及旅行灵感'],
                'zh-Hant' => ['title' => '埃及旅行靈感'],
            ],
            [
                'link' => 'https://www.youtube.com/embed/C05IG7tqaW8',
                'en' => ['title' => 'Nile Cruise Experience'],
                'zh' => ['title' => '尼罗河游轮体验'],
                'zh-Hant' => ['title' => '尼羅河郵輪體驗'],
            ],
        ];
    }
}
