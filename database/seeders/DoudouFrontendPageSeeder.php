<?php

namespace Database\Seeders;

use App\Enum\AboutUsStatus;
use App\Enum\PopularVideoStatus;
use App\Enum\SliderStatus;
use App\Models\aboutUs\AboutUs;
use App\Models\Blog\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\GallaryPackage;
use App\Models\Gallery;
use App\Models\GeneralComment\GeneralComment;
use App\Models\Hotel\Hotel;
use App\Models\PopularVideo\PopularVideo;
use App\Models\Question\Question;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\Tour;
use App\Models\TourGroup;
use App\Models\TourOverview;
use App\Models\TourType;
use App\Models\TravelService\TravelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DoudouFrontendPageSeeder extends Seeder
{
    public function run(): void
    {
        config(['scout.driver' => 'null']);

        $this->seedSliders();
        $this->seedAboutSections();
        $this->seedServices();
        $this->seedTravelServices();
        $cities = $this->seedCities();
        $categories = $this->seedCategories();
        $types = $this->seedTourTypes();
        $groups = $this->seedTourGroups();
        $hotels = $this->seedHotels();
        $this->seedTours($cities, $categories, $types, $groups, $hotels);
        $this->seedBlogs();
        $this->seedQuestions();
        $this->seedGalleryPackages();
        $this->seedVideos();
        $this->seedGeneralComments();
    }

    private function seedSliders(): void
    {
        $this->translatable(Slider::class, 'title', 'About Egypt Doudou Travel', [
            'status' => SliderStatus::About_us->value,
            'image' => $this->firstImage('slider', 'about-bg.jpeg'),
        ], [
            'en' => ['title' => 'About Egypt Doudou Travel', 'slug' => 'about-egypt-doudou-travel', 'description' => '<p>Local experts crafting reliable, thoughtful Egypt journeys.</p>'],
            'zh' => ['title' => '关于 Egypt Doudou Travel', 'slug' => 'about-egypt-doudou-travel', 'description' => '<p>本地专家为您打造可靠且贴心的埃及旅程。</p>'],
            'zh-Hant' => ['title' => '關於 Egypt Doudou Travel', 'slug' => 'about-egypt-doudou-travel', 'description' => '<p>本地專家為您打造可靠且貼心的埃及旅程。</p>'],
        ]);

        $this->translatable(Slider::class, 'title', 'Curated Egypt Tours', [
            'status' => SliderStatus::Tours->value,
            'image' => $this->firstImage('slider', 'tours-bg.jpeg'),
        ], [
            'en' => ['title' => 'Curated Egypt Tours', 'slug' => 'curated-egypt-tours', 'description' => '<p>Explore pyramids, temples, Nile cruises, deserts, and Red Sea escapes with local support.</p>'],
            'zh' => ['title' => '精选埃及旅游行程', 'slug' => 'curated-egypt-tours', 'description' => '<p>在本地团队支持下探索金字塔、神庙、尼罗河、沙漠和红海。</p>'],
            'zh-Hant' => ['title' => '精選埃及旅遊行程', 'slug' => 'curated-egypt-tours', 'description' => '<p>在本地團隊支援下探索金字塔、神廟、尼羅河、沙漠和紅海。</p>'],
        ]);
    }

    private function seedAboutSections(): void
    {
        $sections = [
            AboutUsStatus::Who_We_Are->value => ['Who We Are', '我们是谁', '我們是誰', 'about-bg.jpeg'],
            AboutUsStatus::Mission->value => ['Mission', '使命', '使命', 'careers.jpeg'],
            AboutUsStatus::Vision->value => ['Vision', '愿景', '願景', 'hero-bg.jpeg'],
            AboutUsStatus::Services->value => ['Services', '服务', '服務', 'services-bg.jpeg'],
            AboutUsStatus::Team->value => ['Makes Us Different?', '让我们与众不同？', '讓我們與眾不同？', 'join-team.jpeg'],
        ];

        foreach ($sections as $status => [$enTitle, $zhTitle, $zhHantTitle, $image]) {
            $this->translatable(AboutUs::class, 'title', $enTitle, [
                'status' => $status,
                'image' => $this->firstImage('about_us', $image),
            ], [
                'en' => ['title' => $enTitle, 'slug' => Str::slug($enTitle), 'description' => '<p>We combine expert planning, licensed guides, responsive support, and smooth local operations to make every Egypt journey feel easy and personal.</p>', 'meta_title' => $enTitle, 'meta_description' => 'Egypt Doudou Travel about section.'],
                'zh' => ['title' => $zhTitle, 'slug' => Str::slug($enTitle), 'description' => '<p>我们结合专业规划、持证导游、快速客服和顺畅本地执行，让每次埃及旅行都轻松而个性化。</p>', 'meta_title' => $zhTitle, 'meta_description' => 'Egypt Doudou Travel 关于内容。'],
                'zh-Hant' => ['title' => $zhHantTitle, 'slug' => Str::slug($enTitle), 'description' => '<p>我們結合專業規劃、持證導遊、快速客服和順暢本地執行，讓每次埃及旅行都輕鬆而個性化。</p>', 'meta_title' => $zhHantTitle, 'meta_description' => 'Egypt Doudou Travel 關於內容。'],
            ]);
        }
    }

    private function seedServices(): void
    {
        $records = [
            ['Planning', '行程规划', '行程規劃'],
            ['Local Guides', '本地导游', '本地導遊'],
            ['Transport', '交通接送', '交通接送'],
            ['Customer Care', '客户服务', '客戶服務'],
        ];

        foreach ($records as $index => [$en, $zh, $zhHant]) {
            $this->translatable(Service::class, 'title', $en, [
                'icon' => $this->firstImage('services'),
            ], [
                'en' => ['title' => $en, 'slug' => Str::slug($en), 'description' => '<p>Practical travel support designed around comfort, timing, and clear communication.</p>', 'meta_title' => $en, 'meta_description' => $en],
                'zh' => ['title' => $zh, 'slug' => Str::slug($en), 'description' => '<p>围绕舒适、时间安排和清晰沟通设计的旅行支持。</p>', 'meta_title' => $zh, 'meta_description' => $zh],
                'zh-Hant' => ['title' => $zhHant, 'slug' => Str::slug($en), 'description' => '<p>圍繞舒適、時間安排和清晰溝通設計的旅行支援。</p>', 'meta_title' => $zhHant, 'meta_description' => $zhHant],
            ]);
        }
    }

    private function seedTravelServices(): void
    {
        $records = [
            ['Accommodation', '住宿服务', '住宿服務'],
            ['Transportation', '交通服务', '交通服務'],
            ['Flight Reservation', '机票预订', '機票預訂'],
            ['Visa Formalities', '签证办理', '簽證辦理'],
            ['Tour Guidance', '导游服务', '導遊服務'],
        ];

        foreach ($records as $index => [$en, $zh, $zhHant]) {
            $this->translatable(TravelService::class, 'title', $en, [
                'status' => $index,
                'main_image' => $this->firstImage('travel_services_images', 'services-bg.jpeg'),
                'icon' => $this->firstImage('travel_services_icons'),
            ], [
                'en' => ['title' => $en, 'slug' => Str::slug($en), 'description' => '<p>Reliable service handled by our local team so your trip stays simple and comfortable.</p>', 'meta_title' => $en, 'meta_description' => $en],
                'zh' => ['title' => $zh, 'slug' => Str::slug($en), 'description' => '<p>由本地团队负责的可靠服务，让您的旅程简单舒适。</p>', 'meta_title' => $zh, 'meta_description' => $zh],
                'zh-Hant' => ['title' => $zhHant, 'slug' => Str::slug($en), 'description' => '<p>由本地團隊負責的可靠服務，讓您的旅程簡單舒適。</p>', 'meta_title' => $zhHant, 'meta_description' => $zhHant],
            ]);
        }
    }

    private function seedCities(): array
    {
        return collect([
            ['Cairo', '开罗', '開羅'],
            ['Luxor', '卢克索', '盧克索'],
            ['Aswan', '阿斯旺', '阿斯旺'],
            ['Hurghada', '赫尔格达', '赫爾格達'],
        ])->mapWithKeys(fn ($row) => [$row[0] => $this->translatable(City::class, 'name', $row[0], [
            'image' => $this->firstImage('cities', 'dest-1.jpeg'),
        ], [
            'en' => ['name' => $row[0]],
            'zh' => ['name' => $row[1]],
            'zh-Hant' => ['name' => $row[2]],
        ])])->all();
    }

    private function seedCategories(): array
    {
        return collect([
            ['Egypt Tours', '埃及旅游', '埃及旅遊'],
            ['Day Trips', '一日游', '一日遊'],
            ['Nile Cruises', '尼罗河邮轮', '尼羅河郵輪'],
        ])->mapWithKeys(fn ($row) => [$row[0] => $this->translatable(Category::class, 'name', $row[0], [
            'slug' => Str::slug($row[0]),
            'is_active' => true,
            'parent_id' => null,
        ], [
            'en' => ['name' => $row[0]],
            'zh' => ['name' => $row[1]],
            'zh-Hant' => ['name' => $row[2]],
        ])])->all();
    }

    private function seedTourTypes(): array
    {
        return collect([
            ['Cultural', '文化', '文化'],
            ['Adventure', '探险', '探險'],
        ])->mapWithKeys(fn ($row) => [$row[0] => $this->translatable(TourType::class, 'name', $row[0], [], [
            'en' => ['name' => $row[0]],
            'zh' => ['name' => $row[1]],
            'zh-Hant' => ['name' => $row[2]],
        ])])->all();
    }

    private function seedTourGroups(): array
    {
        return collect([
            ['Private', '私人团', '私人團'],
            ['Small Group', '小团', '小團'],
        ])->mapWithKeys(fn ($row) => [$row[0] => $this->translatable(TourGroup::class, 'name', $row[0], [], [
            'en' => ['name' => $row[0]],
            'zh' => ['name' => $row[1]],
            'zh-Hant' => ['name' => $row[2]],
        ])])->all();
    }

    private function seedHotels(): array
    {
        return collect([
            ['Cairo Nile Hotel', '开罗尼罗河酒店', '開羅尼羅河飯店'],
            ['Luxor Heritage Stay', '卢克索遗产酒店', '盧克索遺產飯店'],
        ])->mapWithKeys(fn ($row) => [$row[0] => $this->translatable(Hotel::class, 'name', $row[0], [
            'phone' => '+201000000000',
            'photo' => $this->firstImage('hotels', 'hero-bg.jpeg'),
        ], [
            'en' => ['name' => $row[0], 'address' => 'Egypt'],
            'zh' => ['name' => $row[1], 'address' => '埃及'],
            'zh-Hant' => ['name' => $row[2], 'address' => '埃及'],
        ])])->all();
    }

    private function seedTours(array $cities, array $categories, array $types, array $groups, array $hotels): void
    {
        $records = [
            ['Pyramids and Sphinx Day Tour', '金字塔与狮身人面像一日游', '金字塔與獅身人面像一日遊', 'Cairo', 1, 95],
            ['Luxor Temples Private Tour', '卢克索神庙私人游', '盧克索神廟私人遊', 'Luxor', 2, 180],
            ['4-Day Nile Cruise', '4天尼罗河邮轮', '4天尼羅河郵輪', 'Aswan', 4, 790],
            ['Red Sea Escape Hurghada', '红海赫尔格达度假', '紅海赫爾格達度假', 'Hurghada', 3, 320],
        ];

        foreach ($records as [$en, $zh, $zhHant, $cityName, $days, $price]) {
            $tour = $this->translatable(Tour::class, 'name', $en, [
                'slug' => Str::slug($en),
                'is_active' => true,
                'publish' => true,
                'category_id' => $categories['Egypt Tours']->id,
                'price' => $price,
                'price_offer' => $price - 20,
                'reviews' => 40 + $days,
                'rate' => 5,
                'photo' => $this->firstImage('tours', 'tour-1.jpeg'),
                'hotel_id' => reset($hotels)->id,
            ], [
                'en' => ['name' => $en, 'description' => '<p>A carefully planned Egypt itinerary with local guidance, comfortable timing, and responsive support.</p>', 'tip_info' => 'Bring comfortable shoes and keep your passport copy with you.', 'meta_title' => $en, 'meta_description' => $en],
                'zh' => ['name' => $zh, 'description' => '<p>精心安排的埃及行程，包含本地导览、舒适节奏和快速支持。</p>', 'tip_info' => '请穿舒适鞋子并携带护照复印件。', 'meta_title' => $zh, 'meta_description' => $zh],
                'zh-Hant' => ['name' => $zhHant, 'description' => '<p>精心安排的埃及行程，包含本地導覽、舒適節奏和快速支援。</p>', 'tip_info' => '請穿舒適鞋子並攜帶護照影本。', 'meta_title' => $zhHant, 'meta_description' => $zhHant],
            ]);

            $tour->categories()->syncWithoutDetaching([$categories['Egypt Tours']->id]);

            $values = json_encode([
                'days' => (string) $days,
                'nights' => (string) max(0, $days - 1),
                'cancellation' => 'Free cancellation',
                'availability' => 'Daily',
                'tour_type' => $types['Cultural']->id,
                'tour_group' => $groups['Private']->id,
                'location_from' => $cities[$cityName]->id,
                'location_to' => $cities[$cityName]->id,
            ]);

            $overview = TourOverview::firstOrNew(['tour_id' => $tour->id]);
            foreach (['en', 'zh', 'zh-Hant'] as $locale) {
                $overview->translateOrNew($locale)->values = $values;
            }
            $overview->save();

            if (! Gallery::where('tour_id', $tour->id)->exists()) {
                foreach (range(1, 3) as $i) {
                    Gallery::create(['tour_id' => $tour->id, 'photo' => $this->firstImage('tours', 'tour-'.$i.'.jpeg')]);
                }
            }
        }
    }

    private function seedBlogs(): void
    {
        foreach ([
            ['Best Time to Visit Egypt', '访问埃及的最佳时间', '造訪埃及的最佳時間'],
            ['What to Pack for a Nile Cruise', '尼罗河邮轮行李清单', '尼羅河郵輪行李清單'],
            ['Cairo Culture Guide', '开罗文化指南', '開羅文化指南'],
        ] as $row) {
            $this->translatable(Blog::class, 'title', $row[0], [
                'image' => $this->firstImage('blogs', 'blogs-bg.jpeg'),
                'category' => 0,
            ], [
                'en' => ['title' => $row[0], 'slug' => Str::slug($row[0]), 'description' => '<p>Helpful Egypt travel insight from our local team.</p>', 'head' => $row[0], 'meta_title' => $row[0], 'meta_description' => $row[0]],
                'zh' => ['title' => $row[1], 'slug' => Str::slug($row[0]), 'description' => '<p>来自本地团队的实用埃及旅行建议。</p>', 'head' => $row[1], 'meta_title' => $row[1], 'meta_description' => $row[1]],
                'zh-Hant' => ['title' => $row[2], 'slug' => Str::slug($row[0]), 'description' => '<p>來自本地團隊的實用埃及旅行建議。</p>', 'head' => $row[2], 'meta_title' => $row[2], 'meta_description' => $row[2]],
            ]);
        }
    }

    private function seedQuestions(): void
    {
        foreach ([
            ['Can you customize a private tour?', '可以定制私人行程吗？', '可以客製私人行程嗎？'],
            ['Do you arrange airport transfers?', '你们安排机场接送吗？', '你們安排機場接送嗎？'],
            ['Are Chinese-speaking guides available?', '可以安排中文导游吗？', '可以安排中文導遊嗎？'],
        ] as $row) {
            $this->translatable(Question::class, 'title', $row[0], [], [
                'en' => ['title' => $row[0], 'slug' => Str::slug($row[0]), 'description' => '<p>Yes, our team will confirm the best available option based on your dates and route.</p>'],
                'zh' => ['title' => $row[1], 'slug' => Str::slug($row[0]), 'description' => '<p>可以，我们会根据您的日期和路线确认最合适的方案。</p>'],
                'zh-Hant' => ['title' => $row[2], 'slug' => Str::slug($row[0]), 'description' => '<p>可以，我們會依照您的日期和路線確認最合適的方案。</p>'],
            ]);
        }
    }

    private function seedGalleryPackages(): void
    {
        if (GallaryPackage::count() >= 4) {
            return;
        }

        foreach (range(1, 4) as $i) {
            GallaryPackage::create(['image' => $this->firstImage('gallary_packages', 'gallery-'.$i.'.jpeg')]);
        }
    }

    private function seedVideos(): void
    {
        foreach ([
            ['Traveler Review: Cairo and Giza', '游客评价：开罗和吉萨', '旅客評價：開羅和吉薩'],
            ['Nile Cruise Experience', '尼罗河邮轮体验', '尼羅河郵輪體驗'],
        ] as $row) {
            $this->translatable(PopularVideo::class, 'title', $row[0], [
                'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'status' => PopularVideoStatus::ACTIVE->value,
            ], [
                'en' => ['title' => $row[0]],
                'zh' => ['title' => $row[1]],
                'zh-Hant' => ['title' => $row[2]],
            ]);
        }
    }

    private function seedGeneralComments(): void
    {
        $records = [
            [
                'date' => '2024-02-10',
                'rate' => 5,
                'en' => ['username' => 'Sarah Williams', 'comment' => 'The Cairo and Luxor itinerary was perfectly paced. The team answered quickly and every transfer was on time.'],
                'zh' => ['username' => '莎拉·威廉姆斯', 'comment' => '开罗和卢克索的行程节奏非常好。团队回复很快，每一次接送都很准时。'],
                'zh-Hant' => ['username' => '莎拉·威廉斯', 'comment' => '開羅和盧克索的行程節奏非常好。團隊回覆很快，每一次接送都很準時。'],
            ],
            [
                'date' => '2024-03-18',
                'rate' => 5,
                'en' => ['username' => 'Li Wei', 'comment' => 'Our guide explained the history clearly in Chinese and helped us avoid crowded times at the main sites.'],
                'zh' => ['username' => '李伟', 'comment' => '导游用中文把历史讲得很清楚，还帮我们避开了主要景点最拥挤的时间。'],
                'zh-Hant' => ['username' => '李偉', 'comment' => '導遊用中文把歷史講得很清楚，還幫我們避開了主要景點最擁擠的時間。'],
            ],
            [
                'date' => '2024-04-22',
                'rate' => 4,
                'en' => ['username' => 'Omar Al Mansouri', 'comment' => 'A smooth private trip with clear communication from booking until the last airport transfer.'],
                'zh' => ['username' => '奥马尔·曼苏里', 'comment' => '一次顺利的私人行程，从预订到最后一次机场接送，沟通都很清楚。'],
                'zh-Hant' => ['username' => '奧馬爾·曼蘇里', 'comment' => '一次順利的私人行程，從預訂到最後一次機場接送，溝通都很清楚。'],
            ],
        ];

        foreach ($records as $record) {
            $this->translatable(GeneralComment::class, 'username', $record['en']['username'], [
                'photo' => 'avatar.jpeg',
                'date' => $record['date'],
                'rate' => $record['rate'],
            ], [
                'en' => $record['en'],
                'zh' => $record['zh'],
                'zh-Hant' => $record['zh-Hant'],
            ]);
        }
    }

    private function translatable(string $modelClass, string $field, string $englishValue, array $attributes, array $translations): Model
    {
        $model = $modelClass::whereHas('translations', function ($query) use ($field, $englishValue) {
            $query->where('locale', 'en')->where($field, $englishValue);
        })->first() ?? new $modelClass();

        $model->fill($attributes);

        foreach ($translations as $locale => $values) {
            foreach ($values as $key => $value) {
                $model->translateOrNew($locale)->{$key} = $value;
            }
        }

        $model->save();

        return $model;
    }

    private function firstImage(string $directory, ?string $fallback = null): string
    {
        $path = public_path("assets/images/{$directory}");
        $files = is_dir($path) ? glob($path.'/*.{jpg,jpeg,png,webp,svg}', GLOB_BRACE) : [];

        if (! empty($files)) {
            return basename($files[0]);
        }

        return $fallback ?? '';
    }
}
