<?php

namespace Database\Seeders;

use App\Models\City;

class CitySeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            ['en' => ['name' => 'Cairo'],           'zh' => ['name' => '开罗'],      'zh-Hant' => ['name' => '開羅']],
            ['en' => ['name' => 'Luxor'],           'zh' => ['name' => '卢克索'],    'zh-Hant' => ['name' => '盧克索']],
            ['en' => ['name' => 'Aswan'],           'zh' => ['name' => '阿斯旺'],    'zh-Hant' => ['name' => '阿斯旺']],
            ['en' => ['name' => 'Alexandria'],      'zh' => ['name' => '亚历山大'],  'zh-Hant' => ['name' => '亞歷山大']],
            ['en' => ['name' => 'Hurghada'],        'zh' => ['name' => '赫尔格达'],  'zh-Hant' => ['name' => '赫爾格達']],
            ['en' => ['name' => 'Sharm El Sheikh'], 'zh' => ['name' => '沙姆沙伊赫'], 'zh-Hant' => ['name' => '沙姆沙伊赫']],
            ['en' => ['name' => 'Dahab'],           'zh' => ['name' => '达哈卜'],    'zh-Hant' => ['name' => '達哈卜']],
            ['en' => ['name' => 'Marsa Alam'],      'zh' => ['name' => '马萨阿拉姆'], 'zh-Hant' => ['name' => '馬薩阿拉姆']],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(City::class, $enName)) {
                $this->command->line("  skip City: {$enName}");

                continue;
            }
            try {
                City::create(array_merge(['image' => $this->getImage('cities')], $data));
            } catch (\Throwable $e) {
                $this->command->error("  City '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
