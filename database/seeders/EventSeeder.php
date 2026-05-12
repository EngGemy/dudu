<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Event;
use App\Models\EventExclusion;
use App\Models\EventInclusion;
use App\Models\EventOverview;

class EventSeeder extends BaseTranslatableSeeder
{
    private array $cityIds = [];

    public function run(): void
    {
        foreach (City::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->cityIds[$t->name] = $c->id;
            }
        }

        foreach ($this->eventData() as $spec) {
            $enName = $spec['en']['name'];
            if ($this->translationExists(Event::class, $enName)) {
                $this->command->line("  skip Event: {$enName}");

                continue;
            }
            try {
                $this->createEvent($spec);
                $this->command->info("  seeded Event: {$enName}");
            } catch (\Throwable $e) {
                $this->command->error("  Event '{$enName}': {$e->getMessage()}");
            }
        }
    }

    private function createEvent(array $spec): void
    {
        $event = Event::create([
            'is_active' => true,
            'photo' => $this->getImage('events'),
            'en' => $spec['en'],
            'zh' => $spec['zh'],
            'zh-Hant' => $spec['zh-Hant'],
        ]);

        $cityId = $this->cityIds[$spec['city']] ?? null;
        $blob = json_encode([
            'locations' => json_encode($cityId ? [$cityId] : []),
            'start_date' => $spec['start_date'],
            'end_date' => $spec['end_date'],
            'cancellation' => $spec['cancellation'],
            'statues' => $spec['status_label'],
            'website' => $spec['website'] ?? '',
            'email' => $spec['email'] ?? '',
            'phone' => $spec['phone'] ?? '',
        ]);

        EventOverview::create([
            'event_id' => $event->id,
            'en' => ['values' => $blob],
            'zh' => ['values' => $blob],
            'zh-Hant' => ['values' => $blob],
        ]);

        EventInclusion::create([
            'event_id' => $event->id,
            'en' => ['values' => json_encode($spec['inclusions']['en'])],
            'zh' => ['values' => json_encode($spec['inclusions']['zh'])],
            'zh-Hant' => ['values' => json_encode($spec['inclusions']['zh-Hant'])],
        ]);

        EventExclusion::create([
            'event_id' => $event->id,
            'en' => ['values' => json_encode($spec['exclusions']['en'])],
            'zh' => ['values' => json_encode($spec['exclusions']['zh'])],
            'zh-Hant' => ['values' => json_encode($spec['exclusions']['zh-Hant'])],
        ]);
    }

    private function eventData(): array
    {
        return [
            [
                'city' => 'Cairo',
                'start_date' => '2024-11-13',
                'end_date' => '2024-11-22',
                'cancellation' => 'Non-refundable',
                'status_label' => 'Upcoming',
                'website' => 'https://cairofilmfestival.com',
                'email' => 'info@cairofilmfestival.com',
                'phone' => '+20 2 2574 2562',
                'inclusions' => [
                    'en' => ['Festival pass', 'Access to all screenings', 'Opening ceremony invitation'],
                    'zh' => ['电影节通票', '所有放映场次入场券', '开幕式邀请函'],
                    'zh-Hant' => ['電影節通票', '所有放映場次入場券', '開幕式邀請函'],
                ],
                'exclusions' => [
                    'en' => ['International flights', 'Hotel accommodation', 'Personal expenses'],
                    'zh' => ['国际机票', '酒店住宿', '个人消费'],
                    'zh-Hant' => ['國際機票', '酒店住宿', '個人消費'],
                ],
                'en' => [
                    'name' => 'Cairo International Film Festival',
                    'description' => '<p>One of the oldest and most prestigious film festivals in Africa and the Middle East, the Cairo International Film Festival brings together filmmakers and cinema lovers from across the globe for ten days of screenings, masterclasses, and awards.</p><p>Held annually in November in the heart of Cairo, the festival showcases hundreds of international and Arab films across venues throughout the city, culminating in the Golden Pyramid award ceremony.</p>',
                    'meta_title' => 'Cairo International Film Festival — November 2024',
                    'meta_description' => 'Attend the Cairo International Film Festival, one of the oldest film festivals in Africa and the Middle East.',
                ],
                'zh' => [
                    'name' => '开罗国际电影节',
                    'description' => '<p>开罗国际电影节是非洲和中东地区最古老、最负盛名的电影节之一，汇聚来自全球的电影人和电影爱好者，共同参与为期十天的放映、大师班和颁奖活动。</p><p>电影节每年11月在开罗市中心举办，展映来自世界各地和阿拉伯地区的数百部电影，最终以金字塔奖颁奖典礼作为压轴。</p>',
                    'meta_title' => '开罗国际电影节——2024年11月',
                    'meta_description' => '参加开罗国际电影节，这是非洲和中东地区最古老的电影节之一。',
                ],
                'zh-Hant' => [
                    'name' => '開羅國際電影節',
                    'description' => '<p>開羅國際電影節是非洲和中東地區最古老、最負盛名的電影節之一，匯聚來自全球的電影人和電影愛好者，共同參與為期十天的放映、大師班和頒獎活動。</p><p>電影節每年11月在開羅市中心舉辦，展映來自世界各地和阿拉伯地區的數百部電影，最終以金字塔獎頒獎典禮作為壓軸。</p>',
                    'meta_title' => '開羅國際電影節——2024年11月',
                    'meta_description' => '參加開羅國際電影節，這是非洲和中東地區最古老的電影節之一。',
                ],
            ],

            [
                'city' => 'Aswan',
                'start_date' => '2025-02-22',
                'end_date' => '2025-02-22',
                'cancellation' => 'Non-refundable',
                'status_label' => 'Upcoming',
                'website' => '',
                'email' => 'tourism@aswan.gov.eg',
                'phone' => '+20 97 230 1234',
                'inclusions' => [
                    'en' => ['Entry to Abu Simbel temples', 'Sound and light show', 'Guided commentary'],
                    'zh' => ['阿布辛贝神庙入场券', '声光表演', '导游讲解'],
                    'zh-Hant' => ['阿布辛貝神廟入場券', '聲光表演', '導遊講解'],
                ],
                'exclusions' => [
                    'en' => ['Transportation to Abu Simbel', 'Accommodation', 'Meals'],
                    'zh' => ['前往阿布辛贝的交通', '住宿', '餐饮'],
                    'zh-Hant' => ['前往阿布辛貝的交通', '住宿', '餐飲'],
                ],
                'en' => [
                    'name' => 'Abu Simbel Sun Festival',
                    'description' => '<p>Twice a year — on February 22nd and October 22nd — a remarkable astronomical phenomenon takes place at the Abu Simbel temples. A single shaft of sunlight penetrates 60 metres into the innermost sanctuary of the Great Temple, illuminating the statues of Ramesses II and two of the three seated gods beside him.</p><p>This ancient solar alignment was engineered by the architects of Ramesses II so that the sun would fall on the pharaoh\'s statue on his birthday (October 22nd) and coronation date (February 22nd), while the statue of Ptah, god of darkness, remains forever in shadow.</p>',
                    'meta_title' => 'Abu Simbel Sun Festival — February 22 & October 22',
                    'meta_description' => 'Witness the Abu Simbel solar alignment, when sunlight illuminates Ramesses II\'s statue twice a year.',
                ],
                'zh' => [
                    'name' => '阿布辛贝太阳节',
                    'description' => '<p>每年两次——2月22日和10月22日——阿布辛贝神庙会发生一个非凡的天文现象。一束阳光穿透60米深入大神庙最深处的圣殿，照亮拉美西斯二世的雕像以及他身旁两位端坐神灵的雕像。</p><p>这一古老的太阳对齐设计出自拉美西斯二世的建筑师之手，目的是让阳光在法老的生日（10月22日）和加冕日（2月22日）照射在他的雕像上，而黑暗之神普塔的雕像则永远处于阴影之中。</p>',
                    'meta_title' => '阿布辛贝太阳节——2月22日和10月22日',
                    'meta_description' => '见证阿布辛贝太阳对齐奇观，每年两次阳光照亮拉美西斯二世的雕像。',
                ],
                'zh-Hant' => [
                    'name' => '阿布辛貝太陽節',
                    'description' => '<p>每年兩次——2月22日和10月22日——阿布辛貝神廟會發生一個非凡的天文現象。一束陽光穿透60米深入大神廟最深處的聖殿，照亮拉美西斯二世的雕像以及他身旁兩位端坐神靈的雕像。</p><p>這一古老的太陽對齊設計出自拉美西斯二世的建築師之手，目的是讓陽光在法老的生日（10月22日）和加冕日（2月22日）照射在他的雕像上，而黑暗之神普塔的雕像則永遠處於陰影之中。</p>',
                    'meta_title' => '阿布辛貝太陽節——2月22日和10月22日',
                    'meta_description' => '見證阿布辛貝太陽對齊奇觀，每年兩次陽光照亮拉美西斯二世的雕像。',
                ],
            ],

            [
                'city' => 'Cairo',
                'start_date' => '2025-03-01',
                'end_date' => '2025-03-30',
                'cancellation' => 'Non-refundable',
                'status_label' => 'Upcoming',
                'website' => '',
                'email' => '',
                'phone' => '',
                'inclusions' => [
                    'en' => ['Iftar dinner at selected restaurants', 'Cultural performance tickets', 'Guided Old Cairo night walk'],
                    'zh' => ['指定餐厅开斋饭', '文化演出票', '老开罗夜间导游行走'],
                    'zh-Hant' => ['指定餐廳開齋飯', '文化演出票', '老開羅夜間導遊行走'],
                ],
                'exclusions' => [
                    'en' => ['Accommodation', 'Transportation', 'Personal expenses'],
                    'zh' => ['住宿', '交通', '个人消费'],
                    'zh-Hant' => ['住宿', '交通', '個人消費'],
                ],
                'en' => [
                    'name' => 'Ramadan Cultural Festival',
                    'description' => '<p>Experience Egypt at its most enchanting during the holy month of Ramadan. Cairo transforms after sunset into a kaleidoscope of lanterns, music, and the aroma of traditional food shared at communal Iftar tables stretching the length of entire streets.</p><p>Our Ramadan Cultural Festival program takes you through the illuminated souks of Khan El Khalili, to traditional Sufi whirling dervish performances, and to exclusive Iftar dinners at historic courtyards in Islamic Cairo.</p>',
                    'meta_title' => 'Ramadan in Egypt — Cairo Cultural Festival',
                    'meta_description' => 'Experience Cairo during Ramadan — lantern-lit souks, Iftar dinners, and Sufi performances.',
                ],
                'zh' => [
                    'name' => '斋月文化节',
                    'description' => '<p>在神圣的斋月期间体验最迷人的埃及。日落后，开罗变成一个万花筒般的灯笼、音乐和传统食物的世界，社区开斋饭餐桌绵延整条街道。</p><p>我们的斋月文化节项目带您穿越汗·哈利利集市的灯火辉煌，欣赏传统苏菲旋转舞者的表演，并在伊斯兰开罗的历史庭院享用独家开斋饭。</p>',
                    'meta_title' => '埃及斋月——开罗文化节',
                    'meta_description' => '在斋月期间体验开罗——灯笼点缀的集市、开斋饭和苏菲表演。',
                ],
                'zh-Hant' => [
                    'name' => '齋月文化節',
                    'description' => '<p>在神聖的齋月期間體驗最迷人的埃及。日落後，開羅變成一個萬花筒般的燈籠、音樂和傳統食物的世界，社區開齋飯餐桌綿延整條街道。</p><p>我們的齋月文化節項目帶您穿越汗·哈利利集市的燈火輝煌，欣賞傳統蘇菲旋轉舞者的表演，並在伊斯蘭開羅的歷史庭院享用獨家開齋飯。</p>',
                    'meta_title' => '埃及齋月——開羅文化節',
                    'meta_description' => '在齋月期間體驗開羅——燈籠點綴的集市、開齋飯和蘇菲表演。',
                ],
            ],

            [
                'city' => 'Sharm El Sheikh',
                'start_date' => '2025-04-10',
                'end_date' => '2025-04-15',
                'cancellation' => 'Non-refundable',
                'status_label' => 'Upcoming',
                'website' => 'https://shammdivingfestival.com',
                'email' => 'info@shammdivingfestival.com',
                'phone' => '+20 69 360 9999',
                'inclusions' => [
                    'en' => ['3-day dive pass (6 dives)', 'Equipment rental', 'Welcome reception', 'Certificate of participation'],
                    'zh' => ['3天潜水通票（6次潜水）', '设备租借', '欢迎招待会', '参与证书'],
                    'zh-Hant' => ['3天潛水通票（6次潛水）', '設備租借', '歡迎招待會', '參與證書'],
                ],
                'exclusions' => [
                    'en' => ['Flights', 'Hotel', 'PADI certification costs', 'Personal expenses'],
                    'zh' => ['机票', '酒店', 'PADI认证费用', '个人消费'],
                    'zh-Hant' => ['機票', '酒店', 'PADI認證費用', '個人消費'],
                ],
                'en' => [
                    'name' => 'Sharm El Sheikh Diving Festival',
                    'description' => '<p>Dive into the world\'s most celebrated Red Sea diving festival. The Sharm El Sheikh Diving Festival brings together recreational divers and underwater photographers from around the globe for five days of guided reef dives, competitions, and workshops.</p><p>Featured dive sites include the legendary SS Thistlegorm wreck, Ras Mohammed National Park reefs, and the Blue Hole at Dahab. Evening events include underwater photography exhibitions and an awards gala.</p>',
                    'meta_title' => 'Sharm El Sheikh Diving Festival — Red Sea',
                    'meta_description' => 'Join the Sharm El Sheikh Diving Festival for guided reef dives, photography competitions, and workshops.',
                ],
                'zh' => [
                    'name' => '沙姆沙伊赫潜水节',
                    'description' => '<p>潜入世界最著名的红海潜水节。沙姆沙伊赫潜水节汇聚来自全球的休闲潜水员和水下摄影师，共同参与为期五天的导游礁石潜水、比赛和工作坊。</p><p>主要潜水地点包括传奇的蒂斯特尔戈姆号沉船、拉斯穆罕默德国家公园礁石，以及达哈卜的蓝洞。晚间活动包括水下摄影展览和颁奖典礼。</p>',
                    'meta_title' => '沙姆沙伊赫潜水节——红海',
                    'meta_description' => '参加沙姆沙伊赫潜水节，享受导游礁石潜水、摄影比赛和工作坊。',
                ],
                'zh-Hant' => [
                    'name' => '沙姆沙伊赫潛水節',
                    'description' => '<p>潛入世界最著名的紅海潛水節。沙姆沙伊赫潛水節匯聚來自全球的休閒潛水員和水下攝影師，共同參與為期五天的導遊礁石潛水、比賽和工作坊。</p><p>主要潛水地點包括傳奇的蒂斯特爾戈姆號沉船、拉斯穆罕默德國家公園礁石，以及達哈卜的藍洞。晚間活動包括水下攝影展覽和頒獎典禮。</p>',
                    'meta_title' => '沙姆沙伊赫潛水節——紅海',
                    'meta_description' => '參加沙姆沙伊赫潛水節，享受導遊礁石潛水、攝影比賽和工作坊。',
                ],
            ],

            [
                'city' => 'Cairo',
                'start_date' => '2025-04-03',
                'end_date' => '2025-04-03',
                'cancellation' => 'Non-refundable',
                'status_label' => 'Upcoming',
                'website' => 'https://egyptiantourism.com/golden-parade',
                'email' => 'events@egyptiantourism.com',
                'phone' => '+20 2 2390 0000',
                'inclusions' => [
                    'en' => ['Reserved grandstand seating', 'Official programme booklet', 'Post-parade museum access'],
                    'zh' => ['预留看台座位', '官方节目册', '游行后博物馆参观'],
                    'zh-Hant' => ['預留看台座位', '官方節目冊', '遊行後博物館參觀'],
                ],
                'exclusions' => [
                    'en' => ['Transportation to the venue', 'Food and beverages', 'Personal expenses'],
                    'zh' => ['前往会场的交通', '餐饮', '个人消费'],
                    'zh-Hant' => ['前往會場的交通', '餐飲', '個人消費'],
                ],
                'en' => [
                    'name' => "Pharaoh's Golden Parade",
                    'description' => '<p>Relive one of Egypt\'s most spectacular modern events — the Royal Mummies Parade. In April 2021, 22 ancient royal mummies were transported in a grand procession along the Corniche from the Egyptian Museum to the new National Museum of Egyptian Civilization, accompanied by horses, chariots, and a live orchestra performing ancient Egyptian music.</p><p>Annual commemorative celebrations re-enact this historic event with period costumes, theatrical performances, and exclusive after-hours access to the National Museum.</p>',
                    'meta_title' => "Pharaoh's Golden Parade — Cairo Annual Event",
                    'meta_description' => "Attend Cairo's Pharaoh's Golden Parade commemorating the Royal Mummies procession.",
                ],
                'zh' => [
                    'name' => '法老黄金游行',
                    'description' => '<p>重温埃及最壮观的现代活动之一——皇家木乃伊游行。2021年4月，22具古代皇家木乃伊在盛大的游行队伍中沿滨海大道从埃及博物馆转移至新埃及文明国家博物馆，马匹、战车和现场管弦乐队演奏着古埃及音乐伴随其中。</p><p>每年的纪念庆典以历史服饰、戏剧表演和国家博物馆的独家下班后参观重现这一历史盛事。</p>',
                    'meta_title' => '法老黄金游行——开罗年度活动',
                    'meta_description' => '参加开罗法老黄金游行，纪念皇家木乃伊游行。',
                ],
                'zh-Hant' => [
                    'name' => '法老黃金遊行',
                    'description' => '<p>重溫埃及最壯觀的現代活動之一——皇家木乃伊遊行。2021年4月，22具古代皇家木乃伊在盛大的遊行隊伍中沿濱海大道從埃及博物館轉移至新埃及文明國家博物館，馬匹、戰車和現場管弦樂隊演奏著古埃及音樂伴隨其中。</p><p>每年的紀念慶典以歷史服飾、戲劇表演和國家博物館的獨家下班後參觀重現這一歷史盛事。</p>',
                    'meta_title' => '法老黃金遊行——開羅年度活動',
                    'meta_description' => '參加開羅法老黃金遊行，紀念皇家木乃伊遊行。',
                ],
            ],
        ];
    }
}
