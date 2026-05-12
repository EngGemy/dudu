<?php

namespace Database\Seeders;

use App\Models\Category;

class CategorySeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            ['en' => ['name' => 'Egypt Tours'],    'zh' => ['name' => '埃及旅游'],    'zh-Hant' => ['name' => '埃及旅遊']],
            ['en' => ['name' => 'Nile Cruises'],   'zh' => ['name' => '尼罗河游船'],  'zh-Hant' => ['name' => '尼羅河遊船']],
            ['en' => ['name' => 'Luxury Tours'],   'zh' => ['name' => '豪华旅游'],    'zh-Hant' => ['name' => '豪華旅遊']],
            ['en' => ['name' => 'Family Tours'],   'zh' => ['name' => '家庭旅游'],    'zh-Hant' => ['name' => '家庭旅遊']],
            ['en' => ['name' => 'Day Trips'],      'zh' => ['name' => '一日游'],      'zh-Hant' => ['name' => '一日遊']],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(Category::class, $enName)) {
                $this->command->line("  skip Category: {$enName}");

                continue;
            }
            try {
                Category::create(array_merge(['is_active' => true], $data));
            } catch (\Throwable $e) {
                $this->command->error("  Category '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
