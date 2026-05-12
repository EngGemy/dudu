<?php

namespace Database\Seeders;

use App\Models\Blog\Blog;
use App\Models\City;
use App\Models\Event;
use App\Models\Tour;
use App\Models\TravelService\TravelService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SearchTestSeeder extends Seeder
{
    private array $locales = ['en', 'zh', 'zh-Hant'];

    public function run(): void
    {
        DB::transaction(function () {
            $categoryId = $this->ensureCategory();
            $hotelId = $this->ensureHotel();
            $this->seedTours($categoryId, $hotelId);
            $this->seedCities();
            $this->seedEvents();
            $this->seedBlogs();
            $this->seedServices();
        });

        $this->command->info('SearchTestSeeder done. Run: php artisan search:sync');
    }

    private function ensureCategory(): int
    {
        $existing = DB::table('categories')->value('id');
        if ($existing) {
            return $existing;
        }
        $id = DB::table('categories')->insertGetId([
            'parent_id' => null,
            'slug' => 'general',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $names = ['en' => 'General', 'zh' => '通用', 'zh-Hant' => '通用'];
        foreach ($names as $locale => $name) {
            DB::table('category_translations')->insert([
                'category_id' => $id,
                'locale' => $locale,
                'name' => $name,
            ]);
        }

        return $id;
    }

    private function ensureHotel(): int
    {
        $existing = DB::table('hotels')->value('id');
        if ($existing) {
            return $existing;
        }

        return DB::table('hotels')->insertGetId([
            'phone' => '0000000000',
            'photo' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private function seedTours(int $categoryId, int $hotelId): void
    {
        $tours = [
            [
                'slug' => 'cairo-pyramids-day-tour',
                'price' => 120,
                'translations' => [
                    'en' => ['name' => 'Cairo Pyramids Day Tour', 'description' => 'Explore the Great Pyramids of Giza, the Sphinx, and the Egyptian Museum on a full-day Cairo tour.'],
                    'zh' => ['name' => '开罗金字塔一日游', 'description' => '一日游览吉萨金字塔、狮身人面像和埃及博物馆。'],
                    'zh-Hant' => ['name' => '開羅金字塔一日遊', 'description' => '一日遊覽吉薩金字塔、獅身人面像與埃及博物館。'],
                ],
            ],
            [
                'slug' => 'luxor-aswan-nile-cruise',
                'price' => 850,
                'translations' => [
                    'en' => ['name' => 'Luxor & Aswan Nile Cruise', 'description' => 'Five-night luxury Nile cruise from Luxor to Aswan with guided temple visits.'],
                    'zh' => ['name' => '卢克索与阿斯旺尼罗河游船', 'description' => '从卢克索到阿斯旺的五晚豪华尼罗河游船，包含神庙导览。'],
                    'zh-Hant' => ['name' => '盧克索與亞斯文尼羅河遊船', 'description' => '從盧克索到亞斯文的五晚豪華尼羅河遊船，包含神廟導覽。'],
                ],
            ],
            [
                'slug' => 'sharm-el-sheikh-red-sea',
                'price' => 350,
                'translations' => [
                    'en' => ['name' => 'Sharm El Sheikh Red Sea Escape', 'description' => 'Snorkel at Ras Mohammed and relax on Red Sea beaches in Sharm El Sheikh.'],
                    'zh' => ['name' => '沙姆沙伊赫红海度假', 'description' => '在拉斯穆罕默德浮潜，在沙姆沙伊赫红海海滩放松。'],
                    'zh-Hant' => ['name' => '沙姆沙伊赫紅海度假', 'description' => '在拉斯穆罕默德浮潛，在沙姆沙伊赫紅海海灘放鬆。'],
                ],
            ],
            [
                'slug' => 'alexandria-mediterranean-day',
                'price' => 95,
                'translations' => [
                    'en' => ['name' => 'Alexandria Mediterranean Day Trip', 'description' => 'Visit the Catacombs, Qaitbay Citadel, and the Library of Alexandria along the Mediterranean coast.'],
                    'zh' => ['name' => '亚历山大地中海一日游', 'description' => '游览地下墓穴、盖特贝城堡和亚历山大图书馆。'],
                    'zh-Hant' => ['name' => '亞歷山大地中海一日遊', 'description' => '遊覽地下墓穴、蓋特貝城堡和亞歷山大圖書館。'],
                ],
            ],
        ];

        foreach ($tours as $data) {
            if (DB::table('tours')->where('slug', $data['slug'])->exists()) {
                $this->command->line("  skip tour: {$data['slug']} (already exists)");

                continue;
            }
            $tourId = DB::table('tours')->insertGetId([
                'slug' => $data['slug'],
                'is_active' => 1,
                'category_id' => $categoryId,
                'hotel_id' => $hotelId,
                'price' => $data['price'],
                'price_offer' => null,
                'reviews' => 0,
                'rate' => 0,
                'photo' => null,
                'long_address' => null,
                'lat_address' => null,
                'publish' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            foreach ($data['translations'] as $locale => $t) {
                DB::table('tour_translations')->insert([
                    'tour_id' => $tourId,
                    'locale' => $locale,
                    'name' => $t['name'],
                    'description' => $t['description'],
                    'tip_info' => '',
                    'meta_title' => $t['name'],
                    'meta_description' => Str::limit($t['description'], 150),
                ]);
            }
            Tour::find($tourId)?->indexAcrossLocales();
        }
    }

    private function seedCities(): void
    {
        $cities = [
            ['Cairo', '开罗', '開羅'],
            ['Luxor', '卢克索', '盧克索'],
            ['Aswan', '阿斯旺', '亞斯文'],
            ['Alexandria', '亚历山大', '亞歷山大'],
            ['Sharm El Sheikh', '沙姆沙伊赫', '沙姆沙伊赫'],
            ['Hurghada', '胡尔加达', '胡爾加達'],
        ];

        foreach ($cities as [$en, $zh, $zhHant]) {
            $cityId = DB::table('cities')->insertGetId([
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            foreach ([['en', $en], ['zh', $zh], ['zh-Hant', $zhHant]] as [$locale, $name]) {
                DB::table('city_translations')->insert([
                    'city_id' => $cityId,
                    'locale' => $locale,
                    'name' => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            City::find($cityId)?->indexAcrossLocales();
        }
    }

    private function seedEvents(): void
    {
        $events = [
            [
                'slug' => 'abu-simbel-sun-festival',
                'translations' => [
                    'en' => ['name' => 'Abu Simbel Sun Festival', 'description' => 'Witness the ancient solar alignment lighting up Ramses II inside Abu Simbel temple, every February and October.'],
                    'zh' => ['name' => '阿布辛贝太阳节', 'description' => '每年二月和十月，见证阳光照亮阿布辛贝神庙中的拉美西斯二世雕像。'],
                    'zh-Hant' => ['name' => '阿布辛貝太陽節', 'description' => '每年二月和十月，見證陽光照亮阿布辛貝神廟中的拉美西斯二世雕像。'],
                ],
            ],
            [
                'slug' => 'cairo-international-film-festival',
                'translations' => [
                    'en' => ['name' => 'Cairo International Film Festival', 'description' => 'Annual cinema festival in downtown Cairo featuring films from across the Middle East and beyond.'],
                    'zh' => ['name' => '开罗国际电影节', 'description' => '每年在开罗市中心举办的电影节，展映中东及全球各地影片。'],
                    'zh-Hant' => ['name' => '開羅國際電影節', 'description' => '每年在開羅市中心舉辦的電影節，展映中東及全球各地影片。'],
                ],
            ],
        ];

        foreach ($events as $data) {
            if (DB::table('events')->where('slug', $data['slug'])->exists()) {
                $this->command->line("  skip event: {$data['slug']} (already exists)");

                continue;
            }
            $eventId = DB::table('events')->insertGetId([
                'slug' => $data['slug'],
                'is_active' => 1,
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            foreach ($data['translations'] as $locale => $t) {
                DB::table('event_translations')->insert([
                    'event_id' => $eventId,
                    'locale' => $locale,
                    'name' => $t['name'],
                    'description' => $t['description'],
                    'meta_title' => $t['name'],
                    'meta_description' => Str::limit($t['description'], 150),
                ]);
            }
            Event::find($eventId)?->indexAcrossLocales();
        }
    }

    private function seedBlogs(): void
    {
        $blogs = [
            [
                'category' => 1,
                'translations' => [
                    'en' => ['title' => 'Best Time to Visit Egypt', 'slug' => 'best-time-to-visit-egypt', 'description' => 'October to April offers cool weather perfect for exploring temples in Luxor and Aswan and the pyramids in Cairo.', 'head' => 'Plan your Egypt trip in the right season.'],
                    'zh' => ['title' => '埃及最佳旅游时间', 'slug' => 'best-time-to-visit-egypt-zh', 'description' => '十月到四月气候凉爽，最适合游览卢克索和阿斯旺的神庙以及开罗的金字塔。', 'head' => '在正确的季节计划您的埃及之旅。'],
                    'zh-Hant' => ['title' => '埃及最佳旅遊時間', 'slug' => 'best-time-to-visit-egypt-zh-hant', 'description' => '十月到四月氣候涼爽，最適合遊覽盧克索和亞斯文的神廟以及開羅的金字塔。', 'head' => '在正確的季節計劃您的埃及之旅。'],
                ],
            ],
            [
                'category' => 2,
                'translations' => [
                    'en' => ['title' => 'Top 10 Things to Do in Cairo', 'slug' => 'top-10-things-cairo', 'description' => 'From the Pyramids of Giza to Khan El Khalili bazaar — a must-do list for first-time Cairo visitors.', 'head' => 'Cairo highlights for every traveler.'],
                    'zh' => ['title' => '开罗必做的10件事', 'slug' => 'top-10-things-cairo-zh', 'description' => '从吉萨金字塔到汗哈利利市场——首次到访开罗必做清单。', 'head' => '每位旅行者都应了解的开罗亮点。'],
                    'zh-Hant' => ['title' => '開羅必做的10件事', 'slug' => 'top-10-things-cairo-zh-hant', 'description' => '從吉薩金字塔到汗哈利利市場——首次到訪開羅必做清單。', 'head' => '每位旅行者都應了解的開羅亮點。'],
                ],
            ],
        ];

        foreach ($blogs as $data) {
            $blogId = DB::table('blogs')->insertGetId([
                'image' => '',
                'category' => $data['category'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            foreach ($data['translations'] as $locale => $t) {
                DB::table('blog_translations')->insert([
                    'blog_id' => $blogId,
                    'locale' => $locale,
                    'title' => $t['title'],
                    'slug' => $t['slug'],
                    'description' => $t['description'],
                    'head' => $t['head'],
                    'meta_title' => $t['title'],
                    'meta_description' => Str::limit($t['description'], 150),
                ]);
            }
            Blog::find($blogId)?->indexAcrossLocales();
        }
    }

    private function seedServices(): void
    {
        $services = [
            [
                'status' => 0,
                'translations' => [
                    'en' => ['title' => 'Hotel Accommodation', 'slug' => 'hotel-accommodation', 'description' => 'Hand-picked Egyptian hotels from 3-star to ultra-luxury 5-star resorts on the Red Sea and the Nile.'],
                    'zh' => ['title' => '酒店住宿', 'slug' => 'hotel-accommodation-zh', 'description' => '精选三星到五星级埃及酒店，覆盖红海和尼罗河沿岸度假胜地。'],
                    'zh-Hant' => ['title' => '酒店住宿', 'slug' => 'hotel-accommodation-zh-hant', 'description' => '精選三星到五星級埃及酒店，覆蓋紅海和尼羅河沿岸度假勝地。'],
                ],
            ],
            [
                'status' => 1,
                'translations' => [
                    'en' => ['title' => 'Private Transportation', 'slug' => 'private-transportation', 'description' => 'Air-conditioned private cars and minibuses with English-speaking drivers across all major Egyptian cities.'],
                    'zh' => ['title' => '私人交通', 'slug' => 'private-transportation-zh', 'description' => '配备英语司机的空调私人车辆和迷你巴士，覆盖埃及所有主要城市。'],
                    'zh-Hant' => ['title' => '私人交通', 'slug' => 'private-transportation-zh-hant', 'description' => '配備英語司機的空調私人車輛和迷你巴士，覆蓋埃及所有主要城市。'],
                ],
            ],
            [
                'status' => 3,
                'translations' => [
                    'en' => ['title' => 'Visa Formalities', 'slug' => 'visa-formalities', 'description' => 'End-to-end Egyptian visa processing including e-visa, visa-on-arrival, and tourist visa support for all nationalities.'],
                    'zh' => ['title' => '签证手续', 'slug' => 'visa-formalities-zh', 'description' => '全程办理埃及签证，包括电子签证、落地签和旅游签证支持。'],
                    'zh-Hant' => ['title' => '簽證手續', 'slug' => 'visa-formalities-zh-hant', 'description' => '全程辦理埃及簽證，包括電子簽證、落地簽和旅遊簽證支持。'],
                ],
            ],
        ];

        foreach ($services as $data) {
            $serviceId = DB::table('travel_services')->insertGetId([
                'main_image' => null,
                'icon' => null,
                'status' => $data['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            foreach ($data['translations'] as $locale => $t) {
                DB::table('travel_services_translations')->insert([
                    'travel_services_id' => $serviceId,
                    'locale' => $locale,
                    'title' => $t['title'],
                    'slug' => $t['slug'],
                    'description' => $t['description'],
                    'meta_title' => $t['title'],
                    'meta_description' => Str::limit($t['description'], 150),
                ]);
            }
            TravelService::find($serviceId)?->indexAcrossLocales();
        }
    }
}
