<?php

namespace Database\Seeders;

use App\Models\Inclusion;

class InclusionSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            ['en' => ['name' => 'Hotel Accommodation'],    'zh' => ['name' => '酒店住宿'],  'zh-Hant' => ['name' => '酒店住宿']],
            ['en' => ['name' => 'Daily Breakfast'],        'zh' => ['name' => '每日早餐'],  'zh-Hant' => ['name' => '每日早餐']],
            ['en' => ['name' => 'Private Transportation'], 'zh' => ['name' => '私人交通'],  'zh-Hant' => ['name' => '私人交通']],
            ['en' => ['name' => 'English-speaking Guide'], 'zh' => ['name' => '英语导游'],  'zh-Hant' => ['name' => '英語導遊']],
            ['en' => ['name' => 'All Entrance Fees'],      'zh' => ['name' => '所有门票'],  'zh-Hant' => ['name' => '所有門票']],
            ['en' => ['name' => 'Airport Transfers'],      'zh' => ['name' => '机场接送'],  'zh-Hant' => ['name' => '機場接送']],
            ['en' => ['name' => 'Domestic Flights'],       'zh' => ['name' => '国内航班'],  'zh-Hant' => ['name' => '國內航班']],
            ['en' => ['name' => 'Bottled Water'],          'zh' => ['name' => '瓶装水'],    'zh-Hant' => ['name' => '瓶裝水']],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(Inclusion::class, $enName)) {
                $this->command->line("  skip Inclusion: {$enName}");

                continue;
            }
            try {
                Inclusion::create($data);
            } catch (\Throwable $e) {
                $this->command->error("  Inclusion '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
