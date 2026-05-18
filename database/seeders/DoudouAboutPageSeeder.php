<?php

namespace Database\Seeders;

use App\Enum\AboutUsStatus;
use App\Enum\SliderStatus;
use App\Models\aboutUs\AboutUs;
use App\Models\Question\Question;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\TravelService\TravelService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DoudouAboutPageSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedSlider();
        $this->seedAboutSections();
        $this->seedServices();
        $this->seedTravelServices();
        $this->seedQuestions();
    }

    private function seedSlider(): void
    {
        $slider = Slider::where('status', SliderStatus::About_us->value)->first() ?? new Slider();
        $slider->fill([
            'status' => SliderStatus::About_us->value,
            'image' => 'about-bg.jpeg',
        ]);

        $this->applyTranslations($slider, [
            'en' => ['title' => 'About Our Story', 'slug' => 'about-our-story', 'description' => '<p>Founded by passionate Egyptologists and travel specialists, we create journeys that reveal the real spirit of Egypt.</p>'],
            'zh' => ['title' => '关于我们的故事', 'slug' => 'about-our-story', 'description' => '<p>由充满热情的埃及学家和旅行专家创立，我们打造揭示埃及真正灵魂的旅程。</p>'],
            'zh-Hant' => ['title' => '關於我們的故事', 'slug' => 'about-our-story', 'description' => '<p>由充滿熱情的埃及學家和旅行專家創立，我們打造揭示埃及真正靈魂的旅程。</p>'],
        ]);
    }

    private function seedAboutSections(): void
    {
        $rows = [
            AboutUsStatus::Who_We_Are->value => [
                'image' => 'about-bg.jpeg',
                'en' => ['title' => 'Who We Are', 'description' => '<p>Egypt Doudou Travel is a local travel company built around expert planning, trusted guides, and smooth on-ground operations across Egypt.</p>'],
                'zh' => ['title' => '我们是谁', 'description' => '<p>Egypt Doudou Travel 是一家埃及本地旅行公司，专注于专业规划、可靠导游和顺畅的本地执行。</p>'],
                'zh-Hant' => ['title' => '我們是誰', 'description' => '<p>Egypt Doudou Travel 是一家埃及本地旅行公司，專注於專業規劃、可靠導遊和順暢的本地執行。</p>'],
            ],
            AboutUsStatus::Mission->value => [
                'image' => 'careers.jpeg',
                'en' => ['title' => 'Mission', 'description' => '<p>To make Egypt easier, richer, and more personal for every traveler through honest advice, curated routes, and dependable support.</p>'],
                'zh' => ['title' => '使命', 'description' => '<p>通过真诚建议、精选路线和可靠支持，让每位旅行者更轻松、更深入、更个性化地探索埃及。</p>'],
                'zh-Hant' => ['title' => '使命', 'description' => '<p>透過真誠建議、精選路線和可靠支援，讓每位旅客更輕鬆、更深入、更個人化地探索埃及。</p>'],
            ],
            AboutUsStatus::Vision->value => [
                'image' => 'hero-bg.jpeg',
                'en' => ['title' => 'Vision', 'description' => '<p>To become a trusted bridge between travelers and the living culture, history, and hospitality of Egypt.</p>'],
                'zh' => ['title' => '愿景', 'description' => '<p>成为旅行者与埃及鲜活文化、历史和热情好客之间值得信赖的桥梁。</p>'],
                'zh-Hant' => ['title' => '願景', 'description' => '<p>成為旅客與埃及鮮活文化、歷史和熱情好客之間值得信賴的橋樑。</p>'],
            ],
            AboutUsStatus::Services->value => [
                'image' => 'services-bg.jpeg',
                'en' => ['title' => 'Services', 'description' => '<p>We arrange tours, transport, hotels, cruises, flights, visas, and custom itineraries with one connected team.</p>'],
                'zh' => ['title' => '服务', 'description' => '<p>我们用一个协同团队安排旅游、交通、酒店、游轮、机票、签证和定制行程。</p>'],
                'zh-Hant' => ['title' => '服務', 'description' => '<p>我們用一個協同團隊安排旅遊、交通、飯店、郵輪、機票、簽證和客製行程。</p>'],
            ],
        ];

        foreach ($rows as $status => $row) {
            $model = AboutUs::where('status', $status)->first() ?? new AboutUs();
            $model->fill(['status' => $status, 'image' => $row['image']]);
            $this->applyTranslations($model, [
                'en' => $this->meta($row['en']),
                'zh' => $this->meta($row['zh'], $row['en']['title']),
                'zh-Hant' => $this->meta($row['zh-Hant'], $row['en']['title']),
            ]);
        }
    }

    private function seedServices(): void
    {
        $rows = [
            ['Planning', '行程规划', '行程規劃'],
            ['Local Guides', '本地导游', '本地導遊'],
            ['Transport', '交通接送', '交通接送'],
            ['Customer Care', '客户服务', '客戶服務'],
        ];

        foreach ($rows as [$en, $zh, $zhHant]) {
            $model = Service::whereHas('translations', fn ($q) => $q->where('locale', 'en')->where('title', $en))->first() ?? new Service();
            $model->fill(['icon' => $model->icon ?: 'b9YCzaUxgvBH1JorSGxAVWBS62ZHul5TDuDIsRHT.svg']);
            $this->applyTranslations($model, [
                'en' => $this->meta(['title' => $en, 'description' => '<p>Practical travel support designed around comfort, timing, and clear communication.</p>']),
                'zh' => $this->meta(['title' => $zh, 'description' => '<p>围绕舒适、时间安排和清晰沟通设计的实用旅行支持。</p>'], $en),
                'zh-Hant' => $this->meta(['title' => $zhHant, 'description' => '<p>圍繞舒適、時間安排和清晰溝通設計的實用旅行支援。</p>'], $en),
            ]);
        }
    }

    private function seedTravelServices(): void
    {
        $rows = [
            ['Accommodation', '住宿服务', '住宿服務'],
            ['Transportation', '交通服务', '交通服務'],
            ['Flight Reservation', '机票预订', '機票預訂'],
            ['Visa Formalities', '签证办理', '簽證辦理'],
            ['Tour Guidance', '导游服务', '導遊服務'],
        ];

        foreach ($rows as $index => [$en, $zh, $zhHant]) {
            $model = TravelService::whereHas('translations', fn ($q) => $q->where('locale', 'en')->where('title', $en))->first() ?? new TravelService();
            $model->fill([
                'status' => $index,
                'main_image' => $model->main_image ?: 'services-bg.jpeg',
                'icon' => $model->icon ?: '5Y1aF2EaE0DXIJpnT7FOCXLIsD7HjMLGP3PIMsdZ.svg',
            ]);
            $this->applyTranslations($model, [
                'en' => $this->meta(['title' => $en, 'description' => '<p>Reliable service handled by our local team so your trip stays simple and comfortable.</p>']),
                'zh' => $this->meta(['title' => $zh, 'description' => '<p>由本地团队负责的可靠服务，让您的旅程简单舒适。</p>'], $en),
                'zh-Hant' => $this->meta(['title' => $zhHant, 'description' => '<p>由本地團隊負責的可靠服務，讓您的旅程簡單舒適。</p>'], $en),
            ]);
        }
    }

    private function seedQuestions(): void
    {
        $rows = [
            ['Can you customize a private tour?', '可以定制私人行程吗？', '可以客製私人行程嗎？'],
            ['Do you arrange airport transfers?', '你们安排机场接送吗？', '你們安排機場接送嗎？'],
            ['Are Chinese-speaking guides available?', '可以安排中文导游吗？', '可以安排中文導遊嗎？'],
        ];

        foreach ($rows as [$en, $zh, $zhHant]) {
            $model = Question::whereHas('translations', fn ($q) => $q->where('locale', 'en')->where('title', $en))->first() ?? new Question();
            $this->applyTranslations($model, [
                'en' => ['title' => $en, 'slug' => Str::slug($en), 'description' => '<p>Yes, our team will confirm the best available option based on your dates and route.</p>'],
                'zh' => ['title' => $zh, 'slug' => Str::slug($en), 'description' => '<p>可以，我们会根据您的日期和路线确认最合适的方案。</p>'],
                'zh-Hant' => ['title' => $zhHant, 'slug' => Str::slug($en), 'description' => '<p>可以，我們會依照您的日期和路線確認最合適的方案。</p>'],
            ]);
        }
    }

    private function meta(array $row, ?string $slugFrom = null): array
    {
        $title = $row['title'];

        return $row + [
            'slug' => Str::slug($slugFrom ?? $title),
            'meta_title' => $title,
            'meta_description' => strip_tags($row['description']),
        ];
    }

    private function applyTranslations(Model $model, array $translations): void
    {
        foreach ($translations as $locale => $values) {
            foreach ($values as $key => $value) {
                $model->translateOrNew($locale)->{$key} = $value;
            }
        }

        $model->save();
    }
}
