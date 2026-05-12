<?php

namespace Database\Seeders;

use App\Models\Hotel\Hotel;

class HotelSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            [
                'phone' => '+20 2 2791 7000',
                'en' => ['name' => 'Four Seasons Cairo',          'address' => '35 Charles de Gaulle Street, Garden City, Cairo'],
                'zh' => ['name' => '开罗四季酒店',                 'address' => '开罗花园城查理·戴高乐街35号'],
                'zh-Hant' => ['name' => '開羅四季酒店',            'address' => '開羅花園城查理·戴高樂街35號'],
            ],
            [
                'phone' => '+20 97 231 6000',
                'en' => ['name' => 'Sofitel Old Cataract',        'address' => 'Abtal El Tahrir Street, Aswan'],
                'zh' => ['name' => '索菲特老瀑布酒店',             'address' => '埃及阿斯旺解放英雄街'],
                'zh-Hant' => ['name' => '索菲特老瀑布酒店',        'address' => '埃及阿斯旺解放英雄街'],
            ],
            [
                'phone' => '+20 2 3377 3222',
                'en' => ['name' => 'Marriott Mena House',         'address' => '6 Pyramids Road, Giza'],
                'zh' => ['name' => '万豪美纳之家',                 'address' => '吉萨金字塔路6号'],
                'zh-Hant' => ['name' => '萬豪美納之家',            'address' => '吉薩金字塔路6號'],
            ],
            [
                'phone' => '+20 95 238 0925',
                'en' => ['name' => 'Hilton Luxor Resort',         'address' => 'Nile Corniche, Luxor'],
                'zh' => ['name' => '卢克索希尔顿度假村',           'address' => '卢克索尼罗河滨水大道'],
                'zh-Hant' => ['name' => '盧克索希爾頓度假村',      'address' => '盧克索尼羅河濱水大道'],
            ],
            [
                'phone' => '+20 69 360 1234',
                'en' => ['name' => 'Sheraton Sharm El Sheikh',    'address' => 'Peace Road, Sharm El Sheikh'],
                'zh' => ['name' => '喜来登沙姆酒店',              'address' => '沙姆沙伊赫和平路'],
                'zh-Hant' => ['name' => '喜來登沙姆酒店',         'address' => '沙姆沙伊赫和平路'],
            ],
        ];

        foreach ($records as $data) {
            $enName = $data['en']['name'];
            if ($this->translationExists(Hotel::class, $enName)) {
                $this->command->line("  skip Hotel: {$enName}");

                continue;
            }
            try {
                $row = [
                    'phone' => $data['phone'],
                    'photo' => $this->getImage('hotels'),
                    'en' => $data['en'],
                    'zh' => $data['zh'],
                    'zh-Hant' => $data['zh-Hant'],
                ];
                Hotel::create($row);
            } catch (\Throwable $e) {
                $this->command->error("  Hotel '{$enName}': {$e->getMessage()}");
            }
        }
    }
}
