<?php

namespace Database\Seeders;

use App\Models\TourType;

class TourTypeSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            ['en' => ['name' => 'Adventure'],       'zh' => ['name' => '冒险'],      'zh-Hant' => ['name' => '冒險']],
            ['en' => ['name' => 'Cultural'],        'zh' => ['name' => '文化'],      'zh-Hant' => ['name' => '文化']],
            ['en' => ['name' => 'Religious'],       'zh' => ['name' => '宗教'],      'zh-Hant' => ['name' => '宗教']],
            ['en' => ['name' => 'Beach & Resort'],  'zh' => ['name' => '海滩度假'],  'zh-Hant' => ['name' => '海灘度假']],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(TourType::class, $enName)) {
                $this->command->line("  skip TourType: {$enName}");

                continue;
            }
            try {
                TourType::create($data);
            } catch (\Throwable $e) {
                $this->command->error("  TourType '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
