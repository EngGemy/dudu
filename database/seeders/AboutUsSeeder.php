<?php

namespace Database\Seeders;

use App\Models\aboutUs\AboutUs;

class AboutUsSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        foreach ($this->aboutUsData() as $spec) {
            $enTitle = $spec['en']['title'];
            if ($this->translationExists(AboutUs::class, $enTitle, 'title')) {
                $this->command->line("  skip AboutUs: {$enTitle}");

                continue;
            }
            try {
                AboutUs::create([
                    'image' => $this->getImage('about_us'),
                    'status' => $spec['status'],
                    'en' => $spec['en'],
                    'zh' => $spec['zh'],
                    'zh-Hant' => $spec['zh-Hant'],
                ]);
                $this->command->info("  seeded AboutUs: {$enTitle}");
            } catch (\Throwable $e) {
                $this->command->error("  AboutUs '{$enTitle}': {$e->getMessage()}");
            }
        }
    }

    private function aboutUsData(): array
    {
        return [
            [
                'status' => 1,
                'en' => [
                    'title' => 'Who We Are',
                    'slug' => 'who-we-are',
                    'description' => '<p>We are a passionate team of travel enthusiasts dedicated to showcasing the wonders of Egypt. With years of experience in the tourism industry, we curate unforgettable journeys that blend ancient history, vibrant culture, and breathtaking landscapes.</p><p>Our mission is to provide travelers with authentic, immersive experiences that go beyond typical sightseeing. From the majestic Pyramids of Giza to the serene waters of the Nile, every tour is crafted with care and expertise.</p>',
                    'meta_title' => 'Who We Are — Discover Egypt with Us',
                    'meta_description' => 'Learn about our team and our passion for creating unforgettable Egyptian travel experiences.',
                ],
                'zh' => [
                    'title' => '我们是谁',
                    'slug' => 'who-we-are',
                    'description' => '<p>我们是一支充满热情的旅行爱好者团队，致力于展示埃及的奇迹。凭借多年的旅游业经验，我们策划了将古代历史、充满活力的文化和壮丽景观融为一体的难忘旅程。</p><p>我们的使命是为旅行者提供真实、沉浸式的体验，超越 typical 观光。从雄伟的吉萨金字塔到宁静的尼罗河水，每一次旅行都经过精心设计和专业打造。</p>',
                    'meta_title' => '我们是谁——与我们一起探索埃及',
                    'meta_description' => '了解我们的团队以及我们对创造难忘埃及旅行体验的热情。',
                ],
                'zh-Hant' => [
                    'title' => '我們是誰',
                    'slug' => 'who-we-are',
                    'description' => '<p>我們是一支充滿熱情的旅行愛好者團隊，致力於展示埃及的奇蹟。憑藉多年的旅遊業經驗，我們策劃了將古代歷史、充滿活力的文化和壯麗景觀融為一體的難忘旅程。</p><p>我們的使命是為旅行者提供真實、沉浸式的體驗，超越 typical 觀光。從雄偉的吉薩金字塔到寧靜的尼羅河水，每一次旅行都經過精心設計和專業打造。</p>',
                    'meta_title' => '我們是誰——與我們一起探索埃及',
                    'meta_description' => '了解我們的團隊以及我們對創造難忘埃及旅行體驗的熱情。',
                ],
            ],
            [
                'status' => 2,
                'en' => [
                    'title' => 'Our Mission',
                    'slug' => 'our-mission',
                    'description' => '<p>Our mission is to make Egypt accessible to every traveler by offering personalized, high-quality tours that respect local culture and support local communities. We believe travel should be transformative — opening minds, building bridges, and creating lasting memories.</p><p>We work directly with local guides, artisans, and family-run businesses to ensure that every journey benefits the people and places you visit.</p>',
                    'meta_title' => 'Our Mission — Transformative Travel in Egypt',
                    'meta_description' => 'Discover our mission to create meaningful, responsible travel experiences across Egypt.',
                ],
                'zh' => [
                    'title' => '我们的使命',
                    'slug' => 'our-mission',
                    'description' => '<p>我们的使命是通过提供个性化、高品质的旅行，让每位旅行者都能轻松探索埃及，同时尊重当地文化并支持当地社区。我们相信旅行应该是变革性的——开阔思维、搭建桥梁、创造持久回忆。</p><p>我们直接与当地导游、手工艺人和家庭经营的企业合作，确保每一次旅程都能让您所访问的人和地方受益。</p>',
                    'meta_title' => '我们的使命——埃及的变革性旅行',
                    'meta_description' => '了解我们创造有意义、负责任的埃及旅行体验的使命。',
                ],
                'zh-Hant' => [
                    'title' => '我們的使命',
                    'slug' => 'our-mission',
                    'description' => '<p>我們的使命是通過提供個性化、高品質的旅行，讓每位旅行者都能輕鬆探索埃及，同時尊重當地文化並支持當地社區。我們相信旅行應該是變革性的——開闊思維、搭建橋樑、創造持久回憶。</p><p>我們直接與當地導遊、手工藝人和家庭經營的企業合作，確保每一次旅程都能讓您所訪問的人和地方受益。</p>',
                    'meta_title' => '我們的使命——埃及的變革性旅行',
                    'meta_description' => '了解我們創造有意義、負責任的埃及旅行體驗的使命。',
                ],
            ],
            [
                'status' => 3,
                'en' => [
                    'title' => 'Our Vision',
                    'slug' => 'our-vision',
                    'description' => '<p>We envision a world where travel fosters understanding and connection across cultures. Our goal is to become the most trusted name in Egyptian tourism — known for exceptional service, authentic experiences, and a deep commitment to sustainable travel practices.</p><p>By 2030, we aim to welcome one million travelers to Egypt, each leaving with a richer understanding of this ancient land and its warm-hearted people.</p>',
                    'meta_title' => 'Our Vision — The Future of Egyptian Tourism',
                    'meta_description' => 'Explore our vision for connecting travelers with the heart and soul of Egypt.',
                ],
                'zh' => [
                    'title' => '我们的愿景',
                    'slug' => 'our-vision',
                    'description' => '<p>我们设想一个旅行能够促进跨文化理解和联系的世界。我们的目标是成为埃及旅游业最值得信赖的品牌——以卓越的服务、真实的体验和对可持续旅行实践的深切承诺而闻名。</p><p>到2030年，我们的目标是迎接一百万名旅行者来到埃及，每位旅行者都能带着对这片古老土地和其热情人民更深刻的理解离开。</p>',
                    'meta_title' => '我们的愿景——埃及旅游业的未来',
                    'meta_description' => '探索我们将旅行者与埃及的心灵和灵魂联系起来的愿景。',
                ],
                'zh-Hant' => [
                    'title' => '我們的願景',
                    'slug' => 'our-vision',
                    'description' => '<p>我們設想一個旅行能夠促進跨文化理解和聯繫的世界。我們的目標是成為埃及旅遊業最值得信賴的品牌——以卓越的服務、真實的體驗和對可持續旅行實踐的深切承諾而聞名。</p><p>到2030年，我們的目標是迎接一百萬名旅行者來到埃及，每位旅行者都能帶著對這片古老土地和其熱情人民更深刻的理解離開。</p>',
                    'meta_title' => '我們的願景——埃及旅遊業的未來',
                    'meta_description' => '探索我們將旅行者與埃及的心靈和靈魂聯繫起來的願景。',
                ],
            ],
            [
                'status' => 4,
                'en' => [
                    'title' => 'Our Services',
                    'slug' => 'our-services',
                    'description' => '<p>We offer a comprehensive range of travel services designed to make your Egyptian adventure seamless and unforgettable. From guided historical tours and Nile cruises to desert safaris and diving expeditions, every experience is tailored to your interests.</p><p>Our dedicated team handles all logistics — accommodation, transportation, permits, and expert guides — so you can focus on immersing yourself in the magic of Egypt.</p>',
                    'meta_title' => 'Our Services — Tours, Cruises & Safaris in Egypt',
                    'meta_description' => 'Browse our full range of Egyptian travel services including guided tours, Nile cruises, and desert adventures.',
                ],
                'zh' => [
                    'title' => '我们的服务',
                    'slug' => 'our-services',
                    'description' => '<p>我们提供全面的旅行服务，旨在让您的埃及冒险之旅无缝且难忘。从导游历史游和尼罗河游船到沙漠探险和潜水远征，每一次体验都根据您的兴趣量身定制。</p><p>我们的专职团队处理所有后勤事宜——住宿、交通、许可证和专家导游——让您可以专注于沉浸在埃及的魔力中。</p>',
                    'meta_title' => '我们的服务——埃及的旅游、游船和探险',
                    'meta_description' => '浏览我们全面的埃及旅行服务，包括导游游、尼罗河游船和沙漠探险。',
                ],
                'zh-Hant' => [
                    'title' => '我們的服務',
                    'slug' => 'our-services',
                    'description' => '<p>我們提供全面的旅行服務，旨在讓您的埃及冒險之旅無縫且難忘。從導遊歷史遊和尼羅河遊船到沙漠探險和潛水遠征，每一次體驗都根據您的興趣量身定制。</p><p>我們的專職團隊處理所有後勤事宜——住宿、交通、許可證和專家導遊——讓您可以專注於沉浸在埃及的魔力中。</p>',
                    'meta_title' => '我們的服務——埃及的旅遊、遊船和探險',
                    'meta_description' => '瀏覽我們全面的埃及旅行服務，包括導遊遊、尼羅河遊船和沙漠探險。',
                ],
            ],
            [
                'status' => 5,
                'en' => [
                    'title' => 'Meet the Team',
                    'slug' => 'meet-the-team',
                    'description' => '<p>Behind every unforgettable journey is a team of passionate professionals. Our guides are licensed Egyptologists with deep knowledge of ancient history, our operations team ensures flawless logistics, and our customer care specialists are available around the clock.</p><p>We are proud to be a diverse team of Egyptians and international experts united by a shared love for this remarkable country.</p>',
                    'meta_title' => 'Meet the Team — Expert Guides & Travel Specialists',
                    'meta_description' => 'Meet the dedicated team of Egyptologists, guides, and travel specialists behind our tours.',
                ],
                'zh' => [
                    'title' => '认识我们的团队',
                    'slug' => 'meet-the-team',
                    'description' => '<p>每一次难忘的旅程背后都有一支充满热情的专业团队。我们的导游是持牌埃及学家，对古代历史有深入了解，我们的运营团队确保 flawless 的后勤保障，我们的客户关怀专员全天候为您服务。</p><p>我们是一支由埃及人和国际专家组成的多元化团队，因对这片非凡土地的共同热爱而团结在一起。</p>',
                    'meta_title' => '认识我们的团队——专家导游和旅行专员',
                    'meta_description' => '认识我们旅游团队背后的埃及学家、导游和旅行专员。',
                ],
                'zh-Hant' => [
                    'title' => '認識我們的團隊',
                    'slug' => 'meet-the-team',
                    'description' => '<p>每一次難忘的旅程背後都有一支充滿熱情的專業團隊。我們的導遊是持牌埃及學家，對古代歷史有深入了解，我們的運營團隊確保 flawless 的後勤保障，我們的客戶關懷專員全天候為您服務。</p><p>我們是一支由埃及人和國際專家組成的多元化團隊，因對這片非凡土地的共同熱愛而團結在一起。</p>',
                    'meta_title' => '認識我們的團隊——專家導遊和旅行專員',
                    'meta_description' => '認識我們旅遊團隊背後的埃及學家、導遊和旅行專員。',
                ],
            ],
        ];
    }
}
