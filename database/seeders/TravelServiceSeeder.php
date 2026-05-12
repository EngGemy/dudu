<?php

namespace Database\Seeders;

use App\Models\TravelService\TravelService;

class TravelServiceSeeder extends BaseTranslatableSeeder
{
    public function run(): void
    {
        $records = [
            [
                'status' => 0,
                'en' => [
                    'title' => 'Accommodation Services',
                    'slug' => 'accommodation-services',
                    'description' => '<p>We arrange handpicked hotels, resorts, and Nile cruise cabins to match every budget — from boutique guesthouses in Cairo to five-star Aswan retreats.</p><p>All properties are personally inspected to ensure comfort, cleanliness, and proximity to key attractions.</p>',
                    'meta_title' => 'Accommodation Services — Egypt Tours',
                    'meta_description' => 'Handpicked hotels and resorts across Egypt for every budget and style.',
                ],
                'zh' => [
                    'title' => '住宿服务',
                    'slug' => 'accommodation-services',
                    'description' => '<p>我们精心挑选酒店、度假村和尼罗河游船客舱，满足各种预算需求——从开罗精品客房到阿斯旺五星级度假胜地。</p><p>所有住宿均经过实地检验，确保舒适、整洁并靠近主要景点。</p>',
                    'meta_title' => '住宿服务 — 埃及旅游',
                    'meta_description' => '在埃及各地精心挑选适合各种预算的酒店和度假村。',
                ],
                'zh-Hant' => [
                    'title' => '住宿服務',
                    'slug' => 'accommodation-services',
                    'description' => '<p>我們精心挑選酒店、度假村和尼羅河遊船客艙，滿足各種預算需求——從開羅精品客房到阿斯旺五星級度假勝地。</p><p>所有住宿均經過實地檢驗，確保舒適、整潔並靠近主要景點。</p>',
                    'meta_title' => '住宿服務 — 埃及旅遊',
                    'meta_description' => '在埃及各地精心挑選適合各種預算的酒店和度假村。',
                ],
            ],
            [
                'status' => 1,
                'en' => [
                    'title' => 'Transportation Services',
                    'slug' => 'transportation-services',
                    'description' => '<p>Our fleet of modern, air-conditioned vehicles ensures comfortable transfers between airports, hotels, and attractions throughout Egypt.</p><p>All drivers are licensed, English-speaking, and experienced in navigating Egypt\'s major cities and routes.</p>',
                    'meta_title' => 'Transportation Services — Egypt Tours',
                    'meta_description' => 'Private, comfortable transportation across Egypt with experienced drivers.',
                ],
                'zh' => [
                    'title' => '交通服务',
                    'slug' => 'transportation-services',
                    'description' => '<p>我们的现代化空调车队确保在埃及各地的机场、酒店和景点之间舒适接送。</p><p>所有司机均持有执照，会说英语，并拥有在埃及主要城市和路线驾驶的丰富经验。</p>',
                    'meta_title' => '交通服务 — 埃及旅游',
                    'meta_description' => '由经验丰富的司机提供的埃及私人舒适交通服务。',
                ],
                'zh-Hant' => [
                    'title' => '交通服務',
                    'slug' => 'transportation-services',
                    'description' => '<p>我們的現代化空調車隊確保在埃及各地的機場、酒店和景點之間舒適接送。</p><p>所有司機均持有執照，會說英語，並擁有在埃及主要城市和路線駕駛的豐富經驗。</p>',
                    'meta_title' => '交通服務 — 埃及旅遊',
                    'meta_description' => '由經驗豐富的司機提供的埃及私人舒適交通服務。',
                ],
            ],
            [
                'status' => 2,
                'en' => [
                    'title' => 'Flight Reservation',
                    'slug' => 'flight-reservation',
                    'description' => '<p>We book domestic and international flights to fit your itinerary, searching across all major airlines for the best fares and most convenient departure times.</p><p>From Cairo to Luxor, Aswan, or Sharm El Sheikh, we handle every booking detail so you can focus on your journey.</p>',
                    'meta_title' => 'Flight Reservation — Egypt Tours',
                    'meta_description' => 'Domestic and international flight bookings for Egypt tours and travel.',
                ],
                'zh' => [
                    'title' => '机票预订',
                    'slug' => 'flight-reservation',
                    'description' => '<p>我们为您预订国内和国际航班，搜索所有主要航空公司的最优票价和最便利的出发时间，完美配合您的行程。</p><p>从开罗到卢克索、阿斯旺或沙姆沙伊赫，我们处理所有预订细节，让您专注于旅途体验。</p>',
                    'meta_title' => '机票预订 — 埃及旅游',
                    'meta_description' => '为埃及旅游提供国内外机票预订服务。',
                ],
                'zh-Hant' => [
                    'title' => '機票預訂',
                    'slug' => 'flight-reservation',
                    'description' => '<p>我們為您預訂國內和國際航班，搜索所有主要航空公司的最優票價和最便利的出發時間，完美配合您的行程。</p><p>從開羅到盧克索、阿斯旺或沙姆沙伊赫，我們處理所有預訂細節，讓您專注於旅途體驗。</p>',
                    'meta_title' => '機票預訂 — 埃及旅遊',
                    'meta_description' => '為埃及旅遊提供國內外機票預訂服務。',
                ],
            ],
            [
                'status' => 3,
                'en' => [
                    'title' => 'Visa Formalities',
                    'slug' => 'visa-formalities',
                    'description' => '<p>Our visa specialists guide you through every step of the Egyptian entry visa process — from gathering required documents to submitting your application online or at the embassy.</p><p>Most nationalities can obtain a tourist e-visa in minutes; we\'ll confirm your eligibility and provide a step-by-step checklist.</p>',
                    'meta_title' => 'Egypt Visa Assistance — Egypt Tours',
                    'meta_description' => 'Expert guidance on Egyptian tourist visa applications and requirements.',
                ],
                'zh' => [
                    'title' => '签证办理',
                    'slug' => 'visa-formalities',
                    'description' => '<p>我们的签证专家将引导您完成埃及入境签证的每一步流程——从收集所需文件到在线或通过大使馆提交申请。</p><p>大多数国籍的游客可在几分钟内获得旅游电子签证；我们将确认您的资格并提供逐步操作清单。</p>',
                    'meta_title' => '埃及签证协助 — 埃及旅游',
                    'meta_description' => '专业指导埃及旅游签证申请和要求。',
                ],
                'zh-Hant' => [
                    'title' => '簽證辦理',
                    'slug' => 'visa-formalities',
                    'description' => '<p>我們的簽證專家將引導您完成埃及入境簽證的每一步流程——從收集所需文件到在線或通過大使館提交申請。</p><p>大多數國籍的遊客可在幾分鐘內獲得旅遊電子簽證；我們將確認您的資格並提供逐步操作清單。</p>',
                    'meta_title' => '埃及簽證協助 — 埃及旅遊',
                    'meta_description' => '專業指導埃及旅遊簽證申請和要求。',
                ],
            ],
            [
                'status' => 4,
                'en' => [
                    'title' => 'Tour Guidance',
                    'slug' => 'tour-guidance',
                    'description' => '<p>Our licensed tour guides bring Egypt\'s history to life — from the secrets of the pyramids to the stories carved into Luxor\'s temple walls.</p><p>All guides hold official Egyptian Ministry of Tourism licenses and speak fluent English, with Mandarin-speaking guides available on request.</p>',
                    'meta_title' => 'Expert Tour Guides — Egypt Tours',
                    'meta_description' => 'Licensed English and Mandarin-speaking guides for Egypt tours and historical sites.',
                ],
                'zh' => [
                    'title' => '导游服务',
                    'slug' => 'tour-guidance',
                    'description' => '<p>我们持牌导游让埃及历史栩栩如生——从金字塔的秘密到卢克索神庙墙壁上刻写的故事。</p><p>所有导游均持有埃及旅游部颁发的正式执照，能流利地讲英语，并可根据要求安排普通话导游。</p>',
                    'meta_title' => '专业导游服务 — 埃及旅游',
                    'meta_description' => '持牌英语和普通话导游，带您游览埃及旅游景点和历史遗址。',
                ],
                'zh-Hant' => [
                    'title' => '導遊服務',
                    'slug' => 'tour-guidance',
                    'description' => '<p>我們持牌導遊讓埃及歷史栩栩如生——從金字塔的秘密到盧克索神廟牆壁上刻寫的故事。</p><p>所有導遊均持有埃及旅遊部頒發的正式執照，能流利地講英語，並可根據要求安排普通話導遊。</p>',
                    'meta_title' => '專業導遊服務 — 埃及旅遊',
                    'meta_description' => '持牌英語和普通話導遊，帶您遊覽埃及旅遊景點和歷史遺址。',
                ],
            ],
        ];

        foreach ($records as $data) {
            $enTitle = $data['en']['title'];
            if ($this->translationExists(TravelService::class, $enTitle, 'title')) {
                $this->command->line("  skip TravelService: {$enTitle}");

                continue;
            }
            try {
                TravelService::create([
                    'status' => $data['status'],
                    'main_image' => $this->getImage('travel_services_images'),
                    'en' => $data['en'],
                    'zh' => $data['zh'],
                    'zh-Hant' => $data['zh-Hant'],
                ]);
            } catch (\Throwable $e) {
                $this->command->error("  TravelService '{$enTitle}': {$e->getMessage()}");
            }
        }
    }
}
