<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('front.site.meta.default_title') }}</title>

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
        src="https://cdn.jsdelivr.net/npm/headroom.js@0.12.0/dist/headroom.min.js"
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

            <nav class="navbar_nav primary">
                <div class="container">
                    @include('front.layouts.nav-list')
                </div>
            </nav>

{{--            <div class="navbar_desktop">--}}
{{--                <img src="../../assets/images/logo.png" class="logo" alt="" />--}}

{{--                <div class="flex rounded-xl border border-primary bg-primary">--}}
{{--                    <div class="flex flex-1 divide-x divide-primary">--}}
{{--                        <div class="shrink-0 rounded-bl-xl rounded-tl-xl bg-white">--}}
{{--                            <div--}}
{{--                                class="hs-dropdown relative flex h-full [--strategy:absolute]"--}}
{{--                            >--}}
{{--                                <button--}}
{{--                                    type="button"--}}
{{--                                    class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap px-4 text-sm text-black"--}}
{{--                                >--}}
{{--                                    <svg class="size-6 text-primary">--}}
{{--                                        <use--}}
{{--                                            href="../../assets/images/icons/sprite.svg#hotel"--}}
{{--                                        ></use>--}}
{{--                                    </svg>--}}
{{--                                    Accommodation--}}
{{--                                    <svg--}}
{{--                                        class="accordion-arrow ms-auto hs-dropdown-open:rotate-180"--}}
{{--                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                        width="24"--}}
{{--                                        height="24"--}}
{{--                                        viewBox="0 0 24 24"--}}
{{--                                        fill="none"--}}
{{--                                        stroke="currentColor"--}}
{{--                                        stroke-width="2"--}}
{{--                                        stroke-linecap="round"--}}
{{--                                        stroke-linejoin="round"--}}
{{--                                    >--}}
{{--                                        <path d="m6 9 6 6 6-6" />--}}
{{--                                    </svg>--}}
{{--                                </button>--}}

{{--                                <div--}}
{{--                                    class="hs-dropdown-menu duration inset-x-0 z-10 mt-2 hidden space-y-3 rounded-lg bg-white p-5 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"--}}
{{--                                >--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"--}}
{{--                                        aria-pressed="true"--}}
{{--                                    >--}}
{{--                                        Hotel Name--}}
{{--                                    </button>--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"--}}
{{--                                    >--}}
{{--                                        Hotel Name--}}
{{--                                    </button>--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"--}}
{{--                                    >--}}
{{--                                        Hotel Name--}}
{{--                                    </button>--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"--}}
{{--                                    >--}}
{{--                                        Hotel Name--}}
{{--                                    </button>--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"--}}
{{--                                    >--}}
{{--                                        Hotel Name--}}
{{--                                    </button>--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"--}}
{{--                                    >--}}
{{--                                        Hotel Name--}}
{{--                                    </button>--}}
{{--                                    <button--}}
{{--                                        type="button"--}}
{{--                                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary"--}}
{{--                                    >--}}
{{--                                        Hotel Name--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="flex shrink-0 items-center gap-3 bg-white px-4">--}}
{{--                            <svg class="size-6 text-primary">--}}
{{--                                <use href="../../assets/images/icons/sprite.svg#calender"></use>--}}
{{--                            </svg>--}}
{{--                            <input--}}
{{--                                id="range"--}}
{{--                                type="text"--}}
{{--                                class="flatpickr flatpickr-input flex-1 bg-transparent text-sm text-black outline-none placeholder:text-black"--}}
{{--                                placeholder="Check in date - Check out date"--}}
{{--                            />--}}
{{--                            <svg--}}
{{--                                class="accordion-arrow ms-auto hs-dropdown-open:rotate-180"--}}
{{--                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                width="24"--}}
{{--                                height="24"--}}
{{--                                viewBox="0 0 24 24"--}}
{{--                                fill="none"--}}
{{--                                stroke="currentColor"--}}
{{--                                stroke-width="2"--}}
{{--                                stroke-linecap="round"--}}
{{--                                stroke-linejoin="round"--}}
{{--                            >--}}
{{--                                <path d="m6 9 6 6 6-6" />--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="shrink-0 bg-white">--}}
{{--                            <div--}}
{{--                                class="hs-dropdown relative flex h-full [--strategy:absolute] [--auto-close:inside]"--}}
{{--                            >--}}
{{--                                <button--}}
{{--                                    type="button"--}}
{{--                                    class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap px-4 text-sm text-black"--}}
{{--                                >--}}
{{--                                    <svg class="size-6 text-primary">--}}
{{--                                        <use--}}
{{--                                            href="../../assets/images/icons/sprite.svg#subscription-cashflow"--}}
{{--                                        ></use>--}}
{{--                                    </svg>--}}
{{--                                    Budget From - to--}}
{{--                                    <svg--}}
{{--                                        class="accordion-arrow ms-auto hs-dropdown-open:rotate-180"--}}
{{--                                        xmlns="http://www.w3.org/2000/svg"--}}
{{--                                        width="24"--}}
{{--                                        height="24"--}}
{{--                                        viewBox="0 0 24 24"--}}
{{--                                        fill="none"--}}
{{--                                        stroke="currentColor"--}}
{{--                                        stroke-width="2"--}}
{{--                                        stroke-linecap="round"--}}
{{--                                        stroke-linejoin="round"--}}
{{--                                    >--}}
{{--                                        <path d="m6 9 6 6 6-6" />--}}
{{--                                    </svg>--}}
{{--                                </button>--}}

{{--                                <div--}}
{{--                                    class="hs-dropdown-menu duration inset-x-0 z-10 mt-2 hidden rounded-lg bg-white p-6 text-black opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"--}}
{{--                                >--}}
{{--                                    <p class="mb-4 text-sm">Your Budget</p>--}}
{{--                                    <div id="slider-1">--}}
{{--                                        <div class="slider mb-3"></div>--}}
{{--                                        <p class="flex items-center justify-between text-sm">--}}
{{--                                            <span>$<span class="slider-min"></span></span>--}}
{{--                                            <span>$<span class="slider-max"></span></span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="rounded-br-xl rounded-tr-xl bg-primary px-5 py-3 text-white transition-colors hover:bg-opacity-80"--}}
{{--                    >--}}
{{--                        Search--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <button--}}
{{--                    type="button"--}}
{{--                    data-hs-overlay="#customize-tour"--}}
{{--                    class="flex shrink-0 items-center gap-2 rounded-lg bg-primary px-4 py-4 text-sm text-white transition-colors hover:bg-opacity-75"--}}
{{--                >--}}
{{--                    <svg class="size-5 shrink-0 text-white">--}}
{{--                        <use href="../../assets/images/icons/sprite.svg#settings"></use>--}}
{{--                    </svg>--}}

{{--                    {{ __('front.site.footer.customize_your_tour') }}--}}
{{--                </button>--}}
{{--            </div>--}}

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
                                            class="hs-dropdown relative flex h-full [--strategy:absolute] [--offset:5]"
                                        >
                                            <button
                                                type="button"
                                                class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap text-start text-black"
                                            >
                                                <svg class="size-6 shrink-0 text-primary">
                                                    <use
                                                        href="../../assets/images/icons/sprite.svg#hotel"
                                                    ></use>
                                                </svg>
                                                <p class="flex-1">High Luxury 5 Stars</p>
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
                                            placeholder="Check in date - Check out date"
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
                                                class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap text-start text-black"
                                            >
                                                <svg class="size-6 shrink-0 text-primary">
                                                    <use
                                                        href="../../assets/images/icons/sprite.svg#subscription-cashflow"
                                                    ></use>
                                                </svg>
                                                <p class="flex-1">Budget From - to</p>
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
                                                class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden rounded-lg bg-white p-6 text-black opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                            >
                                                <p class="mb-4 text-sm">Your Budget</p>
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

    <br>
    <main class="relative space-y-12 lg:space-y-16">

        <!-- ---------- -->

        <section id="blog">
            <div class="container">
                <header
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>Learn</span> More About Blogs For {{$tag->name}} Tag
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
                        @forelse($tag_blogs as $blog)
                        <div class="swiper-slide">
                            <article class="tour-card">
                                <div class="tour-card__thumbnail-wrapper">
                                    <a href="{{route('blog_preview',$blog->slug)}}"> <img
                                        src="{{$blog->image_url}}"
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
                                            Published By
                                            <a href="#">Doudue Team</a>
                                        </p>

                                        <a href="{{route('blog_preview',$blog->slug)}}" class="tour-card__link">Read More</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @empty
                            <div>
                                <li style="color: #0D6AAD; font-size: 20px">
                                    Not Found Blogs For {{$tag->name}}  Tag
                                </li>
                            </div>

                            @endforelse



                    </div>
                </div>

                <img
                    src="../../assets/images/section-divider.png"
                    class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                    alt=""
                />
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
                                <a href="#">Put Address Here</a>
                            </li>
                            <li>
                                <svg>
                                    <use href="../../assets/images/icons/sprite.svg#mail"></use>
                                </svg>

                                <a href="mailto:email">Put Email Here</a>
                            </li>
                            <li>
                                <svg>
                                    <use href="../../assets/images/icons/sprite.svg#phone"></use>
                                </svg>

                                <a href="tel:+tel">Put Phone Here</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer__sitemap">
                        <div>
                            <h3>{{ __('front.site.footer.popular_tour_packages') }}</h3>

                            <ul>
                                <li>
                                    <a href="./egypt-tours.html">{{ __('front.site.footer.egypt_travel_package') }}</a>
                                </li>
                                <li>
                                    <a href="./egypt-tours.html">{{ __('front.site.footer.egypt_shore_excursions') }}</a>
                                </li>
                                <li>
                                    <a href="./egypt-tours.html"
                                    >{{ __('front.site.footer.egypt_nile_cruises_package') }}</a
                                    >
                                </li>
                                <li>
                                    <a href="./egypt-tours.html"
                                    >{{ __('front.site.footer.egypt_family_holiday_package') }}</a
                                    >
                                </li>
                                <li>
                                    <a href="./egypt-tours.html">{{ __('front.site.footer.group_tours_to_egypt') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3>{{ __('front.site.footer.main_links') }}</h3>

                            <ul>
                                <li>
                                    <a href="./about.html">{{ __('front.site.footer.about_us') }}</a>
                                </li>
                                <li>
                                    <a href="./contact.html">{{ __('front.site.footer.contact_us') }}</a>
                                </li>
                                <li>
                                    <a href="./careers.html">{{ __('front.site.footer.careers') }}</a>
                                </li>
                                <li>
                                    <a href="./blogs.html">{{ __('front.site.footer.blogs') }}</a>
                                </li>
                                <li>
                                    <a href="./faq.html">{{ __('front.site.footer.faqs') }}</a>
                                </li>
                                <li>
                                    <a href="./privacy.html">{{ __('front.site.footer.privacy_policy') }}</a>
                                </li>
                                <li>
                                    <a href="./privacy.html">{{ __('front.site.footer.terms_conditions') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3>{{ __('front.site.footer.official_pages') }}</h3>

                            <ul>
                                <li>
                                    <a href="./how-it-works.html">{{ __('front.site.footer.how_it_works') }}</a>
                                </li>
                                <li>
                                    <a href="./loyalty-program.html">{{ __('front.site.footer.loyalty_program') }}</a>
                                </li>
                                <li>
                                    <a href="./events.html">{{ __('front.site.footer.events') }}</a>
                                </li>
                                <li>
                                    <a href="./partner.html">{{ __('front.site.footer.become_partner') }}</a>
                                </li>
                                <li>
                                    <a href="./services-tour-guidance.html"
                                    >{{ __('front.site.footer.egypt_travel_guide') }}</a
                                    >
                                </li>
                                <li>
                                    <a href="./services.html">{{ __('front.site.footer.services') }}</a>
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

                    <ul class="social-list white">
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
        </footer>
    </div>

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
                    Send This Article to A Freind
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#share-article"
                >
                    <span class="sr-only">Close</span>
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
                                >Title</label
                                >
                                <select
                                    id="title"
                                    type="text"
                                    class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="Your Name"
                                >
                                    <option value="mr">Mr.</option>
                                    <option value="ms">Ms.</option>
                                </select>
                            </div>

                            <div class="relative flex-1">
                                <label
                                    for="name"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >Name</label
                                >
                                <input
                                    id="name"
                                    type="text"
                                    class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="Your Name"
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
                                >Title</label
                                >
                                <select
                                    id="title"
                                    type="text"
                                    class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="Your Name"
                                >
                                    <option value="mr">Mr.</option>
                                    <option value="ms">Ms.</option>
                                </select>
                            </div>

                            <div class="relative flex-1">
                                <label
                                    for="name"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >Friend Name</label
                                >
                                <input
                                    id="name"
                                    type="text"
                                    class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="Your FriendÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢s Name"
                                />
                            </div>
                        </div>

                        <div class="relative">
                            <label
                                for="email"
                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >Your FriendÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢s Email</label
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
                            >Message (Optional)</label
                            >
                            <textarea
                                type="text"
                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                placeholder="Write your Message here..."
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
                    Message received
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#message-sent"
                >
                    <span class="sr-only">Close</span>
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
                    Send Your Feedback
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#send-feedback"
                >
                    <span class="sr-only">Close</span>
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
                                >Title</label
                                >
                                <select
                                    id="title"
                                    type="text"
                                    class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="Your Name"
                                >
                                    <option value="mr">Mr.</option>
                                    <option value="ms">Ms.</option>
                                </select>
                            </div>

                            <div class="relative flex-1">
                                <label
                                    for="name"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >Name</label
                                >
                                <input
                                    id="name"
                                    type="text"
                                    class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="Your Name"
                                />
                            </div>
                        </div>

                        <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                            <div class="relative flex-1">
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
                            <div class="relative shrink-0 lg:max-w-[180px]">
                                <label
                                    for="nationality"
                                    class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                >Nationality</label
                                >
                                <select
                                    id="nationality"
                                    type="text"
                                    class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                    placeholder="Your Name"
                                >
                                    <option hidden>Your Nationality</option>
                                    <option>Egyption</option>
                                </select>
                            </div>
                        </div>

                        <div class="relative">
                            <label
                                for="email"
                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >Your Feedback</label
                            >
                            <textarea
                                type="text"
                                class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                placeholder="Write your Message here..."
                            ></textarea>
                        </div>
                    </div>
                </form>

                <div class="mb-6 mt-5 flex items-center justify-center gap-x-4">
                    <button
                        type="button"
                        class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                        data-hs-overlay="#send-feedback"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                        data-hs-overlay="#feedback-sent"
                    >
                        Send
                    </button>
                </div>

                <p class="mb-2 text-center text-sm">
                    Do you face any issue sending a Request?
                    <span class="text-primary">Please contact directly by</span>
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
                    Feedback Received
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#feedback-sent"
                >
                    <span class="sr-only">Close</span>
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
<!-- https://refreshless.com/nouislider/ -->
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
    // gallery-2
    new Swiper(".swiper.thumbs-2", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 24,
        freeMode: false,
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 10,
                direction: "horizontal",
            },
            768: {
                direction: "vertical",
                slidesPerView: 2,
                spaceBetween: 24,
            },
        },
    });
    new Swiper(".swiper.gallery-2", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: false,
        grabCursor: false,
        thumbs: {
            swiper: ".swiper.thumbs-2",
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
</body>
</html>
