<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$blog->title}}</title>

    @include('front.layouts.hreflang')
    <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">

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
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/doudou-design.css') }}" />

    <script
        defer
        src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
    <link rel="stylesheet" href="{{asset('node_modules/select2/dist/css/select2.min.css')}}">
    <script defer src="{{ asset('assets/scripts/main.js') }}"></script>
    <script defer src="{{ asset('assets/scripts/doudou-design.js') }}"></script>
</head>

<body>
<div class="app">
    <header class="page-header">
        <div class="navbar static border-b border-primary/20">
            <div class="container">
                <div class="navbar_top">
                    <?php  $site_name=\App\Models\General_setting::first() ?>

                    <x-social-links variant="white" class="topbar-socials max-md:hidden" />

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

            <nav class="navbar_nav bg-primary">
                <div class="container">
                    @include('front.layouts.nav-list')
                </div>
            </nav>

            <div class="navbar_desktop">
                <a href="{{route('home')}}">
                    <img
                        src="{{header_logo()}}"
                    class="w-48 shrink-0 lg:w-60"
                    alt=""
                />
                </a>

                <div class="flex flex-1 rounded-xl border border-primary bg-white">
                    <div class="flex flex-1 divide-x divide-primary">
                        <div class="flex-1">
                            <div
                                class="hs-dropdown relative flex h-full [--strategy:absolute]"
                            >
                                <button
                                    type="button"
                                    class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap px-4"
                                >
                                    <svg class="size-6 text-primary">
                                        <use
                                            href="../../assets/images/icons/sprite.svg#hotel"
                                        ></use>
                                    </svg>
                                    <p>{{ __('front.site.search.hotel_placeholder') }}</p>
                                    <svg
                                        class="accordion-arrow ms-auto shrink-0 hs-dropdown-open:rotate-180"
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
                                    class="hs-dropdown-menu duration inset-x-0 z-10 mt-2 hidden space-y-3 rounded-lg bg-white p-5 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                >
                                    <button
                                        type="button"
                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                        aria-pressed="true"
                                    >
                                        Hotel Name
                                    </button>
                                    <button
                                        type="button"
                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                    >
                                        Hotel Name
                                    </button>
                                    <button
                                        type="button"
                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                    >
                                        Hotel Name
                                    </button>
                                    <button
                                        type="button"
                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                    >
                                        Hotel Name
                                    </button>
                                    <button
                                        type="button"
                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                    >
                                        Hotel Name
                                    </button>
                                    <button
                                        type="button"
                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                    >
                                        Hotel Name
                                    </button>
                                    <button
                                        type="button"
                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                    >
                                        Hotel Name
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-1 items-center gap-3 px-4">
                            <svg class="size-6 shrink-0 text-primary">
                                <use href="../../assets/images/icons/sprite.svg#calender"></use>
                            </svg>
                            <input
                                id="range"
                                type="text"
                                class="flatpickr flatpickr-input flex-1 bg-transparent outline-none"
                                placeholder="{{ __('front.site.search.date_placeholder') }}"
                            />
                            <svg
                                class="accordion-arrow ms-auto shrink-0 hs-dropdown-open:rotate-180"
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
                        </div>
                        <div class="flex-1">
                            <div
                                class="hs-dropdown relative flex h-full [--strategy:absolute] [--auto-close:inside]"
                            >
                                <button
                                    type="button"
                                    class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap px-4"
                                >
                                    <svg class="size-6 shrink-0 text-primary">
                                        <use
                                            href="../../assets/images/icons/sprite.svg#subscription-cashflow"
                                        ></use>
                                    </svg>
                                    Budget From - to
                                    <svg
                                        class="accordion-arrow ms-auto shrink-0 hs-dropdown-open:rotate-180"
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
                                    class="hs-dropdown-menu duration inset-x-0 z-10 mt-2 hidden rounded-lg bg-white p-6 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                >
                                    <p class="mb-4 text-sm">{{ __('front.site.search.your_budget') }}</p>
                                    <div id="slider-1">
                                        <div class="slider mb-3"></div>
                                        <p class="flex items-center justify-between text-sm">
                                            <span>$<span class="slider-min"></span></span>
                                            <span>$<span class="slider-max"></span></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        type="button"
                        class="rounded-br-xl rounded-tr-xl bg-primary px-5 py-3 text-white transition-colors hover:bg-opacity-80"
                    >
                        Search
                    </button>
                </div>

                <button
                    type="button"
                    data-hs-overlay="#customize-tour"
                    class="flex items-center gap-2 rounded-lg bg-primary px-4 py-3 text-white transition-colors hover:bg-opacity-75"
                >
                    <svg class="size-5 text-white">
                        <use href="../../assets/images/icons/sprite.svg#settings"></use>
                    </svg>

                    {{ __('front.site.footer.customize_your_tour') }}
                </button>
            </div>

            <div class="navbar_mobile static">
                <div class="flex items-center gap-2">
                    <div class="hs-dropdown relative inline-flex">
                        <button type="button">
                            <svg class="size-6 text-white">
                                <use href="../../assets/images/icons/sprite.svg#menu"></use>
                            </svg>
                        </button>

                        <div
                            class="hs-dropdown-menu duration z-50 hidden min-w-72 opacity-0 transition-opacity hs-dropdown-open:opacity-100"
                            style="height: calc(100vh - 45px)"
                        >
                            <div
                                class="bg-gradient -ms-4 flex h-full flex-col justify-between px-4 pb-14 pt-10"
                            >
                                <nav class="space-y-4">
                                    <a
                                        href="./index.html"
                                        class="flex items-center gap-4 text-white"
                                    >
                                        <img
                                            src="../../assets/images/icons/egyptian-sphinx.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Egypt Tour
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/egyptian-urns.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Event
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/symbols_travel.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Services
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/egyptian-temple.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Blog
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/egyptian-walk.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Reviews
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/egyptian-bird.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Loyalty Program
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/egyptian-profile.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Careers
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/egyptian-pyramids.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        How it works
                                    </a>
                                    <a href="#" class="flex items-center gap-4 text-white">
                                        <img
                                            src="../../assets/images/icons/deal.png"
                                            class="size-6"
                                            alt=""
                                        />
                                        Become Our Partner
                                    </a>
                                </nav>

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

                    <img src="{{footer_logo()}}" class="h-8" alt="" />
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
                            <div class="rounded-xl border border-primary bg-white">
                                <div class="divide-y divide-primary">
                                    <div class="px-4 py-3">
                                        <div
                                            class="hs-dropdown relative flex h-full [--strategy:absolute] [--auto-close:outside] [--offset:5]"
                                        >
                                            <button
                                                type="button"
                                                class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap text-start"
                                            >
                                                <svg class="size-6 shrink-0 text-primary">
                                                    <use
                                                        href="../../assets/images/icons/sprite.svg#hotel"
                                                    ></use>
                                                </svg>
                                                <p class="flex-1">{{ __('front.site.search.hotel_placeholder') }}</p>
                                                <svg
                                                    class="accordion-arrow ms-auto shrink-0 hs-dropdown-open:rotate-180"
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
                                                class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden space-y-3 rounded-lg bg-white p-5 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                            >
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    aria-pressed="true"
                                                >
                                                    Hotel Name
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    Hotel Name
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    Hotel Name
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    Hotel Name
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    Hotel Name
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    Hotel Name
                                                </button>
                                                <button
                                                    type="button"
                                                    class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                >
                                                    Hotel Name
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-1 items-center gap-3 px-4 py-3">
                                        <svg class="size-6 shrink-0 text-primary">
                                            <use
                                                href="../../assets/images/icons/sprite.svg#calender"
                                            ></use>
                                        </svg>
                                        <input
                                            id="range"
                                            type="text"
                                            class="flatpickr flatpickr-input max-w-52 flex-1 shrink bg-transparent outline-none"
                                            placeholder="{{ __('front.site.search.date_placeholder') }}"
                                        />
                                        <svg
                                            class="accordion-arrow ms-auto shrink-0 hs-dropdown-open:rotate-180"
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
                                    </div>
                                    <div class="px-4 py-3">
                                        <div
                                            class="hs-dropdown relative flex h-full w-full [--strategy:absolute] [--auto-close:inside] [--offset:5]"
                                        >
                                            <button
                                                type="button"
                                                class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap text-start"
                                            >
                                                <svg class="size-6 shrink-0 text-primary">
                                                    <use
                                                        href="../../assets/images/icons/sprite.svg#subscription-cashflow"
                                                    ></use>
                                                </svg>
                                                <p class="flex-1">{{ __('front.site.search.budget_from_to') }}</p>
                                                <svg
                                                    class="accordion-arrow ms-auto shrink-0 hs-dropdown-open:rotate-180"
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
                                                class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden rounded-lg bg-white p-6 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                            >
                                                <p class="mb-4 text-sm">{{ __('front.site.search.your_budget') }}</p>
                                                <div id="slider-3">
                                                    <div class="slider mb-3"></div>
                                                    <p
                                                        class="flex items-center justify-between text-sm"
                                                    >
                                                        <span>$<span class="slider-min"></span></span>
                                                        <span>$<span class="slider-max"></span></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="inline-block w-full rounded-bl-xl rounded-br-xl bg-primary px-5 py-3 text-white transition-colors hover:bg-opacity-80"
                                >
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="button">
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
        <section class="pt-8">
            <div class="pt-8">
                <div class="container">
                    <ol class="breadcrumb mb-8" aria-label="Breadcrumb">
                        <li>
                            <a href="#"> Home </a>
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
                            <a href="#">
                                Blogs
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
                        <li aria-current="page">{{$blog->title}}</li>
                    </ol>


                    <div class="flex flex-col gap-10 lg:flex-row">
                        <div class="w-full shrink-0 lg:max-w-[420px]">
                            <div
                                class="hs-accordion-group space-y-2"
                                data-hs-accordion-always-open
                            >
                                <div class="hs-accordion active accordion-filter">
                                    <button
                                        class="hs-accordion-toggle accordion-btn font-medium"
                                    >
                                        <svg class="accordion-icon size-4.5">
                                            <use
                                                href="../../assets/images/icons/sprite.svg#articles"
                                            ></use>
                                        </svg>
                                        Content of This Article
                                    </button>
                                    <div
                                        class="hs-accordion-content accordion-content-wrapper"
                                    >
                                        <div class="accordion-content">
                                            <div class="hs-accordion-group space-y-3 px-2">
                                                <div class="hs-accordion active">
                                                    <button
                                                        class="hs-accordion-toggle inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-accordion-active:text-primary"
                                                    >
                                                        1. How to plan a trip to Egypt
                                                        <svg
                                                            class="block size-4 transition-transform hs-accordion-active:rotate-180"
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
                                                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300"
                                                    >
                                                        <ul class="list-disc py-3 ps-6">
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="hs-accordion">
                                                    <button
                                                        class="hs-accordion-toggle inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-accordion-active:text-primary"
                                                    >
                                                        1. How to plan a trip to Egypt
                                                        <svg
                                                            class="block size-4 transition-transform hs-accordion-active:rotate-180"
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
                                                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    >
                                                        <ul class="list-disc py-3 ps-6">
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="hs-accordion">
                                                    <button
                                                        class="hs-accordion-toggle inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-accordion-active:text-primary"
                                                    >
                                                        1. How to plan a trip to Egypt
                                                        <svg
                                                            class="block size-4 transition-transform hs-accordion-active:rotate-180"
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
                                                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    >
                                                        <ul class="list-disc py-3 ps-6">
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="hs-accordion">
                                                    <button
                                                        class="hs-accordion-toggle inline-flex w-full items-center justify-between gap-x-3 text-start text-black hs-accordion-active:text-primary"
                                                    >
                                                        1. How to plan a trip to Egypt
                                                        <svg
                                                            class="block size-4 transition-transform hs-accordion-active:rotate-180"
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
                                                        class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                    >
                                                        <ul class="list-disc py-3 ps-6">
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                            <li>
                                                                <a href="#" aria-current="page"
                                                                >Cheap Holidays to Egypt</a
                                                                >
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
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
                                        Search Articles
                                    </button>
                                    <div
                                        class="hs-accordion-content accordion-content-wrapper"
                                    >
                                        <div class="accordion-content">
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
                                                    class="block w-full text-sm font-normal text-black outline-none placeholder:text-gray"
                                                    placeholder="{{ __('front.site.blog.search_blogs_placeholder') }}"
                                                />
                                                <button
                                                    type="button"
                                                    class="bg-primary px-6 py-2 text-white"
                                                >
                                                    Search
                                                </button>
                                            </div>
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
                                        Latest Articles
                                    </button>
                                    <div
                                        class="hs-accordion-content accordion-content-wrapper"
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
                                                        Our Top Picks
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    >
                                                        Traveler Rating
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    >
                                                        Price (Low to High)
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    >
                                                        Price (High to Low)
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    >
                                                        Duration (Low to High)
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    >
                                                        Duration (High to Low)
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                                    >
                                                        Most Popular First
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="max-h-[640px] space-y-4 overflow-auto p-4 pt-0 lg:p-6 lg:pt-0"
                                            data-lenis-prevent
                                        >
                                            <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                                <img
                                                    src="../../assets/images/article-mini-placeholder.jpeg"
                                                    class="max-w-[125px] shrink-0 rounded"
                                                    alt=""
                                                />

                                                <div>
                                                    <p class="mb-2 line-clamp-2 font-medium">
                                                        {{ __('front.site.sections.best_time_to_visit_egypt') }}
                                                    </p>
                                                    <p
                                                        class="flex items-center gap-2 text-sm text-gray"
                                                    >
                                                        <svg class="size-4 text-primary">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#calendar-date"
                                                            ></use>
                                                        </svg>
                                                        13 March, 2024
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                                <img
                                                    src="../../assets/images/article-mini-placeholder.jpeg"
                                                    class="max-w-[125px] shrink-0 rounded"
                                                    alt=""
                                                />

                                                <div>
                                                    <p class="mb-2 line-clamp-2 font-medium">
                                                        {{ __('front.site.sections.best_time_to_visit_egypt') }}
                                                    </p>
                                                    <p
                                                        class="flex items-center gap-2 text-sm text-gray"
                                                    >
                                                        <svg class="size-4 text-primary">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#calendar-date"
                                                            ></use>
                                                        </svg>
                                                        13 March, 2024
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                                <img
                                                    src="../../assets/images/article-mini-placeholder.jpeg"
                                                    class="max-w-[125px] shrink-0 rounded"
                                                    alt=""
                                                />

                                                <div>
                                                    <p class="mb-2 line-clamp-2 font-medium">
                                                        {{ __('front.site.sections.best_time_to_visit_egypt') }}
                                                    </p>
                                                    <p
                                                        class="flex items-center gap-2 text-sm text-gray"
                                                    >
                                                        <svg class="size-4 text-primary">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#calendar-date"
                                                            ></use>
                                                        </svg>
                                                        13 March, 2024
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                                <img
                                                    src="../../assets/images/article-mini-placeholder.jpeg"
                                                    class="max-w-[125px] shrink-0 rounded"
                                                    alt=""
                                                />

                                                <div>
                                                    <p class="mb-2 line-clamp-2 font-medium">
                                                        {{ __('front.site.sections.best_time_to_visit_egypt') }}
                                                    </p>
                                                    <p
                                                        class="flex items-center gap-2 text-sm text-gray"
                                                    >
                                                        <svg class="size-4 text-primary">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#calendar-date"
                                                            ></use>
                                                        </svg>
                                                        13 March, 2024
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                                <img
                                                    src="../../assets/images/article-mini-placeholder.jpeg"
                                                    class="max-w-[125px] shrink-0 rounded"
                                                    alt=""
                                                />

                                                <div>
                                                    <p class="mb-2 line-clamp-2 font-medium">
                                                        {{ __('front.site.sections.best_time_to_visit_egypt') }}
                                                    </p>
                                                    <p
                                                        class="flex items-center gap-2 text-sm text-gray"
                                                    >
                                                        <svg class="size-4 text-primary">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#calendar-date"
                                                            ></use>
                                                        </svg>
                                                        13 March, 2024
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                                <img
                                                    src="../../assets/images/article-mini-placeholder.jpeg"
                                                    class="max-w-[125px] shrink-0 rounded"
                                                    alt=""
                                                />

                                                <div>
                                                    <p class="mb-2 line-clamp-2 font-medium">
                                                        {{ __('front.site.sections.best_time_to_visit_egypt') }}
                                                    </p>
                                                    <p
                                                        class="flex items-center gap-2 text-sm text-gray"
                                                    >
                                                        <svg class="size-4 text-primary">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#calendar-date"
                                                            ></use>
                                                        </svg>
                                                        13 March, 2024
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="hs-accordion active accordion-filter">
                                    <button
                                        class="hs-accordion-toggle accordion-btn font-medium"
                                    >
                                        <svg class="accordion-icon size-4.5">
                                            <use
                                                href="../../assets/images/icons/sprite.svg#tag"
                                            ></use>
                                        </svg>
                                        Tags
                                    </button>
                                    <div
                                        class="hs-accordion-content accordion-content-wrapper"
                                    >
                                        <div class="accordion-content">
                                            <div class="tags">
                                                <button type="button">wiki</button>
                                                <button type="button">Oasis Egypt</button>
                                                <button type="button">Egypt Civilization</button>
                                                <button type="button" aria-pressed="true">
                                                    Travel
                                                </button>
                                                <button type="button">History</button>
                                                <button type="button">Landmarks</button>
                                                <button type="button">Aswan</button>
                                                <button type="button" aria-pressed="true">
                                                    Pyramids
                                                </button>
                                                <button type="button">wiki</button>
                                                <button type="button">Oasis Egypt</button>
                                                <button type="button">Egypt Civilization</button>
                                                <button type="button">Travel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="hs-accordion active accordion-filter">
                                    <button
                                        class="hs-accordion-toggle accordion-btn font-medium"
                                    >
                                        <svg class="accordion-icon size-5">
                                            <use
                                                href="../../assets/images/icons/sprite.svg#info"
                                            ></use>
                                        </svg>
                                        About Us
                                    </button>
                                    <div
                                        class="hs-accordion-content accordion-content-wrapper"
                                    >
                                        <div class="accordion-content">
                                            <img
                                                src="../../assets/images/article-mini-placeholder.jpeg"
                                                class="mb-6 max-h-[150px] w-full rounded-xl object-cover object-center"
                                                alt=""
                                            />
                                            <p class="mb-5">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing
                                                elit. Sequi quos, repudiandae quisquam ducimus rem
                                                quibusdam veritatis distinctio possimus corrupti
                                                quia?
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
                                            <use
                                                href="../../assets/images/icons/sprite.svg#mail"
                                            ></use>
                                        </svg>
                                        Enter Email Address
                                    </button>
                                    <div
                                        class="hs-accordion-content accordion-content-wrapper"
                                    >
                                        <div class="accordion-content">
                                            <p class="mb-6">
                                                Subscribe for latest Updates & promotions
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
                                                    placeholder="{{ __('front.site.contact.your_email') }}"
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
                                                Your information is safe with us
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1">
                            <div
                                class="mb-3 flex flex-col items-start gap-x-4 gap-y-1 lg:mb-6 lg:flex-row lg:items-center lg:justify-between"
                            >
                                <p class="text-xl font-semibold text-primary lg:text-2xl">
                                    <span class="text-secondary"></span> {{$blog->title}}
                                </p>

{{--                                <div class="flex items-center gap-2">--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        data-hs-overlay="#send-feedback"--}}
{{--                                        class="inline-flex items-center gap-1 rounded-xl bg-primary px-5 py-3 text-lg text-white shadow-md transition-colors hover:bg-secondary lg:text-xl"--}}
{{--                                    >--}}
{{--                                        <svg class="size-6 text-white">--}}
{{--                                            <use--}}
{{--                                                href="../../assets/images/icons/sprite.svg#log-out"--}}
{{--                                            ></use>--}}
{{--                                        </svg>--}}
{{--                                        Send feedback--}}
{{--                                    </button>--}}
{{--                                    <button type="button" data-hs-overlay="#share-article">--}}
{{--                                        <img--}}
{{--                                            src="../../assets/images/icons/share.svg"--}}
{{--                                            class="size-6 lg:size-8"--}}
{{--                                            alt=""--}}
{{--                                        />--}}
{{--                                    </button>--}}
{{--                                </div>--}}
                            </div>

                            <div class="mb-5 flex flex-wrap gap-x-6 gap-y-2">
                    <span class="text-sm font-medium"
                    ><span class="text-primary">{{ __('front.site.blog.by') }}</span> {{ __('front.site.sections.doudou_team') }}</span
                    >
                                <span class="text-sm font-medium"
                                ><span class="text-primary">{{ __('front.site.blog.published') }}</span> {{$blog->getFormattedDate()}}</span
                                >
                                <span class="text-sm font-medium"
                                ><span class="text-primary">{{ __('front.site.blog.updated') }}</span> {{$blog->getUpdatedDate()}}</span
                                >
                            </div>

                            <div class="space-y-8">
                                <section>
                                    <div class="mb-6">
                                        <div
                                            class="items-start lg:grid lg:grid-cols-8 lg:gap-8"
                                        >
                                            <div
                                                class="h-[400px] max-lg:mb-8 lg:col-span-6 lg:h-[650px]"
                                            >
                                                <div class="swiper gallery h-full w-full">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide h-full">
                                                            <div
                                                                class="h-full overflow-hidden rounded-xl"
                                                            >
                                                                <img
                                                                    src="{{$blog->image_url}}"
                                                                    class="h-full w-full object-cover object-center"
                                                                    alt=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide h-full">
                                                            <div
                                                                class="h-full overflow-hidden rounded-xl"
                                                            >
                                                                <img
                                                                    src="../../assets/images/tour-img-1.png"
                                                                    class="h-full w-full object-cover object-center"
                                                                    alt=""
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide h-full">
                                                            <div
                                                                class="h-full overflow-hidden rounded-xl"
                                                            >
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

                                            <div class="h-[150px] lg:col-span-2 lg:h-[650px]">
                                                <div class="swiper thumbs h-full w-full flex-1">
                                                    <div class="swiper-wrapper h-full">
                                                        @foreach($blog->galleries as $gallary)
                                                        <div
                                                            class="swiper-slide group h-full cursor-pointer rounded-2xl border-2 border-primary"
                                                        >
                                                            <img
                                                                src="{{$gallary->image_url}}"
                                                                class="h-full w-full rounded-2xl border-2 border-transparent object-cover object-center group-[.swiper-slide-thumb-active]:border-primary"
                                                                alt=""
                                                            />
                                                        </div>
                                                        @endforeach
{{--                                                        <div--}}
{{--                                                            class="swiper-slide group h-full cursor-pointer rounded-2xl border-2 border-primary"--}}
{{--                                                        >--}}
{{--                                                            <img--}}
{{--                                                                src="../../assets/images/tour-img-1.png"--}}
{{--                                                                class="h-full w-full rounded-2xl border-2 border-transparent object-cover object-center group-[.swiper-slide-thumb-active]:border-primary"--}}
{{--                                                                alt=""--}}
{{--                                                            />--}}
{{--                                                        </div>--}}
{{--                                                        <div--}}
{{--                                                            class="swiper-slide group h-full cursor-pointer rounded-2xl border-2 border-primary"--}}
{{--                                                        >--}}
{{--                                                            <img--}}
{{--                                                                src="../../assets/images/tour-img-1.png"--}}
{{--                                                                class="h-full w-full rounded-2xl border-2 border-transparent object-cover object-center group-[.swiper-slide-thumb-active]:border-primary"--}}
{{--                                                                alt=""--}}
{{--                                                            />--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="mb-4 text-lg font-normal lg:text-xl">
                                        <span class="font-semibold text-primary">{{ __('front.site.blog.head') }}</span>
                                      {!!  $blog->description !!}
                                    </p>
{{--                                    <ul class="list-disc space-y-2 ps-4 marker:text-primary">--}}
{{--                                        <li>--}}
{{--                                            <span class="text-primary">Sub Head</span> Lorem ipsum--}}
{{--                                            dolor sit amet consectetur. Pulvinar tellus tempor--}}
{{--                                            pretium nibh id vitae amet. Tortor ullamcorper--}}
{{--                                            eleifend nisi turpis vestibulum. Mattis at proin urna--}}
{{--                                            egestas nunc tincidunt ligula tellus. Consequat in--}}
{{--                                            suscipit pellentesque tellus consectetur. Tellus eget--}}
{{--                                            eget lorem sed commodo interdum. Amet cursus aliquam--}}
{{--                                            lorem tellus elementum ac. Lectus quam adipiscing odio--}}
{{--                                            vel eleifend elit odio accumsan vulputate. Massa--}}
{{--                                            turpis nunc at nullam arcu sagittis vulputate ut. Sed--}}
{{--                                            commodo dapibus viverra id feugiat eu ullamcorper--}}
{{--                                            nullam. Aliquet felis facilisis Tags sociis morbi--}}
{{--                                            feugiat vestibulum. Nec turpis molestie est--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <span class="text-primary">Sub Head</span> Lorem ipsum--}}
{{--                                            dolor sit amet consectetur. Pulvinar tellus tempor--}}
{{--                                            pretium nibh id vitae amet. Tortor ullamcorper--}}
{{--                                            eleifend nisi turpis vestibulum. Mattis at proin urna--}}
{{--                                            egestas nunc tincidunt ligula tellus. Consequat in--}}
{{--                                            suscipit pellentesque tellus consectetur. Tellus eget--}}
{{--                                            eget lorem sed commodo interdum. Amet cursus aliquam--}}
{{--                                            lorem tellus elementum ac. Lectus quam adipiscing odio--}}
{{--                                            vel eleifend elit odio accumsan vulputate. Massa--}}
{{--                                            turpis nunc at nullam arcu sagittis vulputate ut. Sed--}}
{{--                                            commodo dapibus viverra id feugiat eu ullamcorper--}}
{{--                                            nullam. Aliquet felis facilisis Tags sociis morbi--}}
{{--                                            feugiat vestibulum. Nec turpis molestie est--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

                                    <img
                                        src="../../assets/images/section-divider.png"
                                        class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                                        alt=""
                                    />
                                </section>

{{--                                <section>--}}
{{--                                    <h2--}}
{{--                                        class="text-xl font-semibold text-primary lg:text-2xl"--}}
{{--                                    >--}}
{{--                                        <span class="text-secondary">Title</span> Here--}}
{{--                                    </h2>--}}

{{--                                    <img--}}
{{--                                        src="../../assets/images/tour-img-1.png"--}}
{{--                                        class="my-7 size-full max-h-[460px] rounded-2xl object-cover object-center"--}}
{{--                                        alt=""--}}
{{--                                    />--}}

{{--                                    <div class="space-y-6">--}}
{{--                                        <div>--}}
{{--                                            <h3--}}
{{--                                                class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                            >--}}
{{--                                                Titles--}}
{{--                                            </h3>--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                                tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                                ullamcorper eleifend nisi turpis vestibulum. Mattis--}}
{{--                                                at proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                                Consequat in suscipit pellentesque tellus--}}
{{--                                                consectetur. Tellus eget eget lorem sed commodo--}}
{{--                                                interdum. Amet cursus aliquam lorem tellus elementum--}}
{{--                                                ac. Lectus quam adipiscing odio vel eleifend elit--}}
{{--                                                odio accumsan vulputate. Massa turpis nunc at nullam--}}
{{--                                                arcu sagittis vulputate ut. Sed commodo dapibus--}}
{{--                                                viverra id feugiat eu ullamcorper nullam. Aliquet--}}
{{--                                                felis facilisis Tags sociis morbi feugiat--}}
{{--                                                vestibulum. Nec turpis molestie est--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <h3--}}
{{--                                                class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                            >--}}
{{--                                                Titles--}}
{{--                                            </h3>--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                                tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                                ullamcorper eleifend nisi turpis vestibulum. Mattis--}}
{{--                                                at proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                                Consequat in suscipit pellentesque tellus--}}
{{--                                                consectetur. Tellus eget eget lorem sed commodo--}}
{{--                                                interdum. Amet cursus aliquam lorem tellus elementum--}}
{{--                                                ac. Lectus quam adipiscing odio vel eleifend elit--}}
{{--                                                odio accumsan vulputate. Massa turpis nunc at nullam--}}
{{--                                                arcu sagittis vulputate ut. Sed commodo dapibus--}}
{{--                                                viverra id feugiat eu ullamcorper nullam. Aliquet--}}
{{--                                                felis facilisis Tags sociis morbi feugiat--}}
{{--                                                vestibulum. Nec turpis molestie est--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <h3--}}
{{--                                                class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                            >--}}
{{--                                                Titles--}}
{{--                                            </h3>--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                                tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                                ullamcorper eleifend nisi turpis vestibulum. Mattis--}}
{{--                                                at proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                                Consequat in suscipit pellentesque tellus--}}
{{--                                                consectetur. Tellus eget eget lorem sed commodo--}}
{{--                                                interdum. Amet cursus aliquam lorem tellus elementum--}}
{{--                                                ac. Lectus quam adipiscing odio vel eleifend elit--}}
{{--                                                odio accumsan vulputate. Massa turpis nunc at nullam--}}
{{--                                                arcu sagittis vulputate ut. Sed commodo dapibus--}}
{{--                                                viverra id feugiat eu ullamcorper nullam. Aliquet--}}
{{--                                                felis facilisis Tags sociis morbi feugiat--}}
{{--                                                vestibulum. Nec turpis molestie est--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <img--}}
{{--                                        src="../../assets/images/section-divider.png"--}}
{{--                                        class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                </section>--}}

{{--                                <section>--}}
{{--                                    <h2--}}
{{--                                        class="text-xl font-semibold text-primary lg:text-2xl"--}}
{{--                                    >--}}
{{--                                        <span class="text-secondary">Title</span> Here--}}
{{--                                    </h2>--}}

{{--                                    <img--}}
{{--                                        src="../../assets/images/tour-img-1.png"--}}
{{--                                        class="my-7 size-full max-h-[460px] rounded-2xl object-cover object-center"--}}
{{--                                        alt=""--}}
{{--                                    />--}}

{{--                                    <div class="space-y-6">--}}
{{--                                        <div>--}}
{{--                                            <h3--}}
{{--                                                class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                            >--}}
{{--                                                Titles--}}
{{--                                            </h3>--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                                tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                                ullamcorper eleifend nisi turpis vestibulum. Mattis--}}
{{--                                                at proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                                Consequat in suscipit pellentesque tellus--}}
{{--                                                consectetur. Tellus eget eget lorem sed commodo--}}
{{--                                                interdum. Amet cursus aliquam lorem tellus elementum--}}
{{--                                                ac. Lectus quam adipiscing odio vel eleifend elit--}}
{{--                                                odio accumsan vulputate. Massa turpis nunc at nullam--}}
{{--                                                arcu sagittis vulputate ut. Sed commodo dapibus--}}
{{--                                                viverra id feugiat eu ullamcorper nullam. Aliquet--}}
{{--                                                felis facilisis Tags sociis morbi feugiat--}}
{{--                                                vestibulum. Nec turpis molestie est--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <h3--}}
{{--                                                class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                            >--}}
{{--                                                Titles--}}
{{--                                            </h3>--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                                tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                                ullamcorper eleifend nisi turpis vestibulum. Mattis--}}
{{--                                                at proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                                Consequat in suscipit pellentesque tellus--}}
{{--                                                consectetur. Tellus eget eget lorem sed commodo--}}
{{--                                                interdum. Amet cursus aliquam lorem tellus elementum--}}
{{--                                                ac. Lectus quam adipiscing odio vel eleifend elit--}}
{{--                                                odio accumsan vulputate. Massa turpis nunc at nullam--}}
{{--                                                arcu sagittis vulputate ut. Sed commodo dapibus--}}
{{--                                                viverra id feugiat eu ullamcorper nullam. Aliquet--}}
{{--                                                felis facilisis Tags sociis morbi feugiat--}}
{{--                                                vestibulum. Nec turpis molestie est--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <h3--}}
{{--                                                class="mb-2 text-lg font-semibold text-primary lg:text-xl"--}}
{{--                                            >--}}
{{--                                                Titles--}}
{{--                                            </h3>--}}
{{--                                            <p>--}}
{{--                                                Lorem ipsum dolor sit amet consectetur. Pulvinar--}}
{{--                                                tellus tempor pretium nibh id vitae amet. Tortor--}}
{{--                                                ullamcorper eleifend nisi turpis vestibulum. Mattis--}}
{{--                                                at proin urna egestas nunc tincidunt ligula tellus.--}}
{{--                                                Consequat in suscipit pellentesque tellus--}}
{{--                                                consectetur. Tellus eget eget lorem sed commodo--}}
{{--                                                interdum. Amet cursus aliquam lorem tellus elementum--}}
{{--                                                ac. Lectus quam adipiscing odio vel eleifend elit--}}
{{--                                                odio accumsan vulputate. Massa turpis nunc at nullam--}}
{{--                                                arcu sagittis vulputate ut. Sed commodo dapibus--}}
{{--                                                viverra id feugiat eu ullamcorper nullam. Aliquet--}}
{{--                                                felis facilisis Tags sociis morbi feugiat--}}
{{--                                                vestibulum. Nec turpis molestie est--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <img--}}
{{--                                        src="../../assets/images/section-divider.png"--}}
{{--                                        class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                </section>--}}

                                <section>
{{--                                    <div--}}
{{--                                        class="mb-2 flex flex-col items-start gap-4 rounded-xl border border-gray px-5 py-4 lg:mb-6 lg:flex-row lg:items-center lg:justify-between"--}}
{{--                                    >--}}
{{--                                        <p--}}
{{--                                            class="text-xl font-semibold text-primary lg:text-2xl"--}}
{{--                                        >--}}
{{--                                            Was This Article Helpful?--}}
{{--                                        </p>--}}

{{--                                        <div class="flex items-center gap-2">--}}
{{--                                            <button--}}
{{--                                                type="button"--}}
{{--                                                data-hs-overlay="#send-feedback"--}}
{{--                                                class="inline-flex items-center gap-1 rounded-xl bg-primary px-5 py-3 text-lg text-white shadow-md transition-colors hover:bg-secondary lg:text-xl"--}}
{{--                                            >--}}
{{--                                                <svg class="size-6 text-white">--}}
{{--                                                    <use--}}
{{--                                                        href="../../assets/images/icons/sprite.svg#log-out"--}}
{{--                                                    ></use>--}}
{{--                                                </svg>--}}
{{--                                                Send feedback--}}
{{--                                            </button>--}}
{{--                                            <button type="button">--}}
{{--                                                <img--}}
{{--                                                    src="../../assets/images/icons/share.svg"--}}
{{--                                                    class="size-6 lg:size-8"--}}
{{--                                                    alt=""--}}
{{--                                                />--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <!-- comments -->
                                    <div
                                        class="overflow-hidden rounded-xl border border-gray"
                                    >
                                        <div
                                            class="flex items-center justify-between border-b border-gray px-6 py-4 lg:px-8 lg:py-6"
                                        >
                                            <p class="lg:text-lg">{{ __('front.site.blog.comments') }} ({{$blog->comments->count()}})</p>

                                            <div class="hs-dropdown relative flex">
                                                <button
                                                    class="hs-dropdown inline-flex items-center gap-2 text-sm"
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
                                            </div>
                                        </div>

                                        <div
                                            class="h-96 space-y-5 overflow-auto px-6 py-5"
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
{{--                                            <form--}}
{{--                                                class="flex items-center gap-2.5 rounded-xl border border-gray bg-white px-5 py-3"--}}
{{--                                            >--}}
{{--                                                <svg class="size-6 shrink-0 text-gray-300">--}}
{{--                                                    <use--}}
{{--                                                        href="../../assets/images/icons/sprite.svg#comment"--}}
{{--                                                    ></use>--}}
{{--                                                </svg>--}}

{{--                                                <input--}}
{{--                                                    type="text"--}}
{{--                                                    class="block flex-1 border-none bg-transparent text-black outline-none placeholder:text-gray-300"--}}
{{--                                                    placeholder="Write your comment here..."--}}
{{--                                                />--}}

{{--                                                <button class="shrink-0">--}}
{{--                                                    <svg class="size-6 text-primary">--}}
{{--                                                        <use--}}
{{--                                                            href="../../assets/images/icons/sprite.svg#send"--}}
{{--                                                        ></use>--}}
{{--                                                    </svg>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ---------- -->

        <section class="bg-primary py-12 text-white lg:py-16">
            <div class="container">
                <header class="section_header text-center">
                    <h2 class="section_heading">
                        Private Quality Guided Tours to Egypt Include Pyramids
                    </h2>
                </header>

                <div
                    class="grid gap-5 text-center md:grid-cols-2 lg:grid-cols-5 lg:gap-10"
                >
                    <div>
                        <div>
                            <img
                                src="../../assets/images/icons/map-signs.svg"
                                class="mx-auto mb-2 size-10"
                                alt=""
                            />
                            <h3 class="mb-4 text-2xl font-semibold text-secondary">
                                Tour Guide
                            </h3>
                        </div>

                        <p class="line-clamp-3 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do tationÃƒâ€šÃ‚Â 
                        </p>
                    </div>
                    <div>
                        <div>
                            <img
                                src="../../assets/images/icons/safety-certificate.svg"
                                class="mx-auto mb-2 size-10"
                                alt=""
                            />
                            <h3 class="mb-4 text-2xl font-semibold text-secondary">
                                Safety
                            </h3>
                        </div>

                        <p class="line-clamp-3 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do tationÃƒâ€šÃ‚Â 
                        </p>
                    </div>
                    <div>
                        <div>
                            <img
                                src="../../assets/images/icons/smile-beam.svg"
                                class="mx-auto mb-2 size-10"
                                alt=""
                            />
                            <h3 class="mb-4 text-2xl font-semibold text-secondary">
                                Luxury
                            </h3>
                        </div>
                        <p class="line-clamp-3 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do tationÃƒâ€šÃ‚Â 
                        </p>
                    </div>
                    <div>
                        <div>
                            <img
                                src="../../assets/images/icons/take-my-money.svg"
                                class="mx-auto mb-2 size-10"
                                alt=""
                            />
                            <h3 class="mb-4 text-2xl font-semibold text-secondary">
                                Affordable Prices
                            </h3>
                        </div>
                        <p class="line-clamp-3 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do tationÃƒâ€šÃ‚Â 
                        </p>
                    </div>
                    <div>
                        <div>
                            <img
                                src="../../assets/images/icons/map-cancel.svg"
                                class="mx-auto mb-2 size-10"
                                alt=""
                            />
                            <h3 class="mb-4 text-2xl font-semibold text-secondary">
                                Fair Cancellation
                            </h3>
                        </div>
                        <p class="line-clamp-3 leading-relaxed">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do tationÃƒâ€šÃ‚Â 
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="recommended-tours">
            <div class="container">
                <header
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.sections.recommended') }}</span> {{ __('front.site.sections.egypt_tours') }}
                    </h2>

                    <div class="flex items-center gap-4 max-lg:ms-auto">
                        <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

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
                        @foreach ($tours as $tour)
                            <div class="swiper-slide">
                                <article
                                    class="tour-card"
                                    data-aos="zoom-in"
                                    data-aos-delay="400"
                                    data-aos-duration="600"
                                >
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
                                                    <button type="button" class="swiper-btn prev">
                                                        <svg>
                                                            <use
                                                                href="./assets/images/icons/sprite.svg#arrow-left"
                                                            ></use>
                                                        </svg>
                                                    </button>
                                                </li>
                                                <li class="rounded-full bg-white/70">
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
                                    </div>

                                    <div class="tour-card__content">
                                        <a href="./tour-details.html"
                                        ><h3>{{$tour->name}}</h3></a
                                        >
                                        <div class="tour-card__review">
                                            <div class="flex items-center gap-x-px">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $tour->rate)
                                                        <svg class="star text-secondary">
                                                            <use href="./assets/images/icons/sprite.svg#star"></use>
                                                        </svg>
                                                    @else
                                                        <svg class="star text-gray-200">
                                                            <use href="./assets/images/icons/sprite.svg#star"></use>
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
                                                        href="./assets/images/icons/sprite.svg#location"
                                                    ></use>
                                                </svg>
                                                {{$tour->overview_values('location_from')}}, {{$tour->overview_values('location_to')}}
                                            </li>
                                            <li>
                                                <svg class="icon">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#clipboard-text-time"
                                                    ></use>
                                                </svg>

                                                {{$tour->overview_values('days') ?? 0}} Days / {{$tour->overview_values('nights') ?? 0}} Nights
                                            </li>
                                            <li>
                                                <svg class="icon">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#travel-card"
                                                    ></use>
                                                </svg>
                                                {{$tour->overview_values('group')}}
                                            </li>
                                            <li>
                                                <svg class="icon">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#event-available"
                                                    ></use>
                                                </svg>
                                                {{$tour->overview_values('availability')}}
                                            </li>
                                            <li>
                                                <svg class="icon">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#group-3"
                                                    ></use>
                                                </svg>
                                                {{$tour->overview_values('type')}}
                                            </li>
                                            <li>
                                                <svg class="icon">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#cancel"
                                                    ></use>
                                                </svg>
                                                {{$tour->overview_values('cancellation')}} Cancellation
                                            </li>
                                        </ul>

                                        <div class="tour-card__footer">
                                            <a href="#" class="tour-card__link">{{ __('front.site.sections.view_tour') }}</a>
                                            <p>
                                                Starting from
                                                <span class="price">{{$tour->price}} {{currency()}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

{{--        <section id="blog">--}}
{{--            <div class="container">--}}
{{--                <header--}}
{{--                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"--}}
{{--                >--}}
{{--                    <h2 class="section_heading text-primary">--}}
{{--                        <span>Learn</span> More About Egyptian Culture--}}
{{--                    </h2>--}}

{{--                    <div class="flex items-center gap-4 max-lg:ms-auto">--}}
{{--                        <a href="#" class="text-secondary lg:text-lg">View All</a>--}}

{{--                        <menu class="flex items-center gap-2">--}}
{{--                            <li>--}}
{{--                                <button type="button" class="swiper-btn prev">--}}
{{--                                    <svg>--}}
{{--                                        <use--}}
{{--                                            href="../../assets/images/icons/sprite.svg#arrow-left"--}}
{{--                                        ></use>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <button type="button" class="swiper-btn next">--}}
{{--                                    <svg>--}}
{{--                                        <use--}}
{{--                                            href="../../assets/images/icons/sprite.svg#arrow-right"--}}
{{--                                        ></use>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </li>--}}
{{--                        </menu>--}}
{{--                    </div>--}}
{{--                </header>--}}

{{--                <div class="swiper swiper-lg overflow-visible">--}}
{{--                    <div class="swiper-wrapper">--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <article class="tour-card">--}}
{{--                                <div class="tour-card__thumbnail-wrapper">--}}
{{--                                    <img--}}
{{--                                        src="../../assets/images/tour-1.jpeg"--}}
{{--                                        class="tour-card__thumbnail"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                </div>--}}

{{--                                <div class="tour-card__content">--}}
{{--                                    <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>--}}

{{--                                    <ul class="tour-card__features">--}}
{{--                                        <li>--}}
{{--                                            <svg class="icon">--}}
{{--                                                <use--}}
{{--                                                    href="../../assets/images/icons/sprite.svg#calendar-date"--}}
{{--                                                ></use>--}}
{{--                                            </svg>--}}
{{--                                            13 March, 2024--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

{{--                                    <p class="tour-card__desc">--}}
{{--                                        DOUDOU is about meeting others. You can get to know--}}
{{--                                        people online through the website...--}}
{{--                                    </p>--}}

{{--                                    <div class="tour-card__footer">--}}
{{--                                        <p>--}}
{{--                                            Published By--}}
{{--                                            <a href="#">Doudue Team</a>--}}
{{--                                        </p>--}}

{{--                                        <a href="#" class="tour-card__link">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </article>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <article class="tour-card">--}}
{{--                                <div class="tour-card__thumbnail-wrapper">--}}
{{--                                    <img--}}
{{--                                        src="../../assets/images/tour-2.jpeg"--}}
{{--                                        class="tour-card__thumbnail"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                </div>--}}

{{--                                <div class="tour-card__content">--}}
{{--                                    <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>--}}

{{--                                    <ul class="tour-card__features">--}}
{{--                                        <li>--}}
{{--                                            <svg class="icon">--}}
{{--                                                <use--}}
{{--                                                    href="../../assets/images/icons/sprite.svg#calendar-date"--}}
{{--                                                ></use>--}}
{{--                                            </svg>--}}
{{--                                            13 March, 2024--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

{{--                                    <p class="tour-card__desc">--}}
{{--                                        DOUDOU is about meeting others. You can get to know--}}
{{--                                        people online through the website...--}}
{{--                                    </p>--}}

{{--                                    <div class="tour-card__footer">--}}
{{--                                        <p>--}}
{{--                                            Published By--}}
{{--                                            <a href="#">Doudue Team</a>--}}
{{--                                        </p>--}}

{{--                                        <a href="#" class="tour-card__link">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </article>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <article class="tour-card">--}}
{{--                                <div class="tour-card__thumbnail-wrapper">--}}
{{--                                    <img--}}
{{--                                        src="../../assets/images/tour-3.jpeg"--}}
{{--                                        class="tour-card__thumbnail"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                </div>--}}

{{--                                <div class="tour-card__content">--}}
{{--                                    <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>--}}

{{--                                    <ul class="tour-card__features">--}}
{{--                                        <li>--}}
{{--                                            <svg class="icon">--}}
{{--                                                <use--}}
{{--                                                    href="../../assets/images/icons/sprite.svg#calendar-date"--}}
{{--                                                ></use>--}}
{{--                                            </svg>--}}
{{--                                            13 March, 2024--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

{{--                                    <p class="tour-card__desc">--}}
{{--                                        DOUDOU is about meeting others. You can get to know--}}
{{--                                        people online through the website...--}}
{{--                                    </p>--}}

{{--                                    <div class="tour-card__footer">--}}
{{--                                        <p>--}}
{{--                                            Published By--}}
{{--                                            <a href="#">Doudue Team</a>--}}
{{--                                        </p>--}}

{{--                                        <a href="#" class="tour-card__link">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </article>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide">--}}
{{--                            <article class="tour-card">--}}
{{--                                <div class="tour-card__thumbnail-wrapper">--}}
{{--                                    <img--}}
{{--                                        src="../../assets/images/tour-4.jpeg"--}}
{{--                                        class="tour-card__thumbnail"--}}
{{--                                        alt=""--}}
{{--                                    />--}}
{{--                                </div>--}}

{{--                                <div class="tour-card__content">--}}
{{--                                    <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>--}}

{{--                                    <ul class="tour-card__features">--}}
{{--                                        <li>--}}
{{--                                            <svg class="icon">--}}
{{--                                                <use--}}
{{--                                                    href="../../assets/images/icons/sprite.svg#calendar-date"--}}
{{--                                                ></use>--}}
{{--                                            </svg>--}}
{{--                                            13 March, 2024--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}

{{--                                    <p class="tour-card__desc">--}}
{{--                                        DOUDOU is about meeting others. You can get to know--}}
{{--                                        people online through the website...--}}
{{--                                    </p>--}}

{{--                                    <div class="tour-card__footer">--}}
{{--                                        <p>--}}
{{--                                            Published By--}}
{{--                                            <a href="#">Doudue Team</a>--}}
{{--                                        </p>--}}

{{--                                        <a href="#" class="tour-card__link">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </article>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <img--}}
{{--                    src="../../assets/images/section-divider.png"--}}
{{--                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"--}}
{{--                    alt=""--}}
{{--                />--}}
{{--            </div>--}}
{{--        </section>--}}

        <section id="reviews" class="bg-secondary pt-12 text-white lg:pt-20">
            <div class="container">
                <div class="grid gap-12 lg:grid-cols-3">
                    <header class="lg:col-span-1">
                        <h2 class="txt-shadow mb-4 text-3xl">
                            How Good is Egypt Doudou Travel?
                        </h2>
                        <p class="mb-6 lg:mb-8">
                            DOUDOU is about meeting others. You can get to know people
                            online through the website or meet them in real life...
                        </p>
                        <a
                            href="#"
                            class="inline-flex h-10 items-center justify-center rounded-xl bg-primary px-5 text-center text-sm text-white transition-colors hover:bg-opacity-80"
                        >{{ __('front.site.sections.explore_all') }}</a
                        >
                    </header>

                    <div class="flex min-w-0 items-center gap-4 lg:col-span-2">
                <span class="rounded-full bg-white/70">
                  <button type="button" class="swiper-btn prev shrink-0">
                    <svg>
                      <use
                          href="../../assets/images/icons/sprite.svg#arrow-left"
                      ></use>
                    </svg>
                  </button>
                </span>

                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach ($tours as $tour)
                                    @foreach ($tour->tour_comments as $comment)
                                        <div class="swiper-slide">
                                            <div class="rounded-3xl bg-white p-6 shadow-xl">
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
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $comment->rate)
                                                                    <svg class="size-3 text-secondary">
                                                                        <use href="{{asset('assets/images/icons/sprite.svg#star')}}"></use>
                                                                    </svg>
                                                                @else
                                                                    <svg class="size-3 text-gray-200">
                                                                        <use href="{{asset('assets/images/icons/sprite.svg#star')}}"></use>
                                                                    </svg>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        {{-- <div class="flex items-center gap-x-px">
                                                          <svg class="size-3 text-secondary">
                                                            <use
                                                              href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                                            ></use>
                                                          </svg>
                                                          <svg class="size-3 text-secondary">
                                                            <use
                                                              href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                                            ></use>
                                                          </svg>
                                                          <svg class="size-3 text-secondary">
                                                            <use
                                                              href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                                            ></use>
                                                          </svg>
                                                          <svg class="size-3 text-secondary">
                                                            <use
                                                              href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                                            ></use>
                                                          </svg>
                                                          <svg class="size-3 text-gray-200">
                                                            <use
                                                              href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                                            ></use>
                                                          </svg>
                                                        </div> --}}
                                                    </div>
                                                </div>

                                                <p
                                                    class="line-clamp-4 font-normal leading-relaxed text-gray"
                                                >
                                                    {!! implode(' ', array_slice(str_word_count(strip_tags($comment->comment), 1), 0, 17)) !!}

                                                </p>
                                                <a href="#" class="text-primary hover:underline"
                                                >{{ __('front.site.sections.read_more') }}</a
                                                >
                                            </div>
                                        </div>

                                    @endforeach
                                @endforeach
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
            </div>

            <img
                src="../../assets/images/section-decoration.png"
                class="mt-6 w-full lg:mt-14"
                alt=""
            />
        </section>

        <section>
            <div class="container">
                <header class="section_header">
                    <h2 class="section_heading text-primary">
                        <span>{{ __('front.site.blog.frequently') }}</span> {{ __('front.site.blog.asked_questions') }}
                    </h2>
                </header>

                <div class="hs-accordion-group space-y-2">
                    <x-question-component/>
                </div>

                <div class="mt-6 text-center">
                    <a href="#" class="text-lg text-secondary underline">{{ __('front.site.sections.show_more') }}</a>
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
    <div class="relative">
        <img
            src="../../assets/images/section-decoration.png"
            class="w-full"
            alt=""
        />
        <button type="button" id="toTop" onclick="lenis.scrollTo('body')">
            <svg>
                <use href="../../assets/images/icons/sprite.svg#back-to-top"></use>
            </svg>
        </button>

        <footer class="footer">
            <div class="container">
                <div class="footer__grid">
                    <div class="footer__aside">
                        <img
                            src="../../assets/images/logo-footer.png"
                            class="footer__logo"
                            alt=""
                        />

                        <ul>
                            <li>
                                <svg>
                                    <use
                                        href="../../assets/images/icons/sprite.svg#map-pin"
                                    ></use>
                                </svg>
                                <a href="#">{{$site_name->address}}</a>
                            </li>
                            <li>
                                <svg>
                                    <use href="../../assets/images/icons/sprite.svg#mail"></use>
                                </svg>

                                <a href="mailto:{{$site_name->email}}">{{$site_name->email}}</a>
                            </li>
                            <li>
                                <svg>
                                    <use href="../../assets/images/icons/sprite.svg#phone"></use>
                                </svg>

                                <a href="tel:{{$site_name->manager_phone}}">{{$site_name->manager_phone}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__sitemap">
                        <div>
                            <h3>{{ __('front.site.footer.popular_tour_packages') }}</h3>

                            <ul>
                                <li>
                                    <a href="#">{{ __('front.site.footer.egypt_travel_package') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.egypt_shore_excursions') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.egypt_nile_cruises_package') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.egypt_family_holiday_package') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.group_tours_to_egypt') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3>{{ __('front.site.footer.main_links') }}</h3>

                            <ul>
                                <li>
                                    <a href="#">{{ __('front.site.footer.about_us') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.contact_us') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.careers') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.blogs') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.faqs') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.privacy_policy') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.terms_conditions') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3>{{ __('front.site.footer.official_pages') }}</h3>

                            <ul>
                                <li>
                                    <a href="#">{{ __('front.site.footer.how_it_works') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.loyalty_program') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.events') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.become_partner') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.egypt_travel_guide') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('front.site.footer.services') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="footer__copyright">
                    <p class="max-lg:order-2 max-lg:text-center max-lg:text-sm">
                        {{ __('front.site.footer.rights_reserved') }} &copy;
                        <span class="text-secondary">{{ __('front.site.footer.brand') }} </span>
                        2024
                    </p>

                    <ul class="flex items-center gap-x-3 max-lg:order-1">
                        <li>
                            <a href="#">
                                <img
                                    src="../../assets/images/icons/facebook.png"
                                    class="size-8"
                                    alt=""
                                />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img
                                    src="../../assets/images/icons/linkedin.png"
                                    class="size-8"
                                    alt=""
                                />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img
                                    src="../../assets/images/icons/youtube.png"
                                    class="size-8"
                                    alt=""
                                />
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img
                                    src="../../assets/images/icons/instagram.png"
                                    class="size-8"
                                    alt=""
                                />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
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
                    Send This Article to A Freind
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
                            >{{ __('front.site.form.email') }}</label
                            >
                            <input
                                id="email"
                                type="text"
                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                placeholder="{{ __('front.site.form.your_name') }}"
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
                                placeholder="{{ __('front.site.blog.friend_email') }}"
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
                        Cancel
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
                    Message Sent Successfully
                </p>
                <p class="mb-7 lg:mb-10 lg:text-lg">
                    Your Message has been successfully sent to your friend.
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

{{--<div--}}
{{--    id="send-feedback"--}}
{{--    class="hs-overlay fixed start-0 top-0 z-[100] hidden size-full overflow-y-auto overflow-x-hidden hs-overlay-backdrop-open:bg-black/50"--}}
{{-->--}}
{{--    <div--}}
{{--        class="m-3 mt-0 flex min-h-[calc(100%-3.5rem)] items-center opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-[550px]"--}}
{{--    >--}}
{{--        <div class="flex w-full flex-col overflow-hidden rounded-3xl bg-white">--}}
{{--            <div--}}
{{--                class="flex items-center justify-between bg-primary px-6 py-5"--}}
{{--                style="background: linear-gradient(90deg, #005690 0%, #0071bd 100%)"--}}
{{--            >--}}
{{--                <h3 class="text-lg font-semibold text-white lg:text-xl">--}}
{{--                    Send Your Feedback--}}
{{--                </h3>--}}
{{--                <button--}}
{{--                    type="button"--}}
{{--                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"--}}
{{--                    data-hs-overlay="#send-feedback"--}}
{{--                >--}}
{{--                    <span class="sr-only">{{ __('front.site.form.close') }}</span>--}}
{{--                    <svg--}}
{{--                        class="size-5 shrink-0 text-white"--}}
{{--                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                        width="24"--}}
{{--                        height="24"--}}
{{--                        viewBox="0 0 24 24"--}}
{{--                        fill="none"--}}
{{--                        stroke="currentColor"--}}
{{--                        stroke-width="2"--}}
{{--                        stroke-linecap="round"--}}
{{--                        stroke-linejoin="round"--}}
{{--                    >--}}
{{--                        <path d="M18 6 6 18" />--}}
{{--                        <path d="m6 6 12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <div class="px-6 py-8">--}}
{{--                <form class="form w-full">--}}
{{--                    <div class="space-y-6">--}}
{{--                        <div class="flex gap-2">--}}
{{--                            <div class="relative max-w-[80px] shrink-0">--}}
{{--                                <label--}}
{{--                                    for="title"--}}
{{--                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"--}}
{{--                                >Title</label--}}
{{--                                >--}}
{{--                                <select--}}
{{--                                    id="title"--}}
{{--                                    type="text"--}}
{{--                                    class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"--}}
{{--                                    placeholder="Your Name"--}}
{{--                                >--}}
{{--                                    <option value="mr">Mr.</option>--}}
{{--                                    <option value="ms">Ms.</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="relative flex-1">--}}
{{--                                <label--}}
{{--                                    for="name"--}}
{{--                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"--}}
{{--                                >Name</label--}}
{{--                                >--}}
{{--                                <input--}}
{{--                                    id="name"--}}
{{--                                    type="text"--}}
{{--                                    class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"--}}
{{--                                    placeholder="Your Name"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">--}}
{{--                            <div class="relative flex-1">--}}
{{--                                <label--}}
{{--                                    for="email"--}}
{{--                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"--}}
{{--                                >Email</label--}}
{{--                                >--}}
{{--                                <input--}}
{{--                                    id="email"--}}
{{--                                    type="text"--}}
{{--                                    class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"--}}
{{--                                    placeholder="Your Name"--}}
{{--                                />--}}
{{--                            </div>--}}
{{--                            <div class="relative shrink-0 lg:max-w-[180px]">--}}
{{--                                <label--}}
{{--                                    for="nationality"--}}
{{--                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"--}}
{{--                                >Nationality</label--}}
{{--                                >--}}
{{--                                <select--}}
{{--                                    id="nationality"--}}
{{--                                    type="text"--}}
{{--                                    class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"--}}
{{--                                    placeholder="Your Name"--}}
{{--                                >--}}
{{--                                    <option hidden>Your Nationality</option>--}}
{{--                                    <option>Egyption</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="relative">--}}
{{--                            <label--}}
{{--                                for="email"--}}
{{--                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"--}}
{{--                            >Your Feedback</label--}}
{{--                            >--}}
{{--                            <textarea--}}
{{--                                type="text"--}}
{{--                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"--}}
{{--                                placeholder="Write your Message here..."--}}
{{--                            ></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--                <div class="mb-6 mt-5 flex items-center justify-center gap-x-4">--}}
{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"--}}
{{--                        data-hs-overlay="#send-feedback"--}}
{{--                    >--}}
{{--                        Cancel--}}
{{--                    </button>--}}
{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"--}}
{{--                        data-hs-overlay="#feedback-sent"--}}
{{--                    >--}}
{{--                        Send--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <p class="mb-2 text-center text-sm">--}}
{{--                    Do you face any issue sending a Request?--}}
{{--                    <span class="text-primary">Please contact directly by</span>--}}
{{--                </p>--}}
{{--                <div--}}
{{--                    class="mb-6 flex flex-col items-center justify-center gap-x-4 gap-y-2 lg:flex-row"--}}
{{--                >--}}
{{--                    <a--}}
{{--                        href="tel:010993322110"--}}
{{--                        class="flex items-center gap-1 text-sm"--}}
{{--                    >--}}
{{--                        <svg class="size-4 text-primary">--}}
{{--                            <use href="../../assets/images/icons/sprite.svg#whatsapp"></use>--}}
{{--                        </svg>--}}
{{--                        010993322110--}}
{{--                    </a>--}}
{{--                    <a--}}
{{--                        href="mailto:sherif2024@gmail.com"--}}
{{--                        class="flex items-center gap-1 text-sm"--}}
{{--                    >--}}
{{--                        <svg class="size-4 text-primary">--}}
{{--                            <use href="../../assets/images/icons/sprite.svg#mail"></use>--}}
{{--                        </svg>--}}
{{--                        sherif2024@gmail.com--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <ul class="social-list primary justify-center">--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <svg>--}}
{{--                                <use href="../../assets/images/icons/sprite.svg#facebook"></use>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <svg>--}}
{{--                                <use href="../../assets/images/icons/sprite.svg#linkedin"></use>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <svg>--}}
{{--                                <use href="../../assets/images/icons/sprite.svg#youtube"></use>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">--}}
{{--                            <svg>--}}
{{--                                <use--}}
{{--                                    href="../../assets/images/icons/sprite.svg#instagram"--}}
{{--                                ></use>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <img--}}
{{--                src="../../assets/images/icons/model-decoration.png"--}}
{{--                class="w-full"--}}
{{--                alt=""--}}
{{--            />--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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
                    Feedback Received
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
                    Your Feedback Received
                </p>
                <p class="mb-7 lg:mb-10 lg:text-lg">
                    Your Feedback has been successfully received. We look forward to
                    share with you all updates and subscriptions!
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

<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // gallery-2
    new Swiper(".swiper.thumbs", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 24,
        freeMode: false,
        breakpoints: {
            0: {
                slidesPerView: 3,
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
    new Swiper(".swiper.gallery", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: false,
        grabCursor: false,
        thumbs: {
            swiper: ".swiper.thumbs",
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
<script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
</body>
</html>
