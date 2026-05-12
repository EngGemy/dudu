<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Exclusion;
use App\Models\Hotel\Hotel;
use App\Models\Inclusion;
use App\Models\Tip;
use App\Models\Tour;
use App\Models\TourExclusion;
use App\Models\TourGroup;
use App\Models\TourInclusion;
use App\Models\TourOverview;
use App\Models\TourTip;
use App\Models\TourType;

class TourSeeder extends BaseTranslatableSeeder
{
    private array $cityIds = [];

    private array $catIds = [];

    private array $typeIds = [];

    private array $groupIds = [];

    private array $incIds = [];

    private array $excIds = [];

    private array $tipIds = [];

    private array $hotelIds = [];

    public function run(): void
    {
        $this->loadDependencies();

        $tours = $this->tourData();

        foreach ($tours as $spec) {
            $enName = $spec['en']['name'];
            if ($this->translationExists(Tour::class, $enName)) {
                $this->command->line("  skip Tour: {$enName}");

                continue;
            }
            try {
                $this->createTour($spec);
                $this->command->info("  seeded Tour: {$enName}");
            } catch (\Throwable $e) {
                $this->command->error("  Tour '{$enName}': {$e->getMessage()}");
            }
        }
    }

    private function createTour(array $spec): void
    {
        $tour = Tour::create([
            'is_active' => true,
            'publish' => true,
            'photo' => $this->getImage('tours'),
            'price' => $spec['price'],
            'price_offer' => $spec['price_offer'] ?? null,
            'rate' => $spec['rate'] ?? 5,
            'reviews' => $spec['reviews'] ?? 0,
            'category_id' => $spec['category_id'] ?? null,
            'en' => $spec['en'],
            'zh' => $spec['zh'],
            'zh-Hant' => $spec['zh-Hant'],
        ]);

        if (! empty($spec['hotel_id'])) {
            $tour->hotel_id = $spec['hotel_id'];
            $tour->saveQuietly();
        }

        if (! empty($spec['category_ids'])) {
            $tour->categories()->attach($spec['category_ids']);
        }

        if (! empty($spec['inclusion_ids'])) {
            TourInclusion::create([
                'tour_id' => $tour->id,
                'values' => json_encode($spec['inclusion_ids']),
            ]);
        }

        if (! empty($spec['exclusion_ids'])) {
            TourExclusion::create([
                'tour_id' => $tour->id,
                'values' => json_encode($spec['exclusion_ids']),
            ]);
        }

        if (! empty($spec['tip_ids'])) {
            TourTip::create([
                'tour_id' => $tour->id,
                'values' => json_encode($spec['tip_ids']),
            ]);
        }

        if (! empty($spec['overview'])) {
            $ov = $spec['overview'];
            $blob = json_encode($ov);
            TourOverview::create([
                'tour_id' => $tour->id,
                'en' => ['values' => $blob],
                'zh' => ['values' => $blob],
                'zh-Hant' => ['values' => $blob],
            ]);
        }
    }

    private function loadDependencies(): void
    {
        foreach (City::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->cityIds[$t->name] = $c->id;
            }
        }
        foreach (Category::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->catIds[$t->name] = $c->id;
            }
        }
        foreach (TourType::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->typeIds[$t->name] = $c->id;
            }
        }
        foreach (TourGroup::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->groupIds[$t->name] = $c->id;
            }
        }
        foreach (Inclusion::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->incIds[$t->name] = $c->id;
            }
        }
        foreach (Exclusion::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->excIds[$t->name] = $c->id;
            }
        }
        foreach (Tip::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->tipIds[$t->name] = $c->id;
            }
        }
        foreach (Hotel::with('translations')->get() as $c) {
            $t = $c->translations->firstWhere('locale', 'en');
            if ($t) {
                $this->hotelIds[$t->name] = $c->id;
            }
        }
    }

    private function inc(string ...$names): array
    {
        return array_values(array_filter(array_map(fn ($n) => $this->incIds[$n] ?? null, $names)));
    }

    private function exc(string ...$names): array
    {
        return array_values(array_filter(array_map(fn ($n) => $this->excIds[$n] ?? null, $names)));
    }

    private function tips(string ...$names): array
    {
        return array_values(array_filter(array_map(fn ($n) => $this->tipIds[$n] ?? null, $names)));
    }

    private function cats(string ...$names): array
    {
        return array_values(array_filter(array_map(fn ($n) => $this->catIds[$n] ?? null, $names)));
    }

    private function city(string $name): ?int
    {
        return $this->cityIds[$name] ?? null;
    }

    private function type(string $name): ?int
    {
        return $this->typeIds[$name] ?? null;
    }

    private function group(string $name): ?int
    {
        return $this->groupIds[$name] ?? null;
    }

    private function hotel(string $name): ?int
    {
        return $this->hotelIds[$name] ?? null;
    }

    private function tourData(): array
    {
        return [
            [
                'price' => 45,
                'price_offer' => 39,
                'rate' => 5,
                'reviews' => 128,
                'category_id' => $this->catIds['Day Trips'] ?? null,
                'category_ids' => $this->cats('Day Trips', 'Egypt Tours'),
                'inclusion_ids' => $this->inc('Private Transportation', 'English-speaking Guide', 'All Entrance Fees', 'Bottled Water'),
                'exclusion_ids' => $this->exc('Tipping', 'Personal Expenses'),
                'tip_ids' => $this->tips('Best Time to Visit', 'Photography Tips'),
                'hotel_id' => null,
                'overview' => [
                    'days' => '1',
                    'nights' => '0',
                    'cancellation' => 'Free cancellation up to 24 hours before the tour',
                    'availability' => 'Daily',
                    'tour_type' => $this->type('Cultural'),
                    'tour_group' => $this->group('Small Group (1-8)'),
                    'location_from' => $this->city('Cairo'),
                    'location_to' => $this->city('Cairo'),
                ],
                'en' => [
                    'name' => 'Pyramids & Sphinx Half-Day Tour',
                    'description' => '<p>Stand face-to-face with the last surviving wonder of the ancient world. This half-day tour from Cairo takes you inside the Giza Plateau for an up-close look at the Great Pyramid of Khufu, the Pyramid of Khafre, the Pyramid of Menkaure, and the enigmatic Great Sphinx.</p><p>Your licensed guide will bring the history to life with fascinating stories of the pharaohs who commissioned these monumental structures over 4,500 years ago.</p>',
                    'tip_info' => 'Wear comfortable shoes and bring sunscreen. The plateau can be hot even in winter mornings.',
                    'meta_title' => 'Pyramids & Sphinx Half-Day Tour from Cairo',
                    'meta_description' => 'Explore the Pyramids of Giza and the Great Sphinx on a guided half-day tour from Cairo.',
                ],
                'zh' => [
                    'name' => '金字塔和狮身人面像半日游',
                    'description' => '<p>与古代世界唯一幸存的奇迹面对面。这个从开罗出发的半日游带您进入吉萨高原，近距离观赏胡夫大金字塔、卡夫拉金字塔、孟卡拉金字塔和神秘的大狮身人面像。</p><p>您的持牌导游将用精彩的法老故事让历史重现，这些宏伟建筑由法老在4500多年前下令建造。</p>',
                    'tip_info' => '请穿舒适的鞋子并携带防晒霜。即使在冬天早晨，高原也可能很热。',
                    'meta_title' => '从开罗出发的金字塔和狮身人面像半日游',
                    'meta_description' => '参加从开罗出发的导游半日游，探索吉萨金字塔和大狮身人面像。',
                ],
                'zh-Hant' => [
                    'name' => '金字塔和獅身人面像半日遊',
                    'description' => '<p>與古代世界唯一倖存的奇蹟面對面。這個從開羅出發的半日遊帶您進入吉薩高原，近距離觀賞胡夫大金字塔、卡夫拉金字塔、孟卡拉金字塔和神秘的大獅身人面像。</p><p>您的持牌導遊將用精彩的法老故事讓歷史重現，這些宏偉建築由法老在4500多年前下令建造。</p>',
                    'tip_info' => '請穿舒適的鞋子並攜帶防曬霜。即使在冬天早晨，高原也可能很熱。',
                    'meta_title' => '從開羅出發的金字塔和獅身人面像半日遊',
                    'meta_description' => '參加從開羅出發的導遊半日遊，探索吉薩金字塔和大獅身人面像。',
                ],
            ],

            [
                'price' => 890,
                'price_offer' => 799,
                'rate' => 5,
                'reviews' => 74,
                'category_id' => $this->catIds['Nile Cruises'] ?? null,
                'category_ids' => $this->cats('Nile Cruises', 'Luxury Tours'),
                'inclusion_ids' => $this->inc('Hotel Accommodation', 'Daily Breakfast', 'Private Transportation', 'English-speaking Guide', 'All Entrance Fees', 'Airport Transfers'),
                'exclusion_ids' => $this->exc('International Flights', 'Travel Insurance', 'Visa Fees', 'Tipping'),
                'tip_ids' => $this->tips('Best Time to Visit', 'What to Pack', 'Currency Exchange'),
                'hotel_id' => $this->hotel('Sofitel Old Cataract'),
                'overview' => [
                    'days' => '4',
                    'nights' => '3',
                    'cancellation' => 'Free cancellation up to 72 hours before departure',
                    'availability' => 'Monday & Friday departures',
                    'tour_type' => $this->type('Cultural'),
                    'tour_group' => $this->group('Medium Group (9-15)'),
                    'location_from' => $this->city('Luxor'),
                    'location_to' => $this->city('Aswan'),
                ],
                'en' => [
                    'name' => '4-Day Nile Cruise Luxor to Aswan',
                    'description' => '<p>Sail the legendary Nile River aboard a classic cruise ship, stopping at Karnak Temple, the Valley of the Kings, Edfu Temple, Kom Ombo, and the High Dam at Aswan.</p><p>Each night anchors at a new site along the river, giving you candlelit dinners on deck as ancient temples glow on the banks. A truly unforgettable journey through 5,000 years of history.</p>',
                    'tip_info' => 'Bring lightweight, breathable clothing. October to April offers the most comfortable temperatures for a Nile cruise.',
                    'meta_title' => '4-Day Nile Cruise from Luxor to Aswan',
                    'meta_description' => 'Cruise the Nile from Luxor to Aswan visiting Karnak, Valley of the Kings, Edfu, and Kom Ombo.',
                ],
                'zh' => [
                    'name' => '4天尼罗河游船路线（卢克索至阿斯旺）',
                    'description' => '<p>乘坐经典游轮航行在传奇的尼罗河上，沿途游览卡纳克神庙、帝王谷、艾德芙神庙、康翁波和阿斯旺高坝。</p><p>每晚在河畔新地点停泊，让您在甲板上享用烛光晚餐，古老神庙在河岸上熠熠生辉。这是一段穿越5000年历史的难忘旅程。</p>',
                    'tip_info' => '请携带轻便透气的服装。10月至4月是尼罗河游船最舒适的季节。',
                    'meta_title' => '4天尼罗河游船（从卢克索到阿斯旺）',
                    'meta_description' => '乘坐尼罗河游船从卢克索到阿斯旺，游览卡纳克、帝王谷、艾德芙和康翁波。',
                ],
                'zh-Hant' => [
                    'name' => '4天尼羅河遊船路線（盧克索至阿斯旺）',
                    'description' => '<p>乘坐經典遊輪航行在傳奇的尼羅河上，沿途遊覽卡納克神廟、帝王谷、艾德芙神廟、康翁波和阿斯旺高壩。</p><p>每晚在河畔新地點停泊，讓您在甲板上享用燭光晚餐，古老神廟在河岸上熠熠生輝。這是一段穿越5000年歷史的難忘旅程。</p>',
                    'tip_info' => '請攜帶輕便透氣的服裝。10月至4月是尼羅河遊船最舒適的季節。',
                    'meta_title' => '4天尼羅河遊船（從盧克索到阿斯旺）',
                    'meta_description' => '乘坐尼羅河遊船從盧克索到阿斯旺，遊覽卡納克、帝王谷、艾德芙和康翁波。',
                ],
            ],

            [
                'price' => 1590,
                'price_offer' => 1390,
                'rate' => 5,
                'reviews' => 42,
                'category_id' => $this->catIds['Egypt Tours'] ?? null,
                'category_ids' => $this->cats('Egypt Tours', 'Luxury Tours'),
                'inclusion_ids' => $this->inc('Hotel Accommodation', 'Daily Breakfast', 'Private Transportation', 'English-speaking Guide', 'All Entrance Fees', 'Airport Transfers', 'Domestic Flights'),
                'exclusion_ids' => $this->exc('International Flights', 'Travel Insurance', 'Visa Fees', 'Personal Expenses', 'Tipping'),
                'tip_ids' => $this->tips('Best Time to Visit', 'What to Pack', 'Currency Exchange', 'Local Customs'),
                'hotel_id' => $this->hotel('Four Seasons Cairo'),
                'overview' => [
                    'days' => '8',
                    'nights' => '7',
                    'cancellation' => 'Free cancellation up to 7 days before departure',
                    'availability' => 'Saturday departures',
                    'tour_type' => $this->type('Cultural'),
                    'tour_group' => $this->group('Small Group (1-8)'),
                    'location_from' => $this->city('Cairo'),
                    'location_to' => $this->city('Aswan'),
                ],
                'en' => [
                    'name' => '8-Day Egypt Highlights',
                    'description' => '<p>Egypt\'s greatest hits in one unforgettable week. Begin with Cairo\'s pyramids, Egyptian Museum, and Coptic Quarter, then fly to Luxor for Karnak Temple and the Valley of the Kings. Complete your journey with a Nile cruise from Luxor to Aswan, ending at the iconic Philae Temple.</p><p>This comprehensive tour is perfect for first-time visitors who want to experience the very best of Egypt without missing anything essential.</p>',
                    'tip_info' => 'Pack for both hot days and cool evenings — temperatures vary significantly between day and night, especially in desert areas.',
                    'meta_title' => '8-Day Egypt Highlights Tour — Pyramids, Luxor & Nile Cruise',
                    'meta_description' => 'See Egypt\'s best in 8 days: Cairo pyramids, Egyptian Museum, Luxor temples, and Nile cruise to Aswan.',
                ],
                'zh' => [
                    'name' => '8天埃及精华游',
                    'description' => '<p>在难忘的一周内畅游埃及最精彩的景点。从开罗的金字塔、埃及博物馆和科普特区开始，然后飞往卢克索游览卡纳克神庙和帝王谷。最后乘坐尼罗河游船从卢克索到阿斯旺，在标志性的菲莱神庙画上完美句点。</p><p>这次综合旅游非常适合首次来访的游客，让您体验埃及最精华的一切，不错过任何精彩。</p>',
                    'tip_info' => '请为炎热的白天和凉爽的夜晚准备衣物——尤其是在沙漠地区，日夜温差变化很大。',
                    'meta_title' => '8天埃及精华游——金字塔、卢克索和尼罗河游船',
                    'meta_description' => '8天游览埃及最佳景点：开罗金字塔、埃及博物馆、卢克索神庙和尼罗河游船至阿斯旺。',
                ],
                'zh-Hant' => [
                    'name' => '8天埃及精華遊',
                    'description' => '<p>在難忘的一週內暢遊埃及最精彩的景點。從開羅的金字塔、埃及博物館和科普特區開始，然後飛往盧克索遊覽卡納克神廟和帝王谷。最後乘坐尼羅河遊船從盧克索到阿斯旺，在標誌性的菲萊神廟畫上完美句點。</p><p>這次綜合旅遊非常適合首次來訪的遊客，讓您體驗埃及最精華的一切，不錯過任何精彩。</p>',
                    'tip_info' => '請為炎熱的白天和涼爽的夜晚準備衣物——尤其是在沙漠地區，日夜溫差變化很大。',
                    'meta_title' => '8天埃及精華遊——金字塔、盧克索和尼羅河遊船',
                    'meta_description' => '8天遊覽埃及最佳景點：開羅金字塔、埃及博物館、盧克索神廟和尼羅河遊船至阿斯旺。',
                ],
            ],

            [
                'price' => 120,
                'price_offer' => null,
                'rate' => 4,
                'reviews' => 36,
                'category_id' => $this->catIds['Egypt Tours'] ?? null,
                'category_ids' => $this->cats('Egypt Tours', 'Day Trips'),
                'inclusion_ids' => $this->inc('Private Transportation', 'English-speaking Guide', 'All Entrance Fees'),
                'exclusion_ids' => $this->exc('Personal Expenses', 'Tipping', 'Optional Activities'),
                'tip_ids' => $this->tips('Currency Exchange', 'Local Customs'),
                'hotel_id' => null,
                'overview' => [
                    'days' => '1',
                    'nights' => '0',
                    'cancellation' => 'Free cancellation up to 48 hours before departure',
                    'availability' => 'Daily except Friday',
                    'tour_type' => $this->type('Cultural'),
                    'tour_group' => $this->group('Medium Group (9-15)'),
                    'location_from' => $this->city('Cairo'),
                    'location_to' => $this->city('Luxor'),
                ],
                'en' => [
                    'name' => 'Cairo to Luxor by Train',
                    'description' => '<p>Experience Egypt like a local — board the overnight sleeper train from Cairo to Luxor. Wake up to sunrise over the Nile as your comfortable first-class compartment glides into Luxor station.</p><p>A full day of guided sightseeing follows, covering Karnak Temple and Luxor Temple before your evening return to Cairo. A great option for travelers who want an authentic Egyptian travel experience at a budget-friendly price.</p>',
                    'tip_info' => 'Book sleeper berths early — first-class sleeper cabins sell out quickly during peak season (October–April).',
                    'meta_title' => 'Cairo to Luxor Train Tour — Overnight Sleeper & Day Trip',
                    'meta_description' => 'Travel from Cairo to Luxor by overnight sleeper train and spend a full day at Karnak and Luxor temples.',
                ],
                'zh' => [
                    'name' => '开罗到卢克索火车之旅',
                    'description' => '<p>像当地人一样体验埃及——乘坐从开罗到卢克索的夜间卧铺火车。当您舒适的一等座车厢驶入卢克索站时，透过窗户欣赏尼罗河上的日出。</p><p>随后是一整天的导游观光，涵盖卡纳克神庙和卢克索神庙，然后晚上返回开罗。这是想要以实惠价格体验正宗埃及旅行的游客的绝佳选择。</p>',
                    'tip_info' => '请尽早预订卧铺——在旺季（10月至4月）期间，一等卧铺舱位很快售罄。',
                    'meta_title' => '开罗到卢克索火车游——夜间卧铺和一日游',
                    'meta_description' => '乘坐夜间卧铺火车从开罗到卢克索，在卡纳克和卢克索神庙度过充实的一天。',
                ],
                'zh-Hant' => [
                    'name' => '開羅到盧克索火車之旅',
                    'description' => '<p>像當地人一樣體驗埃及——乘坐從開羅到盧克索的夜間臥鋪火車。當您舒適的一等座車廂駛入盧克索站時，透過窗戶欣賞尼羅河上的日出。</p><p>隨後是一整天的導遊觀光，涵蓋卡納克神廟和盧克索神廟，然後晚上返回開羅。這是想要以實惠價格體驗正宗埃及旅行的遊客的絕佳選擇。</p>',
                    'tip_info' => '請盡早預訂臥鋪——在旺季（10月至4月）期間，一等臥鋪艙位很快售罄。',
                    'meta_title' => '開羅到盧克索火車遊——夜間臥鋪和一日遊',
                    'meta_description' => '乘坐夜間臥鋪火車從開羅到盧克索，在卡納克和盧克索神廟度過充實的一天。',
                ],
            ],

            [
                'price' => 65,
                'price_offer' => 55,
                'rate' => 5,
                'reviews' => 91,
                'category_id' => $this->catIds['Day Trips'] ?? null,
                'category_ids' => $this->cats('Day Trips'),
                'inclusion_ids' => $this->inc('Private Transportation', 'English-speaking Guide', 'Bottled Water'),
                'exclusion_ids' => $this->exc('Personal Expenses', 'Tipping', 'Optional Activities'),
                'tip_ids' => $this->tips('Best Time to Visit', 'What to Pack'),
                'hotel_id' => null,
                'overview' => [
                    'days' => '1',
                    'nights' => '0',
                    'cancellation' => 'Free cancellation up to 24 hours before the tour',
                    'availability' => 'Daily',
                    'tour_type' => $this->type('Adventure'),
                    'tour_group' => $this->group('Small Group (1-8)'),
                    'location_from' => $this->city('Hurghada'),
                    'location_to' => $this->city('Hurghada'),
                ],
                'en' => [
                    'name' => 'Red Sea Snorkeling Day Trip',
                    'description' => '<p>Dive into the crystal-clear waters of the Red Sea for a day of world-class snorkeling. Visit two of Hurghada\'s most spectacular reef sites — Giftun Island and Magawish Reef — teeming with vibrant coral and hundreds of tropical fish species.</p><p>Equipment is provided, and our expert snorkel guides ensure both beginners and experienced swimmers get the most out of the experience. Lunch is served on deck between reef stops.</p>',
                    'tip_info' => 'Bring a rash guard for sun protection — Red Sea sun is intense even on cloudy days. Reef-safe sunscreen only.',
                    'meta_title' => 'Red Sea Snorkeling Day Trip from Hurghada',
                    'meta_description' => 'Snorkel at Giftun Island and Magawish Reef in the Red Sea on a full-day guided boat trip from Hurghada.',
                ],
                'zh' => [
                    'name' => '红海浮潜一日游',
                    'description' => '<p>潜入红海清澈的海水，享受世界级浮潜体验。游览赫尔格达最壮观的两个礁石点——吉夫通岛和马加维什礁——那里满是绚丽的珊瑚和数百种热带鱼类。</p><p>提供设备，我们的专业浮潜向导确保初学者和有经验的游泳者都能获得最佳体验。在礁石停靠间隙，在甲板上供应午餐。</p>',
                    'tip_info' => '请携带防晒衣以防止阳光照射——即使在阴天，红海的阳光也很强烈。请只使用对珊瑚礁安全的防晒霜。',
                    'meta_title' => '从赫尔格达出发的红海浮潜一日游',
                    'meta_description' => '参加从赫尔格达出发的全天导游船游，在红海的吉夫通岛和马加维什礁浮潜。',
                ],
                'zh-Hant' => [
                    'name' => '紅海浮潛一日遊',
                    'description' => '<p>潛入紅海清澈的海水，享受世界級浮潛體驗。遊覽赫爾格達最壯觀的兩個礁石點——吉夫通島和馬加維什礁——那裡滿是絢麗的珊瑚和數百種熱帶魚類。</p><p>提供設備，我們的專業浮潛嚮導確保初學者和有經驗的游泳者都能獲得最佳體驗。在礁石停靠間隙，在甲板上供應午餐。</p>',
                    'tip_info' => '請攜帶防曬衣以防止陽光照射——即使在陰天，紅海的陽光也很強烈。請只使用對珊瑚礁安全的防曬霜。',
                    'meta_title' => '從赫爾格達出發的紅海浮潛一日遊',
                    'meta_description' => '參加從赫爾格達出發的全天導遊船遊，在紅海的吉夫通島和馬加維什礁浮潛。',
                ],
            ],

            [
                'price' => 95,
                'price_offer' => 85,
                'rate' => 5,
                'reviews' => 58,
                'category_id' => $this->catIds['Day Trips'] ?? null,
                'category_ids' => $this->cats('Day Trips', 'Egypt Tours'),
                'inclusion_ids' => $this->inc('Private Transportation', 'English-speaking Guide', 'All Entrance Fees', 'Bottled Water'),
                'exclusion_ids' => $this->exc('Personal Expenses', 'Tipping'),
                'tip_ids' => $this->tips('Best Time to Visit', 'Photography Tips'),
                'hotel_id' => null,
                'overview' => [
                    'days' => '1',
                    'nights' => '0',
                    'cancellation' => 'Free cancellation up to 24 hours before the tour',
                    'availability' => 'Daily',
                    'tour_type' => $this->type('Cultural'),
                    'tour_group' => $this->group('Small Group (1-8)'),
                    'location_from' => $this->city('Aswan'),
                    'location_to' => $this->city('Aswan'),
                ],
                'en' => [
                    'name' => 'Abu Simbel Tour from Aswan',
                    'description' => '<p>Journey to one of Egypt\'s most remote and magnificent archaeological sites — the twin temples of Abu Simbel, carved directly into a sandstone cliff by Ramesses II over 3,200 years ago.</p><p>Depart before dawn for the 3-hour drive across the Nubian Desert, arriving to watch the temples emerge from the sunrise. Your guide will explain the remarkable story of how these temples were relocated in the 1960s to save them from the rising waters of Lake Nasser.</p>',
                    'tip_info' => 'Depart very early (3–4 AM) to avoid the midday heat and to arrive before tour bus crowds.',
                    'meta_title' => 'Abu Simbel Tour from Aswan — Day Trip',
                    'meta_description' => 'Visit the temples of Abu Simbel on a guided day trip from Aswan across the Nubian Desert.',
                ],
                'zh' => [
                    'name' => '从阿斯旺出发阿布辛贝之旅',
                    'description' => '<p>前往埃及最偏远、最宏伟的考古遗址之一——阿布辛贝双神庙。这是拉美西斯二世在3200多年前直接凿刻在砂岩峭壁上的杰作。</p><p>在黎明前出发，驱车3小时穿越努比亚沙漠，在日出时分抵达，目睹神庙从朝霞中缓缓显现。您的导游将讲述这些神庙在1960年代为了避免被纳赛尔湖上涨的湖水淹没而进行迁移的非凡故事。</p>',
                    'tip_info' => '请非常早出发（凌晨3-4点），以避开正午的高温，并在旅游巴士人群到来之前抵达。',
                    'meta_title' => '从阿斯旺出发阿布辛贝一日游',
                    'meta_description' => '参加从阿斯旺出发穿越努比亚沙漠的导游一日游，游览阿布辛贝神庙。',
                ],
                'zh-Hant' => [
                    'name' => '從阿斯旺出發阿布辛貝之旅',
                    'description' => '<p>前往埃及最偏遠、最宏偉的考古遺址之一——阿布辛貝雙神廟。這是拉美西斯二世在3200多年前直接鑿刻在砂岩峭壁上的傑作。</p><p>在黎明前出發，驅車3小時穿越努比亞沙漠，在日出時分抵達，目睹神廟從朝霞中緩緩顯現。您的導遊將講述這些神廟在1960年代為了避免被納賽爾湖上漲的湖水淹沒而進行遷移的非凡故事。</p>',
                    'tip_info' => '請非常早出發（凌晨3-4點），以避開正午的高溫，並在旅遊巴士人群到來之前抵達。',
                    'meta_title' => '從阿斯旺出發阿布辛貝一日遊',
                    'meta_description' => '參加從阿斯旺出發穿越努比亞沙漠的導遊一日遊，遊覽阿布辛貝神廟。',
                ],
            ],

            [
                'price' => 35,
                'price_offer' => null,
                'rate' => 5,
                'reviews' => 47,
                'category_id' => $this->catIds['Day Trips'] ?? null,
                'category_ids' => $this->cats('Day Trips', 'Egypt Tours'),
                'inclusion_ids' => $this->inc('English-speaking Guide', 'All Entrance Fees', 'Bottled Water'),
                'exclusion_ids' => $this->exc('Personal Expenses', 'Tipping'),
                'tip_ids' => $this->tips('Photography Tips', 'Local Customs'),
                'hotel_id' => null,
                'overview' => [
                    'days' => '1',
                    'nights' => '0',
                    'cancellation' => 'Free cancellation up to 24 hours before the tour',
                    'availability' => 'Daily',
                    'tour_type' => $this->type('Cultural'),
                    'tour_group' => $this->group('Small Group (1-8)'),
                    'location_from' => $this->city('Cairo'),
                    'location_to' => $this->city('Cairo'),
                ],
                'en' => [
                    'name' => 'Coptic Cairo Walking Tour',
                    'description' => '<p>Step into Cairo\'s ancient Christian quarter and discover a city within a city. Visit the Hanging Church (Saint Virgin Mary\'s Coptic Orthodox Church), one of the oldest churches in Egypt, along with the Church of Saint Sergius (built over the site where the Holy Family is said to have rested), and the Ben Ezra Synagogue.</p><p>Explore the narrow alleyways of Old Cairo and learn how Egypt\'s Coptic Christian community has preserved their traditions and art for nearly 2,000 years.</p>',
                    'tip_info' => 'Dress modestly — shoulders and knees must be covered to enter the churches.',
                    'meta_title' => 'Coptic Cairo Walking Tour — Ancient Churches & Old Cairo',
                    'meta_description' => 'Explore the Hanging Church, Saint Sergius, and Ben Ezra Synagogue on a guided walking tour of Coptic Cairo.',
                ],
                'zh' => [
                    'name' => '科普特开罗步行游',
                    'description' => '<p>走进开罗的古老基督教区，发现城中之城。参观悬挂教堂（圣母玛利亚科普特东正教教堂）——埃及最古老的教堂之一，以及据说圣家族曾在此休憩的圣塞尔吉乌斯教堂和本·以斯拉会堂。</p><p>探索老开罗的狭窄小巷，了解埃及科普特基督教社区近2000年来如何保存他们的传统和艺术。</p>',
                    'tip_info' => '请着装保守——进入教堂时肩膀和膝盖必须遮盖。',
                    'meta_title' => '科普特开罗步行游——古老教堂和老开罗',
                    'meta_description' => '参加科普特开罗的导游步行游，探索悬挂教堂、圣塞尔吉乌斯教堂和本·以斯拉会堂。',
                ],
                'zh-Hant' => [
                    'name' => '科普特開羅步行遊',
                    'description' => '<p>走進開羅的古老基督教區，發現城中之城。參觀懸掛教堂（聖母瑪利亞科普特東正教教堂）——埃及最古老的教堂之一，以及據說聖家族曾在此休憩的聖塞爾吉烏斯教堂和本·以斯拉會堂。</p><p>探索老開羅的狹窄小巷，了解埃及科普特基督教社區近2000年來如何保存他們的傳統和藝術。</p>',
                    'tip_info' => '請著裝保守——進入教堂時肩膀和膝蓋必須遮蓋。',
                    'meta_title' => '科普特開羅步行遊——古老教堂和老開羅',
                    'meta_description' => '參加科普特開羅的導遊步行遊，探索懸掛教堂、聖塞爾吉烏斯教堂和本·以斯拉會堂。',
                ],
            ],

            [
                'price' => 220,
                'price_offer' => 195,
                'rate' => 5,
                'reviews' => 29,
                'category_id' => $this->catIds['Egypt Tours'] ?? null,
                'category_ids' => $this->cats('Egypt Tours'),
                'inclusion_ids' => $this->inc('Private Transportation', 'English-speaking Guide', 'Bottled Water'),
                'exclusion_ids' => $this->exc('Personal Expenses', 'Tipping', 'Optional Activities'),
                'tip_ids' => $this->tips('What to Pack', 'Best Time to Visit'),
                'hotel_id' => null,
                'overview' => [
                    'days' => '2',
                    'nights' => '1',
                    'cancellation' => 'Free cancellation up to 48 hours before departure',
                    'availability' => 'Thursday & Saturday departures',
                    'tour_type' => $this->type('Adventure'),
                    'tour_group' => $this->group('Small Group (1-8)'),
                    'location_from' => $this->city('Cairo'),
                    'location_to' => $this->city('Cairo'),
                ],
                'en' => [
                    'name' => 'White Desert Safari',
                    'description' => '<p>Camp under the stars in one of Earth\'s most extraordinary landscapes — the White Desert of Egypt. Drive through the Black Desert and Crystal Mountain before arriving in the White Desert\'s surreal chalk rock formations, sculpted by centuries of wind erosion into mushroom shapes, inselbergs, and towering white peaks.</p><p>Enjoy a traditional Bedouin dinner around a campfire, then fall asleep under an impossibly bright starfield before watching the sunrise transform the white rocks into gold.</p>',
                    'tip_info' => 'Desert nights are cold even in summer — bring a warm jacket regardless of the season.',
                    'meta_title' => 'White Desert Safari — Overnight Camping Egypt',
                    'meta_description' => 'Camp overnight in Egypt\'s White Desert, passing the Black Desert and Crystal Mountain.',
                ],
                'zh' => [
                    'name' => '白沙漠探险',
                    'description' => '<p>在地球上最非凡的景观之一——埃及白沙漠中，在繁星下露营。驱车穿越黑沙漠和水晶山，然后抵达白沙漠超现实的白垩岩石地貌，这些岩石被数百年的风蚀塑造成蘑菇形状、孤立山丘和高耸的白色山峰。</p><p>在篝火旁享用传统贝都因晚餐，然后在璀璨星空下入眠，最后目睹日出将白色岩石变为金色的壮观景象。</p>',
                    'tip_info' => '即使在夏天，沙漠的夜晚也很寒冷——无论季节如何，请携带保暖外套。',
                    'meta_title' => '白沙漠探险——埃及过夜露营',
                    'meta_description' => '在埃及白沙漠过夜露营，途经黑沙漠和水晶山。',
                ],
                'zh-Hant' => [
                    'name' => '白沙漠探險',
                    'description' => '<p>在地球上最非凡的景觀之一——埃及白沙漠中，在繁星下露營。驅車穿越黑沙漠和水晶山，然後抵達白沙漠超現實的白堊岩石地貌，這些岩石被數百年的風蝕塑造成蘑菇形狀、孤立山丘和高聳的白色山峰。</p><p>在篝火旁享用傳統貝都因晚餐，然後在璀璨星空下入眠，最後目睹日出將白色岩石變為金色的壯觀景象。</p>',
                    'tip_info' => '即使在夏天，沙漠的夜晚也很寒冷——無論季節如何，請攜帶保暖外套。',
                    'meta_title' => '白沙漠探險——埃及過夜露營',
                    'meta_description' => '在埃及白沙漠過夜露營，途經黑沙漠和水晶山。',
                ],
            ],

            [
                'price' => 75,
                'price_offer' => 65,
                'rate' => 4,
                'reviews' => 53,
                'category_id' => $this->catIds['Day Trips'] ?? null,
                'category_ids' => $this->cats('Day Trips', 'Egypt Tours'),
                'inclusion_ids' => $this->inc('Private Transportation', 'English-speaking Guide', 'All Entrance Fees'),
                'exclusion_ids' => $this->exc('Personal Expenses', 'Tipping', 'Optional Activities'),
                'tip_ids' => $this->tips('Best Time to Visit'),
                'hotel_id' => null,
                'overview' => [
                    'days' => '1',
                    'nights' => '0',
                    'cancellation' => 'Free cancellation up to 24 hours before the tour',
                    'availability' => 'Daily',
                    'tour_type' => $this->type('Cultural'),
                    'tour_group' => $this->group('Medium Group (9-15)'),
                    'location_from' => $this->city('Cairo'),
                    'location_to' => $this->city('Alexandria'),
                ],
                'en' => [
                    'name' => 'Alexandria Day Tour from Cairo',
                    'description' => '<p>Travel from Cairo to Alexandria — the "Pearl of the Mediterranean" — for a full day of history and culture. Visit the Bibliotheca Alexandrina (the modern reincarnation of the ancient Library of Alexandria), the Qaitbay Citadel standing guard over the Mediterranean, the Catacombs of Kom El Shoqafa, and the Roman Amphitheatre.</p><p>Return to Cairo in the early evening with memories of a city where Greek, Roman, and Egyptian civilizations once converged.</p>',
                    'tip_info' => 'The drive from Cairo to Alexandria takes about 2.5 hours — comfortable coaches provide the transport.',
                    'meta_title' => 'Alexandria Day Tour from Cairo — Bibliotheca, Citadel & Catacombs',
                    'meta_description' => 'Day trip from Cairo to Alexandria visiting the Bibliotheca Alexandrina, Qaitbay Citadel, and catacombs.',
                ],
                'zh' => [
                    'name' => '从开罗出发亚历山大一日游',
                    'description' => '<p>从开罗前往亚历山大——"地中海明珠"——度过充实的历史文化一天。参观亚历山大图书馆（古代亚历山大图书馆的现代重建版）、矗立在地中海边的卡特贝城堡、卡拉卡拉地下墓穴和罗马圆形剧场。</p><p>傍晚返回开罗，带着希腊、罗马和埃及文明曾在此交汇的城市记忆。</p>',
                    'tip_info' => '从开罗到亚历山大的车程约2.5小时——舒适的大巴负责交通。',
                    'meta_title' => '从开罗出发亚历山大一日游——图书馆、城堡和地下墓穴',
                    'meta_description' => '从开罗出发一日游至亚历山大，参观亚历山大图书馆、卡特贝城堡和地下墓穴。',
                ],
                'zh-Hant' => [
                    'name' => '從開羅出發亞歷山大一日遊',
                    'description' => '<p>從開羅前往亞歷山大——"地中海明珠"——度過充實的歷史文化一天。參觀亞歷山大圖書館（古代亞歷山大圖書館的現代重建版）、矗立在地中海邊的卡特貝城堡、卡拉卡拉地下墓穴和羅馬圓形劇場。</p><p>傍晚返回開羅，帶著希臘、羅馬和埃及文明曾在此交匯的城市記憶。</p>',
                    'tip_info' => '從開羅到亞歷山大的車程約2.5小時——舒適的大巴負責交通。',
                    'meta_title' => '從開羅出發亞歷山大一日遊——圖書館、城堡和地下墓穴',
                    'meta_description' => '從開羅出發一日遊至亞歷山大，參觀亞歷山大圖書館、卡特貝城堡和地下墓穴。',
                ],
            ],

            [
                'price' => 110,
                'price_offer' => 95,
                'rate' => 5,
                'reviews' => 67,
                'category_id' => $this->catIds['Day Trips'] ?? null,
                'category_ids' => $this->cats('Day Trips'),
                'inclusion_ids' => $this->inc('Private Transportation', 'English-speaking Guide', 'Bottled Water'),
                'exclusion_ids' => $this->exc('Personal Expenses', 'Tipping', 'Optional Activities'),
                'tip_ids' => $this->tips('What to Pack', 'Best Time to Visit'),
                'hotel_id' => $this->hotel('Sheraton Sharm El Sheikh'),
                'overview' => [
                    'days' => '1',
                    'nights' => '0',
                    'cancellation' => 'Free cancellation up to 24 hours before the tour',
                    'availability' => 'Daily',
                    'tour_type' => $this->type('Adventure'),
                    'tour_group' => $this->group('Small Group (1-8)'),
                    'location_from' => $this->city('Sharm El Sheikh'),
                    'location_to' => $this->city('Sharm El Sheikh'),
                ],
                'en' => [
                    'name' => 'Diving in Sharm El Sheikh',
                    'description' => '<p>Sharm El Sheikh is one of the world\'s top diving destinations, and for good reason. Crystal-clear waters, warm temperatures year-round, and a dazzling array of coral reefs and marine life make this an unmissable experience for divers of all levels.</p><p>Visit the legendary Ras Mohammed National Park or the stunning Tiran Island reefs. PADI-certified instructors lead the dives, and all equipment is provided. Beginners are welcome with our introductory dive option.</p>',
                    'tip_info' => 'Even non-swimmers can enjoy snorkeling at Ras Mohammed. Bring an underwater camera — the reef life is spectacular.',
                    'meta_title' => 'Scuba Diving in Sharm El Sheikh — Ras Mohammed & Tiran Island',
                    'meta_description' => 'Dive at Ras Mohammed National Park and Tiran Island reefs with PADI-certified instructors in Sharm El Sheikh.',
                ],
                'zh' => [
                    'name' => '沙姆沙伊赫潜水之旅',
                    'description' => '<p>沙姆沙伊赫是世界顶级潜水目的地之一，原因不言而喻。清澈的水域、全年温暖的水温，以及令人眼花缭乱的珊瑚礁和海洋生物，使这里成为各级潜水员不可错过的体验。</p><p>游览传奇的拉斯穆罕默德国家公园或壮观的蒂兰岛礁石。PADI认证教练带领潜水，提供所有设备。我们提供入门潜水选项，欢迎初学者参加。</p>',
                    'tip_info' => '即使不会游泳的人也可以在拉斯穆罕默德浮潜。请携带水下相机——礁石生物非常壮观。',
                    'meta_title' => '沙姆沙伊赫潜水——拉斯穆罕默德和蒂兰岛',
                    'meta_description' => '在沙姆沙伊赫与PADI认证教练一起在拉斯穆罕默德国家公园和蒂兰岛礁石潜水。',
                ],
                'zh-Hant' => [
                    'name' => '沙姆沙伊赫潛水之旅',
                    'description' => '<p>沙姆沙伊赫是世界頂級潛水目的地之一，原因不言而喻。清澈的水域、全年溫暖的水溫，以及令人眼花繚亂的珊瑚礁和海洋生物，使這裡成為各級潛水員不可錯過的體驗。</p><p>遊覽傳奇的拉斯穆罕默德國家公園或壯觀的蒂蘭島礁石。PADI認證教練帶領潛水，提供所有設備。我們提供入門潛水選項，歡迎初學者參加。</p>',
                    'tip_info' => '即使不會游泳的人也可以在拉斯穆罕默德浮潛。請攜帶水下相機——礁石生物非常壯觀。',
                    'meta_title' => '沙姆沙伊赫潛水——拉斯穆罕默德和蒂蘭島',
                    'meta_description' => '在沙姆沙伊赫與PADI認證教練一起在拉斯穆罕默德國家公園和蒂蘭島礁石潛水。',
                ],
            ],
        ];
    }
}
