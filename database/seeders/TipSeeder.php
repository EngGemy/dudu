<?php

namespace Database\Seeders;

use App\Models\Tip;

class TipSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            ['en' => ['name' => 'Best Time to Visit'],  'zh' => ['name' => '最佳旅游时间'], 'zh-Hant' => ['name' => '最佳旅遊時間']],
            ['en' => ['name' => 'What to Pack'],        'zh' => ['name' => '行李准备'],     'zh-Hant' => ['name' => '行李準備']],
            ['en' => ['name' => 'Currency Exchange'],   'zh' => ['name' => '货币兑换'],     'zh-Hant' => ['name' => '貨幣兌換']],
            ['en' => ['name' => 'Local Customs'],       'zh' => ['name' => '当地风俗'],     'zh-Hant' => ['name' => '當地風俗']],
            ['en' => ['name' => 'Photography Tips'],    'zh' => ['name' => '摄影技巧'],     'zh-Hant' => ['name' => '攝影技巧']],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(Tip::class, $enName)) {
                $this->command->line("  skip Tip: {$enName}");

                continue;
            }
            try {
                Tip::create(array_merge(['image' => $this->getImage('tips')], $data));
            } catch (\Throwable $e) {
                $this->command->error("  Tip '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
