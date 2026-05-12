<?php

namespace Database\Seeders;

use App\Models\Question\Question;

class QuestionSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        foreach ($this->questionData() as $spec) {
            $enTitle = $spec['en']['title'];
            if ($this->translationExists(Question::class, $enTitle, 'title')) {
                $this->command->line("  skip Question: {$enTitle}");

                continue;
            }
            try {
                Question::create([
                    'en' => $spec['en'],
                    'zh' => $spec['zh'],
                    'zh-Hant' => $spec['zh-Hant'],
                ]);
                $this->command->info("  seeded Question: {$enTitle}");
            } catch (\Throwable $e) {
                $this->command->error("  Question '{$enTitle}': {$e->getMessage()}");
            }
        }
    }

    private function questionData(): array
    {
        return [
            [
                'en' => [
                    'title' => 'What is the best time to visit Egypt?',
                    'slug' => 'best-time-to-visit-egypt',
                    'description' => '<p>The best time to visit Egypt is from October to April when temperatures are milder and more comfortable for sightseeing. During these months, daytime temperatures range from 20°C to 30°C (68°F to 86°F), making it ideal for exploring pyramids, temples, and desert landscapes.</p><p>Summer months (May to September) can be extremely hot, especially in Upper Egypt (Luxor and Aswan), where temperatures often exceed 40°C (104°F). However, coastal areas like Sharm El Sheikh and Hurghada remain pleasant year-round.</p>',
                ],
                'zh' => [
                    'title' => '什么时候是访问埃及的最佳时间？',
                    'slug' => 'best-time-to-visit-egypt',
                    'description' => '<p>访问埃及的最佳时间是从10月到次年4月，此时气温较为温和，更适合观光。在这些月份，白天温度在20°C到30°C（68°F到86°F）之间，非常适合探索金字塔、神庙和沙漠景观。</p><p>夏季（5月至9月）可能非常炎热，尤其是在上埃及（卢克索和阿斯旺），温度经常超过40°C（104°F）。然而，像沙姆沙伊赫和赫尔格达这样的沿海地区全年都保持宜人。</p>',
                ],
                'zh-Hant' => [
                    'title' => '什麼時候是訪問埃及的最佳時間？',
                    'slug' => 'best-time-to-visit-egypt',
                    'description' => '<p>訪問埃及的最佳時間是從10月到次年4月，此時氣溫較為溫和，更適合觀光。在這些月份，白天溫度在20°C到30°C（68°F到86°F）之間，非常適合探索金字塔、神廟和沙漠景觀。</p><p>夏季（5月至9月）可能非常炎熱，尤其是在上埃及（盧克索和阿斯旺），溫度經常超過40°C（104°F）。然而，像沙姆沙伊赫和赫爾格達這樣的沿海地區全年都保持宜人。</p>',
                ],
            ],
            [
                'en' => [
                    'title' => 'Do I need a visa to enter Egypt?',
                    'slug' => 'visa-requirements-egypt',
                    'description' => '<p>Most travelers need a visa to enter Egypt. Citizens of many countries can obtain an e-Visa online before travel or a visa on arrival at major airports. The e-Visa is valid for 30 days and costs approximately $25 USD.</p><p>Citizens of some countries (including the USA, Canada, EU member states, and many others) are eligible for visa-free entry or visa-on-arrival. We recommend checking the latest requirements with your nearest Egyptian embassy or consulate before booking your trip.</p>',
                ],
                'zh' => [
                    'title' => '我是否需要签证才能进入埃及？',
                    'slug' => 'visa-requirements-egypt',
                    'description' => '<p>大多数旅行者需要签证才能进入埃及。许多国家的公民可以在旅行前在线申请电子签证，或在主要机场办理落地签。电子签证有效期为30天，费用约为25美元。</p><p>一些国家的公民（包括美国、加拿大、欧盟成员国等）有资格享受免签入境或落地签。我们建议您在预订行程前，向最近的埃及大使馆或领事馆查询最新要求。</p>',
                ],
                'zh-Hant' => [
                    'title' => '我是否需要簽證才能進入埃及？',
                    'slug' => 'visa-requirements-egypt',
                    'description' => '<p>大多數旅行者需要簽證才能進入埃及。許多國家的公民可以在旅行前在線申請電子簽證，或在主要機場辦理落地簽。電子簽證有效期為30天，費用約為25美元。</p><p>一些國家的公民（包括美國、加拿大、歐盟成員國等）有資格享受免簽入境或落地簽。我們建議您在預訂行程前，向最近的埃及大使館或領事館查詢最新要求。</p>',
                ],
            ],
            [
                'en' => [
                    'title' => 'Is it safe to travel in Egypt?',
                    'slug' => 'is-egypt-safe',
                    'description' => '<p>Egypt is generally safe for tourists, especially in major tourist areas such as Cairo, Luxor, Aswan, Sharm El Sheikh, and Hurghada. The Egyptian government places a high priority on tourist safety, with dedicated tourist police present at all major attractions.</p><p>As with any international travel, we recommend staying aware of your surroundings, respecting local customs, and following the guidance of your tour guide. Our team monitors travel advisories continuously and adjusts itineraries as needed to ensure your safety.</p>',
                ],
                'zh' => [
                    'title' => '在埃及旅行安全吗？',
                    'slug' => 'is-egypt-safe',
                    'description' => '<p>埃及对游客来说通常是安全的，尤其是在开罗、卢克索、阿斯旺、沙姆沙伊赫和赫尔格达等主要旅游区。埃及政府高度重视游客安全，所有主要景点都有专门的旅游警察。</p><p>与任何国际旅行一样，我们建议保持对周围环境的警觉，尊重当地习俗，并遵循导游的指导。我们的团队持续监控旅行建议，并根据需要调整行程以确保您的安全。</p>',
                ],
                'zh-Hant' => [
                    'title' => '在埃及旅行安全嗎？',
                    'slug' => 'is-egypt-safe',
                    'description' => '<p>埃及對遊客來說通常是安全的，尤其是在開羅、盧克索、阿斯旺、沙姆沙伊赫和赫爾格達等主要旅遊區。埃及政府高度重視遊客安全，所有主要景點都有專門的旅遊警察。</p><p>與任何國際旅行一樣，我們建議保持對周圍環境的警覺，尊重當地習俗，並遵循導遊的指導。我們的團隊持續監控旅行建議，並根據需要調整行程以確保您的安全。</p>',
                ],
            ],
            [
                'en' => [
                    'title' => 'What should I pack for an Egypt trip?',
                    'slug' => 'what-to-pack-egypt',
                    'description' => '<p>We recommend packing lightweight, breathable clothing in natural fabrics like cotton or linen. Modest dress is appreciated when visiting mosques and churches — shoulders and knees should be covered. A wide-brimmed hat, sunglasses, and high-SPF sunscreen are essential.</p><p>Comfortable walking shoes with good grip are a must for exploring archaeological sites. For Nile cruises and Red Sea resorts, swimwear and a light jacket for cooler evenings are recommended. Do not forget a universal power adapter and any prescription medications.</p>',
                ],
                'zh' => [
                    'title' => '去埃及旅行应该带什么？',
                    'slug' => 'what-to-pack-egypt',
                    'description' => '<p>我们建议携带轻便透气的天然面料衣物，如棉或亚麻。参观清真寺和教堂时，建议穿着端庄——肩膀和膝盖应该遮盖。宽边帽、太阳镜和高倍防晒霜是必不可少的。</p><p>探索考古遗址时，必须穿舒适且具有良好抓地力的步行鞋。对于尼罗河游船和红海度假村，建议携带泳衣和轻便夹克以应对凉爽的夜晚。不要忘记带上通用电源适配器和任何处方药。</p>',
                ],
                'zh-Hant' => [
                    'title' => '去埃及旅行應該帶什麼？',
                    'slug' => 'what-to-pack-egypt',
                    'description' => '<p>我們建議攜帶輕便透氣的天然面料衣物，如棉或亞麻。參觀清真寺和教堂時，建議穿著端莊——肩膀和膝蓋應該遮蓋。寬邊帽、太陽鏡和高倍防曬霜是必不可少的。</p><p>探索考古遺址時，必須穿舒適且具有良好抓地力的步行鞋。對於尼羅河遊船和紅海度假村，建議攜帶泳衣和輕便夾克以應對涼爽的夜晚。不要忘記帶上通用電源適配器和任何處方藥。</p>',
                ],
            ],
            [
                'en' => [
                    'title' => 'Can I customize my tour itinerary?',
                    'slug' => 'customize-tour-itinerary',
                    'description' => '<p>Absolutely! We specialize in tailor-made tours that match your interests, schedule, and budget. Whether you want to focus on ancient archaeology, Islamic architecture, Coptic heritage, Red Sea diving, or desert adventures, our team will design a personalized itinerary just for you.</p><p>Simply contact us with your preferences, travel dates, and group size, and we will craft a unique Egyptian experience that exceeds your expectations.</p>',
                ],
                'zh' => [
                    'title' => '我可以定制我的旅行行程吗？',
                    'slug' => 'customize-tour-itinerary',
                    'description' => '<p>当然可以！我们专注于根据您的兴趣、日程和预算量身定制旅行。无论您想专注于古代考古学、伊斯兰建筑、科普特遗产、红海潜水还是沙漠探险，我们的团队都将为您设计个性化行程。</p><p>只需联系我们，告知您的偏好、旅行日期和团队规模，我们将为您打造一次超越期望的独特埃及体验。</p>',
                ],
                'zh-Hant' => [
                    'title' => '我可以定制我的旅行行程嗎？',
                    'slug' => 'customize-tour-itinerary',
                    'description' => '<p>當然可以！我們專注於根據您的興趣、日程和預算量身定制旅行。無論您想專注於古代考古學、伊斯蘭建築、科普特遺產、紅海潛水還是沙漠探險，我們的團隊都將為您設計個性化行程。</p><p>只需聯繫我們，告知您的偏好、旅行日期和團隊規模，我們將為您打造一次超越期望的獨特埃及體驗。</p>',
                ],
            ],
        ];
    }
}
