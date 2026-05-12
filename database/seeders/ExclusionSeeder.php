<?php

namespace Database\Seeders;

use App\Models\Exclusion;

class ExclusionSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            ['en' => ['name' => 'International Flights'], 'zh' => ['name' => '国际航班'], 'zh-Hant' => ['name' => '國際航班']],
            ['en' => ['name' => 'Travel Insurance'],      'zh' => ['name' => '旅行保险'], 'zh-Hant' => ['name' => '旅行保險']],
            ['en' => ['name' => 'Visa Fees'],             'zh' => ['name' => '签证费用'], 'zh-Hant' => ['name' => '簽證費用']],
            ['en' => ['name' => 'Personal Expenses'],     'zh' => ['name' => '个人消费'], 'zh-Hant' => ['name' => '個人消費']],
            ['en' => ['name' => 'Tipping'],               'zh' => ['name' => '小费'],     'zh-Hant' => ['name' => '小費']],
            ['en' => ['name' => 'Optional Activities'],   'zh' => ['name' => '自选活动'], 'zh-Hant' => ['name' => '自選活動']],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(Exclusion::class, $enName)) {
                $this->command->line("  skip Exclusion: {$enName}");

                continue;
            }
            try {
                Exclusion::create($data);
            } catch (\Throwable $e) {
                $this->command->error("  Exclusion '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
