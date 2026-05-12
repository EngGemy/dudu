<?php

namespace Database\Seeders;

use App\Models\TourGroup;

class TourGroupSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            ['en' => ['name' => 'Small Group (1-8)'],   'zh' => ['name' => '小团 (1-8人)'],   'zh-Hant' => ['name' => '小團 (1-8人)']],
            ['en' => ['name' => 'Medium Group (9-15)'], 'zh' => ['name' => '中团 (9-15人)'],  'zh-Hant' => ['name' => '中團 (9-15人)']],
            ['en' => ['name' => 'Large Group (16+)'],   'zh' => ['name' => '大团 (16人以上)'], 'zh-Hant' => ['name' => '大團 (16人以上)']],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(TourGroup::class, $enName)) {
                $this->command->line("  skip TourGroup: {$enName}");

                continue;
            }
            try {
                TourGroup::create($data);
            } catch (\Throwable $e) {
                $this->command->error("  TourGroup '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
