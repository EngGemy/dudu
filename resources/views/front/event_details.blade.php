<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$event->name}}</title>

    @include('front.layouts.hreflang')
    <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">

    <meta itemprop="name" content="{{ $event->meta_title }}">
    <meta itemprop="description" content="{{ $event->meta_description }}">
    <meta itemprop="image" content="{{ $event->meta_img }}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $event->meta_title }}">
    <meta name="twitter:description" content="{{ $event->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ $event->meta_img }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $event->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('event_details',$event->slug) }}" />
    <meta property="og:image" content="{{ $event->meta_img }}" />
    <meta property="og:description" content="{{ $event->meta_description }}" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="../../assets/styles/main.css" />

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
    <script defer src="../../assets/scripts/main.js"></script>
</head>

<body>
<div class="app">
    <nav id="headroom" class="navbar_nav primary hidden">
        <div class="container">
            @include('front.layouts.nav-list')
        </div>
    </nav>

    <header class="page-header">
        <div class="navbar">
            <div class="container">
                <div class="navbar_top">
                    <?php  $site_name=\App\Models\General_setting::first() ?>

                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/{{$site_name->manager_phone}}?text=Hello%20there">
                            <svg class="size-5 text-white">
                                <use href="{{asset('assets/images/icons/sprite.svg#whatsapp')}}"></use>
                            </svg>
                        </a>
                        <a href="mailto:{{$site_name->email}}">
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

            <nav class="navbar_nav">
                <div class="container">
                    @include('front.layouts.nav-list')
                </div>
            </nav>

            <div class="navbar_desktop">
                <a href="{{route('home')}}">
                    <img
                        src="{{header_logo()}}" class="logo" alt="" />
                </a>
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
                                                class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap text-start"
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
                                                class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden rounded-lg bg-white p-6 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
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

        <div class="hero">
            <div class="container">
                <div class="hero_content">
                    <h1 class="txt-shadow">{{ __('front.site.sections.famous_egypt_events_2024') }}</h1>
                    <div class="flex items-end gap-4 text-white">
                        <svg class="size-14 text-white lg:size-24">
                            <use href="../../assets/images/icons/sprite.svg#sand-clock"></use>
                        </svg>

                        <div class="w-fit">
                            <div class="mb-2 flex w-full gap-2 text-center">
                                <span class="flex-1">Day</span>
                                <span class="flex-1">Hours</span>
                                <span class="flex-1">Minutes</span>
                                <span class="flex-1">Seconds</span>
                            </div>
                            <div
                                class="flex w-full text-center text-5xl font-semibold lg:text-8xl"
                            >
                                <?php
                                $currentDate = \Illuminate\Support\Carbon::now();
                                $nextDate = \Illuminate\Support\Carbon::parse($event->overview_values('start_date'));
                                $diff = $currentDate->diff($nextDate);
                                $day=$diff->d;
                                if($diff->d <0){
                                    $day=0;
                                }
                                $h=$diff->h;
                                if($diff->h <0){
                                    $h=0;
                                }
                                $i=$diff->i;
                                if($diff->i <0){
                                    $i=0;
                                }
                                $s=$diff->s;
                                if($diff->s <0){
                                    $s=0;
                                }

                                ?>
                                <span id="days" class="flex-1">{{$day}}</span>
                                <span>:</span>
                                <span id="hours" class="min-w-[2ch] flex-1">{{$h}}</span>
                                <span>:</span>
                                <span id="minutes" class="min-w-[2ch] flex-1">{{$i}}</span>
                                <span>:</span>
                                <span id="seconds" class="min-w-[2ch] flex-1">{{$s}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <img src="../../assets/images/event-bg.jpeg" class="hero__bg" alt="" />
        </div>

        <img
            src="../../assets/images/event-bg.jpeg"
            class="page-header__bg"
            alt=""
        />
    </header>

    <main class="relative space-y-12 lg:space-y-16">
        <section class="pt-12">
            <div class="container">
                <ol class="breadcrumb mb-6 lg:mb-10" aria-label="Breadcrumb">
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
                            Egypt Events
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
                    <li aria-current="page">{{$event->translate(app()->getLocale(), true)->name ?? ''}}</li>
                </ol>

                <div class="flex flex-col gap-7 lg:flex-row">
                    <div class="w-full shrink-0 max-lg:hidden lg:max-w-[380px]">
                        <div class="max-lg:hidden lg:sticky lg:top-8">
                            <div
                                data-hs-scrollspy="#scrollspy-1"
                                class="mb-2 space-y-2 [--scrollspy-offset:200]"
                            >
                                <a
                                    href="#sc-overview"
                                    onclick="lenis.scrollTo('#sc-overview', {offset: -100})"
                                    class="group flex w-full items-center gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white transition-colors hs-scrollspy-active:bg-secondary"
                                >
                                    <svg
                                        class="size-4 shrink-0 text-secondary group-[.active]:text-primary lg:size-6"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M18.5 17.8V15.5C18.5 15.3667 18.45 15.25 18.35 15.15C18.25 15.05 18.1333 15 18 15C17.8667 15 17.75 15.05 17.65 15.15C17.55 15.25 17.5 15.3667 17.5 15.5V17.8C17.5 17.9333 17.525 18.0583 17.575 18.175C17.625 18.2917 17.7 18.4 17.8 18.5L19.325 20.025C19.425 20.125 19.5417 20.175 19.675 20.175C19.8083 20.175 19.925 20.125 20.025 20.025C20.125 19.925 20.175 19.8083 20.175 19.675C20.175 19.5417 20.125 19.425 20.025 19.325L18.5 17.8ZM5 21C4.45 21 3.97933 20.8043 3.588 20.413C3.19667 20.0217 3.00067 19.5507 3 19V5C3 4.45 3.196 3.97933 3.588 3.588C3.98 3.19667 4.45067 3.00067 5 3H19C19.55 3 20.021 3.196 20.413 3.588C20.805 3.98 21.0007 4.45067 21 5V10C21 10.2833 20.904 10.521 20.712 10.713C20.52 10.905 20.2827 11.0007 20 11C19.7167 11 19.4793 10.904 19.288 10.712C19.0967 10.52 19.0007 10.2827 19 10V5H5V19H10C10.2833 19 10.521 19.096 10.713 19.288C10.905 19.48 11.0007 19.7173 11 20C11 20.2833 10.904 20.521 10.712 20.713C10.52 20.905 10.2827 21.0007 10 21H5ZM5 18V19V5V11.075V11V18ZM7 16C7 16.2833 7.096 16.521 7.288 16.713C7.48 16.905 7.71733 17.0007 8 17H10.075C10.3583 17 10.596 16.904 10.788 16.712C10.98 16.52 11.0757 16.2827 11.075 16C11.075 15.7167 10.9793 15.4793 10.788 15.288C10.5967 15.0967 10.359 15.0007 10.075 15H8C7.71667 15 7.47933 15.096 7.288 15.288C7.09667 15.48 7.00067 15.7173 7 16ZM7 12C7 12.2833 7.096 12.521 7.288 12.713C7.48 12.905 7.71733 13.0007 8 13H13C13.2833 13 13.521 12.904 13.713 12.712C13.905 12.52 14.0007 12.2827 14 12C14 11.7167 13.904 11.4793 13.712 11.288C13.52 11.0967 13.2827 11.0007 13 11H8C7.71667 11 7.47933 11.096 7.288 11.288C7.09667 11.48 7.00067 11.7173 7 12ZM7 8C7 8.28333 7.096 8.521 7.288 8.713C7.48 8.905 7.71733 9.00067 8 9H16C16.2833 9 16.521 8.904 16.713 8.712C16.905 8.52 17.0007 8.28267 17 8C17 7.71667 16.904 7.47933 16.712 7.288C16.52 7.09667 16.2827 7.00067 16 7H8C7.71667 7 7.47933 7.096 7.288 7.288C7.09667 7.48 7.00067 7.71733 7 8ZM18 23C16.6167 23 15.4377 22.5123 14.463 21.537C13.4883 20.5617 13.0007 19.3827 13 18C13 16.6167 13.4877 15.4377 14.463 14.463C15.4383 13.4883 16.6173 13.0007 18 13C19.3833 13 20.5627 13.4877 21.538 14.463C22.5133 15.4383 23.0007 16.6173 23 18C23 19.3833 22.5123 20.5627 21.537 21.538C20.5617 22.5133 19.3827 23.0007 18 23Z"
                                            fill="currentColor"
                                        />
                                    </svg>

                                    Event Overview
                                </a>

                                <a
                                    href="#sc-inclusion-exclusion"
                                    onclick="lenis.scrollTo('#sc-inclusion-exclusion', {offset: -100})"
                                    class="group flex w-full items-center gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white transition-colors hs-scrollspy-active:bg-secondary"
                                >
                                    <svg
                                        class="size-4 shrink-0 text-secondary group-[.active]:text-primary lg:size-6"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M10.5 16.0605L6.75 12.3098L7.80975 11.25L10.5 13.9395L16.1887 8.25L17.25 9.31125L10.5 16.0605Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M12 1.5C9.9233 1.5 7.89323 2.11581 6.16652 3.26957C4.4398 4.42332 3.09399 6.0632 2.29927 7.98182C1.50455 9.90045 1.29661 12.0116 1.70176 14.0484C2.1069 16.0852 3.10693 17.9562 4.57538 19.4246C6.04383 20.8931 7.91476 21.8931 9.95156 22.2982C11.9884 22.7034 14.0996 22.4955 16.0182 21.7007C17.9368 20.906 19.5767 19.5602 20.7304 17.8335C21.8842 16.1068 22.5 14.0767 22.5 12C22.5 9.21523 21.3938 6.54451 19.4246 4.57538C17.4555 2.60625 14.7848 1.5 12 1.5ZM12 21C10.22 21 8.47992 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89471 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17293C11.99 2.82567 13.7996 3.0039 15.4442 3.68508C17.0887 4.36627 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C21 14.3869 20.0518 16.6761 18.364 18.364C16.6761 20.0518 14.387 21 12 21Z"
                                            fill="currentColor"
                                        />
                                    </svg>

                                    Trip Inclusion / Exclusion
                                </a>

                                <a
                                    href="#sc-itinerary"
                                    onclick="lenis.scrollTo('#sc-itinerary', {offset: -100})"
                                    class="group flex w-full items-center gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white transition-colors hs-scrollspy-active:bg-secondary"
                                >
                                    <svg
                                        class="size-4 shrink-0 text-secondary group-[.active]:text-primary lg:size-6"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M19.5469 1.51172H21V24H3V1.51172H4.47656V0H5.97656V1.51172H9V0H10.5V1.51172H13.5234V0H15.0234V1.51172H18.0469V0H19.5469V1.51172ZM19.5 22.5V3.01172H4.5V22.5H19.5ZM16.5 6.01172V7.51172H7.5V6.01172H16.5ZM7.5 19.5234V18.0234H16.5V19.5234H7.5ZM7.5 13.5117V12.0117H16.5V13.5117H7.5Z"
                                            fill="currentColor"
                                        />
                                    </svg>

                                    Event Itinerary
                                </a>

                                <a
                                    href="#sc-info"
                                    onclick="lenis.scrollTo('#sc-info', {offset: -100})"
                                    class="group flex w-full items-center gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white transition-colors hs-scrollspy-active:bg-secondary"
                                >
                                    <svg
                                        class="size-4 shrink-0 text-secondary group-[.active]:text-primary lg:size-6"
                                        width="24"
                                        height="25"
                                        viewBox="0 0 24 25"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M11 17.5H13V11.5H11V17.5ZM12 9.5C12.2833 9.5 12.521 9.404 12.713 9.212C12.905 9.02 13.0007 8.78267 13 8.5C13 8.21667 12.904 7.97933 12.712 7.788C12.52 7.59667 12.2827 7.50067 12 7.5C11.7167 7.5 11.4793 7.596 11.288 7.788C11.0967 7.98 11.0007 8.21733 11 8.5C11 8.78333 11.096 9.021 11.288 9.213C11.48 9.405 11.7173 9.50067 12 9.5ZM12 22.5C10.6167 22.5 9.31667 22.2373 8.1 21.712C6.88333 21.1867 5.825 20.4743 4.925 19.575C4.025 18.675 3.31267 17.6167 2.788 16.4C2.26333 15.1833 2.00067 13.8833 2 12.5C2 11.1167 2.26267 9.81667 2.788 8.6C3.31333 7.38333 4.02567 6.325 4.925 5.425C5.825 4.525 6.88333 3.81267 8.1 3.288C9.31667 2.76333 10.6167 2.50067 12 2.5C13.3833 2.5 14.6833 2.76267 15.9 3.288C17.1167 3.81333 18.175 4.52567 19.075 5.425C19.975 6.325 20.6877 7.38333 21.213 8.6C21.7383 9.81667 22.0007 11.1167 22 12.5C22 13.8833 21.7373 15.1833 21.212 16.4C20.6867 17.6167 19.9743 18.675 19.075 19.575C18.175 20.475 17.1167 21.1877 15.9 21.713C14.6833 22.2383 13.3833 22.5007 12 22.5ZM12 20.5C14.2333 20.5 16.125 19.725 17.675 18.175C19.225 16.625 20 14.7333 20 12.5C20 10.2667 19.225 8.375 17.675 6.825C16.125 5.275 14.2333 4.5 12 4.5C9.76667 4.5 7.875 5.275 6.325 6.825C4.775 8.375 4 10.2667 4 12.5C4 14.7333 4.775 16.625 6.325 18.175C7.875 19.725 9.76667 20.5 12 20.5Z"
                                            fill="currentColor"
                                        />
                                    </svg>

                                    Useful Information
                                </a>
                            </div>

                            <div class="hs-accordion-group">
                                <div
                                    class="hs-accordion border-transparent hs-accordion-active:border-gray"
                                    id="accordion-2"
                                >
                                    <button
                                        class="hs-accordion-toggle flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white hs-accordion-active:bg-secondary"
                                    >
                        <span class="flex items-center gap-3">
                          <svg
                              class="size-4 text-secondary hs-accordion-active:text-primary lg:size-6"
                          >
                            <use
                                href="../../assets/images/icons/sprite.svg#task"
                            ></use>
                          </svg>

                          Send an Inquiry
                        </span>

                                        <svg
                                            class="block size-4 hs-accordion-active:hidden"
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
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        <svg
                                            class="hidden size-4 hs-accordion-active:block"
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
                                            <path d="M5 12h14" />
                                        </svg>
                                    </button>
                                    <div
                                        class="hs-accordion-content accordion-content-wrapper hidden"
                                    >
                                        <div class="px-4 py-6 shadow-lg">
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
                                                                class="rounded-xl border border-primary bg-transparent p-3 text-sm text-black outline-none placeholder:text-gray"
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
                                                                class="w-full rounded-xl border border-primary p-3 text-sm text-black outline-none placeholder:text-gray"
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
                                                            class="w-full rounded-xl border border-primary p-3 text-sm text-black outline-none placeholder:text-gray"
                                                            placeholder="Your Name"
                                                        />
                                                    </div>
                                                    <div class="relative">
                                                        <label
                                                            for="date"
                                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                                        >Arrival Date</label
                                                        >
                                                        <input
                                                            id="date"
                                                            type="date"
                                                            class="w-full rounded-xl border border-primary p-3 text-sm text-black outline-none placeholder:text-gray"
                                                            placeholder="Check in date "
                                                        />
                                                    </div>
                                                    <div class="relative">
                                                        <label
                                                            for="notes"
                                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                                        >Extra Note</label
                                                        >
                                                        <textarea
                                                            id="notes"
                                                            type="text"
                                                            class="w-full rounded-xl border border-primary p-3 text-sm text-black outline-none placeholder:text-gray"
                                                            placeholder="Write your Note"
                                                        ></textarea>
                                                    </div>

                                                    <div
                                                        class="flex w-full flex-1 justify-center gap-x-4"
                                                    >
                                                        <div class="flex-1">
                                                            <p class="mb-2 text-center text-primary">
                                                                Adults
                                                            </p>
                                                            <div
                                                                class="flex items-center justify-center gap-4"
                                                            >
                                                                <button
                                                                    type="button"
                                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                                >
                                                                    +
                                                                </button>
                                                                <span class="text-black">1</span>
                                                                <button
                                                                    type="button"
                                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                                >
                                                                    -
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1">
                                                            <p class="mb-2 text-center text-primary">
                                                                Children
                                                            </p>
                                                            <div
                                                                class="flex items-center justify-center gap-4"
                                                            >
                                                                <button
                                                                    type="button"
                                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                                >
                                                                    +
                                                                </button>
                                                                <span class="text-black">1</span>
                                                                <button
                                                                    type="button"
                                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                                >
                                                                    -
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div
                                                class="mt-8 flex items-center justify-center gap-x-4"
                                            >
                                                <button
                                                    type="button"
                                                    class="inline-block rounded-lg border border-primary bg-white px-4 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                                                >
                                                    Cancel
                                                </button>
                                                <button
                                                    type="button"
                                                    data-hs-overlay="#success-model"
                                                    class="inline-block rounded-lg border border-transparent bg-primary px-4 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                                                >
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:flex-1">
                        <div class="top-0 z-30 mb-6 bg-white py-4 lg:sticky lg:py-6">
                            <p class="section_heading text-primary">
                                <span>Egypt</span> Christmas Event 2024
                            </p>
                        </div>

                        <div id="scrollspy-1" class="space-y-4 lg:space-y-5.5">
                            <div class="items-start lg:grid lg:grid-cols-8 lg:gap-8">
                                <div
                                    class="h-[400px] max-lg:mb-8 lg:col-span-6 lg:h-[650px]"
                                >
                                    <div class="swiper gallery size-full">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide h-full">
                                                <div class="h-full overflow-hidden rounded-xl">
                                                    <img
                                                        src="{{$event->photo}}"
                                                        class="size-full object-cover object-center"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                            @foreach($event->galleries as $image)
                                            <div class="swiper-slide h-full">
                                                <div class="h-full overflow-hidden rounded-xl">
                                                    <img
                                                        src="{{$image->photo}}"
                                                        class="size-full object-cover object-center"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                <div class="h-[150px] lg:col-span-2 lg:h-[650px]">
                                    <div class="swiper thumbs size-full flex-1">
                                        <div class="swiper-wrapper h-full">
                                            <div
                                                class="swiper-slide group h-full cursor-pointer rounded-2xl"
                                            >
                                                <img
                                                    src="{{$event->photo}}"
                                                    class="size-full rounded-2xl border-2 border-transparent object-cover object-center transition-colors hover:border-primary lg:border-4"
                                                    alt=""
                                                />
                                            </div>
                                            @foreach($event->galleries as $image)
                                            <div
                                                class="swiper-slide group h-full cursor-pointer rounded-2xl"
                                            >
                                                <img
                                                    src="{{$image->photo}}"
                                                    class="size-full rounded-2xl border-2 border-transparent object-cover object-center transition-colors hover:border-primary lg:border-4"
                                                    alt=""
                                                />
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                id="sc-overview"
                                class="rounded-xl border border-primary p-4 pb-12 lg:rounded-3xl lg:p-6"
                            >
                                <h3
                                    class="mb-8 text-lg font-semibold text-primary lg:text-xl"
                                >
                                    <span class="text-secondary">Event</span> Overview
                                </h3>

                                <div
                                    class="flex flex-wrap items-center justify-center gap-y-6 text-center lg:justify-evenly"
                                >
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#clipboard-text-time"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            Start Date
                                        </p>
                                        <p class="font-medium">{{$event->overview_values('start_date')}}</p>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#event-available"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            End Date
                                        </p>
                                        <p class="font-medium">{{$event->overview_values('end_date')}}</p>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#checkmark"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            Status
                                        </p>
                                        <p class="font-medium">{{$event->overview_values('statues')}}</p>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#location"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            Location
                                        </p>
                                        <p class="font-medium">
                                            @foreach($event->overview_values('locations') as $loc)
                                            {{$loc}},
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#earth"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            Website
                                        </p>
                                        <p class="font-medium">{{$event->overview_values('website')}}</p>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#phone"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            Phone
                                        </p>
                                        <p class="font-medium">{{$event->overview_values('phone')}}</p>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#mail"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            Email
                                        </p>
                                        <p class="font-medium">{{$event->overview_values('email')}}</p>
                                    </div>
                                    <div class="w-full md:w-1/2 lg:w-1/4">
                                        <div
                                            class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                                        >
                                            <svg class="size-6 text-primary lg:size-10">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#cancel"
                                                ></use>
                                            </svg>
                                        </div>
                                        <p
                                            class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                                        >
                                            Cancellation
                                        </p>
                                        <p class="font-medium">{{$event->overview_values('cancellation')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="hs-accordion-group space-y-4 lg:space-y-5.5"
                                data-hs-accordion-always-open
                            >
                                <div
                                    class="hs-accordion active rounded-xl border border-primary lg:rounded-3xl"
                                >
                                    <button
                                        class="hs-accordion-toggle flex w-full items-center justify-between p-4 text-start text-lg font-semibold text-primary lg:p-6 lg:text-xl"
                                    >
                        <span>
                          <span class="text-secondary">Egypt </span> Christmas
                          Event 2024
                        </span>

                                        <svg
                                            class="transition-transform hs-accordion-active:rotate-180"
                                            width="18"
                                            height="11"
                                            viewBox="0 0 18 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1 1.5L9 9.5L17 1.5"
                                                stroke="black"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>
                                    <div
                                        class="hs-accordion-content overflow-hidden transition-[height] duration-300"
                                    >
                                        <div class="p-4 pt-0 lg:p-6 lg:pt-0">
                                            <p class="lg:text-lg lg:leading-relaxed">
                                               {!! $event->translate(app()->getLocale(), true)->description ?? '' !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    id="sc-inclusion-exclusion"
                                    class="hs-accordion active rounded-xl border border-primary lg:rounded-3xl"
                                >
                                    <button
                                        class="hs-accordion-toggle flex w-full items-center justify-between p-4 text-start text-lg font-semibold text-primary lg:p-6 lg:text-xl"
                                    >
                        <span>
                          <span class="text-secondary">Tour </span>
                          Inclusion/Exclusion
                        </span>

                                        <svg
                                            class="transition-transform hs-accordion-active:rotate-180"
                                            width="18"
                                            height="11"
                                            viewBox="0 0 18 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1 1.5L9 9.5L17 1.5"
                                                stroke="black"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>
                                    <div
                                        class="hs-accordion-content overflow-hidden transition-[height] duration-300"
                                    >
                                        <div class="p-4 pt-0 lg:p-6 lg:pt-0">
                                            <div class="flex flex-col gap-6 lg:flex-row">
                                                <div class="w-full lg:w-3/5">
                                                    <p
                                                        class="mb-4 flex items-center gap-1 text-lg font-medium text-primary"
                                                    >
                                                        <svg class="size-5 text-green">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#checkmark-filled"
                                                            ></use>
                                                        </svg>

                                                        Tour Inclusion
                                                    </p>
                                                    <ul class="space-y-1">
                                                        @foreach($event->include_values() as $inclusion)
                                                        <li class="flex items-center gap-2">
                                                            <svg class="size-5 shrink-0 text-green">
                                                                <use
                                                                    href="../../assets/images/icons/sprite.svg#checkmark"
                                                                ></use>
                                                            </svg>
                                                            {{$inclusion}}
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </div>

                                                <div class="w-full lg:w-2/5">
                                                    <p
                                                        class="mb-4 flex items-center gap-1 text-lg font-medium text-primary"
                                                    >
                                                        <svg class="size-5 text-red">
                                                            <use
                                                                href="../../assets/images/icons/sprite.svg#baseline-cancel"
                                                            ></use>
                                                        </svg>

                                                        Tour Exlusion
                                                    </p>
                                                    <ul class="space-y-1">
                                                        @foreach($event->exclude_values() as $exclude)
                                                        <li class="flex items-center gap-2">
                                                            <svg class="size-5 shrink-0 text-red">
                                                                <use
                                                                    href="../../assets/images/icons/sprite.svg#cancel-outline"
                                                                ></use>
                                                            </svg>
                                                            {{$exclude}}
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    id="sc-itinerary"
                                    class="hs-accordion active rounded-xl border border-primary lg:rounded-3xl"
                                >
                                    <button
                                        class="hs-accordion-toggle flex w-full items-center justify-between p-4 text-start text-lg font-semibold text-primary lg:p-6 lg:text-xl"
                                    >
                        <span>
                          <span class="text-secondary">Event </span> Itinerary
                        </span>

                                        <svg
                                            class="transition-transform hs-accordion-active:rotate-180"
                                            width="18"
                                            height="11"
                                            viewBox="0 0 18 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1 1.5L9 9.5L17 1.5"
                                                stroke="black"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>
                                    <div
                                        class="hs-accordion-content overflow-hidden transition-[height] duration-300"
                                    >
                                        <div class="p-4 pt-0 lg:p-6 lg:pt-0">
                                            <ul class="hs-accordion-group flex w-full flex-col">
                                                @if($event->event_iterations)
                                                    @foreach($event->event_iterations as $key=>$value)
                                                <li
                                                    class="hs-accordion group relative flex flex-col gap-2"
                                                >
                              <span
                                  class="absolute left-0 top-6 grid h-full w-3 justify-center bg-transparent opacity-100 transition-opacity duration-200 group-last:hidden"
                              ><span class="h-full w-0.5 bg-gray-200"></span
                                  ></span>
                                                    <div class="flex items-center gap-4">
                                <span
                                    class="relative z-[2] w-max flex-shrink-0 overflow-hidden rounded-full bg-black p-1.5"
                                ></span>
                                                        <button
                                                            class="hs-accordion-toggle flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start text-sm font-semibold text-white lg:text-base"
                                                        >
                                  <span class="flex items-center gap-3">
                                    <span class="text-secondary">{{$value->translate(app()->getLocale(), true)->title ?? ''}}</span>
                                   {{$value->translate(app()->getLocale(), true)->content ?? ''}}
                                  </span>

                                                            <svg
                                                                class="block size-4 hs-accordion-active:hidden"
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
                                                                <path d="M5 12h14" />
                                                                <path d="M12 5v14" />
                                                            </svg>
                                                            <svg
                                                                class="hidden size-4 hs-accordion-active:block"
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
                                                                <path d="M5 12h14" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="flex gap-4">
                                <span
                                    class="pointer-events-none invisible h-full w-3 flex-shrink-0"
                                ></span>
                                                        <div
                                                            class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                                        >
                                                            <div class="px-2 pb-2">
                                                                <div
                                                                    class="rounded-bl-xl rounded-br-xl bg-white p-6 shadow-md"
                                                                >
                                                                    <div
                                                                        class="mb-8 flex flex-col gap-4 lg:flex-row"
                                                                    >
                                                                        <img
                                                                            src="{{$value->photo}}"
                                                                            class="max-h-72 w-full max-w-md rounded-xl"
                                                                            alt=""
                                                                        />

                                                                        <div
                                                                            class="flex flex-1 flex-col justify-between gap-6 py-4"
                                                                        >
                                                                            <ul class="space-y-2">
                                                                                @foreach($value->event_iteration_attributes as $val)
                                                                                    <li class="flex items-center gap-4">
                                                                                        <img
                                                                                            src="{{$val->photo}}"
                                                                                            class="size-12"
                                                                                            alt=""
                                                                                        />
                                                                                        <span
                                                                                        ><span class="text-primary"
                                                                                            > {{$val->translate(app()->getLocale(), true)->title ?? ''}}</span
                                                                                            >
                                               </span
                                               >
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>

                                                                            <p>
                                                                                {{$value->translate(app()->getLocale(), true)->description ?? ''}}
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="relative space-y-8 ps-8 before:absolute before:bottom-0 before:left-2 before:top-8 before:w-0.5 before:border before:border-dashed before:border-gray"
                                                                    >
                                                                        @foreach($value->event_iteration_attributes as $val)
                                                                            <div class="relative ps-2 lg:ps-4">
                                                                                <img
                                                                                    src="{{$val->photo}}"
                                                                                    class="absolute start-0 top-0 size-12 -translate-x-full -translate-y-1/4"
                                                                                    alt=""
                                                                                />

                                                                                <p
                                                                                    class="mb-4 text-lg text-primary lg:text-xl"
                                                                                >
                                                                                    {{$val->translate(app()->getLocale(), true)->title ?? ''}}
                                                                                </p>
                                                                                <p>
                                                                                    {{$val->translate(app()->getLocale(), true)->description ?? ''}}

                                                                                </p>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                    @endforeach
                                                @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    id="sc-info"
                                    class="hs-accordion active rounded-xl border border-primary lg:rounded-3xl"
                                >
                                    <button
                                        class="hs-accordion-toggle flex w-full items-center justify-between p-4 text-start text-lg font-semibold text-primary lg:p-6 lg:text-xl"
                                    >
                        <span>
                          <span class="text-secondary">Useful </span>
                          Information
                        </span>

                                        <svg
                                            class="transition-transform hs-accordion-active:rotate-180"
                                            width="18"
                                            height="11"
                                            viewBox="0 0 18 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M1 1.5L9 9.5L17 1.5"
                                                stroke="black"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </button>
                                    <div
                                        class="hs-accordion-content overflow-hidden transition-[height] duration-300"
                                    >
                                        <div class="p-4 pt-0 lg:p-6 lg:pt-0">
                                            <div class="hs-accordion-group space-y-2">
                                                @foreach($event->information as $info)
                                                <div
                                                    class="hs-accordion border-transparent hs-accordion-active:border-gray"
                                                >
                                                    <button
                                                        class="hs-accordion-toggle flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                                                        aria-controls="faq-content-1"
                                                    >
                                <span class="flex items-center gap-3">
                                  <svg class="size-4 text-secondary lg:size-6">
                                    <use
                                        href="../../assets/images/icons/sprite.svg#question"
                                    ></use>
                                  </svg>

                                  Question Title Here?
                                </span>

                                                        <svg
                                                            class="block size-4 hs-accordion-active:hidden"
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
                                                            <path d="M5 12h14" />
                                                            <path d="M12 5v14" />
                                                        </svg>
                                                        <svg
                                                            class="hidden size-4 hs-accordion-active:block"
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
                                                            <path d="M5 12h14" />
                                                        </svg>
                                                    </button>
                                                    <div
                                                        class="hs-accordion-content accordion-content-wrapper hidden"
                                                    >
                                                        <div class="px-5 pb-5">
                                                            <div
                                                                class="rounded-bl-xl rounded-br-xl bg-white p-8 shadow-lg"
                                                            >
                                                                <p class="text-black">
                                                                    <em
                                                                    >{{$info->translate(app()->getLocale(), true)->title ?? ''}}.</em
                                                                    >
                                                                    {{$info->translate(app()->getLocale(), true)->description ?? ''}}.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

        <section id="recommended-tours">
            <div class="container">
                <header
                    data-aos="fade-up"
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>Recommended</span> Egypt Tours
                    </h2>

                    <div class="flex items-center gap-4 max-lg:ms-auto">
                        <a href="#" class="text-secondary lg:text-lg">View All</a>

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
                    <div class="swiper-wrapper"  id="recommand_tours">
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
                                            <a href="#" class="tour-card__link">View Tour</a>
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

                <div class="mt-5 lg:mt-10"></div>
            </div>
        </section>

        <section>
            <div class="container">
                <header class="section_header">
                    <h2 class="section_heading text-primary">
                        <span>Frequently</span> Asked Questions
                    </h2>
                </header>

                <div class="hs-accordion-group space-y-2">
                    @foreach ($questions as $question)

                        <div
                            class="hs-accordion border-transparent hs-accordion-active:border-gray-200"
                            id="faq-1"
                        >
                            <button
                                class="hs-accordion-toggle flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                                aria-controls="faq-content-1"
                            >
                  <span class="flex items-center gap-3">
                    <svg class="size-4 text-secondary lg:size-6">
                      <use
                          href="{{asset('assets/images/icons/sprite.svg#question')}}"
                      ></use>
                    </svg>

                    {{$question->title}}
                  </span>

                                <svg
                                    class="block size-4 hs-accordion-active:hidden"
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
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                                <svg
                                    class="hidden size-4 hs-accordion-active:block"
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
                                    <path d="M5 12h14" />
                                </svg>
                            </button>
                            <div
                                id="faq-content-1"
                                class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="faq-1"
                            >
                                <div class="px-5 pb-5">
                                    <div
                                        class="rounded-bl-xl rounded-br-xl bg-white p-8 shadow-lg"
                                    >
                                        <p class="text-black">
                                            <em>{!!$question->description!!}</em>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 text-center">
                    <a href="#" class="text-lg text-secondary underline">Show More</a>
                </div>
            </div>
        </section>

        <section id="partners" class="pb-20 pt-12 lg:pb-32">
            <div class="container">
                <header class="section_header">
                    <h2 class="section_heading text-primary">
                        <span>Doudou</span> Partners
                    </h2>
                </header>

                <div class="flex items-center gap-6">
              <span class="rounded-full bg-white/70">
                <button type="button" class="swiper-btn prev shrink-0">
                  <svg>
                    <use
                        href="{{asset('assets/images/icons/sprite.svg#arrow-left')}}"
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
                        href="{{asset('assets/images/icons/sprite.svg#arrow-right')}}"
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
                    Customize Your Own Tour
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#customize-tour"
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
                            >Your Information</span
                            >
                        </p>

                        <form id="bookingForm" class="form w-full">
                            <div class="space-y-6">
                                <div class="flex gap-2">
                                    <div class="relative max-w-[80px] shrink-0">
                                        <label

                                            for="title"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Title</label
                                        >
                                        <select
                                            onchange="checkInputs()"
                                            required
                                            id="title"
                                            type="text"
                                            name="title"
                                            class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option value="0">Mr.</option>
                                            <option value="1">Ms.</option>
                                        </select>
                                    </div>
                                    <div class="relative flex-1">
                                        <label

                                            for="name"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Name</label
                                        >
                                        <input
                                            oninput="checkInputs()"
                                            required
                                            id="name"
                                            name="name"
                                            type="text"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        />
                                        <span class="invalid text-danger" id="name_error"></span>

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
                                            oninput="checkInputs()"
                                            required
                                            id="email"
                                            type="text"
                                            name="email"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Email"

                                        />
                                        <span class="invalid text-danger" id="email_error"></span>
                                    </div>
                                    <div class="relative shrink-0 lg:max-w-[180px]">
                                        <label
                                            for="nationality"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Nationality</label
                                        >
                                        <select
                                            onchange="checkInputs()"
                                            required
                                            id="nationality"
                                            type="text"
                                            name="nationality"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option hidden>Your Nationality</option>
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
                                    >Phone Number</label
                                    >
                                    <div class="flex items-center gap-3">
                                        <select
                                            onchange="checkInputs()"
                                            required
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
                                            placeholder="Enter your phone number"
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
                            >Tour Information</span
                            >
                        </p>

                        <form class="form w-full">
                            <div class="space-y-6">
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="arrival-date"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Arrival Date</label
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
                                        >Departure Date</label
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
                                        >Your Destination</label
                                        >
                                        <select
                                            id="destination"
                                            type="text"
                                            name ='city_id'
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Your City"
                                        >
                                            <option value="" disabled selected>Select City</option>
                                            @foreach ($cities as $city )
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select> -->
                                        <div class="relative" >
                                            <div class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base">
                                                <label for="destination" class="">Your Destination</label>
                                            </div>
                                            <div id="selected-options" style="padding-bottom: 0px" class="flex flex-wrap gap-2 p-2 w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray">
                                                <select style="width: 100%;margin-bottom: 2px" id="destination" name="city_id" multiple >
                                                    <option value="" disabled>Select Destination</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <div id="dropdown-options" class="absolute z-20 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto hidden mt-1"></div>
                                        </div>
                                        <span class="invalid text-danger" id="destination_error"></span>

                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="accommodation"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Accommodation Tour</label
                                        >
                                        <select
                                            id="accommodation"
                                            type="text"

                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option value="" disabled selected>Select Accommodation Tour</option>
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
                                        >Age Range (Optional)</label
                                        >
                                        <select
                                            id="age"
                                            type="text"
                                            name="range_age"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option value="" disabled selected>Select Age Range</option>
                                            <option value="0">AGE_1_TO_10</option>
                                            <option value="1">AGE_11_TO_20</option>
                                            <option value="2">AGE_21_TO_30</option>                                        </select>
                                    </div>
                                    <div class="flex w-full flex-1 justify-center gap-x-4">
                                        <div class="flex-1">
                                            <p class="mb-2 text-center text-primary">Adults</p>
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
                                            <p class="mb-2 text-center text-primary">Children</p>
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
                                    >Requests</label
                                    >
                                    <textarea
                                        id="notes"
                                        type="date"
                                        name="notes"
                                        class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        placeholder="Write your requests here..."
                                        rows="4"
                                    ></textarea>
                                </div>

                                <div class="relative flex-1">
                                    <label
                                        for="file"
                                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                    >Your Tour Program <span class="text-gray text-xs">(Optional)</span></label
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
                            An Inquire Received
                        </p>
                        <p class="mb-7 lg:mb-10 lg:text-lg">
                            Your tour Inquire has been successfully recived. We look
                            forward to contact you very soon!
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
                            id="backButton"
                        >
                            Back
                        </button>
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-next-btn
                            id="nextButton"
                            disabled
                        >
                            Next
                        </button>
                        <button
                            type="button"
                            onclick="submitForms()"
                            class="inline-block min-w-36 rounded-lg border border-transparent bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-finish-btn
                            id="Inquire"
                            style="display: none"
                        >
                            Inquire Now
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
                    Contact us
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#customer-service"
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
                <div>
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
            </div>

            <img
                src="./assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

<div
    id="success-model"
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
                    Inquire Received
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#success-model"
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
                <p class="mb-4 text-2xl font-semibold text-primary lg:text-3xl">
                    An Inquire Received
                </p>
                <p class="mb-7 lg:mb-10 lg:text-lg">
                    Your tour Inquire has been successfully recived. We look forward
                    to contact you very soon!
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
            <!-- End Final Contnet -->

            <img
                src="../../assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>

<!-- js -->
<script>
    // Set the date we're counting down to
    <?php
    $date = \Illuminate\Support\Carbon::createFromFormat('Y-m-d', $event->overview_values('start_date'));
    $formattedDate = $date->format('M d, Y H:i:s');
    $countDownDate = strtotime($formattedDate) * 1000;
    ?>

    var countDownDate = new Date(<?php echo $countDownDate; ?>).getTime();


    // Update the count down every 1 second
    var x = setInterval(function () {
        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60),
        );
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if(distance <0){
            days=0;
            hours=0;
            minutes=0;
            seconds=0;
        }

        document.querySelector("#days").innerHTML = days;
        document.querySelector("#hours").innerHTML = hours;
        document.querySelector("#minutes").innerHTML = minutes;
        document.querySelector("#seconds").innerHTML = seconds;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // video-thumbs
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
                slidesPerView: 4,
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

<script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
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
            document.getElementById('name_error').textContent = 'Please enter your name';
            isValid = false;
        }

        // Validate Email
        const emailInput = document.getElementById('email');
        if (emailInput.value.trim() === '') {
            document.getElementById('email_error').textContent = 'Please enter your email';
            isValid = false;
        }

        // Validate Nationality
        const nationalityInput = document.getElementById('nationality');
        if (nationalityInput.value === '0' || nationalityInput.value.trim() === '') {
            document.getElementById('nationality_error').textContent = 'Please select your nationality';
            isValid = false;
        }

        // Validate Phone Number
        const telInput = document.getElementById('tel');
        if (telInput.value.trim() === '') {
            document.getElementById('tel_error').textContent = 'Please enter your phone number';
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
            document.getElementById('name_error').textContent = 'Please enter your name';
            isValid = false;
        }

        // Validate Email
        const emailInput = document.getElementById('email');
        if (emailInput.value.trim() === '') {
            document.getElementById('email_error').textContent = 'Please enter your email';
            isValid = false;
        }

        // Validate Nationality
        const nationalityInput = document.getElementById('nationality');
        if (nationalityInput.value === '0' || nationalityInput.value.trim() === '') {
            document.getElementById('nationality_error').textContent = 'Please select your nationality';
            isValid = false;
        }

        // Validate Phone Number
        const telInput = document.getElementById('tel');
        if (telInput.value.trim() === '') {
            document.getElementById('tel_error').textContent = 'Please enter your phone number';
            isValid = false;
        }
        const departure_date = document.getElementById('departure-date');
        if (departure_date.value.trim() === '') {
            document.getElementById('departure-date').textContent = 'Please enter your departure date';
            isValid = false;
        }

        const arrival_date = document.getElementById('arrival-date');
        if (arrival_date.value.trim() === '') {
            document.getElementById('arrival-date_error').textContent = 'Please enter your arrival date';
            isValid = false;
        }
        const city_id = document.getElementById('destination');
        if (city_id.value === '') {
            document.getElementById('destination_error').textContent = 'Please enter your Destination';

            isValid = false;
        }
        const tour_id = document.getElementById('accommodation');
        if (tour_id.value.trim() === '') {
            document.getElementById('accommodation_error').textContent = 'Please enter your Accommodation';
            isValid = false;
        }
        const range_age = document.getElementById('age');
        if (range_age.value.trim() === '') {
            document.getElementById('age_error').textContent = 'Please enter your Age';
            isValid = false;
        }
        const notes = document.getElementById('notes');
        if (range_age.value.trim() === '') {
            document.getElementById('notes_error').textContent = 'Please enter your notes';
            isValid = false;
        }
        const adt = document.getElementById('adults-count');
        if (adt.value === '') {
            document.getElementById('adults-count_error').textContent = 'Please enter your adults count';
            isValid = false;
        }
        const chd = document.getElementById('children-count');
        if (chd.value === '') {
            document.getElementById('children-count_error').textContent = 'Please enter your children count';
            isValid = false;
        }
        return isValid;
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
<script>
    function checkInputs() {
        var nextButton = document.getElementById('nextButton');

        if(validateFormFirst() == false){

            nextButton.disabled =true ;
        }else {

            nextButton.disabled =false ;
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('node_modules/select2/dist/js/select2.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#destination').select2({
            placeholder: 'choose Cities',
            allowClear: true, // Adds a clear button


        });
        $('#selectedHotels').select2({
            placeholder: 'choose Hotels',
            allowClear: true, // Adds a clear button


        });

    });
</script>
</body>
</html>
