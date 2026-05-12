<?php

namespace Database\Seeders;

use App\Models\Slider\Slider;

class SliderSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        foreach ($this->sliderData() as $spec) {
            $enTitle = $spec['en']['title'];
            if ($this->translationExists(Slider::class, $enTitle, 'title')) {
                $this->command->line("  skip Slider: {$enTitle}");

                continue;
            }
            try {
                Slider::create([
                    'image' => $this->getImage('slider'),
                    'status' => $spec['status'],
                    'en' => $spec['en'],
                    'zh' => $spec['zh'],
                    'zh-Hant' => $spec['zh-Hant'],
                ]);
                $this->command->info("  seeded Slider: {$enTitle}");
            } catch (\Throwable $e) {
                $this->command->error("  Slider '{$enTitle}': {$e->getMessage()}");
            }
        }
    }

    private function sliderData(): array
    {
        return [
            [
                'status' => 0,
                'en' => [
                    'title' => 'Discover the Magic of Egypt',
                    'slug' => 'discover-egypt',
                    'description' => '<p>From the ancient pyramids to the crystal waters of the Red Sea, Egypt offers adventures that will stay with you forever. Start your journey today.</p>',
                ],
                'zh' => [
                    'title' => '发现埃及的魔力',
                    'slug' => 'discover-egypt',
                    'description' => '<p>从古老的金字塔到红海的清澈海水，埃及提供的冒险将永远留在您心中。今天就开启您的旅程。</p>',
                ],
                'zh-Hant' => [
                    'title' => '發現埃及的魔力',
                    'slug' => 'discover-egypt',
                    'description' => '<p>從古老的金字塔到紅海的清澈海水，埃及提供的冒險將永遠留在您心中。今天就開啟您的旅程。</p>',
                ],
            ],
            [
                'status' => 0,
                'en' => [
                    'title' => 'Nile Cruises & Ancient Temples',
                    'slug' => 'nile-cruises-temples',
                    'description' => '<p>Sail the legendary Nile River and explore millennia of history. Our curated cruises connect Luxor, Aswan, and the timeless temples in between.</p>',
                ],
                'zh' => [
                    'title' => '尼罗河游船和古老神庙',
                    'slug' => 'nile-cruises-temples',
                    'description' => '<p>航行在传奇的尼罗河上，探索数千年的历史。我们精心策划的游船连接卢克索、阿斯旺以及两者之间永恒的神庙。</p>',
                ],
                'zh-Hant' => [
                    'title' => '尼羅河遊船和古老神廟',
                    'slug' => 'nile-cruises-temples',
                    'description' => '<p>航行在傳奇的尼羅河上，探索數千年的歷史。我們精心策劃的遊船連接盧克索、阿斯旺以及兩者之間永恆的神廟。</p>',
                ],
            ],
            [
                'status' => 2,
                'en' => [
                    'title' => 'About Our Story',
                    'slug' => 'about-our-story',
                    'description' => '<p>Founded by a team of passionate Egyptologists and travel experts, we have spent over a decade crafting journeys that reveal the true soul of Egypt.</p>',
                ],
                'zh' => [
                    'title' => '关于我们的故事',
                    'slug' => 'about-our-story',
                    'description' => '<p>由一支充满热情的埃及学家和旅行专家团队创立，我们花了十多年时间打造揭示埃及真正灵魂的旅程。</p>',
                ],
                'zh-Hant' => [
                    'title' => '關於我們的故事',
                    'slug' => 'about-our-story',
                    'description' => '<p>由一支充滿熱情的埃及學家和旅行專家團隊創立，我們花了十多年時間打造揭示埃及真正靈魂的旅程。</p>',
                ],
            ],
            [
                'status' => 4,
                'en' => [
                    'title' => 'Join Our Growing Team',
                    'slug' => 'join-our-growing-team',
                    'description' => '<p>Passionate about travel and Egyptian heritage? We are always looking for talented guides, marketers, and operations professionals to join our family.</p>',
                ],
                'zh' => [
                    'title' => '加入我们不断壮大的团队',
                    'slug' => 'join-our-growing-team',
                    'description' => '<p>对旅行和埃及遗产充满热情？我们一直在寻找有才华的导游、营销人员和运营专业人员加入我们的大家庭。</p>',
                ],
                'zh-Hant' => [
                    'title' => '加入我們不斷壯大的團隊',
                    'slug' => 'join-our-growing-team',
                    'description' => '<p>對旅行和埃及遺產充滿熱情？我們一直在尋找有才華的導遊、營銷人員和運營專業人員加入我們的大家庭。</p>',
                ],
            ],
            [
                'status' => 6,
                'en' => [
                    'title' => 'Unforgettable Tours Across Egypt',
                    'slug' => 'unforgettable-tours-egypt',
                    'description' => '<p>From day trips to Giza to multi-day Nile cruises, our handpicked tours showcase the very best of Egyptian archaeology, culture, and natural beauty.</p>',
                ],
                'zh' => [
                    'title' => '穿越埃及的难忘之旅',
                    'slug' => 'unforgettable-tours-egypt',
                    'description' => '<p>从吉萨的一日游到多日尼罗河游船，我们精心挑选的旅游展示了埃及考古学、文化和自然美景中最精华的部分。</p>',
                ],
                'zh-Hant' => [
                    'title' => '穿越埃及的難忘之旅',
                    'slug' => 'unforgettable-tours-egypt',
                    'description' => '<p>從吉薩的一日遊到多日尼羅河遊船，我們精心挑選的旅遊展示了埃及考古學、文化和自然美景中最精華的部分。</p>',
                ],
            ],
            [
                'status' => 10,
                'en' => [
                    'title' => 'Premium Travel Services',
                    'slug' => 'premium-travel-services',
                    'description' => '<p>We offer flight reservations, visa assistance, private transportation, and custom itinerary planning to make your Egyptian journey effortless.</p>',
                ],
                'zh' => [
                    'title' => '优质旅行服务',
                    'slug' => 'premium-travel-services',
                    'description' => '<p>我们提供航班预订、签证协助、私人交通和定制行程规划，让您的埃及之旅轻松无忧。</p>',
                ],
                'zh-Hant' => [
                    'title' => '優質旅行服務',
                    'slug' => 'premium-travel-services',
                    'description' => '<p>我們提供航班預訂、簽證協助、私人交通和定制行程規劃，讓您的埃及之旅輕鬆無憂。</p>',
                ],
            ],
        ];
    }
}
