@php
    $locale = app()->getLocale();
    $menuLabels = [
        'en' => [
            'home' => 'Home page',
            'about' => 'About us',
            'dream' => 'Dream itineraries',
            'economy' => 'Economy class',
            'business' => 'Business class',
            'first' => 'First class',
            'customize' => 'Customize your trip',
            'blog' => 'Blog',
            'contact' => 'Contact us',
            'follow' => 'Follow us',
            'language_selector' => 'Language',
            'current_language' => 'English',
        ],
        'zh' => [
            'home' => 'ä¸»é¡µ',
            'about' => 'äº†è§£æˆ‘ä»¬',
            'dream' => 'ç†æƒ³è¡Œç¨‹',
            'economy' => 'ç»æµŽèˆ±',
            'business' => 'å•†åŠ¡èˆ±',
            'first' => 'å¤´ç­‰èˆ±',
            'customize' => 'å®šåˆ¶è¡Œç¨‹',
            'blog' => 'åšå®¢',
            'contact' => 'è”ç³»æˆ‘ä»¬',
            'follow' => 'å…³æ³¨æˆ‘ä»¬',
            'language_selector' => 'è¯­è¨€',
            'current_language' => 'ç®€ä½“ä¸­æ–‡',
        ],
        'zh-Hant' => [
            'home' => 'ä¸»é ',
            'about' => 'äº†è§£æˆ‘å€‘',
            'dream' => 'ç†æƒ³è¡Œç¨‹',
            'economy' => 'ç¶“æ¿Ÿè‰™',
            'business' => 'å•†å‹™è‰™',
            'first' => 'é ­ç­‰è‰™',
            'customize' => 'å®¢è£½åŒ–æ—…ç¨‹',
            'blog' => 'éƒ¨è½æ ¼',
            'contact' => 'è¯çµ¡æˆ‘å€‘',
            'follow' => 'é—œæ³¨æˆ‘å€‘',
            'language_selector' => 'èªžè¨€',
            'current_language' => 'ç¹é«”ä¸­æ–‡',
        ],
    ];
    $labels = array_merge(__('front.site.nav'), [
        'language_selector' => __('front.site.language.selector'),
        'current_language' => __('front.site.language.current'),
    ]);
    $languageOptions = [
        'zh-Hant' => ['label' => 'ç¹é«”ä¸­æ–‡', 'native' => 'ä¸­æ–‡ï¼ˆç¹é«”å­—ï¼‰'],
        'zh' => ['label' => 'ç®€ä½“ä¸­æ–‡', 'native' => 'ä¸­æ–‡ï¼ˆç®€ä½“å­—ï¼‰'],
        'en' => ['label' => 'English', 'native' => 'English'],
    ];
    $languageOptions = [
        'zh-Hant' => ['label' => __('front.site.language.zh_hant_label'), 'native' => __('front.site.language.zh_hant_native')],
        'zh' => ['label' => __('front.site.language.zh_label'), 'native' => __('front.site.language.zh_native')],
        'en' => ['label' => __('front.site.language.en_label'), 'native' => __('front.site.language.en_native')],
    ];
    $languagePrompt = $locale === 'en'
        ? __('front.site.language.zh_hant_native')
        : __('front.site.language.en_native');
    $social = \App\Models\Social_setting::first();
    $generalSetting = \App\Models\General_setting::first();
    $wechatValue = trim((string) ($social?->wechat ?? ''));
    $lineValue = trim((string) ($social?->line ?? ''));
    $whatsappPhone = preg_replace('/\D+/', '', (string) ($generalSetting?->manager_phone ?? ''));
    $emailValue = trim((string) ($generalSetting?->email ?? ''));
    $wechatUrl = $wechatValue ? (preg_match('/^(https?:|weixin:)/i', $wechatValue) ? $wechatValue : 'weixin://dl/chat?'.$wechatValue) : route('contact');
    $lineUrl = $lineValue ? (preg_match('/^(https?:|line:)/i', $lineValue) ? $lineValue : 'https://line.me/ti/p/~'.$lineValue) : route('contact');
    $contactDockLinks = [
        ['name' => 'Wechat', 'url' => $wechatUrl, 'icon' => null, 'letter' => 'We', 'data' => $wechatValue ?: 'Add WeChat in Social Settings'],
        ['name' => 'Line', 'url' => $lineUrl, 'icon' => null, 'letter' => 'Li', 'data' => $lineValue ?: 'Add Line in Social Settings'],
        ['name' => 'WhatsApp', 'url' => $whatsappPhone ? 'https://wa.me/'.$whatsappPhone.'?text=Hello%20Doudou%20Travel' : route('contact'), 'icon' => 'whatsapp', 'letter' => null, 'data' => $whatsappPhone ?: 'Add WhatsApp phone in General Settings'],
        ['name' => 'E-mail', 'url' => $emailValue ? 'mailto:'.$emailValue : route('contact'), 'icon' => 'mail', 'letter' => null, 'data' => $emailValue ?: 'Add email in General Settings'],
    ];
    $heroSlides = [
        [
            'title' => $slider->title ?? __('front.site.sections.default_slider_title'),
            'image' => $slider->image_url ?? asset('assets/images/home-hero.jpeg'),
            'eyebrow' => __('front.site.sections.doudou'),
        ],
        [
            'title' => __('front.site.sections.dream_egypt_tour'),
            'image' => asset('assets/images/hero-bg.jpeg'),
            'eyebrow' => __('front.site.sections.egypt_tours'),
        ],
        [
            'title' => __('front.site.sections.top_egypt_destinations'),
            'image' => asset('assets/images/sub-hero-bg.jpeg'),
            'eyebrow' => __('front.site.sections.explore'),
        ],
    ];
    $serviceIconIds = ['customer-service-2', 'travel-card', 'map-pin', 'clipboard-text'];
@endphp
<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $generalSetting?->site_name ?? __('front.site.meta.default_title') }}</title>

    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://ajax.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://unpkg.com" crossorigin>

    @include('front.layouts.hreflang')
    @include('front.layouts.seo', [
        'settings' => $generalSetting,
        'seoTitle' => $generalSetting?->site_name ?? __('front.site.meta.default_title'),
        'seoDescription' => $generalSetting?->opening_words ?? __('front.site.meta.default_title'),
        'seoImage' => $generalSetting?->site_logo_header ?? asset('assets/images/logo.png'),
        'seoUrl' => route('home'),
    ])
{{--    <title>  <?php $site_name=\App\Models\General_setting::select('site_name')->first() ?> {{ $site_name->site_name}} </title>--}}
    <!-- Bootstrap font-aweasome css -->
    <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">
    <meta name="keywords" <?php  $site_name=\App\Models\General_setting::select('opening_words')->first() ?>  content=" {{$site_name->opening_words}}">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/css/spotlight.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.css"
    />
    <link rel="stylesheet" href="./assets/styles/main.css" />
    <link rel="stylesheet" href="{{asset('node_modules/select2/dist/css/select2.min.css')}}">

    <script
        defer
        src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/headroom.js@0.12.0/dist/headroom.min.js"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/preline@2.4.1/dist/preline.min.js"
    ></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <script defer src="./assets/scripts/main.js"></script>
    <style>
        .doudou-language{position:relative;display:flex;align-items:center}
        .doudou-language__button{display:inline-flex;align-items:center;gap:7px;border:1px solid rgba(255,255,255,.45);border-radius:999px;background:rgba(0,113,189,.22);color:#fff;padding:6px 12px;font-size:13px;line-height:1;box-shadow:inset 0 0 0 1px rgba(255,255,255,.08);transition:background .18s ease,border-color .18s ease}
        .doudou-language__button:hover{background:rgba(247,147,30,.92);border-color:rgba(255,255,255,.75)}
        .doudou-language__button svg{width:17px!important;height:17px!important;display:block;flex:none}
        .doudou-language__menu{position:absolute;right:0;top:calc(100% + 10px);z-index:90;min-width:210px;border:1px solid rgba(0,113,189,.14);border-radius:16px;background:rgba(255,255,255,.97);box-shadow:0 22px 55px rgba(0,40,70,.18);opacity:0;visibility:hidden;transform:translateY(8px) scale(.98);transform-origin:top right;transition:opacity .18s ease,transform .18s ease,visibility .18s ease;padding:8px;overflow:hidden}
        .doudou-language:hover .doudou-language__menu,.doudou-language:focus-within .doudou-language__menu{opacity:1;visibility:visible;transform:translateY(0)}
        .doudou-language__menu a{position:relative;display:flex;flex-direction:column;gap:2px;border-radius:12px;color:#0d2230;padding:10px 12px 10px 32px;transition:background .18s ease,color .18s ease,transform .18s ease}
        .doudou-language__menu a:before{content:"";position:absolute;left:12px;top:50%;width:8px;height:8px;border-radius:999px;background:#d1d0d0;transform:translateY(-50%);transition:background .18s ease,box-shadow .18s ease}
        .doudou-language__menu a span{font-size:14px;font-weight:700;line-height:1.15}
        .doudou-language__menu small{color:#727171;font-size:11px;line-height:1.2}
        .doudou-language__menu a:hover{background:rgba(0,113,189,.08);color:#005690;transform:translateX(-2px)}
        .doudou-language__menu a:hover:before{background:#0071bd;box-shadow:0 0 0 4px rgba(0,113,189,.12)}
        .doudou-language__menu a.is-active{background:linear-gradient(90deg,rgba(0,113,189,.14),rgba(247,147,30,.13));color:#005690}
        .doudou-language__menu a.is-active:before{background:#f7931e;box-shadow:0 0 0 4px rgba(247,147,30,.18)}
        .navbar_item{position:relative}
        .navbar_link{display:inline-flex;align-items:center;gap:7px;white-space:nowrap}
        .navbar_link svg{width:12px!important;height:12px!important;display:block;flex:none}
        .navbar_submenu{position:absolute;left:0;top:calc(100% + 8px);z-index:90;min-width:220px;border:1px solid rgba(0,113,189,.16);border-radius:8px;background:#fff;box-shadow:0 18px 40px rgba(0,0,0,.14);opacity:0;visibility:hidden;transform:translateY(8px);transition:opacity .18s ease,transform .18s ease,visibility .18s ease;padding:8px}
        .has-submenu:hover .navbar_submenu,.has-submenu:focus-within .navbar_submenu{opacity:1;visibility:visible;transform:translateY(0)}
        .navbar_submenu a{display:block;border-radius:6px;padding:10px 12px;color:#0d2230;font-size:14px}
        .navbar_submenu a:hover{background:#0071bd;color:#fff}
        .navbar_desktop>form,.navbar_mobile .hs-dropdown.group{display:none!important}
        .navbar_desktop{justify-content:space-between}
        .hero{position:relative;overflow:hidden;isolation:isolate}
        .hero:before{content:"";position:absolute;inset:0;z-index:2;background:linear-gradient(90deg,rgba(0,26,44,.76),rgba(0,40,70,.28) 48%,rgba(0,26,44,.48));pointer-events:none}
        .hero:after{content:"";position:absolute;left:0;right:0;bottom:0;z-index:3;height:32%;background:linear-gradient(0deg,rgba(0,0,0,.28),transparent);pointer-events:none}
        .hero .container{position:relative;z-index:4}
        .hero_content{position:relative;min-height:220px;max-width:820px}
        .hero-copy{position:absolute;left:0;right:0;bottom:0;opacity:0;transform:translateY(24px);animation:heroCopy 18s infinite}
        .hero-copy:nth-child(2){animation-delay:6s}
        .hero-copy:nth-child(3){animation-delay:12s}
        .hero-kicker{display:inline-flex;align-items:center;gap:10px;margin-bottom:18px;border:1px solid rgba(255,255,255,.28);border-radius:999px;background:rgba(255,255,255,.12);backdrop-filter:blur(10px);padding:8px 14px;color:#fff;font-size:13px;font-weight:800;letter-spacing:.04em;text-transform:uppercase}
        .hero-kicker:before{content:"";width:8px;height:8px;border-radius:50%;background:#f7931e;box-shadow:0 0 0 6px rgba(247,147,30,.22)}
        .hero_content h1,.hero_content .hero-copy p{max-width:760px;font-size:clamp(38px,4vw,68px);line-height:1.05;font-weight:600}
        .hero-slider{position:absolute;inset:0;z-index:1;overflow:hidden;background:#0d2230}
        .hero-slide{position:absolute;inset:0;opacity:0;animation:heroFade 18s infinite}
        .hero-slide:nth-child(2){animation-delay:6s}
        .hero-slide:nth-child(3){animation-delay:12s}
        .hero-slide img{width:100%;height:100%;object-fit:cover;filter:saturate(1.08) contrast(1.05);transform:scale(1.08);animation:heroZoom 18s infinite}
        .hero-slide:nth-child(2) img{animation-delay:6s}
        .hero-slide:nth-child(3) img{animation-delay:12s}
        .hero-progress{position:absolute;left:50%;bottom:36px;z-index:5;display:flex;width:min(420px,calc(100% - 40px));transform:translateX(-50%);gap:8px}
        .hero-progress span{position:relative;height:3px;flex:1;overflow:hidden;border-radius:999px;background:rgba(255,255,255,.28)}
        .hero-progress span:before{content:"";position:absolute;inset:0;background:#f7931e;transform-origin:left;transform:scaleX(0);animation:heroProgress 18s infinite}
        .hero-progress span:nth-child(2):before{animation-delay:6s}
        .hero-progress span:nth-child(3):before{animation-delay:12s}
        .hero:hover .hero-slide,.hero:hover .hero-slide img,.hero:hover .hero-copy,.hero:hover .hero-progress span:before,
        .hero:focus-within .hero-slide,.hero:focus-within .hero-slide img,.hero:focus-within .hero-copy,.hero:focus-within .hero-progress span:before{animation-play-state:paused}
        @keyframes heroFade{0%,27%{opacity:1}33%,100%{opacity:0}}
        @keyframes heroZoom{0%{transform:scale(1.08)}33%,100%{transform:scale(1)}}
        @keyframes heroCopy{0%,4%{opacity:0;transform:translateY(24px)}8%,27%{opacity:1;transform:translateY(0)}33%,100%{opacity:0;transform:translateY(-14px)}}
        @keyframes heroProgress{0%{transform:scaleX(0)}27%{transform:scaleX(1)}33%,100%{transform:scaleX(0)}}
        .doudou-service-card{text-align:center}
        .doudou-service-icon{display:inline-flex;width:58px;height:58px;align-items:center;justify-content:center;margin:0 auto 14px;border-radius:18px;background:linear-gradient(135deg,#0071bd,#0d2230);color:#fff;box-shadow:0 16px 34px rgba(0,40,70,.2);transition:transform .22s ease,box-shadow .22s ease,background .22s ease}
        .doudou-service-icon svg{width:30px;height:30px;display:block;fill:currentColor}
        .doudou-service-card:hover .doudou-service-icon{transform:translateY(-4px);background:linear-gradient(135deg,#f7931e,#0071bd);box-shadow:0 18px 38px rgba(0,40,70,.25)}
        @media (prefers-reduced-motion: reduce){.hero-slide,.hero-slide img,.hero-progress span:before,.hero-copy{animation:none}.hero-slide:first-child,.hero-copy:first-child{opacity:1;transform:none}.hero-progress{display:none}}
        @media (max-width: 767px){.hero{min-height:62vh;padding-top:9.5rem}.hero_content{min-height:180px}.hero_content h1,.hero_content .hero-copy p{font-size:38px}.hero-kicker{font-size:11px;margin-bottom:14px}.hero-progress{bottom:22px;width:calc(100% - 32px)}}
    </style>
</head>

<body>
<div class="app">
    <header class="page-header">
        @include('front.layouts.header')

        <div class="hero">
            <div class="hero-slider" aria-hidden="true">
                @foreach($heroSlides as $slide)
                    <div class="hero-slide">
                        <img src="{{ $slide['image'] }}" alt="" />
                    </div>
                @endforeach
            </div>
            <div class="container">
                <div class="hero_content">
                    @foreach($heroSlides as $slide)
                        <div class="hero-copy">
                            <span class="hero-kicker">{{ $slide['eyebrow'] }}</span>
                            @if($loop->first)
                                <h1 class="txt-shadow">{{ $slide['title'] }}</h1>
                            @else
                                <p class="txt-shadow text-white">{{ $slide['title'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hero-progress" aria-hidden="true">
                @foreach($heroSlides as $slide)
                    <span></span>
                @endforeach
            </div>
        </div>
    </header>

    <main>

        @if(isset($services) && $services->count())
            <section class="bg-primary/85 py-12 text-white lg:py-16">
                <div class="container">
                    <header class="section_header text-center" data-aos="fade-up">
                        <h2 class="section_heading">{{ __('front.site.sections.what_is_doudou') }}</h2>
                    </header>

                    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4 lg:gap-10">
                        @foreach ($services as $service)
                            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                                <div class="doudou-service-card">
                                    <span class="doudou-service-icon" aria-hidden="true">
                                        <svg>
                                            <use href="./assets/images/icons/sprite.svg#{{ $serviceIconIds[$loop->index % count($serviceIconIds)] }}"></use>
                                        </svg>
                                    </span>
                                    <h3 class="mb-4 text-2xl font-semibold text-secondary">{{ $service->title }}</h3>
                                </div>
                                <p class="line-clamp-3 leading-relaxed">
                                    {!! implode(' ', array_slice(str_word_count(strip_tags($service->description), 1), 0, 15)) !!} ...
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section id="egypt-tour-opp">
            <div class="container">
                <header
                    data-aos="fade-up"
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.sections.egypt_tours_opportunities') }}
                    </h2>

                    <div class="flex items-center gap-4 max-lg:ms-auto">
                        <a href="{{route('egypt-tours')}}" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

                        <menu class="flex items-center gap-2">
                            <li>
                                <button type="button" class="swiper-btn prev">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-left"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="swiper-btn next">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-right"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                        </menu>
                    </div>
                </header>

                <div class="swiper overflow-visible">
                    <div class="swiper-wrapper">
                        @foreach ($tours as $tour)
                            <div class="swiper-slide">
                                <a href="{{route('tour_details',$tour->slug)}}" class="card">
                                    <figure>
                                        <img src="{{ $tour->photo}}" alt="tour" />
                                    </figure>

                                    <figcaption>
                                        <h3>{{ $tour->name}}</h3>
                                        <p>
                                            {!! implode(' ', array_slice(str_word_count(strip_tags($tour->description), 1), 0, 20)) !!}
                                        </p>
                                        <span>{{ __('front.site.sections.view_deal') }}</span>
                                    </figcaption>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-5 lg:mt-10">
                    <img
                        src="./assets/images/section-divider.png"
                        class="pointer-events-none mx-auto w-full lg:w-4/5"
                        alt=""
                    />
                </div>
            </div>
        </section>

        <section id="egypt-tour-dest">
            <div class="container">
                <header
                    data-aos="fade-up"
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.sections.top_egypt_destinations') }}
                    </h2>

                    <div class="flex items-center gap-4 max-lg:ms-auto">
                        <a href="{{route('egypt-tours')}}" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

                        <menu class="flex items-center gap-2">
                            <li>
                                <button type="button" class="swiper-btn prev">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-left"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="swiper-btn next">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-right"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                        </menu>
                    </div>
                </header>

                <div class="swiper overflow-visible">
                    <div class="swiper-wrapper">
                        @foreach ($cities as $city)
                            <div class="swiper-slide">
                                <a href="{{route('egypt-tours')}}" class="card">
                                    <figure>
                                        <img src="{{ $city->image_url}}" alt="city" />
                                    </figure>

                                    <figcaption>
                                        <h3>{{ $city->translate(app()->getLocale(), true)->name ?? '—' }}</h3>
                                    </figcaption>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-5 lg:mt-10">
                    <img
                        src="./assets/images/section-divider.png"
                        class="pointer-events-none mx-auto w-full lg:w-4/5"
                        alt=""
                    />
                </div>
            </div>
        </section>

        <section id="blog">
            <div class="container">
                <header
                    data-aos="fade-up"
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.learn') }}</span> {{ __('front.site.sections.more_about_egyptian_culture') }}
                    </h2>

                    <div class="flex items-center gap-4 max-lg:ms-auto">
                        <a href="{{route('blogs')}}" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

                        <menu class="flex items-center gap-2">
                            <li>
                                <button type="button" class="swiper-btn prev">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-left"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="swiper-btn next">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-right"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                        </menu>
                    </div>
                </header>

                <div class="swiper swiper-lg overflow-visible">
                    <div class="swiper-wrapper">
                        @foreach ($blogs as $blog )

                            <div class="swiper-slide">
                                <article class="tour-card">
                                    <div class="tour-card__thumbnail-wrapper">
                                        <a href="{{route('blog_preview',$blog->slug)}}"> <img
                                            src="{{ $blog->image_url}}"
                                            class="tour-card__thumbnail"
                                            alt=""
                                        /></a>
                                    </div>

                                    <div class="tour-card__content">
                                       <a href="{{route('blog_preview',$blog->slug)}}"> <h3>{{ $blog->title}}</h3></a>

                                        <ul class="tour-card__features">
                                            <li>
                                                <svg class="icon">
                                                    <use
                                                        href="{{asset('assets/images/icons/sprite.svg#calendar-date')}}"
                                                    ></use>
                                                </svg>
                                                {{ $blog->getFormattedDate()}}
                                            </li>
                                        </ul>

                                        <p class="tour-card__desc">
                                            {{-- {!!$blog->description!!} --}}
                                            {!! implode(' ', array_slice(str_word_count(strip_tags($blog->description), 1), 0, 20)) !!}
                                        </p>


                                        <div class="tour-card__footer">
                                            <p>
                                                {{ __('front.site.sections.published_by') }}
                                                <a href="#">{{ __('front.site.sections.doudou_team') }}</a>
                                            </p>

                                            <a href="{{route('blog_preview',$blog->slug)}}" class="tour-card__link">{{ __('front.site.sections.read_more') }}</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-5 lg:mt-10">
                    <img
                        src="./assets/images/section-divider.png"
                        class="pointer-events-none mx-auto w-full lg:w-4/5"
                        alt=""
                    />
                </div>
            </div>
        </section>

        <section id="videos">
            <div class="container">
                <header
                    data-aos="fade-up"
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.popular') }}</span> {{ __('front.site.sections.videos') }}
                    </h2>

                    <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>
                </header>

                <div class="items-start lg:grid lg:grid-cols-8 lg:gap-8">
                    <div class="h-[400px] max-lg:mb-8 lg:col-span-6 lg:h-[600px]">
                        <div
                            class="swiper videos h-full w-full"
                            data-aos="zoom-in"
                            data-aos-delay="400"
                            data-aos-duration="600"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($popular_videos as $popular_video)

                                <div class="swiper-slide h-full">
                                    <div
                                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                                    >
                                        @php
                                            if($popular_video){
                                                $url = getYoutubeId($popular_video->link);
                                               $sub= getYoutubeThumbnail($popular_video->link);
                                                }else{
                                               $url='';
                                                }
                                        @endphp
                                        <img
                                            src="{{$sub}}"
                                            class="h-full w-full object-cover object-center"
                                            alt=""
                                        />


                                        <div
                                            class="absolute inset-x-0 top-0 flex items-center gap-4 p-8 lg:p-10"
                                        >
                                            <div
                                                class="flex size-12 shrink-0 items-center justify-center  "
                                            >
                                                <img

                                                    src="{{$sub}}"

                                                    class="size-8 object-contain object-center justify-center rounded-full"
                                                    alt=""
                                                />
                                            </div>
                                            <p class="font-semibold text-white">
                                                {{$popular_video->title}}
                                            </p>

                                        </div>

                                        <button type="button" class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                                                onclick="openPopup('{{$url}}')">
                                            <img src="./assets/images/icons/play.svg" alt="" />
                                        </button>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <div
                        class="flex h-[150px] flex-col gap-4 lg:col-span-2 lg:h-[600px] lg:flex-row lg:gap-6"
                        data-aos="zoom-in"
                        data-aos-delay="400"
                        data-aos-duration="600"
                    >
                        <div class="swiper thumbs h-full w-full flex-1">
                            <div class="swiper-wrapper h-full">
                                @foreach ($popular_videos as $popular_video)
                                <div class="swiper-slide h-full cursor-pointer">
                                    <div
                                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                                    >
                                        @php
                                            if($popular_video){
                                                $url = getYoutubeId($popular_video->link);
                                               $sub= getYoutubeThumbnail($popular_video->link);
                                                }else{
                                               $url='';
                                                }
                                        @endphp
                                        <img
                                            src="{{$sub}}"
                                            class="h-full w-full object-cover object-center"
                                            alt=""
                                        />

                                       <div
                                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-6"
                                        >
                                          <div
                                            class="flex size-10 shrink-0 items-center justify-center  "
                                          >
                                            <img
                                              src="{{$sub}}"
                                              class="size-8 object-contain object-center"
                                              alt=""
                                            />
                                          </div>
                                          <p class="font-semibold text-white">
                                           {{$popular_video->title}}
                                          </p>
                                        </div>

                                        <button type="button" class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                                                onclick="openPopup('{{$url}}')">
                                            <img src="./assets/images/icons/play.svg" alt="" />
                                        </button>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                        <menu
                            class="thumbs-arrows flex items-center justify-center gap-12 lg:flex-col"
                        >
                            <li>
                                <button type="button" class="swiper-btn prev lg:rotate-90">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-left"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="swiper-btn next lg:rotate-90">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#arrow-right"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                        </menu>
                    </div>
                </div>
                <div id="video-popup" class="video-popup">
                    <div class="video-popup-content">
                        <span class="close" onclick="closePopup()">&times;</span>
                        <iframe id="video-iframe" width="620" height="410" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="mt-5 lg:mt-10"></div>
            </div>
        </section>

        <x-general-comment-component />

        <section id="gallery">
            <div class="container">
                <header
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.sections.gallery_packages') }}
                    </h2>

                    <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>
                </header>

                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach ($gallary_packages as $gallary_package)

                            <div class="swiper-slide">
                                <img
                                    src="{{$gallary_package->photo}}"
                                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                                    alt=""
                                />
                            </div>
                        @endforeach
                    </div>

                    <button
                        type="button"
                        class="swiper-btn prev absolute left-0 top-1/2 z-20 -translate-y-1/2 lg:left-1/4"
                    >
                        <svg>
                            <use href="./assets/images/icons/sprite.svg#arrow-left"></use>
                        </svg>
                    </button>
                    <button
                        type="button"
                        class="swiper-btn next absolute right-0 top-1/2 z-20 -translate-y-1/2 lg:right-1/4"
                    >
                        <svg>
                            <use
                                href="./assets/images/icons/sprite.svg#arrow-right"
                            ></use>
                        </svg>
                    </button>
                </div>

                <div class="mt-5 lg:mt-10">
                    <img
                        src="./assets/images/section-divider.png"
                        class="pointer-events-none mx-auto w-full lg:w-4/5"
                        alt=""
                    />
                </div>
            </div>
        </section>

        <x-community-gallery :posts="$communityPosts ?? collect()" />

        <section>
            <div class="container">
                <header class="section_header">
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.frequently') }}</span> {{ __('front.site.sections.asked_questions') }}
                    </h2>
                </header>

                <div class="hs-accordion-group space-y-2">
                    <x-question-component/>
                </div>

                <div class="mt-6 text-center">
                    <a href="{{route('faq')}}" class="text-lg text-secondary underline">{{ __('front.site.sections.show_more') }}</a>
                </div>
            </div>
        </section>

        <section id="partners" class="pb-20 pt-12 lg:pb-32">
            <div class="container">
                <header class="section_header">
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.doudou') }}</span> {{ __('front.site.sections.partners') }}
                    </h2>
                </header>

                <div class="flex items-center gap-6">
              <span class="rounded-full bg-white/70">
                <button type="button" class="swiper-btn prev shrink-0">
                  <svg>
                    <use
                        href="./assets/images/icons/sprite.svg#arrow-left"
                    ></use>
                  </svg>
                </button>
              </span>

                    <div class="swiper flex-1">
                        <div class="swiper-wrapper">
                            <x-doudou-partner-compoenet/>
                        </div>
                    </div>

                    <span class="rounded-full bg-white/70">
                <button type="button" class="swiper-btn next shrink-0">
                  <svg>
                    <use
                        href="./assets/images/icons/sprite.svg#arrow-right"
                    ></use>
                  </svg>
                </button>
              </span>
                </div>

                <div class="mt-5 lg:mt-10"></div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <x-footer-component/>
    <button
        type="button"
        id="BackToTop"
        class="back-to-top start"
        onclick="lenis.scrollTo('body')"
    >
        <svg>
            <use href="./assets/images/icons/sprite.svg#back-to-top"></use>
        </svg>
    </button>
</div>

<!-- modals -->
<div
    id="customize-tour"
    class="hs-overlay fixed start-0 top-0 z-[100] hidden size-full overflow-y-auto overflow-x-hidden hs-overlay-backdrop-open:bg-black/50"
>
    <div
        class="m-3 mt-0 flex min-h-[calc(100%-3.5rem)] items-center opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-[550px]"
    >
        <div class="flex w-full flex-col overflow-hidden rounded-3xl bg-white">
            <div
                class="flex items-center justify-between bg-primary px-6 py-5"
                style="background: linear-gradient(90deg, #005690 0%, #0071bd 100%)"
            >
                <h3 class="text-lg font-semibold text-white lg:text-xl">
                    {{ __('front.site.form.customize_your_own_tour') }}
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#customize-tour"
                >
                    <span class="sr-only">{{ __('front.site.form.close') }}</span>
                    <svg
                        class="size-5 shrink-0 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>

            <!-- Stepper -->
            <div
                data-hs-stepper
                class="overflow-y-auto overflow-x-hidden px-6 py-8 max-lg:max-h-[35rem]"
                data-lenis-prevent
            >
                <ul
                    class="relative mx-auto flex max-w-[225px] flex-row gap-x-2 hs-stepper-completed:hidden"
                >
                    <li
                        class="group flex-1 shrink basis-0"
                        data-hs-stepper-nav-item='{ "index": 1 }'
                    >
                        <div
                            class="inline-flex min-h-7 w-full min-w-7 items-center align-middle text-xs"
                        >
                  <span
                      class="flex size-7 flex-shrink-0 items-center justify-center rounded-full bg-secondary font-medium text-white group-focus:bg-gray-200"
                  >
                    <span
                        class="hs-stepper-success:hidden hs-stepper-completed:hidden"
                    >1</span
                    >
                    <svg
                        class="hidden size-3 flex-shrink-0 text-white hs-stepper-success:block"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                      <polyline points="20 6 9 17 4 12" />
                    </svg>
                  </span>
                            <div
                                class="ms-2 h-0.5 w-full flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-secondary"
                            ></div>
                        </div>
                    </li>
                    <li
                        class="group shrink basis-0"
                        data-hs-stepper-nav-item='{ "index": 2 }'
                    >
                        <div
                            class="inline-flex min-h-7 w-full min-w-7 items-center align-middle text-xs"
                        >
                  <span
                      class="flex size-7 flex-shrink-0 items-center justify-center rounded-full border border-gray font-medium text-gray hs-stepper-active:border-secondary hs-stepper-active:bg-secondary hs-stepper-active:text-white hs-stepper-success:border-secondary hs-stepper-success:bg-secondary"
                  >
                    <span
                        class="hs-stepper-success:hidden hs-stepper-completed:hidden"
                    >2</span
                    >
                    <svg
                        class="hidden size-3 flex-shrink-0 text-white hs-stepper-success:block"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                      <polyline points="20 6 9 17 4 12" />
                    </svg>
                  </span>
                        </div>
                    </li>
                </ul>

                <div class="mt-5 sm:mt-8">
                    <!-- First Contnet -->
                    <div id="myElement1"  data-hs-stepper-content-item='{ "index": 1 }'>
                        <p class="mb-8 flex items-center gap-2">
                  <span
                      class="inline-flex size-7 items-center justify-center rounded-full bg-secondary text-white"
                  >1</span
                  >
                            <span class="text-lg font-semibold text-primary lg:text-xl"
                            >{{ __('front.site.form.your_information') }}</span
                            >
                        </p>

                        <form id="bookingForm" class="form w-full">
                            <div class="space-y-6">
                                <div class="flex gap-2">
                                    <div class="relative max-w-[80px] shrink-0">
                                        <label

                                            for="title"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.title') }}</label
                                        >
                                        <select
                                            onchange="checkInputs()"
                                            required
                                            id="title"
                                            type="text"
                                            name="title"
                                            class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option value="0">{{ __('front.site.form.mr') }}</option>
                                            <option value="1">{{ __('front.site.form.ms') }}</option>
                                        </select>
                                    </div>
                                    <div class="relative flex-1">
                                        <label

                                            for="name"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.name') }}</label
                                        >
                                        <input
                                            oninput="checkInputs()"
                                            required
                                            id="name"
                                            name="name"
                                            type="text"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        />
                                        <span class="invalid text-danger" id="name_error"></span>

                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="email"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.email') }}</label
                                        >
                                        <input
                                            oninput="checkInputs()"
                                            required
                                            id="email"
                                            type="text"
                                            name="email"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_email') }}"

                                        />
                                        <span class="invalid text-danger" id="email_error"></span>
                                    </div>
                                    <div class="relative shrink-0 lg:max-w-[180px]">
                                        <label
                                            for="nationality"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.nationality') }}</label
                                        >
                                        <select
                                            onchange="checkInputs()"
                                            required
                                            id="nationality"
                                            type="text"
                                            name="nationality"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option hidden>{{ __('front.site.form.your_nationality') }}</option>
                                            @foreach($nationalities as $nationality)
                                            <option value="{{$nationality->id}}">{{$nationality->title}}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid text-danger" id="nationality_error"></span>

                                    </div>
                                </div>
                                <div
                                    class="relative flex-1 rounded-xl border border-primary px-4 py-3"
                                >
                                    <label
                                        for="tel"
                                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                    >{{ __('front.site.form.phone_number') }}</label
                                    >
                                    <div class="flex items-center gap-3">
                                        <select
                                            onchange="checkInputs()"
                                            required
                                            id="phone-country-select"
                                            name="countries"
                                            class="flex-1 text-black outline-none placeholder:text-gray"
                                        >
                                            @include('front.layouts.nationalities')
                                        </select>
                                        <input
                                            oninput="checkInputs()"
                                            required
                                            id="tel"
                                            type="text"
                                            name="phone"
                                            class="flex-1 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.enter_phone_number') }}"
                                        /><br>


                                    </div>

                                </div>
                                <span class="invalid text-danger" id="tel_error"></span>
                            </div>
                        </form>
                    </div>
                    <!-- End First Contnet -->

                    <!-- Second Contnet -->
                    <div id="myElement2"
                        data-hs-stepper-content-item='{ "index": 2 }'
                        style="display: none"
                    >
                        <p class="mb-8 flex items-center gap-4 lg:gap-2">
                  <span
                      class="inline-flex size-7 items-center justify-center rounded-full bg-secondary text-white"
                  >2</span
                  >
                            <span class="text-lg font-semibold text-primary lg:text-xl"
                            >{{ __('front.site.form.tour_information') }}</span
                            >
                        </p>

                        <form class="form w-full">
                            <div class="space-y-6">
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="arrival-date"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.arrival_date') }}</label
                                        >
                                        <input
                                            id="arrival-date"
                                            type="month"
                                            name="arrival_date"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        />
                                        <span class="invalid text-danger" id="arrival-date_error"></span>
                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="departure-date"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.departure_date') }}</label
                                        >
                                        <input
                                            id="departure-date"
                                            type="month"
                                            name="departure_date"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        />
                                        <span class="invalid text-danger" id="departure-date_error"></span>

                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <!-- <label
                                            for="destination"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.your_destination') }}</label
                                        >
                                        <select
                                            id="destination"
                                            type="text"
                                            name ='city_id'
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Your City"
                                        >
                                            <option value="" disabled selected>{{ __('front.site.contact.your_city') }}</option>
                                            @foreach ($cities as $city )
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select> -->
                                         <div class="relative">
                                            <div class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base">
                                                <label for="destination" class="">{{ __('front.site.form.your_destination') }}</label>
                                            </div>
                                            <div id="selected-options" class="flex flex-wrap gap-2 p-2 w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"></div>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <select id="destination" name="city_id" multiple class="hidden">
                                                <option value="" disabled>{{ __('front.site.form.select_destination') }}</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="dropdown-options" class="absolute z-20 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto hidden mt-1"></div>
                                        </div>
                                        <span class="invalid text-danger" id="destination_error"></span>

                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="accommodation"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.accommodation_tour') }}</label
                                        >
                                        <select
                                            id="accommodation"
                                            type="text"

                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option value="" disabled selected>{{ __('front.site.form.select_accommodation_tour') }}</option>
                                            @foreach ($tours as $tour )
                                                <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="invalid text-danger" id="accommodation_error"></span>

                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-2 lg:flex-row">
                                    <div class="relative w-full flex-1">
                                        <label
                                            for="age"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.age_range_optional') }}</label
                                        >
                                        <select
                                            id="age"
                                            type="text"
                                            name="range_age"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option value="" disabled selected>{{ __('front.site.form.select_age_range') }}</option>
                                            <option value="0">AGE_1_TO_10</option>
                                            <option value="1">AGE_11_TO_20</option>
                                            <option value="2">AGE_21_TO_30</option>                                        </select>
                                    </div>
                                    <div class="flex w-full flex-1 justify-center gap-x-4">
                                        <div class="flex-1">
                                            <p class="mb-2 text-center text-primary">{{ __('front.site.form.adults') }}</p>
                                            <div class="flex items-center justify-center gap-4">
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                    onclick="changeCount('adults', 1)"
                                                >
                                                    +
                                                </button>
                                                <span class="text-black" id="adults-count" name="adt">1</span>
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                    onclick="changeCount('adults', -1)"
                                                >
                                                    -
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <p class="mb-2 text-center text-primary">{{ __('front.site.form.children') }}</p>
                                            <div class="flex items-center justify-center gap-4">
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                     onclick="changeCount('children', 1)"
                                                >
                                                    +
                                                </button>
                                                <span class="text-black" id="children-count" name="chd">1</span>
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                    onclick="changeCount('children', -1)"
                                                >
                                                    -
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative flex-1">
                                    <label
                                        for="notes"
                                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                    >{{ __('front.site.form.requests') }}</label
                                    >
                                    <textarea
                                        id="notes"
                                        type="date"
                                        name="notes"
                                        class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        placeholder="{{ __('front.site.form.requests_placeholder') }}"
                                        rows="4"
                                    ></textarea>
                                </div>

                                <div class="relative flex-1">
                                    <label
                                        for="file"
                                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                    >{{ __('front.site.form.your_tour_program') }} <span class="text-gray text-xs">({{ __('front.site.form.optional') }})</span></label
                                    >
                                    <input
                                        id="file"
                                        type="file"
                                        name="file"
                                        class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                    >
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Second Contnet -->

                    <!-- Final Contnet -->
                    <div
                        id="myElement3"

                        class="text-center"
                        style="display: none"
                    >
                        <img
                            src="./assets/images/icons/approve.png"
                            class="mx-auto mb-4 max-w-40"
                            alt=""
                        />
                        <p class="text-2xl text-primary lg:text-3xl">
                            {{ __('front.site.form.inquire_received') }}
                        </p>
                        <p class="mb-7 lg:mb-10 lg:text-lg">
                            {{ __('front.site.form.inquire_success') }}
                        </p>

                        <x-social-links variant="primary" class="justify-center" />
                    </div>
                    <!-- End Final Contnet -->

                    <!-- Button Group -->
                    <div class="mt-5 flex items-center justify-center gap-x-4">
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-back-btn
                            id="backButton"
                        >
                            {{ __('front.site.form.back') }}
                        </button>
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-next-btn
                            id="nextButton"
                            disabled
                            onclick="submitFormsFirst()"
                        >
                            {{ __('front.site.form.next') }}
                        </button>
                        <button
                            type="button"
                            onclick="submitForms()"
                            class="inline-block min-w-36 rounded-lg border border-transparent bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-finish-btn
                            id="Inquire"
                            style="display: none"
                        >
                            {{ __('front.site.form.inquire_now') }}
                        </button>
                    </div>
                    <!-- End Button Group -->
                </div>
            </div>
            <!-- End Stepper -->

            <img
                src="./assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

<div
    id="customer-service"
    class="hs-overlay fixed start-0 top-0 z-[100] hidden size-full overflow-y-auto overflow-x-hidden hs-overlay-backdrop-open:bg-black/50"
>
    <div
        class="m-3 mt-0 flex min-h-[calc(100%-3.5rem)] items-center opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-[550px]"
    >
        <div class="flex w-full flex-col overflow-hidden rounded-3xl bg-white">
            <div
                class="flex items-center justify-between bg-primary px-6 py-5"
                style="background: linear-gradient(90deg, #005690 0%, #0071bd 100%)"
            >
                <h3 class="text-lg font-semibold text-white lg:text-xl">
                    {{ __('front.site.form.contact_us') }}
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#customer-service"
                >
                    <span class="sr-only">{{ __('front.site.form.close') }}</span>
                    <svg
                        class="size-5 shrink-0 text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-6 py-8">
                <div>
                    <p class="mb-2 text-center text-sm">
                        {{ __('front.site.form.contact_issue') }}
                        <span class="text-primary">{{ __('front.site.form.contact_directly_by') }}</span>
                    </p>
                    <div
                        class="mb-6 flex flex-col items-center justify-center gap-x-4 gap-y-2 lg:flex-row"
                    >
                        <?php  $site_name=\App\Models\General_setting::first() ?>
                        <a href="https://wa.me/{{$site_name->manager_phone}}?text=Hello%20there" target="_blank"
                           class="flex items-center gap-1 text-sm"
                        >
                            <svg class="size-5 text-primary">
                                <use href="./assets/images/icons/sprite.svg#whatsapp"></use>
                            </svg>
                            {{$site_name->manager_phone}}
                        </a>
                        <a
                            href="mailto:{{$site_name->email}}"

                            class="flex items-center gap-1 text-sm"
                        >
                            <svg class="size-5 text-primary">
                                <use href="./assets/images/icons/sprite.svg#mail"></use>
                            </svg>
                            {{$site_name->email}}
                        </a>
                    </div>
                    <x-social-links variant="primary" class="justify-center" />
                </div>
            </div>

            <img
                src="./assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

<!-- js -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- https://refreshless.com/nouislider/ -->
<script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.js"></script>
<script>
    function budgetSlider(el) {
        const sliderWrapper = document.querySelector(el);
        if (!sliderWrapper) return;
        const slider = sliderWrapper.querySelector(".slider");
        const minEl = sliderWrapper.querySelector(".slider-min");
        const maxEl = sliderWrapper.querySelector(".slider-max");
        if (!slider || !minEl || !maxEl) return;
        noUiSlider.create(slider, {
            start: [1, 10000],
            connect: true,
            range: { min: 0, max: 10000 },
        });
        const minInput = sliderWrapper.querySelector("#min");
        const maxInput = sliderWrapper.querySelector("#max");
        slider.noUiSlider.on("update", (values) => {
            minEl.textContent = Math.round(values[0]);
            maxEl.textContent = Math.round(values[1]);
            if (minInput) minInput.value = Math.round(values[0]);
            if (maxInput) maxInput.value = Math.round(values[1]);
        });
    }
    budgetSlider("#slider-1");
    budgetSlider("#slider-2");
    budgetSlider("#slider-3");
</script>

<!-- https://flatpickr.js.org/getting-started/ -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#range", {
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
        disable: [
            function (date) {
                return !(date.getDate() % 8);
            },
        ],
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // recommended-tours
    new Swiper("#recommended-tours .swiper-lg", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            768: {
                slidesPerView: 2.25,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3.15,
                spaceBetween: 25,
            },
        },
        navigation: {
            nextEl: "#recommended-tours header .next",
            prevEl: "#recommended-tours header .prev",
        },
    });
    const tourCards = document.querySelectorAll(".tour-card");
    tourCards.forEach((card) => {
        new Swiper(card.querySelector(".swiper-sm"), {
            slidesPerView: 1,
            spaceBetween: 2,
            navigation: {
                nextEl: card.querySelector(".next"),
                prevEl: card.querySelector(".prev"),
            },
        });
    });

    // egypt-tour-opp
    new Swiper("#egypt-tour-opp .swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            768: {
                slidesPerView: 1.25,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 2.25,
                spaceBetween: 25,
            },
        },
        navigation: {
            nextEl: "#egypt-tour-opp .next",
            prevEl: "#egypt-tour-opp .prev",
        },
    });

    // egypt-tour-dest
    new Swiper("#egypt-tour-dest .swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            768: {
                slidesPerView: 2.25,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3.5,
                spaceBetween: 25,
            },
        },
        navigation: {
            nextEl: "#egypt-tour-dest .next",
            prevEl: "#egypt-tour-dest .prev",
        },
    });

    // blog
    new Swiper("#blog .swiper-lg", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            768: {
                slidesPerView: 2.25,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3.15,
                spaceBetween: 25,
            },
        },
        navigation: {
            nextEl: "#blog header .next",
            prevEl: "#blog header .prev",
        },
    });

    // video-thumbs
    const sliderThumbs = new Swiper(".swiper.thumbs", {
        direction: "vertical",
        slidesPerView: 3,
        spaceBetween: 24,
        navigation: {
            nextEl: ".thumbs-arrows .next",
            prevEl: ".thumbs-arrows .prev",
        },
        freeMode: false,
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 10,
                direction: "horizontal",
            },
            768: {
                direction: "vertical",
                slidesPerView: 3,
                spaceBetween: 24,
            },
        },
    });
    const sliderImages = new Swiper(".swiper.videos", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: false,
        grabCursor: false,
        thumbs: {
            swiper: sliderThumbs,
        },
        breakpoints: {
            0: {
                direction: "horizontal",
            },
            768: {
                direction: "vertical",
            },
        },
    });

    // reviews
    new Swiper("#reviews .swiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        breakpoints: {
            1024: {
                slidesPerView: 2,
            },
        },

        navigation: {
            nextEl: "#reviews .next",
            prevEl: "#reviews .prev",
        },
    });

    // gallery
    new Swiper("#gallery .swiper", {
        effect: "coverflow",
        // loop: true,
        grabCursor: false,
        centeredSlides: true,
        slidesPerView: 1.25,
        allowTouchMove: false,
        breakpoints: {
            1024: {
                slidesPerView: 2.25,
                spaceBetween: 25,
            },
        },
        coverflowEffect: {
            rotate: 0,
            stretch: 100,
            depth: 200,
            modifier: 2,
            scale: 1,
            slideShadows: true,
        },
        navigation: {
            nextEl: "#gallery .next",
            prevEl: "#gallery .prev",
        },
    });

    // Partners
    new Swiper("#partners .swiper", {
        spaceBetween: 40,
        grabCursor: true,
        a11y: false,
        freeMode: true,
        speed: 11000,
        loop: true,
        slidesPerView: "auto",
        autoplay: {
            delay: 0.5,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: {
                spaceBetween: 30,
            },
            480: {
                spaceBetween: 30,
            },
            767: {
                spaceBetween: 40,
            },
            992: {
                spaceBetween: 40,
            },
        },
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function initializeSwipers() {
        const tourCards = document.querySelectorAll(".tour-card");
        tourCards.forEach((card) => {
            new Swiper(card.querySelector(".swiper-sm"), {
                slidesPerView: 1,
                spaceBetween: 2,
                navigation: {
                    nextEl: card.querySelector(".next"),
                    prevEl: card.querySelector(".prev"),
                },
            });
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const hotelButtons = document.querySelectorAll(".hotel-rate");

        hotelButtons.forEach(function (button) {
            button.addEventListener("click", function () {

                const selectedHotel = document.getElementById("selectedHotel");
                selectedHotel.textContent = this.textContent;

                // Set the selected hotel rate as a data attribute of the form
                const selectedHotelRate = this.getAttribute("data-rate");
                document.getElementById("searchForm").setAttribute("data-selected-hotel", selectedHotelRate);
            });
        });
    });

    function filterTable() {
        // Prevent default form submission
        event.preventDefault();
        // var formData = $('#searchForm').serialize();
        var checkInCheckOut = document.getElementById("range").value;
        var selectedHotel = document.getElementById("selectedHotel").textContent;
        var selectedHotelRate = document.getElementById("searchForm").getAttribute("data-selected-hotel");

        var minPrice = document.getElementById('slider-min').textContent;
        var maxPrice = document.getElementById('slider-max').textContent;



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '{{ route('search') }}',
            data: {
                checkInCheckOut: checkInCheckOut ,
                selectedHotel: selectedHotel,
                selectedHotelRate: selectedHotelRate,
                minPrice: minPrice,
                maxPrice: maxPrice
            },
            success: function(data) {
                // $('#recommand_tours').html(data.output);
                // console.log(data.output);
                // initializeSwipers();


            },
            error: function(xhr, status, error) {
                // Handle errors here
                console.log(error);
            }
        });
    }
    // Initialize Swipers on page load
    document.addEventListener('DOMContentLoaded', function() {
        initializeSwipers();
    });


</script>

<script>
    function validateFirstForm() {
        // Clear previous error messages
        $('.invalid').text('');

        var formData = {
            title: document.getElementById('title').value,
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            nationality: document.getElementById('nationality').value,
            phone: document.getElementById('tel').value
        };

        var nextButton = document.getElementById('nextButton');

        const stepper = HSStepper.getInstance('stepper');

        $.ajax({
            url: "{{ route('validate.first.form') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                if (response.status === true) {
                    console.log(response);
                    console.log('Form submitted successfully');

                    // Enable the "Next" button
                    // var stepper = new Stepper(document.querySelector('#stepper'));
                    stepper.goToNext();
                    // Enable the "Next" button
                    // nextButton.setAttribute('data-hs-stepper-next-btn', '');
                    // nextButton.classList.remove('pointer-events-none');
                } else {
                    console.log(response);
                    console.log('Form submission failed');
                    // Disable the "Next" button
                    // nextButton.removeAttribute('data-hs-stepper-next-btn');
                    // nextButton.classList.add('pointer-events-none');
                    nextButton.disabled = true;
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                stepper.disableButtons();
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    // Display errors next to each input field
                    $.each(errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });

                    // Disable the "Next" button
                    nextButton.removeAttribute('data-hs-stepper-next-btn');
                    nextButton.classList.add('pointer-events-none');
                }
            }
        });
    }
</script>



<script>


</script>

<script>
    function validateFirstForm() {
        // Clear previous error messages
        $('.invalid').text('');

        var formData = {
            title: document.getElementById('title').value,
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            nationality: document.getElementById('nationality').value,
            phone: document.getElementById('tel').value
        };

        var nextButton = document.getElementById('nextButton');

        const stepper = HSStepper.getInstance('stepper');

        $.ajax({
            url: "{{ route('validate.first.form') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                if (response.status === true) {
                    console.log(response);
                    console.log('Form submitted successfully');

                    // Enable the "Next" button
                    // var stepper = new Stepper(document.querySelector('#stepper'));
                    stepper.goToNext();
                    // Enable the "Next" button
                    // nextButton.setAttribute('data-hs-stepper-next-btn', '');
                    // nextButton.classList.remove('pointer-events-none');
                } else {
                    console.log(response);
                    console.log('Form submission failed');
                    // Disable the "Next" button
                    // nextButton.removeAttribute('data-hs-stepper-next-btn');
                    // nextButton.classList.add('pointer-events-none');
                    nextButton.disabled = true;
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                stepper.disableButtons();
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;

                    // Display errors next to each input field
                    $.each(errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });

                    // Disable the "Next" button
                    nextButton.removeAttribute('data-hs-stepper-next-btn');
                    nextButton.classList.add('pointer-events-none');
                }
            }
        });
    }
</script>



<script>
    function submitFormsFirst() {
        var data = {
            title: document.getElementById('title').value,
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            nationality: document.getElementById('nationality').value,
            phone: document.getElementById('tel').value,


            // Add other form fields as needed
        };



        if(validateFormFirst() === false){
            // const steps = document.querySelectorAll('[data-hs-stepper-content-item]');
            // let currentStep = 0;
            //
            // function showStep(stepIndex) {
            //     steps.forEach((step, index) => {
            //         step.classList.toggle('active', index === stepIndex);
            //     });
            // }
            //
            // document.querySelectorAll('[data-hs-stepper-back-btn]').forEach((button) => {
            //
            //     button.addEventListener('click', () => {
            //         if (currentStep > 0) {
            //             currentStep--;
            //             showStep(1);
            //         }
            //     });
            // });


            // const myElement2 = document.getElementById('myElement2');
            // myElement2.style.display = 'none';
            const myElement = document.getElementById('myElement1');
            myElement.style.display = 'block';
            const myElement2 = document.getElementById('myElement2');
            myElement2.style.display = 'none';
            const myElement3 = document.getElementById('myElement3');
            myElement3.style.display = 'none';
            // // const customize_tour = document.getElementById('customize-tour');
            // // customize_tour.style.display = 'none'
            // const myElement = document.getElementById('myElement1');
            // myElement.style.display = 'block';
            // // var nextButton = document.getElementById('nextButton');
            // // nextButton.style.display = 'block';
            // var Inquire = document.getElementById('Inquire');
            // Inquire.style.display = 'none';

            return 0;
        }






    }
    function validateFormFirst() {
        let isValid = true;

        // Reset validation errors
        document.querySelectorAll('.text-danger').forEach(error => error.textContent = '');

        // Validate Name
        const nameInput = document.getElementById('name');
        if (nameInput.value.trim() === '') {
            document.getElementById('name_error').textContent = @json(__('front.site.form.validation_name_required'));
            isValid = false;
        }

        // Validate Email
        const emailInput = document.getElementById('email');
        if (emailInput.value.trim() === '') {
            document.getElementById('email_error').textContent = @json(__('front.site.form.validation_email_required'));
            isValid = false;
        }

        // Validate Nationality
        const nationalityInput = document.getElementById('nationality');
        if (nationalityInput.value === '0' || nationalityInput.value.trim() === '') {
            document.getElementById('nationality_error').textContent = @json(__('front.site.form.validation_nationality_required'));
            isValid = false;
        }

        // Validate Phone Number
        const telInput = document.getElementById('tel');
        if (telInput.value.trim() === '') {
            document.getElementById('tel_error').textContent = @json(__('front.site.form.validation_phone_required'));
            isValid = false;
        }

        return isValid;
    }

    function submitForms() {
        var data = {
            title: document.getElementById('title').value,
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            nationality: document.getElementById('nationality').value,
            phone: document.getElementById('tel').value,
            arrival_date: document.getElementById('arrival-date').value,
            departure_date: document.getElementById('departure-date').value,
            city_id: document.getElementById('destination').value,
            tour_id: document.getElementById('accommodation').value,
            range_age: document.getElementById('age').value,
            notes: document.getElementById('notes').value,
            adt: document.getElementById('adults-count').textContent,
            chd: document.getElementById('children-count').textContent,

            // Add other form fields as needed
        };



        if(validateForm() === false){
            // const steps = document.querySelectorAll('[data-hs-stepper-content-item]');
            // let currentStep = 0;
            //
            // function showStep(stepIndex) {
            //     steps.forEach((step, index) => {
            //         step.classList.toggle('active', index === stepIndex);
            //     });
            // }
            //
            // document.querySelectorAll('[data-hs-stepper-back-btn]').forEach((button) => {
            //
            //     button.addEventListener('click', () => {
            //         if (currentStep > 0) {
            //             currentStep--;
            //             showStep(1);
            //         }
            //     });
            // });


            // const myElement2 = document.getElementById('myElement2');
            // myElement2.style.display = 'none';
            const myElement3 = document.getElementById('myElement3');
            myElement3.style.display = 'none';
            // // const customize_tour = document.getElementById('customize-tour');
            // // customize_tour.style.display = 'none'
            // const myElement = document.getElementById('myElement1');
            // myElement.style.display = 'block';
            // // var nextButton = document.getElementById('nextButton');
            // // nextButton.style.display = 'block';
            // var Inquire = document.getElementById('Inquire');
            // Inquire.style.display = 'none';

            return 0;
        }




				var formData = new FormData();
				for (var key in data) {

					formData.append(key, data[key]);
				}
				formData.append('file', document.getElementById('file').files[0]);

        // Optionally, you can validate formData here before sending it via AJAX

        $.ajax({
            url: "{{ route('bookings.store') }}", // Replace with your route URL
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
						processData: false,
						contentType: false,
            success: function(response) {

                const myElement2 = document.getElementById('myElement2');
                myElement2.style.display = 'none';

                // // const customize_tour = document.getElementById('customize-tour');
                // // customize_tour.style.display = 'none'
                const myElement = document.getElementById('myElement1');
                myElement.style.display = 'none';
                var nextButton = document.getElementById('nextButton');
                nextButton.style.display = 'none';
                var backButton = document.getElementById('backButton');
                nextButton.style.display = 'none';Inquire
                var Inquire = document.getElementById('Inquire');
                nextButton.style.display = 'none';
                const myElement3 = document.getElementById('myElement3');
                myElement3.setAttribute('data-hs-stepper-content-item', '{ "isFinal": true }');
                myElement3.style.display = 'block';

                // document.getElementById('secondForm').style.display = 'none';
                // document.getElementById('finalStep').style.display = 'block';
            },
            error: function(xhr, status, error) {
                alert('no')
                console.error(xhr.responseText); // Log error response
                // Optionally, show an error message to the user
            }
        });
    }
    function validateForm() {
        let isValid = true;

        // Reset validation errors
        document.querySelectorAll('.text-danger').forEach(error => error.textContent = '');

        // Validate Name
        const nameInput = document.getElementById('name');
        if (nameInput.value.trim() === '') {
            document.getElementById('name_error').textContent = @json(__('front.site.form.validation_name_required'));
            isValid = false;
        }

        // Validate Email
        const emailInput = document.getElementById('email');
        if (emailInput.value.trim() === '') {
            document.getElementById('email_error').textContent = @json(__('front.site.form.validation_email_required'));
            isValid = false;
        }

        // Validate Nationality
        const nationalityInput = document.getElementById('nationality');
        if (nationalityInput.value === '0' || nationalityInput.value.trim() === '') {
            document.getElementById('nationality_error').textContent = @json(__('front.site.form.validation_nationality_required'));
            isValid = false;
        }

        // Validate Phone Number
        const telInput = document.getElementById('tel');
        if (telInput.value.trim() === '') {
            document.getElementById('tel_error').textContent = @json(__('front.site.form.validation_phone_required'));
            isValid = false;
        }
        const departure_date = document.getElementById('departure-date');
        if (departure_date.value.trim() === '') {
            document.getElementById('departure-date').textContent = @json(__('front.site.form.validation_departure_required'));
            isValid = false;
        }

        const arrival_date = document.getElementById('arrival-date');
        if (arrival_date.value.trim() === '') {
            document.getElementById('arrival-date_error').textContent = @json(__('front.site.form.validation_arrival_required'));
            isValid = false;
        }
        const city_id = document.getElementById('destination');
        if (city_id.value === '') {
            document.getElementById('destination_error').textContent = @json(__('front.site.form.destination_required'));

            isValid = false;
        }
        const tour_id = document.getElementById('accommodation');
        if (tour_id.value.trim() === '') {
            document.getElementById('accommodation_error').textContent = @json(__('front.site.form.validation_accommodation_required'));
            isValid = false;
        }
        const range_age = document.getElementById('age');
        if (range_age.value.trim() === '') {
            document.getElementById('age_error').textContent = @json(__('front.site.form.validation_age_required'));
            isValid = false;
        }
        const notes = document.getElementById('notes');
        if (range_age.value.trim() === '') {
            document.getElementById('notes_error').textContent = @json(__('front.site.form.validation_notes_required'));
            isValid = false;
        }
        const adt = document.getElementById('adults-count');
        if (adt.value === '') {
            document.getElementById('adults-count_error').textContent = @json(__('front.site.form.validation_adults_required'));
            isValid = false;
        }
        const chd = document.getElementById('children-count');
        if (chd.value === '') {
            document.getElementById('children-count_error').textContent = @json(__('front.site.form.validation_children_required'));
            isValid = false;
        }
        return isValid;
    }
</script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('destination');
            const selectedOptions = document.getElementById('selected-options');
            const dropdownOptions = document.getElementById('dropdown-options');

            function createBadge(value, text) {
                const badge = document.createElement('span');
                badge.className = 'inline-flex items-center px-2 py-1 border rounded-full text-xs font-medium bg-white/70 text-primary';
                badge.innerHTML = `
                    ${text}
                    <button type="button" class="flex-shrink-0 ml-1 h-4 w-4 rounded-full inline-flex items-center justify-center text-blue-400 hover:bg-blue-200 hover:text-blue-500 focus:outline-none focus:bg-blue-500 focus:text-white">

                        <svg version="1.1" class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve">
                    <g><g><g><path fill="#000000" d="M16,11c-4.1,1.8-6.4,6.4-5.5,11.2c0.4,2.1,6.2,8.2,52,54l51.7,51.7l-51.7,51.7c-56,56.1-53.2,52.9-52.1,58.6c0.6,2.9,4.5,6.8,7.4,7.4c5.6,1,2.5,3.9,58.6-52.1l51.7-51.7l51.7,51.7c56,56,52.8,53.2,58.5,52.1c2.9-0.6,6.8-4.5,7.4-7.4c1-5.6,3.9-2.5-52.1-58.6L141.8,128l51.7-51.7c56-56,53.2-52.8,52.1-58.5c-0.6-2.9-4.5-6.8-7.4-7.4c-5.6-1-2.5-3.9-58.6,52.1L128,114.2L76.6,62.8C47.8,34,24.4,11.1,23.5,10.8C21.1,9.9,18.3,10,16,11z"/></g></g></g>
                    </svg>
                    </button>
                `;
                badge.querySelector('button').addEventListener('click', () => removeBadge(value));
                return badge;
            }

            function removeBadge(value) {
                const option = select.querySelector(`option[value="${value}"]`);
                option.selected = false;
                updateSelectedOptions();
                updateDropdownOptions();
            }

            function updateSelectedOptions() {
                selectedOptions.innerHTML = '';
                Array.from(select.selectedOptions).forEach(option => {
                    selectedOptions.appendChild(createBadge(option.value, option.text));
                });
                if (select.selectedOptions.length === 0) {
                    selectedOptions.innerHTML = '<span class="text-gray-400">@lang("front.site.form.select_accommodation_to")</span>';
                }
            }

            function updateDropdownOptions() {
                dropdownOptions.innerHTML = '';
                Array.from(select.options).forEach(option => {
                    if (!option.selected && option.value !== "") {
                        const div = document.createElement('div');
                        div.className = 'p-2 hover:bg-gray-100 cursor-pointer';
                        div.textContent = option.text;
                        div.addEventListener('click', () => {
                            option.selected = true;
                            updateSelectedOptions();
                            updateDropdownOptions();
                        });
                        dropdownOptions.appendChild(div);
                    }
                });
            }

            selectedOptions.addEventListener('click', () => {
                dropdownOptions.classList.toggle('hidden');
            });

            document.addEventListener('click', (e) => {
                if (!selectedOptions.contains(e.target) && !dropdownOptions.contains(e.target)) {
                    dropdownOptions.classList.add('hidden');
                }
            });

            updateSelectedOptions();
            updateDropdownOptions();
        });
    </script>

    <script>
        function changeCount(type, delta) {
            const countElement = document.getElementById(type + '-count');
            let currentCount = parseInt(countElement.textContent);
            currentCount += delta;
            if (currentCount < 0) currentCount = 0; // prevent negative counts
            countElement.textContent = currentCount;
        }
    </script>
<script src="{{asset('node_modules/select2/dist/js/select2.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#selectedHotel').select2({
            placeholder: @json(__('front.site.search.choose_hotels')),
            allowClear: true, // Adds a clear button


        });
        $('#selectedHotels').select2({
            placeholder: @json(__('front.site.search.choose_hotels')),
            allowClear: true, // Adds a clear button


        });

    });
</script>
<script>
    function checkInputs() {
        var nextButton = document.getElementById('nextButton');

       if(validateFormFirst() == false){

           nextButton.disabled =true ;
       }else {

           nextButton.disabled =false ;
       }
    }

    // Set default phone country based on locale
    document.addEventListener('DOMContentLoaded', function () {
        var phoneSelect = document.getElementById('phone-country-select');
        if (phoneSelect) {
            var locale = @json(app()->getLocale());
            var defaultCode = (locale === 'zh' || locale === 'zh-Hant') ? '86' : '20';
            for (var i = 0; i < phoneSelect.options.length; i++) {
                if (phoneSelect.options[i].value === defaultCode) {
                    phoneSelect.selectedIndex = i;
                    break;
                }
            }
        }
    });
</script>
<script>
    function openPopup(videoId) {
        var iframe = document.getElementById('video-iframe');
        iframe.src = 'https://www.youtube.com/embed/' + videoId;
        document.getElementById('video-popup').style.display = 'block';
        document.addEventListener('click', outsideClickHandler);
    }

    function closePopup() {
        var iframe = document.getElementById('video-iframe');
        iframe.src = '';
        document.getElementById('video-popup').style.display = 'none';
        document.removeEventListener('click', outsideClickHandler);
    }
    function outsideClickHandler(event) {
        var videoPopup = document.getElementById('video-popup');
        if (videoPopup.contains(event.target)) {
            closePopup();
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
</body>
</html>
