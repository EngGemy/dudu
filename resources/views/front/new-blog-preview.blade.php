<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('front.site.meta.default_title') }}</title>

    @include('front.layouts.hreflang')
    <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/css/spotlight.min.css"
    />
    {{--    <link rel="stylesheet" href="./assets/styles/main.css" />--}}
    <link rel="stylesheet" href="{{asset('node_modules/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/main.css')}}" />


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
    {{--    <script defer src="./assets/scripts/main.js"></script>--}}
    <script defer src="{{asset('assets/scripts/main.js')}}"></script>
</head>

<body>
<div class="app">
    <nav id="headroom" class="navbar_nav primary hidden">
        <div class="container">
            @include('front.layouts.nav-list')
        </div>
    </nav>

    <header class="page-header">
        <div class="navbar" style="position: static !important">
            <div class="container">
                <div class="navbar_top">
                    <?php  $site_name=\App\Models\General_setting::first() ?>

                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/{{$site_name->manager_phone}}?text=Hello%20there">
                            <svg class="size-5 text-white">
                                <use href="{{asset('assets/images/icons/sprite.svg#whatsapp')}}"></use>
                            </svg>
                        </a>
                        <a href="{{route('contact')}}">
                            <svg class="size-5 text-white">
                                <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>
                            </svg>
                        </a>
                    </div>

                    <div class="flex items-center gap-4 lg:gap-10">
                        <div class="flex items-center gap-2">
                            <svg class="size-5 text-white">
                                <use href="{{asset('assets/images/icons/sprite.svg#clock')}}"></use>
                            </svg>
                            <span class="text-sm text-white"
                            >{{ __('front.site.nav.cairo') }} : <span id="time">{{time()}}</span></span
                            >
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="size-5 text-white">
                                <use
                                    href="{{asset('assets/images/icons/sprite.svg#cloud-sun')}}"
                                ></use>
                            </svg>
                            <span class="text-sm text-white">: 15 OC/ 60 OF</span>
                        </div>
                    @include('front.layouts.lang-switcher')
                    </div>
                </div>
            </div>

            <nav class="navbar_nav primary">
                <div class="container">
                    @include('front.layouts.nav-list')
                </div>
            </nav>

            <div class="navbar_desktop">
                <a href="{{route('home')}}">
                    <img
                        src="{{header_logo()}}"  class="logo" alt="" /></a>

                <form action="{{route('tour_search')}}" method="get" class="travel-search-form">
                    <div class="travel-search-bar">
                        <div class="search-input-wrap">
                            <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </svg>
                            <input
                                type="text"
                                name="search"
                                class="search-input"
                                placeholder="{{ __('front.site.nav.search_placeholder') }}"
                                value="{{ request('search') }}"
                            />
                        </div>
                        <div class="search-divider"></div>
                        <div class="search-date-wrap">
                            <svg class="date-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            <input
                                id="range"
                                type="text"
                                name="checkIn_checkOut"
                                class="flatpickr flatpickr-input search-date"
                                placeholder="Dates"
                            />
                        </div>
                        <button type="submit" class="search-btn">
                            <span class="btn-text">{{ __('front.site.search.search') }}</span>
                            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <style>
                .travel-search-form { width: 100%; max-width: 720px; }
                .travel-search-bar {
                    display: flex;
                    align-items: center;
                    background: #fff;
                    border-radius: 16px;
                    box-shadow: 0 4px 24px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.04);
                    padding: 6px;
                    gap: 4px;
                    transition: box-shadow 0.3s ease, transform 0.3s ease;
                }
                .travel-search-bar:hover {
                    box-shadow: 0 8px 32px rgba(0,0,0,0.12), 0 2px 4px rgba(0,0,0,0.06);
                    transform: translateY(-1px);
                }
                .search-input-wrap {
                    flex: 1;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    padding: 0 14px;
                }
                .search-icon, .date-icon {
                    width: 20px;
                    height: 20px;
                    color: #f97316;
                    flex-shrink: 0;
                    transition: transform 0.3s ease;
                }
                .search-input-wrap:focus-within .search-icon {
                    transform: scale(1.15);
                }
                .search-input {
                    width: 100%;
                    border: none;
                    background: transparent;
                    font-size: 15px;
                    color: #111;
                    outline: none;
                    padding: 10px 0;
                }
                .search-input::placeholder { color: #9ca3af; }
                .search-divider {
                    width: 1px;
                    height: 28px;
                    background: #e5e7eb;
                    flex-shrink: 0;
                }
                .search-date-wrap {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    padding: 0 14px;
                    flex-shrink: 0;
                }
                .search-date {
                    width: 130px;
                    border: none;
                    background: transparent;
                    font-size: 14px;
                    color: #111;
                    outline: none;
                    cursor: pointer;
                }
                .search-date::placeholder { color: #9ca3af; }
                .search-btn {
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
                    color: #fff;
                    border: none;
                    border-radius: 12px;
                    padding: 12px 24px;
                    font-size: 15px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                    position: relative;
                    overflow: hidden;
                }
                .search-btn::before {
                    content: '';
                    position: absolute;
                    inset: 0;
                    background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
                    opacity: 0;
                    transition: opacity 0.3s ease;
                }
                .search-btn:hover::before { opacity: 1; }
                .search-btn:hover {
                    box-shadow: 0 4px 16px rgba(249, 115, 22, 0.35);
                    transform: translateX(2px);
                }
                .search-btn:hover .btn-icon {
                    transform: translateX(3px);
                }
                .btn-text, .btn-icon { position: relative; z-index: 1; }
                .btn-icon {
                    width: 18px;
                    height: 18px;
                    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                }
                @media (max-width: 768px) {
                    .travel-search-bar { flex-wrap: wrap; padding: 8px; }
                    .search-input-wrap { width: 100%; }
                    .search-divider { display: none; }
                    .search-date-wrap { flex: 1; padding: 0 10px; }
                    .search-btn { width: 100%; justify-content: center; margin-top: 4px; }
                }
                </style>

                <button
                    type="button"
                    data-hs-overlay="#customize-tour"
                    class="flex shrink-0 items-center gap-2 rounded-lg bg-primary px-4 py-4 text-sm text-white transition-colors hover:bg-opacity-75"
                >
                    <svg class="size-5 shrink-0 text-white">
                        <use href="../../assets/images/icons/sprite.svg#settings"></use>
                    </svg>

                    {{ __('front.site.footer.customize_your_tour') }}
                </button>
            </div>

            <div class="navbar_mobile" style="position: static !important">
                <div class="flex items-center gap-2">
                    <div class="hs-dropdown relative inline-flex">
                        <button type="button">
                            <svg class="size-6 text-white">
                                <use href="../../assets/images/icons/sprite.svg#menu"></use>
                            </svg>
                        </button>

                        <div
                            class="mobile-sidebar hs-dropdown-menu duration hidden min-w-72 opacity-0 transition-opacity hs-dropdown-open:opacity-100"
                        >
                            <div
                                class="bg-gradient -ms-4 flex h-full flex-col justify-between px-4 pb-14 pt-10"
                            >
                                @include('front.layouts.mobile-nav-list')
                                <ul class="social-list white mt-7 justify-center">
                                    <li>
                                        <a href="#">
                                            <svg>
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#facebook"
                                                ></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg>
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#linkedin"
                                                ></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg>
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#youtube"
                                                ></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg>
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#instagram"
                                                ></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('home')}}"> <img src="{{footer_logo()}}" class="h-8" alt="" /></a>
                </div>

                <div class="flex items-center gap-4">
                    <div
                        class="hs-dropdown group relative inline-flex [--auto-close:outside] [--offset:20]"
                    >
                        <button type="button">
                            <svg class="size-4.5 text-white group-[.open]:hidden">
                                <use href="../../assets/images/icons/sprite.svg#search"></use>
                            </svg>
                            <svg class="hidden size-6 text-white group-[.open]:block">
                                <use href="../../assets/images/icons/sprite.svg#close"></use>
                            </svg>
                        </button>

                        <div
                            class="hs-dropdown-menu duration z-50 hidden max-w-80 p-px opacity-0 transition-opacity hs-dropdown-open:opacity-100"
                        >
                            <form action="{{route('tour_search')}}" method="get">
                                <div class="rounded-xl border border-primary bg-white p-3 space-y-3">
                                    <div class="flex items-center gap-3 rounded-lg bg-gray-50 px-3 py-2.5">
                                        <svg class="size-5 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                        <input
                                            type="text"
                                            name="search"
                                            class="w-full bg-transparent text-sm text-black outline-none placeholder:text-gray"
                                            placeholder="Search tours, destinations..."
                                            value="{{ request('search') }}"
                                        />
                                    </div>
                                    <div class="flex items-center gap-3 rounded-lg bg-gray-50 px-3 py-2.5">
                                        <svg class="size-5 shrink-0 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <input
                                            id="range-mobile"
                                            type="text"
                                            name="checkIn_checkOut"
                                            class="flatpickr flatpickr-input w-full bg-transparent text-sm text-black outline-none placeholder:text-gray"
                                            placeholder="Check in - Check out"
                                        />
                                    </div>
                                    <button
                                        type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-primary px-5 py-3 text-white font-semibold transition-all hover:bg-secondary"
                                    >
                                        Search
                                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="m12 5 7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <button type="button" data-hs-overlay="#customer-service">
                        <svg class="size-5.5 text-white">
                            <use
                                href="../../assets/images/icons/sprite.svg#customer-service-2"
                            ></use>
                        </svg>
                    </button>
                    <button type="button" data-hs-overlay="#customize-tour">
                        <svg class="size-5 text-white">
                            <use href="../../assets/images/icons/sprite.svg#settings"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="relative space-y-12 lg:space-y-16">
        <section class="pt-8 lg:pt-16">
            <div class="container">
                <ol class="breadcrumb mb-8" aria-label="Breadcrumb">
                    <li>
                        <a href="{{route('home')}}"> Home </a>
                        <svg
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
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </li>
                    <li>
                        <a href="{{route('blogs')}}">
                            {{ __('front.site.sections.blogs') }}
                            <svg
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
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </li>
                    <li aria-current="page">{{$blog_preview->title }}</li>
                </ol>

                <div class="mb-8">
                    <div
                        class="mb-3 flex flex-col items-start gap-x-4 gap-y-2 md:flex-row md:items-center md:justify-between"
                    >
                        <p class="text-xl font-semibold text-primary lg:text-2xl">
{{--                            <span class="text-secondary">How</span> to Plan A Trip to--}}
{{--                            Egypt--}}
                            @php
                                $blogTitle = $blog_preview->title ?? '';
                                $spacePos = strpos($blogTitle, ' ');
                            @endphp
                            @if($spacePos !== false)
                                <span class="text-secondary">{{ substr($blogTitle, 0, $spacePos) }}</span>{{ substr($blogTitle, $spacePos) }}
                            @else
                                <span class="text-secondary">{{ $blogTitle }}</span>
                            @endif

                        </p>

                        <div class="flex items-center gap-4">
                            <button
                                type="button"
                                data-hs-overlay="#send-feedback"
                                class="inline-flex items-center gap-1 rounded-xl bg-primary px-3.5 py-2.5 text-white shadow-md transition-colors hover:bg-secondary lg:px-5 lg:py-3 lg:text-xl"
                            >
                                <svg class="size-6 text-white">
                                    <use
                                        href="../../assets/images/icons/sprite.svg#log-out"
                                    ></use>
                                </svg>
                                {{ __('front.site.blog.send_feedback') }}
                            </button>
                            <!-- <button type="button" data-hs-overlay="#share-article">
                    <img
                      src="../../assets/images/icons/share.svg"
                      class="size-6 lg:size-8"
                      alt=""
                    />
                  </button> -->

                            <ul class="social-list primary justify-center">
                                <li>
                                    <a href="#">
                                        <svg>
                                            <use
                                                href="../../assets/images/icons/sprite.svg#facebook"
                                            ></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg>
                                            <use
                                                href="../../assets/images/icons/sprite.svg#instagram"
                                            ></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <p class="mb-4 text-lg">
                        {!! $blog_preview->description  ?? __('front.site.blog.default_description') !!}
                    </p>
                    <br>

                    <div class="mb-6 flex flex-wrap gap-x-6 gap-y-2 lg:mb-8">
                        <div class="inline-flex items-center gap-1 text-sm font-medium">
                            <svg class="size-5 text-secondary">
                                <use href="../../assets/images/icons/sprite.svg#write"></use>
                            </svg>
                            <p><span class="text-primary">{{ __('front.site.blog.by') }}</span> {{ __('front.site.sections.doudou_team') }}</p>
                        </div>
                        <div class="inline-flex items-center gap-1 text-sm font-medium">
                            <svg class="size-5 text-secondary">
                                <use href="../../assets/images/icons/sprite.svg#publish"></use>
                            </svg>
                            <p>
                                <span class="text-primary">{{ __('front.site.blog.published') }}</span> {{$blog_preview->getFormattedDate()}}
                            </p>
                        </div>
                        <div class="inline-flex items-center gap-1 text-sm font-medium">
                            <svg class="size-5 text-secondary">
                                <use href="../../assets/images/icons/sprite.svg#update"></use>
                            </svg>
                            <p><span class="text-primary">{{ __('front.site.blog.updated') }}</span> {{$blog_preview->getUpdatedDate()}}</p>
                        </div>
                    </div>

                    <div class="mb-6 rounded-lg border border-primary lg:hidden">
                        <button class="hs-accordion-toggle accordion-btn font-medium">
                            <svg class="accordion-icon size-4.5">
                                <use href="../../assets/images/icons/sprite.svg#articles"></use>
                            </svg>
                            {{ __('front.site.blog.table_of_content') }}
                        </button>

                        <div
                            data-hs-scrollspy="#scrollspy-1"
                            class="accordion-content space-y-3 ps-11.5 [--scrollspy-offset:100]"
                        >
                            <a
                                href="#intro"
                                onclick="lenis.scrollTo('#intro', {offset: -100})"
                                class="inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-scrollspy-active:text-primary"
                            >
                                1. How to plan a trip to Egypt
                            </a>
                            <a
                                href="#title-1"
                                onclick="lenis.scrollTo('#title-1', {offset: -100})"
                                class="inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-scrollspy-active:text-primary"
                            >
                                1. Title
                            </a>
                            <a
                                href="#title-2"
                                onclick="lenis.scrollTo('#title-2', {offset: -100})"
                                class="inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-scrollspy-active:text-primary"
                            >
                                2. Title
                            </a>
                            <a
                                href="#title-3"
                                onclick="lenis.scrollTo('#title-3', {offset: -100})"
                                class="inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-scrollspy-active:text-primary"
                            >
                                3. Title
                            </a>
                        </div>
                        <!-- <div class="hs-accordion-content accordion-content-wrapper">
                </div> -->
                    </div>

                    <div class="items-start lg:grid lg:grid-cols-8 lg:gap-8">
                        <div class="h-[450px] max-lg:mb-8 lg:col-span-6">
                            <div class="swiper gallery-2 h-full w-full">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide h-full">
                                        <div class="h-full overflow-hidden rounded-xl">
                                            <img
                                                src="{{ $blog_preview->image_url ?? asset('assets/images/article-mini-placeholder.jpeg') }}"
                                                class="h-full w-full object-cover object-center"
                                                alt=""
                                                onerror="this.src='{{ asset('assets/images/article-mini-placeholder.jpeg') }}'"
                                            />
                                        </div>
                                    </div>
                                    <div class="swiper-slide h-full">
                                        <div class="h-full overflow-hidden rounded-xl">
                                            <img
                                                src="../../assets/images/tour-img-1.png"
                                                class="h-full w-full object-cover object-center"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="h-[100px] lg:col-span-2 lg:h-[450px]">
                            <div class="swiper thumbs-2 h-full w-full flex-1">
                                <div class="swiper-wrapper h-full">
                                    @foreach($blog_pragraph as $paragraph)
                                    <div
                                        class="swiper-slide group h-full cursor-pointer rounded-2xl"
                                    >
                                        <img
                                            src="{{ $paragraph->image_url ?? asset('assets/images/article-mini-placeholder.jpeg') }}"
                                            class="h-full w-full rounded-2xl border-2 border-transparent object-cover object-center transition-colors hover:border-primary lg:border-4"
                                            alt=""
                                            onerror="this.src='{{ asset('assets/images/article-mini-placeholder.jpeg') }}'"
                                        />
                                    </div>
                                    @endforeach
{{--                                    <div--}}
{{--                                        class="swiper-slide group h-full cursor-pointer rounded-2xl"--}}
{{--                                    >--}}
{{--                                        <img--}}
{{--                                            src="../../assets/images/tour-img-1.png"--}}
{{--                                            class="h-full w-full rounded-2xl border-2 border-transparent object-cover object-center transition-colors hover:border-primary lg:border-4"--}}
{{--                                            alt=""--}}
{{--                                        />--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- article cover image -->
                    <!-- <img
                src="../../assets/images/tour-img-1.png"
                class="h-[450px] w-full rounded-xl object-cover object-center"
                alt=""
              /> -->
                </div>

                <div class="flex flex-col gap-10 lg:flex-row lg:items-start">
                    <div
                        class="w-full shrink-0 max-lg:order-2 lg:sticky lg:top-8 lg:max-w-[420px]"
                    >
                        <div
                            class="hs-accordion-group space-y-2"
                            data-hs-accordion-always-open
                        >
                            <div
                                class="hs-accordion active accordion-filter max-lg:hidden"
                            >
                                <button
                                    class="hs-accordion-toggle accordion-btn font-medium"
                                >
                                    <svg class="accordion-icon size-4.5">
                                        <use
                                            href="../../assets/images/icons/sprite.svg#articles"
                                        ></use>
                                    </svg>
                                    {{ __('front.site.blog.table_of_content') }}
                                </button>
                                <div class="hs-accordion-content accordion-content-wrapper">
                                    <div
                                        data-hs-scrollspy="#scrollspy-1"
                                        class="accordion-content space-y-3 [--scrollspy-offset:100]"
                                    >
                                        <a
                                            href="#intro"
                                            onclick="lenis.scrollTo('#intro', {offset: -100})"
                                            class="inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-scrollspy-active:text-primary"
                                        >
                                            1. {{$blog_preview->title}}
                                        </a>
                                        @foreach($blog_pragraph as $index => $paragraph)
                                            @php
                                                $iteration = $index + 2;
                                            @endphp
                                            <a
                                                href="#title-{{ $paragraph->id }}"
                                                onclick="lenis.scrollTo('#title-{{ $paragraph->id }}', {offset: -100})"
                                                class="inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-scrollspy-active:text-primary"
                                            >
                                                {{ $iteration }}. {{ $paragraph->title }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion active accordion-filter">
                                <button
                                    class="hs-accordion-toggle accordion-btn font-medium"
                                >
                                    <svg class="accordion-icon size-4.5">
                                        <use
                                            href="../../assets/images/icons/sprite.svg#search"
                                        ></use>
                                    </svg>
                                    {{ __('front.site.blog.search_articles') }}
                                </button>
                                <div class="hs-accordion-content accordion-content-wrapper">
                                    <div class="accordion-content">
                                        <form  method="get" action="{{route('search_blogs')}}" enctype="multipart/form-data">
                                        <div
                                            class="relative flex items-center overflow-hidden rounded-xl border border-primary ps-10"
                                        >
                                            <svg class="absolute start-4 size-4 text-gray/90">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#search"
                                                ></use>
                                            </svg>
                                            <input
                                                type="text"
                                                name="search"
                                                class="block w-full text-sm font-normal text-black outline-none placeholder:text-gray"
                                                placeholder="{{ __('front.site.blog.search_blogs_placeholder') }}"
                                                required
                                            />
                                            <button
                                                type="submit"
                                                class="bg-primary px-6 py-2 text-white"
                                            >
                                                {{ __('front.site.search.search') }}
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion active accordion-filter">
                                <button
                                    class="hs-accordion-toggle accordion-btn font-medium"
                                >
                                    <svg class="accordion-icon size-4.5">
                                        <use
                                            href="../../assets/images/icons/sprite.svg#articles"
                                        ></use>
                                    </svg>
                                    {{ __('front.site.blog.latest_articles') }}
                                </button>
                                <div
                                    class="hs-accordion-content accordion-content-wrapper hidden"
                                >
                                    <div class="accordion-content">
                                        <div
                                            class="hs-dropdown relative flex-1 [--strategy:absolute]"
                                        >
                                            <button
                                                type="button"
                                                class="hs-dropdown-toggle inline-flex items-center gap-2 text-nowrap rounded-xl border border-primary p-3 text-sm xl:px-4 xl:text-base"
                                            >
                                                <svg class="size-6 text-primary">
                                                    <use
                                                        href="../../assets/images/icons/sprite.svg#sort"
                                                    ></use>
                                                </svg>
                                                <span>{{ __('front.site.blog.sort_by_recommended') }}</span>
                                                <svg
                                                    class="accordion-arrow ms-auto hs-dropdown-open:rotate-180"
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
                                                    <path d="m6 9 6 6 6-6" />
                                                </svg>
                                            </button>

                                            <div
                                                class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden min-w-72 space-y-3 rounded-lg bg-white p-5 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                            >
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    aria-pressed="true"
                                                >
                                                    {{ __('front.site.blog.our_top_picks') }}
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    {{ __('front.site.blog.traveler_rating') }}
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    {{ __('front.site.blog.price_low_to_high') }}
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    {{ __('front.site.blog.price_high_to_low') }}
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    {{ __('front.site.blog.duration_low_to_high') }}
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    {{ __('front.site.blog.duration_high_to_low') }}
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    {{ __('front.site.blog.most_popular_first') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="custom-scrollbar max-h-[640px] space-y-4 overflow-auto p-4 pt-0 lg:p-6 lg:pt-0"
                                        data-lenis-prevent
                                    >
                                        @foreach($blogs as $blog)
                                        <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                            <a href="{{route('blog_preview', $blog->slug)}}" >    <img
                                                src="{{ $blog->image_url ?? asset('assets/images/article-mini-placeholder.jpeg') }}"
                                                class="max-w-[125px] shrink-0 rounded"
                                                alt=""
                                                onerror="this.src='{{ asset('assets/images/article-mini-placeholder.jpeg') }}'"
                                                /></a>

                                            <div>
                                                <p class="mb-2 line-clamp-2 font-medium">
                                                    <a href="{{route('blog_preview', $blog->slug)}}" >{{$blog->title}}</a>
                                                </p>
                                                <p
                                                    class="flex items-center gap-2 text-sm text-gray"
                                                >
                                                    <svg class="size-4 text-primary">
                                                        <use
                                                            href="../../assets/images/icons/sprite.svg#calendar-date"
                                                        ></use>
                                                    </svg>
                                                    {{$blog->getFormattedDate()}}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion active accordion-filter">
                                <button
                                    class="hs-accordion-toggle accordion-btn font-medium"
                                >
                                    <svg class="accordion-icon size-4.5">
                                        <use href="../../assets/images/icons/sprite.svg#tag"></use>
                                    </svg>
                                    {{ __('front.site.blog.tags') }}
                                </button>
                                <div class="hs-accordion-content accordion-content-wrapper">
                                    <div class="accordion-content">
                                        <div class="tags">
                                            @foreach($tags as $tag)
                                                @php
                                                    $isBlogTag = isset($blog_tags) && $blog_tags->contains('id', $tag->id);
                                                @endphp

                                                <button type="button"  aria-pressed="{{ $isBlogTag ? 'true' : 'false' }}" onclick="window.location='{{ route('tag_blogs', ['tag' => $tag->name]) }}'">
                                                    {{ $tag->name }}
                                                </button>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion active accordion-filter">
                                <button
                                    class="hs-accordion-toggle accordion-btn font-medium"
                                >
                                    <svg class="accordion-icon size-5">
                                        <use href="../../assets/images/icons/sprite.svg#info"></use>
                                    </svg>
                                    {{ __('front.site.sections.about_us') }}
                                </button>
                                <div class="hs-accordion-content accordion-content-wrapper">
                                    <div class="accordion-content">
                                        <img
                                            src="{{ $about?->image_url ?? '../../assets/images/article-mini-placeholder.jpeg' }}"
                                            class="mb-6 max-h-[150px] w-full rounded-xl object-cover object-center"
                                            alt=""
                                        />
                                        <p class="mb-5">
                                            {!! $about?->description
                                                ? implode(' ', array_slice(str_word_count(strip_tags($about->description), 1), 0, 30))
                                                : 'Lorem ipsum dolor sit amet consectetur adipisicing elit.' !!}


                                        </p>

                                        <ul class="social-list primary justify-center">
                                            <li>
                                                <a href="#">
                                                    <svg>
                                                        <use
                                                            href="../../assets/images/icons/sprite.svg#facebook"
                                                        ></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg>
                                                        <use
                                                            href="../../assets/images/icons/sprite.svg#linkedin"
                                                        ></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg>
                                                        <use
                                                            href="../../assets/images/icons/sprite.svg#youtube"
                                                        ></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg>
                                                        <use
                                                            href="../../assets/images/icons/sprite.svg#instagram"
                                                        ></use>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="hs-accordion active accordion-filter">
                                <button
                                    class="hs-accordion-toggle accordion-btn font-medium"
                                >
                                    <svg class="accordion-icon size-5">
                                        <use href="../../assets/images/icons/sprite.svg#mail"></use>
                                    </svg>
                                    {{ __('front.site.blog.enter_email_address') }}
                                </button>
                                <div class="hs-accordion-content accordion-content-wrapper">
                                    <div class="accordion-content">
                                        <p class="mb-6">
                                            {{ __('front.site.blog.subscribe_for_updates') }}
                                        </p>

                                        <div class="relative mb-4 flex-1">
                                            <label
                                                for="email"
                                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                            >{{ __('front.site.form.email') }}</label
                                            >
                                            <input
                                                id="email"
                                                type="email"
                                                class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                                placeholder="{{ __('front.site.form.your_email') }}"
                                            />
                                            <button
                                                data-hs-overlay="#send-email"
                                                class="absolute inset-y-0 end-0 rounded-br-xl rounded-tr-xl bg-primary px-5 py-2 text-white"
                                            >
                                                {{ __('front.site.blog.go') }}
                                            </button>
                                        </div>

                                        <p class="flex items-center gap-2 text-sm">
                                            <svg class="accordion-icon size-4">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#lock"
                                                ></use>
                                            </svg>
                                            {{ __('front.site.blog.your_information_is_safe') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="min-w-0 flex-1 max-lg:order-1">
                        <div id="scrollspy-1" class="space-y-8">
                            <section id="intro">
                                <!-- <div class="mb-6"></div> -->

                                <p class="mb-4 text-lg font-normal lg:text-xl">
                                    <span class="text-primary">{{ __('front.site.blog.head') }}</span> {{ strip_tags($blog_preview->head) }}

                                </p>
                                <ul class="list-disc space-y-2 ps-4 marker:text-primary">
                                    @foreach($sub_header_json as $sub_header)
                                    <li>
                                    <span class="text-primary">{{ __('front.site.blog.sub_head') }}</span> {{$sub_header}}
                                    </li>
                                    @endforeach

                                </ul>

                                <img
                                    src="../../assets/images/section-divider.png"
                                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                                    alt=""
                                />
                            </section>

                            @foreach($blog_pragraph as $paragraph)
                            <section id="title-{{$paragraph->id}}">
                                <h2 class="text-xl font-semibold text-primary lg:text-2xl">
                                    @php
                                        $paraTitle = $paragraph->title ?? '';
                                        $paraSpacePos = strpos($paraTitle, ' ');
                                    @endphp
                                    @if($paraSpacePos !== false)
                                        <span class="text-secondary">{{ substr($paraTitle, 0, $paraSpacePos) }}</span> {{ substr($paraTitle, $paraSpacePos + 1) }}
                                    @else
                                        <span class="text-secondary">{{ $paraTitle }}</span>
                                    @endif
                                </h2>

                                <img
                                    src="{{$paragraph->image_url}}"
                                    class="my-7 w-full rounded-2xl object-cover object-center"
                                    alt=""
                                />

                                <div class="space-y-6">

                                    @foreach($paragraph->pragraph_details as $para)
                                    <div>
                                        <h3
                                            class="mb-2 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            {{$para->title}}
                                        </h3>
                                        <p>
                                           {!! $para->description !!}
                                        </p>
                                    </div>
                                    @endforeach

                                </div>

                                <img
                                    src="../../assets/images/section-divider.png"
                                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                                    alt=""
                                />
                            </section>
                            @endforeach

{{--                            <section id="title-2">--}}
{{--                                <h2 class="text-xl font-semibold text-primary lg:text-2xl">--}}
{{--                                    <span class="text-secondary">Title</span> Here--}}
{{--                                </h2>--}}

{{--                                <img--}}
{{--                                    src="../../assets/images/tour-img-1.png"--}}
{{--                                    class="my-7 w-full rounded-2xl object-cover object-center"--}}
{{--                                    alt=""--}}
{{--                                />--}}

{{--                                <div class="space-y-6">--}}
{{--                                    <div>--}}
{{--                                        <h3--}}
{{--                                            class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                        >--}}
{{--                                            Titles--}}
{{--                                        </h3>--}}
{{--                                        <p>--}}
{{--                                            Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                            tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                            ullamcorper eleifend nisi turpis vestibulum. Mattis at--}}
{{--                                            proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                            Consequat in suscipit pellentesque tellus consectetur.--}}
{{--                                            Tellus eget eget lorem sed commodo interdum. Amet--}}
{{--                                            cursus aliquam lorem tellus elementum ac. Lectus quam--}}
{{--                                            adipiscing odio vel eleifend elit odio accumsan--}}
{{--                                            vulputate. Massa turpis nunc at nullam arcu sagittis--}}
{{--                                            vulputate ut. Sed commodo dapibus viverra id feugiat--}}
{{--                                            eu ullamcorper nullam. Aliquet felis facilisis Tags--}}
{{--                                            sociis morbi feugiat vestibulum. Nec turpis molestie--}}
{{--                                            est--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <h3--}}
{{--                                            class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                        >--}}
{{--                                            Titles--}}
{{--                                        </h3>--}}
{{--                                        <p>--}}
{{--                                            Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                            tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                            ullamcorper eleifend nisi turpis vestibulum. Mattis at--}}
{{--                                            proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                            Consequat in suscipit pellentesque tellus consectetur.--}}
{{--                                            Tellus eget eget lorem sed commodo interdum. Amet--}}
{{--                                            cursus aliquam lorem tellus elementum ac. Lectus quam--}}
{{--                                            adipiscing odio vel eleifend elit odio accumsan--}}
{{--                                            vulputate. Massa turpis nunc at nullam arcu sagittis--}}
{{--                                            vulputate ut. Sed commodo dapibus viverra id feugiat--}}
{{--                                            eu ullamcorper nullam. Aliquet felis facilisis Tags--}}
{{--                                            sociis morbi feugiat vestibulum. Nec turpis molestie--}}
{{--                                            est--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <h3--}}
{{--                                            class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                        >--}}
{{--                                            Titles--}}
{{--                                        </h3>--}}
{{--                                        <p>--}}
{{--                                            Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                            tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                            ullamcorper eleifend nisi turpis vestibulum. Mattis at--}}
{{--                                            proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                            Consequat in suscipit pellentesque tellus consectetur.--}}
{{--                                            Tellus eget eget lorem sed commodo interdum. Amet--}}
{{--                                            cursus aliquam lorem tellus elementum ac. Lectus quam--}}
{{--                                            adipiscing odio vel eleifend elit odio accumsan--}}
{{--                                            vulputate. Massa turpis nunc at nullam arcu sagittis--}}
{{--                                            vulputate ut. Sed commodo dapibus viverra id feugiat--}}
{{--                                            eu ullamcorper nullam. Aliquet felis facilisis Tags--}}
{{--                                            sociis morbi feugiat vestibulum. Nec turpis molestie--}}
{{--                                            est--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <img--}}
{{--                                    src="../../assets/images/section-divider.png"--}}
{{--                                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"--}}
{{--                                    alt=""--}}
{{--                                />--}}
{{--                            </section>--}}

{{--                            <section id="title-3">--}}
{{--                                <h2 class="text-xl font-semibold text-primary lg:text-2xl">--}}
{{--                                    <span class="text-secondary">Title</span> Here--}}
{{--                                </h2>--}}

{{--                                <img--}}
{{--                                    src="../../assets/images/tour-img-1.png"--}}
{{--                                    class="my-7 w-full rounded-2xl object-cover object-center"--}}
{{--                                    alt=""--}}
{{--                                />--}}

{{--                                <div class="space-y-6">--}}
{{--                                    <div>--}}
{{--                                        <h3--}}
{{--                                            class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                        >--}}
{{--                                            Titles--}}
{{--                                        </h3>--}}
{{--                                        <p>--}}
{{--                                            Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                            tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                            ullamcorper eleifend nisi turpis vestibulum. Mattis at--}}
{{--                                            proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                            Consequat in suscipit pellentesque tellus consectetur.--}}
{{--                                            Tellus eget eget lorem sed commodo interdum. Amet--}}
{{--                                            cursus aliquam lorem tellus elementum ac. Lectus quam--}}
{{--                                            adipiscing odio vel eleifend elit odio accumsan--}}
{{--                                            vulputate. Massa turpis nunc at nullam arcu sagittis--}}
{{--                                            vulputate ut. Sed commodo dapibus viverra id feugiat--}}
{{--                                            eu ullamcorper nullam. Aliquet felis facilisis Tags--}}
{{--                                            sociis morbi feugiat vestibulum. Nec turpis molestie--}}
{{--                                            est--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <h3--}}
{{--                                            class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                        >--}}
{{--                                            Titles--}}
{{--                                        </h3>--}}
{{--                                        <p>--}}
{{--                                            Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                            tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                            ullamcorper eleifend nisi turpis vestibulum. Mattis at--}}
{{--                                            proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                            Consequat in suscipit pellentesque tellus consectetur.--}}
{{--                                            Tellus eget eget lorem sed commodo interdum. Amet--}}
{{--                                            cursus aliquam lorem tellus elementum ac. Lectus quam--}}
{{--                                            adipiscing odio vel eleifend elit odio accumsan--}}
{{--                                            vulputate. Massa turpis nunc at nullam arcu sagittis--}}
{{--                                            vulputate ut. Sed commodo dapibus viverra id feugiat--}}
{{--                                            eu ullamcorper nullam. Aliquet felis facilisis Tags--}}
{{--                                            sociis morbi feugiat vestibulum. Nec turpis molestie--}}
{{--                                            est--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <h3--}}
{{--                                            class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                        >--}}
{{--                                            Titles--}}
{{--                                        </h3>--}}
{{--                                        <p>--}}
{{--                                            Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                            tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                            ullamcorper eleifend nisi turpis vestibulum. Mattis at--}}
{{--                                            proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                            Consequat in suscipit pellentesque tellus consectetur.--}}
{{--                                            Tellus eget eget lorem sed commodo interdum. Amet--}}
{{--                                            cursus aliquam lorem tellus elementum ac. Lectus quam--}}
{{--                                            adipiscing odio vel eleifend elit odio accumsan--}}
{{--                                            vulputate. Massa turpis nunc at nullam arcu sagittis--}}
{{--                                            vulputate ut. Sed commodo dapibus viverra id feugiat--}}
{{--                                            eu ullamcorper nullam. Aliquet felis facilisis Tags--}}
{{--                                            sociis morbi feugiat vestibulum. Nec turpis molestie--}}
{{--                                            est--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <img--}}
{{--                                    src="../../assets/images/section-divider.png"--}}
{{--                                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"--}}
{{--                                    alt=""--}}
{{--                                />--}}
{{--                            </section>--}}

                            <section>
                                <section class="mb-8 w-full" id="recommended-tours">
                                    <header
                                        class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                                    >
                                        <h2 class="section_heading text-primary">
                                            <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.blog.recommended_tours_based_on_your_read') }}
                                        </h2>

                                        <div class="flex items-center gap-4 max-lg:ms-auto">
                                            <a href="#" class="text-secondary lg:text-lg"
                                            >{{ __('front.site.sections.view_all') }}</a
                                            >

                                            <menu class="flex items-center gap-2">
                                                <li>
                                                    <button type="button" class="swiper-btn prev">
                                                        <svg>
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#arrow-left"
                                                            ></use>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="swiper-btn next">
                                                        <svg>
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#arrow-right"
                                                            ></use>
                                                        </svg>
                                                    </button>
                                                </li>
                                            </menu>
                                        </div>
                                    </header>

                                    <!-- overflow-visible -->
                                    <div class="swiper swiper-lg w-full">
                                        <div class="swiper-wrapper">
                                            @foreach ($tours as $tour)
                                            <div class="swiper-slide">
                                                <article class="tour-card">
                                                    <div class="tour-card__thumbnail-wrapper">
                                                        <div class="swiper swiper-sm">
                                                            <div class="swiper-wrapper">
                                                                @foreach ($tour->galleries as $gallery)
                                                                    <div class="swiper-slide">
                                                                        <img
                                                                            src="{{$gallery->photo}}"
                                                                            class="tour-card__thumbnail"
                                                                            alt="ss"
                                                                        />
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <menu
                                                                class="absolute inset-0 z-50 mx-auto flex h-full items-center justify-between px-6"
                                                            >
                                                                <li class="rounded-full bg-white/70">
                                                                    <button
                                                                        type="button"
                                                                        class="swiper-btn prev"
                                                                    >
                                                                        <svg>
                                                                            <use
                                                                                href="../../assets/images/icons/sprite.svg#arrow-left"
                                                                            ></use>
                                                                        </svg>
                                                                    </button>
                                                                </li>
                                                                <li class="rounded-full bg-white/70">
                                                                    <button
                                                                        type="button"
                                                                        class="swiper-btn next"
                                                                    >
                                                                        <svg>
                                                                            <use
                                                                                href="../../assets/images/icons/sprite.svg#arrow-right"
                                                                            ></use>
                                                                        </svg>
                                                                    </button>
                                                                </li>
                                                            </menu>
                                                        </div>
                                                    </div>

                                                    <div class="tour-card__content">
                                                        <a href="{{route('tour_details',$tour->slug)}}"> <h3>{{$tour->name}}</h3></a>
                                                        <div class="tour-card__review">
                                                            <div class="flex items-center gap-x-px">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $tour->rate)
                                                                        <svg class="star text-secondary">
                                                                            <use href="../../assets/images/icons/sprite.svg#star"></use>
                                                                        </svg>
                                                                    @else
                                                                        <svg class="star text-gray-200">
                                                                            <use href="../../assets/images/icons/sprite.svg#star"></use>
                                                                        </svg>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <p>{{ $tour->rate ?? 0 }} Wonderful <span>({{ $tour->reviews }} Reviews)</span></p>
                                                        </div>


                                                        <ul class="tour-card__features">
                                                            <li>
                                                                <svg class="icon">
                                                                    <use
                                                                        href="../../assets/images/icons/sprite.svg#location"
                                                                    ></use>
                                                                </svg> {{$tour->overview_values('location_from')}}, {{$tour->overview_values('location_to')}}
                                                            </li>
                                                            <li>
                                                                <svg class="icon">
                                                                    <use
                                                                        href="../../assets/images/icons/sprite.svg#clipboard-text-time"
                                                                    ></use>
                                                                </svg>
                                                                {{$tour->overview_values('days') ?? 0}} {{ __('front.site.sections.days') }} / {{$tour->overview_values('nights') ?? 0}} {{ __('front.site.sections.nights') }}
                                                            </li>
                                                            <li>
                                                                <svg class="icon">
                                                                    <use
                                                                        href="../../assets/images/icons/sprite.svg#travel-card"
                                                                    ></use>
                                                                </svg>
                                                                {{$tour->overview_values('group')}}
                                                            </li>
                                                            <li>
                                                                <svg class="icon">
                                                                    <use
                                                                        href="../../assets/images/icons/sprite.svg#event-available"
                                                                    ></use>
                                                                </svg>
                                                                {{$tour->overview_values('availability')}}
                                                            </li>
                                                            <li>
                                                                <svg class="icon">
                                                                    <use
                                                                        href="../../assets/images/icons/sprite.svg#group-3"
                                                                    ></use>
                                                                </svg>
                                                                {{$tour->overview_values('type')}}
                                                            </li>
                                                            <li>
                                                                <svg class="icon">
                                                                    <use
                                                                        href="../../assets/images/icons/sprite.svg#cancel"
                                                                    ></use>
                                                                </svg>
                                                                {{$tour->overview_values('cancellation')}} {{ __('front.site.sections.cancellation') }}
                                                            </li>
                                                        </ul>

                                                        <div class="tour-card__footer">
                                                            <a href="{{route('tour_details',$tour->slug)}}" class="tour-card__link"
                                                            >{{ __('front.site.sections.view_tour') }}</a
                                                            >
                                                            <p>
                                                                {{ __('front.site.sections.starting_from') }}
                                                                <span class="price">{{$tour->price}}$</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                                @endforeach

                                        </div>
                                    </div>
                                </section>

                                <section class="mb-8 w-full">
                                    <header class="section_header">
                                        <h2 class="section_heading text-primary">
                                            <span>{{ __('front.site.sections.frequently') }}</span> {{ __('front.site.sections.asked_questions') }}
                                        </h2>
                                    </header>

                                    <div class="hs-accordion-group space-y-2">
                                        <x-question-component/>
                                    </div>

                                    <div class="mt-6 text-center">
                                        <a
                                            href="{{route('faq')}}"
                                            class="text-lg text-secondary underline"
                                        >{{ __('front.site.sections.show_more') }}</a
                                        >
                                    </div>
                                </section>

                                <div
                                    class="mb-2 flex flex-col items-start gap-4 rounded-xl border border-gray px-5 py-4 md:flex-row md:items-center md:justify-between lg:mb-6"
                                >
                                    <p class="text-xl font-semibold text-primary lg:text-2xl">
                                        Was This Article Helpful?
                                    </p>

                                    <div class="flex items-center gap-4">
                                        <button
                                            type="button"
                                            data-hs-overlay="#send-feedback"
                                            class="inline-flex items-center gap-1 rounded-xl bg-primary px-5 py-3 text-lg text-white shadow-md transition-colors hover:bg-secondary lg:text-xl"
                                        >
                                            <svg class="size-6 text-white">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#log-out"
                                                ></use>
                                            </svg>
                                            {{ __('front.site.form.inquire_now') }} feedback
                                        </button>
                                        <!-- <button type="button">
                          <img
                            src="../../assets/images/icons/share.svg"
                            class="size-6 lg:size-8"
                            alt=""
                          />
                        </button> -->
                                        <ul class="social-list primary justify-center">
                                            <li>
                                                <a href="#">
                                                    <svg>
                                                        <use
                                                            href="../../assets/images/icons/sprite.svg#facebook"
                                                        ></use>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg>
                                                        <use
                                                            href="../../assets/images/icons/sprite.svg#instagram"
                                                        ></use>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- comments -->
                                <div class="overflow-hidden rounded-xl border border-gray">
                                    <div
                                        class="flex items-center justify-between border-b border-gray px-6 py-4 lg:px-8 lg:py-6"
                                    >
                                        <p class="lg:text-lg">{{ __('front.site.blog.comments') }} ({{$blog->comments->count()}})</p>

                                        <div class="hs-dropdown relative flex">
                                            <button
                                                class="hs-dropdown-toggle inline-flex items-center gap-2 text-sm"
                                            >
                                                {{ __('front.site.blog.top_comments') }}
                                                <svg
                                                    width="11"
                                                    height="6"
                                                    viewBox="0 0 11 6"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path
                                                        d="M1.5 1L5.5 5L9.5 1"
                                                        stroke="#232323"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                            </button>

                                            <div
                                                class="hs-dropdown-menu duration mt-2 hidden min-w-40 rounded-lg bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                            >
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    {{ __('front.site.blog.most_recent') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="custom-scrollbar h-96 space-y-5 overflow-auto px-6 py-5"
                                        data-lenis-prevent
                                    >
                                        @foreach($blog->comments as $comment)
                                        <div>
                                            <div class="mb-3 flex items-center gap-2">
                                                <div
                                                    class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                                                >
                                                    <img
                                                        src="{{$comment->photo}}"
                                                        class="h-full w-full object-cover object-center"
                                                        alt=""
                                                    />
                                                </div>

                                                <div>
                                                    <p class="mb-1 text-sm text-black">
                                                        {{$comment->username}}
                                                        <span class="text-gray">{{$comment->getFormattedDate()}}</span>
                                                    </p>
                                                    <div class="flex items-center gap-x-px">
                                                        @php
                                                            $maxStars = 5; // Total number of stars
                                                            $rating = $comment->rate; // Assuming $comment->rating contains the rating integer
                                                        @endphp

                                                        @for($i = 1; $i <= $maxStars; $i++)
                                                            @if($i <= $rating)
                                                                <svg class="size-3 text-secondary">
                                                                    <use href="../../assets/images/icons/sprite.svg#star"></use>
                                                                </svg>
                                                            @else
                                                                <svg class="size-3 text-gray-200">
                                                                    <use href="../../assets/images/icons/sprite.svg#star"></use>
                                                                </svg>
                                                            @endif
                                                        @endfor
                                                    </div>

                                                </div>
                                            </div>

                                            <p
                                                class="line-clamp-4 font-normal leading-relaxed text-gray"
                                            >
                                                {{$comment->comment}}
                                            </p>
                                        </div>
                                        @endforeach

                                    </div>

                                    <!-- <p class="flex items-center justify-center text-gray-300 px-6 py-9 gap-2.5">
                    <svg class="text-gray-300 size-6 shrink-0">
                      <use
                        href="../../assets/images/icons/sprite.svg#comment"
                      ></use>
                    </svg>
                    No available comments yet!...
                  </p> -->

                                    <div
                                        class="border-t border-gray bg-gray-50 px-6 py-6 lg:px-8"
                                    >
{{--                                        <form--}}
{{--                                            class="flex items-center gap-2.5 rounded-xl border border-gray bg-white px-5 py-3"--}}
{{--                                        >--}}
{{--                                            <svg class="size-6 shrink-0 text-gray-300">--}}
{{--                                                <use--}}
{{--                                                    href="../../assets/images/icons/sprite.svg#comment"--}}
{{--                                                ></use>--}}
{{--                                            </svg>--}}

{{--                                            <input--}}
{{--                                                type="text"--}}
{{--                                                class="block w-full border-none bg-transparent text-black outline-none placeholder:text-gray-300"--}}
{{--                                                placeholder="Write your comment here..."--}}
{{--                                            />--}}

{{--                                            <button class="shrink-0">--}}
{{--                                                <svg class="size-6 text-primary">--}}
{{--                                                    <use--}}
{{--                                                        href="../../assets/images/icons/sprite.svg#send"--}}
{{--                                                    ></use>--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <img
                    src="../../assets/images/section-divider.png"
                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                    alt=""
                />
            </div>
        </section>

        <!-- ---------- -->

        <section id="blog">
            <div class="container">
                <header
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.learn') }}</span> {{ __('front.site.blog.more_about_blogs_for_category', ['category' => $blog->type_category_blog($blog->category)]) }}
                    </h2>

                    <div class="flex items-center gap-4 max-lg:ms-auto">
                        <a href="#" class="text-secondary lg:text-lg">View All</a>

                        <menu class="flex items-center gap-2">
                            <li>
                                <button type="button" class="swiper-btn prev">
                                    <svg>
                                        <use
                                            href="../../assets/images/icons/sprite.svg#arrow-left"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="swiper-btn next">
                                    <svg>
                                        <use
                                            href="../../assets/images/icons/sprite.svg#arrow-right"
                                        ></use>
                                    </svg>
                                </button>
                            </li>
                        </menu>
                    </div>
                </header>

                <div class="swiper swiper-lg overflow-visible">
                    <div class="swiper-wrapper">
                        @foreach($category_blogs as $blog)
                        <div class="swiper-slide">
                            <article class="tour-card">
                                <div class="tour-card__thumbnail-wrapper">
                                    <a href="{{route('blog_preview',$blog->slug)}}"><img
                                        src="{{$blog->image_url}}"
                                        class="tour-card__thumbnail"
                                        alt=""
                                    /></a>
                                </div>

                                <div class="tour-card__content">
                                    <a href="{{route('blog_preview',$blog->slug)}}">   <h3>{{ $blog->title}}</h3></a>

                                    <ul class="tour-card__features">
                                        <li>
                                            <svg class="icon">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#calendar-date"
                                                ></use>
                                            </svg>
                                            {{ $blog->getFormattedDate()}}
                                        </li>
                                    </ul>

                                    <p class="tour-card__desc">
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

                <img
                    src="../../assets/images/section-divider.png"
                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                    alt=""
                />
            </div>
        </section>

        <x-general-comment-component />

        <section id="partners" class="pb-20 pt-12 lg:pb-32">
            <div class="container">
                <header class="section_header">
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.doudou') }}</span> {{ __('front.site.blog.partners') }}
                    </h2>
                </header>

                <div class="flex items-center gap-6">
              <span class="rounded-full bg-white/70">
                <button type="button" class="swiper-btn prev shrink-0">
                  <svg>
                    <use
                        href="../../assets/images/icons/sprite.svg#arrow-left"
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
                        href="../../assets/images/icons/sprite.svg#arrow-right"
                    ></use>
                  </svg>
                </button>
              </span>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <x-footer-component/>
    <button
        type="button"
        id="BackToTop"
        class="back-to-top"
        onclick="lenis.scrollTo('body')"
    >
        <svg>
            <use href="../../assets/images/icons/sprite.svg#back-to-top"></use>
        </svg>
    </button>
</div>

<!-- modals -->
<div
    id="share-article"
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
                    {{ __('front.site.blog.send_this_article_to_friend') }}
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#share-article"
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
                <form class="form w-full">
                    <div class="space-y-6">
                        <div class="flex gap-2">
                            <div class="relative max-w-[80px] shrink-0">
                                <label
                                    for="title"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >{{ __('front.site.form.title') }}</label
                                >
                                <select
                                    id="title"
                                    type="text"
                                    class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="{{ __('front.site.form.your_name') }}"
                                >
                                    <option value="mr">{{ __('front.site.form.mr') }}</option>
                                    <option value="ms">{{ __('front.site.form.ms') }}</option>
                                </select>
                            </div>

                            <div class="relative flex-1">
                                <label
                                    for="name"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >{{ __('front.site.form.name') }}</label
                                >
                                <input
                                    id="name"
                                    type="text"
                                    class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="{{ __('front.site.form.your_name') }}"
                                />
                            </div>
                        </div>

                        <div class="relative">
                            <label
                                for="email"
                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >Email</label
                            >
                            <input
                                id="email"
                                type="text"
                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                placeholder="Your Name"
                            />
                        </div>

                        <div class="mt-8 flex gap-2">
                            <div class="relative max-w-[80px] shrink-0">
                                <label
                                    for="title"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >{{ __('front.site.form.title') }}</label
                                >
                                <select
                                    id="title"
                                    type="text"
                                    class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="{{ __('front.site.form.your_name') }}"
                                >
                                    <option value="mr">{{ __('front.site.form.mr') }}</option>
                                    <option value="ms">{{ __('front.site.form.ms') }}</option>
                                </select>
                            </div>

                            <div class="relative flex-1">
                                <label
                                    for="name"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >{{ __('front.site.blog.friend_name') }}</label
                                >
                                <input
                                    id="name"
                                    type="text"
                                    class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="{{ __('front.site.blog.friend_name_placeholder') }}"
                                />
                            </div>
                        </div>

                        <div class="relative">
                            <label
                                for="email"
                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >{{ __('front.site.blog.friend_email') }}</label
                            >
                            <input
                                id="email"
                                type="text"
                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                placeholder="Your FriendÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢s Email"
                            />
                        </div>

                        <div class="relative">
                            <label
                                for="email"
                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >{{ __('front.site.blog.message_optional') }}</label
                            >
                            <textarea
                                type="text"
                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                placeholder="{{ __('front.site.blog.write_your_message') }}"
                            ></textarea>
                        </div>
                    </div>
                </form>

                <div class="mt-5 flex items-center justify-center gap-x-4">
                    <button
                        type="button"
                        class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                        data-hs-overlay="#share-article"
                    >
                        {{ __('front.site.form.close') }}
                    </button>
                    <button
                        type="button"
                        class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                        data-hs-overlay="#message-sent"
                    >
                        Send
                    </button>
                </div>
            </div>

            <img
                src="../../assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

<div
    id="message-sent"
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
                    {{ __('front.site.blog.message_received') }}
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#message-sent"
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

            <div class="px-6 py-8 text-center">
                <img
                    src="../../assets/images/icons/approve.png"
                    class="mx-auto mb-4 max-w-40"
                    alt=""
                />
                <p class="mb-3 text-2xl text-primary lg:text-3xl">
                    {{ __('front.site.blog.message_sent_successfully') }}
                </p>
                <p class="mb-7 lg:mb-10 lg:text-lg">
                    {{ __('front.site.blog.message_sent_to_friend') }}
                </p>

                <ul class="social-list primary justify-center">
                    <li>
                        <a href="#">
                            <svg>
                                <use href="../../assets/images/icons/sprite.svg#facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg>
                                <use href="../../assets/images/icons/sprite.svg#linkedin"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg>
                                <use href="../../assets/images/icons/sprite.svg#youtube"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg>
                                <use
                                    href="../../assets/images/icons/sprite.svg#instagram"
                                ></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <img
                src="../../assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

<div
    id="send-feedback"
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
                    {{ __('front.site.blog.send_your_feedback') }}
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#send-feedback"
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
                <form id="messageForm" method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div class="flex gap-2">
                            <div class="relative max-w-[80px] shrink-0">
                                <label
                                    for="title"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >{{ __('front.site.form.title') }}</label
                                >
                                <select
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
                                    id="name"
                                    type="text"
                                    name="name"
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
                                    id="email"
                                    type="email"
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
                                    id="nationality"
                                    type="text"
                                    name ='city_id'
                                    class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="{{ __('front.site.form.your_name') }}"
                                >
                                    <option value="" disabled selected>{{ __('front.site.form.select_destination') }}</option>
                                    @foreach ($cities as $city )
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="relative">
                            <label
                                for="email"
                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >{{ __('front.site.blog.your_feedback') }}</label
                            >
                            <textarea
                                type="text"
                                name="message"
                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                placeholder="{{ __('front.site.blog.write_your_message') }}"
                            ></textarea>
                            <span class="invalid text-danger" id="message_error"></span>

                        </div>
                    </div>

                    <div class="mb-6 mt-5 flex items-center justify-center gap-x-4">
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-overlay="#send-feedback"
                        >
                            {{ __('front.site.form.close') }}
                        </button>
                        <button
                            type="submit"
                            id="btnSubmit"
                            class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
{{--                            data-hs-overlay="#feedback-sent"--}}
                        >
                            {{ __('front.site.form.inquire_now') }}
                        </button>
                    </div>
                </form>



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
                        href="{{route('contact')}}"
                        class="flex items-center gap-1 text-sm"
                    >
                        <svg class="size-5 text-primary">
                            <use href="./assets/images/icons/sprite.svg#mail"></use>
                        </svg>
                        {{$site_name->email}}
                    </a>
                </div>
                <?php  $social=\App\Models\Social_setting::first() ?>
                <ul class="social-list primary justify-center">
                    <li>
                        <a href="{{$social->facebook}}">
                            <svg>
                                <use
                                    href="./assets/images/icons/sprite.svg#facebook"
                                ></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{$social->twitter}}">
                            <svg>
                                <use
                                    href="./assets/images/icons/sprite.svg#linkedin"
                                ></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{$social->youtube}}">
                            <svg>
                                <use
                                    href="./assets/images/icons/sprite.svg#youtube"
                                ></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{$social->instagram}}">
                            <svg>
                                <use
                                    href="./assets/images/icons/sprite.svg#instagram"
                                ></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <img
                src="../../assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

<div
    id="feedback-sent"
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
                    {{ __('front.site.blog.feedback_received') }}
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#feedback-sent"
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

            <div class="px-6 py-8 text-center">
                <img
                    src="../../assets/images/icons/approve.png"
                    class="mx-auto mb-4 max-w-40"
                    alt=""
                />
                <p class="mb-3 text-2xl text-primary lg:text-3xl">
                    {{ __('front.site.blog.your_feedback_received') }}
                </p>
                <p class="mb-7 lg:mb-10 lg:text-lg">
                    {{ __('front.site.blog.feedback_success_message') }}
                </p>

                <ul class="social-list primary justify-center">
                    <li>
                        <a href="#">
                            <svg>
                                <use href="../../assets/images/icons/sprite.svg#facebook"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg>
                                <use href="../../assets/images/icons/sprite.svg#linkedin"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg>
                                <use href="../../assets/images/icons/sprite.svg#youtube"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg>
                                <use
                                    href="../../assets/images/icons/sprite.svg#instagram"
                                ></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <img
                src="../../assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

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
                    <div data-hs-stepper-content-item='{ "index": 1 }'>
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
                                            id="names"
                                            name="names"
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
                                            id="emails"
                                            type="text"
                                            name="emails"
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
                                            id="nationality"
                                            type="text"
                                            name="nationality"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option hidden>{{ __('front.site.form.your_nationality') }}</option>
                                            <option value="0">{{ __('front.site.form.egyptian') }}</option>
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
                                            name="countries"
                                            class="block border-e-2 border-gray bg-transparent pe-2"
                                        >
                                            @include('front.layouts.nationalities')
                                        </select>

                                        <input
                                            id="tel"
                                            type="text"
                                            name="phone"
                                            class="flex-1 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.enter_phone_number') }}"
                                        />
                                        <span class="invalid text-danger" id="tel_error"></span>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End First Contnet -->

                    <!-- Second Contnet -->
                    <div
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
                                            type="date"
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
                                            type="date"
                                            name="departure_date"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        />
                                        <span class="invalid text-danger" id="departure-date_error"></span>

                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
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
                                            <option value="" disabled selected>{{ __('front.site.form.select_destination') }}</option>
                                            @foreach ($cities as $city )
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
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
                                        placeholder="{{ __('front.site.blog.write_your_note') }}"
                                    ></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Second Contnet -->

                    <!-- Final Contnet -->
                    <div
                        data-hs-stepper-content-item='{ "isFinal": true }'
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

                        <ul class="social-list primary justify-center">
                            <li>
                                <a href="#">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#facebook"
                                        ></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#linkedin"
                                        ></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#youtube"
                                        ></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg>
                                        <use
                                            href="./assets/images/icons/sprite.svg#instagram"
                                        ></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Final Contnet -->

                    <!-- Button Group -->
                    <div class="mt-5 flex items-center justify-center gap-x-4">
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-back-btn
                        >
                            {{ __('front.site.form.back') }}
                        </button>
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-next-btn
                        >
                            {{ __('front.site.form.next') }}
                        </button>
                        <button
                            type="button"
                            onclick="submitForms()"
                            class="inline-block min-w-36 rounded-lg border border-transparent bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-finish-btn
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
                            href="{{route('contact')}}"
                            class="flex items-center gap-1 text-sm"
                        >
                            <svg class="size-5 text-primary">
                                <use href="./assets/images/icons/sprite.svg#mail"></use>
                            </svg>
                            {{$site_name->email}}
                        </a>
                    </div>
                    <?php  $social=\App\Models\Social_setting::first() ?>
                    <ul class="social-list primary justify-center">
                        <li>
                            <a href="{{$social->facebook}}">
                                <svg>
                                    <use
                                        href="./assets/images/icons/sprite.svg#facebook"
                                    ></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{$social->twitter}}">
                                <svg>
                                    <use
                                        href="./assets/images/icons/sprite.svg#linkedin"
                                    ></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{$social->youtube}}">
                                <svg>
                                    <use
                                        href="./assets/images/icons/sprite.svg#youtube"
                                    ></use>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="{{$social->instagram}}">
                                <svg>
                                    <use
                                        href="./assets/images/icons/sprite.svg#instagram"
                                    ></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
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

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.js"></script>
<script>
    function budgetSlider(el) {
        const sliderWrapper = document.querySelector(el);
        const slider = sliderWrapper.querySelector(".slider");
        const minEl = sliderWrapper.querySelector(".slider-min");
        const maxEl = sliderWrapper.querySelector(".slider-max");
        noUiSlider.create(slider, {
            start: [1, 10000],
            connect: true,
            range: {
                min: 0,
                max: 10000,
            },
        });
        slider.noUiSlider.on("update", (values) => {
            minEl.textContent = Math.round(values[0]);
            maxEl.textContent = Math.round(values[1]);

            sliderWrapper.querySelector("#min").value = Math.round(values[0]);
            sliderWrapper.querySelector("#max").value = Math.round(values[1]);
        });
    }
    budgetSlider("#slider-1");
    budgetSlider("#slider-2");
    budgetSlider("#slider-3");
</script>

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
    // blog
    new Swiper("#blog .swiper", {
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

    // video-thumbs
    const videosThumbs = new Swiper("#videos .swiper.thumbs", {
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
    new Swiper("#videos .swiper.videos", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: false,
        grabCursor: false,
        thumbs: {
            swiper: videosThumbs,
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
        slidesPerView: 1.5,
        initialIndex: 2,
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

    // filters
    new Swiper(".filters.swiper", {
        grabCursor: true,
        a11y: false,
        freeMode: true,
        slidesPerView: "auto",
        breakpoints: {
            0: {
                spaceBetween: 10,
            },
            1024: {
                spaceBetween: 20,
            },
        },
        navigation: {
            nextEl: ".filter-next",
            prevEl: ".filter-prev",
        },
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}

<script>
    $(document).ready(function() {
        $('#messageForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            var form = $('#messageForm')[0];
            var formData = new FormData(form);

            // Disable the submit button
            $("#btnSubmit").prop('disabled', true);

            $.ajax({
                url: "{{ route('send_feedback') }}", // Form action URL
                type: "POST", // Form method (POST)
                data: formData, // Form data
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === "success") {
                        // const openBtn = document.querySelector('#btnSubmit');
                        //
                        // openBtn.addEventListener('click', () => {
                        //     HSOverlay.open('#feedback-sent');
                        // });
                        // Open the feedback-sent modal
                        HSOverlay.open('#feedback-sent');

                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);

                    // Re-enable the submit button
                    $("#btnSubmit").prop('disabled', false);

                    // Clear previous error messages
                    $(".invalid").text("").removeClass('is-invalid');

                    // Check if the response contains validation errors
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;

                        // Iterate through errors and display them
                        $.each(errors, function(key, value) {
                            console.log(key, value);

                            // Add 'is-invalid' class and show error messages
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '_error').text(value);
                        });
                        // $("button[data-hs-overlay]").removeAttr("data-hs-overlay");

                    } else {
                        // Handle other types of errors if needed
                        console.log("Unexpected error:", xhr.responseText);
                    }
                }
            });
        });
    });

</script>


{{--<script>--}}
{{--    $(document).ready(function() {--}}
{{--        // Submit form with AJAX--}}
{{--        $('#messageForm').submit(function(e) {--}}
{{--            e.preventDefault(); // Prevent default form submission--}}
{{--            var form = $('#messageForm')[0];--}}
{{--            var formData = new FormData(form);--}}

{{--            $("#btnSubmit").prop('disabled', true);--}}

{{--            $.ajax({--}}
{{--                url: "{{ route('send_feedback') }}", // Form action URL--}}
{{--                type: "POST", // Form method (POST)--}}
{{--                data: formData, // Form data--}}
{{--                processData: false,--}}
{{--                contentType: false,--}}
{{--                success: function(response) {--}}
{{--                    if (response.status === "success") {--}}
{{--                        console.log(response);--}}

{{--                        // $("#btnSubmit").prop('disabled', false);--}}
{{--                        // // Show the success modal directly--}}
{{--                        // $('#data-sent').removeClass('hidden');--}}
{{--                        // // Update the success message in the modal--}}
{{--                        // $('#data-sent .text-primary').text(response.res);--}}
{{--                        // $('#data-sent .full-message').text(response.full_message);--}}
{{--                        // $('#data-sent .message-header').text(response.message_header);--}}
{{--                        // $('#data-sent .message_icon').text(response.message_icon);--}}
{{--                        // $("#messageForm")[0].reset();--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function(xhr, status, error) {--}}
{{--                    // Handle error response--}}
{{--                    console.log(xhr.responseText);--}}
{{--                    $("#btnSubmit").prop('disabled', false);--}}

{{--                    var errors = xhr.responseJSON.errors;--}}

{{--                    console.log(errors);--}}
{{--                    $.each(errors, function(key, value) {--}}
{{--                        console.log(key, value);--}}

{{--                        $('#' + key).addClass('is-invalid');--}}
{{--                        $('#' + key + '_error').text(value);--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
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
            name: document.getElementById('names').value,
            email: document.getElementById('emails').value,
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

    function submitForms() {
        var formData = {
            title: document.getElementById('title').value,
            name: document.getElementById('names').value,
            email: document.getElementById('emails').value,
            nationality: document.getElementById('nationality').value,
            phone: document.getElementById('tel').value,
            arrival_date: document.getElementById('arrival-date').value,
            departure_date: document.getElementById('departure-date').value,
            city_id: document.getElementById('destination').value,
            tour_id: document.getElementById('accommodation').value,
            range_age: document.getElementById('age').value,
            notes: document.getElementById('notes').value
            // Add other form fields as needed
        };

        // Optionally, you can validate formData here before sending it via AJAX

        $.ajax({
            url: "{{ route('bookings.store') }}", // Replace with your route URL
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            success: function(response) {
                console.log(response); // Log success response
                // document.getElementById('secondForm').style.display = 'none';
                // document.getElementById('finalStep').style.display = 'block';
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error response
                // Optionally, show an error message to the user
            }
        });
    }
</script>

<script>
    function validateFirstForm() {
        // Clear previous error messages
        $('.invalid').text('');

        var formData = {
            title: document.getElementById('title').value,
            name: document.getElementById('names').value,
            email: document.getElementById('emails').value,
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
    function changeCount(type, delta) {
        const countElement = document.getElementById(type + '-count');
        let currentCount = parseInt(countElement.textContent);
        currentCount += delta;
        if (currentCount < 0) currentCount = 0; // prevent negative counts
        countElement.textContent = currentCount;
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('node_modules/select2/dist/js/select2.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#selectedHotel').select2({
            placeholder: 'choose Hotels',
            allowClear: true, // Adds a clear button


        });

    });
</script>
</body>
</html>
