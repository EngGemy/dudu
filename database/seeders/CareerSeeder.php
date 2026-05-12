<?php

namespace Database\Seeders;

use App\Models\Career\Career;

class CareerSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        foreach ($this->careerData() as $spec) {
            $enTitle = $spec['en']['title'];
            if ($this->translationExists(Career::class, $enTitle, 'title')) {
                $this->command->line("  skip Career: {$enTitle}");

                continue;
            }
            try {
                Career::create([
                    'image' => $this->getImage('career'),
                    'status' => $spec['status'],
                    'meta_img' => $this->getImage('career'),
                    'en' => $spec['en'],
                    'zh' => $spec['zh'],
                    'zh-Hant' => $spec['zh-Hant'],
                ]);
                $this->command->info("  seeded Career: {$enTitle}");
            } catch (\Throwable $e) {
                $this->command->error("  Career '{$enTitle}': {$e->getMessage()}");
            }
        }
    }

    private function careerData(): array
    {
        return [
            [
                'status' => 0,
                'en' => [
                    'title' => 'Join Our Team',
                    'slug' => 'join-our-team',
                    'description' => '<p>We are always looking for passionate individuals who share our love for Egypt and travel. Whether you are an experienced Egyptologist, a multilingual guide, a digital marketing expert, or an operations specialist, we would love to hear from you.</p><p>Working with us means being part of a dynamic team that creates life-changing travel experiences. We offer competitive salaries, professional development opportunities, and the chance to explore Egypt like never before.</p>',
                    'meta_title' => 'Careers — Join Our Team in Egyptian Tourism',
                    'meta_description' => 'Explore career opportunities with our Egyptian travel company. We are hiring guides, marketers, and operations specialists.',
                ],
                'zh' => [
                    'title' => '加入我们的团队',
                    'slug' => 'join-our-team',
                    'description' => '<p>我们一直在寻找热爱埃及和旅行的充满热情的人。无论您是经验丰富的埃及学家、多语言导游、数字营销专家还是运营专员，我们都很期待收到您的来信。</p><p>与我们一起工作意味着成为一支创造改变人生旅行体验的活力团队的一员。我们提供有竞争力的薪资、专业发展机会以及前所未有地探索埃及的机会。</p>',
                    'meta_title' => '招聘——加入我们的埃及旅游业团队',
                    'meta_description' => '探索我们埃及旅行公司的职业机会。我们正在招聘导游、营销人员和运营专员。',
                ],
                'zh-Hant' => [
                    'title' => '加入我們的團隊',
                    'slug' => 'join-our-team',
                    'description' => '<p>我們一直在尋找熱愛埃及和旅行的充滿熱情的人。無論您是經驗豐富的埃及學家、多語言導遊、數字營銷專家還是運營專員，我們都很期待收到您的來信。</p><p>與我們一起工作意味著成為一支創造改變人生旅行體驗的活力團隊的一員。我們提供有競爭力的薪資、專業發展機會以及前所未有地探索埃及的機會。</p>',
                    'meta_title' => '招聘——加入我們的埃及旅遊業團隊',
                    'meta_description' => '探索我們埃及旅行公司的職業機會。我們正在招聘導遊、營銷人員和運營專員。',
                ],
            ],
            [
                'status' => 1,
                'en' => [
                    'title' => 'Tour Guide — Cairo and Giza',
                    'slug' => 'tour-guide-cairo-giza',
                    'description' => '<p>We are seeking an enthusiastic and knowledgeable tour guide to lead groups through the iconic sites of Cairo and Giza. The ideal candidate holds a license from the Egyptian Ministry of Tourism, speaks fluent English (additional languages are a plus), and has a genuine passion for sharing Egypt rich history.</p><p>Responsibilities include leading daily tours, providing historical context and storytelling, ensuring guest safety and satisfaction, and collaborating with our operations team to deliver seamless experiences.</p>',
                    'meta_title' => 'Tour Guide Job — Cairo and Giza Archaeological Sites',
                    'meta_description' => 'Apply for our Tour Guide position in Cairo and Giza. Licensed Egyptologists and multilingual guides preferred.',
                ],
                'zh' => [
                    'title' => '导游——开罗和吉萨',
                    'slug' => 'tour-guide-cairo-giza',
                    'description' => '<p>我们正在寻找一位热情且知识渊博的导游，带领团队游览开罗和吉萨的标志性景点。理想的候选人持有埃及旅游部的执照，流利的英语（会其他语言是加分项），并对分享埃及丰富历史有真正的热情。</p><p>职责包括带领每日旅游团、提供历史背景和故事讲述、确保客人安全和满意，以及与我们的运营团队合作提供无缝体验。</p>',
                    'meta_title' => '导游职位——开罗和吉萨考古遗址',
                    'meta_description' => '申请我们在开罗和吉萨的导游职位。优先考虑持牌埃及学家和多语言导游。',
                ],
                'zh-Hant' => [
                    'title' => '導遊——開羅和吉薩',
                    'slug' => 'tour-guide-cairo-giza',
                    'description' => '<p>我們正在尋找一位熱情且知識淵博的導遊，帶領團隊遊覽開羅和吉薩的標誌性景點。理想的候選人持有埃及旅遊部的執照，流利的英語（會其他語言是加分項），並對分享埃及豐富歷史有真正的熱情。</p><p>職責包括帶領每日旅遊團、提供歷史背景和故事講述、確保客人安全和滿意，以及與我們的運營團隊合作提供無縫體驗。</p>',
                    'meta_title' => '導遊職位——開羅和吉薩考古遺址',
                    'meta_description' => '申請我們在開羅和吉薩的導遊職位。優先考慮持牌埃及學家和多語言導遊。',
                ],
            ],
            [
                'status' => 1,
                'en' => [
                    'title' => 'Digital Marketing Specialist',
                    'slug' => 'digital-marketing-specialist',
                    'description' => '<p>We are looking for a creative Digital Marketing Specialist to grow our online presence and attract travelers from around the world. You will manage our social media channels, create engaging content, run targeted ad campaigns, and analyze performance metrics.</p><p>The ideal candidate has experience in travel or hospitality marketing, strong written communication skills, and proficiency in tools like Meta Ads Manager, Google Analytics, and Canva. Experience with Chinese social media platforms (WeChat, Xiaohongshu) is a major advantage.</p>',
                    'meta_title' => 'Digital Marketing Specialist — Travel and Tourism',
                    'meta_description' => 'Join our team as a Digital Marketing Specialist. Manage social media, content, and campaigns for an Egyptian travel brand.',
                ],
                'zh' => [
                    'title' => '数字营销专员',
                    'slug' => 'digital-marketing-specialist',
                    'description' => '<p>我们正在寻找一位富有创意的数字营销专员，以扩大我们的在线影响力并吸引来自世界各地的旅行者。您将管理我们的社交媒体渠道、创建引人入胜的内容、运行定向广告活动并分析绩效指标。</p><p>理想的候选人具有旅游或酒店营销经验、强大的书面沟通技能，并熟练使用Meta广告管理器、谷歌分析和Canva等工具。有中国社交媒体平台（微信、小红书）经验是重大优势。</p>',
                    'meta_title' => '数字营销专员——旅游和旅游业',
                    'meta_description' => '加入我们的团队担任数字营销专员。为埃及旅游品牌管理社交媒体、内容和营销活动。',
                ],
                'zh-Hant' => [
                    'title' => '數字營銷專員',
                    'slug' => 'digital-marketing-specialist',
                    'description' => '<p>我們正在尋找一位富有創意的數字營銷專員，以擴大我們的在線影響力並吸引來自世界各地的旅行者。您將管理我們的社交媒體渠道、創建引人入勝的內容、運行定向廣告活動並分析績效指標。</p><p>理想的候選人具有旅遊或酒店營銷經驗、強大的書面溝通技能，並熟練使用Meta廣告管理器、谷歌分析和Canva等工具。有中國社交媒體平台（微信、小紅書）經驗是重大優勢。</p>',
                    'meta_title' => '數字營銷專員——旅遊和旅遊業',
                    'meta_description' => '加入我們的團隊擔任數字營銷專員。為埃及旅遊品牌管理社交媒體、內容和營銷活動。',
                ],
            ],
            [
                'status' => 1,
                'en' => [
                    'title' => 'Travel Operations Coordinator',
                    'slug' => 'travel-operations-coordinator',
                    'description' => '<p>We are hiring a detail-oriented Travel Operations Coordinator to manage tour logistics, vendor relationships, and guest communications. You will be the behind-the-scenes hero who ensures every tour runs smoothly from start to finish.</p><p>Responsibilities include booking accommodations and transportation, coordinating with local guides and drivers, handling guest inquiries and special requests, and troubleshooting any issues that arise during tours. Strong organizational skills and fluency in English are required.</p>',
                    'meta_title' => 'Travel Operations Coordinator — Egypt Tours',
                    'meta_description' => 'Apply for our Travel Operations Coordinator role. Manage logistics, vendors, and guest communications for Egypt tours.',
                ],
                'zh' => [
                    'title' => '旅行运营协调员',
                    'slug' => 'travel-operations-coordinator',
                    'description' => '<p>我们正在招聘一位注重细节的旅行运营协调员，负责管理旅游后勤、供应商关系和客人沟通。您将是确保每次旅行从头到尾顺利运行的幕后英雄。</p><p>职责包括预订住宿和交通、与当地导游和司机协调、处理客人咨询和特殊要求，以及解决旅行期间出现的任何问题。需要强大的组织技能和流利的英语。</p>',
                    'meta_title' => '旅行运营协调员——埃及旅游',
                    'meta_description' => '申请我们的旅行运营协调员职位。管理埃及旅游的物流、供应商和客人沟通。',
                ],
                'zh-Hant' => [
                    'title' => '旅行運營協調員',
                    'slug' => 'travel-operations-coordinator',
                    'description' => '<p>我們正在招聘一位注重細節的旅行運營協調員，負責管理旅遊後勤、供應商關係和客人溝通。您將是確保每次旅行從頭到尾順利運行的幕後英雄。</p><p>職責包括預訂住宿和交通、與當地導遊和司機協調、處理客人諮詢和特殊要求，以及解決旅行期間出現的任何問題。需要強大的組織技能和流利的英語。</p>',
                    'meta_title' => '旅行運營協調員——埃及旅遊',
                    'meta_description' => '申請我們的旅行運營協調員職位。管理埃及旅遊的物流、供應商和客人溝通。',
                ],
            ],
        ];
    }
}
