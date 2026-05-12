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

    <link rel="stylesheet" href="{{asset('assets/styles/main.css')}}" />
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
                        src="{{header_logo()}}" class="logo" alt="" /></a>
            </div>

            <div class="navbar_mobile static">
                <div class="flex items-center gap-2">
                    <div class="hs-dropdown relative inline-flex">
                        <button type="button">
                            <svg class="size-6 text-white">
                                <use href="./assets/images/icons/sprite.svg#menu"></use>
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
                                <use href="./assets/images/icons/sprite.svg#search"></use>
                            </svg>
                            <svg class="hidden size-6 text-white group-[.open]:block">
                                <use href="./assets/images/icons/sprite.svg#close"></use>
                            </svg>
                        </button>

                        <div
                            class="hs-dropdown-menu duration z-50 hidden max-w-80 p-px opacity-0 transition-opacity hs-dropdown-open:opacity-100"
                        >
                            <form action="{{route('tour_search')}}" method="get">

                                <div class="rounded-xl border border-primary bg-white">
                                    <div class="divide-y divide-primary">
                                        <select
                                            name="selectedHotel[]"
                                            id="selectedHotel"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            multiple
                                        >
                                            <option value=""  >Select Hotel</option>

                                            @foreach($hotels as $hotel)
                                                <option value="{{$hotel->id}}">{{ $hotel->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="flex flex-1 items-center gap-3 px-4 py-3">
                                            <svg class="size-5 shrink-0 text-primary">
                                                <use
                                                    href="./assets/images/icons/sprite.svg#calender"
                                                ></use>
                                            </svg>
                                            <input
                                                id="range"
                                                type="text"
                                                name = "checkIn_checkOut"
                                                class="flatpickr flatpickr-input max-w-52 flex-1 shrink bg-transparent text-sm text-black outline-none"
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
                                                class="hs-dropdown relative flex h-full w-full [--auto-close:inside] [--strategy:absolute] [--offset:5]"
                                            >
                                                <button
                                                    type="button"
                                                    class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap text-start text-black"
                                                >
                                                    <svg class="size-5 shrink-0 text-primary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#subscription-cashflow"
                                                        ></use>
                                                    </svg>
                                                    <p class="flex-1 text-sm">Budget From - to</p>
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
                                                    class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden rounded-lg bg-white p-6 text-sm text-black opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                                                >
                                                    <p class="mb-4 text-sm">Your Budget</p>
                                                    <div id="slider-1">
                                                        <div class="slider mb-3"></div>
                                                        <p
                                                            class="flex items-center justify-between text-sm"
                                                        >
                                                            <span>$<span class="slider-min"></span></span>
                                                            <span>$<span class="slider-max"></span></span>
                                                        </p>

                                                        <input
                                                            type="number"
                                                            class="sr-only"
                                                            name="min"
                                                            id="min"
                                                            readonly
                                                        />
                                                        <input
                                                            type="number"
                                                            class="sr-only"
                                                            name="max"
                                                            id="max"
                                                            readonly
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        type="submit"
                                        class="inline-block w-full rounded-bl-xl rounded-br-xl bg-primary px-5 py-3 text-white transition-colors hover:bg-opacity-80"
                                    >
                                        Search
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <button type="button" data-hs-overlay="#customer-service">
                        <svg class="size-5.5 text-white">
                            <use
                                href="./assets/images/icons/sprite.svg#customer-service-2"
                            ></use>
                        </svg>
                    </button>
                    <button type="button" data-hs-overlay="#customize-tour">
                        <svg class="size-5 text-white">
                            <use href="./assets/images/icons/sprite.svg#settings"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="hero">
            <div class="container">
                <div class="hero_content">
                    <h1
                        class="txt-shadow"
                        data-aos="fade-up"
                        data-aos-delay="200"
                        data-aos-duration="600"
                    >
                        Famous Egypt Events 2024
                    </h1>
                    <p
                        class="txt-shadow"
                        data-aos="fade-up"
                        data-aos-delay="400"
                        data-aos-duration="600"
                    >
                        Provide everyone with the finest vacation accompanied by the
                        highest level of safety, luxury and affordable prices
                    </p>
                </div>
            </div>

            <img src="./assets/images/events-bg.jpeg" class="hero__bg" alt="" />
        </div>

        <img
            src="./assets/images/events-bg.jpeg"
            class="page-header__bg"
            alt=""
        />
    </header>

    <main class="space-y-12 lg:space-y-16">
        <section class="pt-8">
            <div class="container">
                <ol class="breadcrumb mb-12 pt-8" aria-label="Breadcrumb">
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
                    <li aria-current="page">Egypt Events</li>
                </ol>

                <div class="mb-8">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                        @foreach($events as $event)
                        <a href="{{route('event_details',$event->slug)}}" class="card">
                            <figure>
                                <img src="{{$event->photo}}" alt="" />
                            </figure>

                            <figcaption>
                                <h3>{{$event->translate(app()->getLocale(), true)->name ?? ''}}</h3>
                            </figcaption>
                        </a>
                        @endforeach

                    </div>

                    <img
                        src="./assets/images/section-divider.png"
                        class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                        alt=""
                    />
                </div>
            </div>
        </section>

        <!-- ---------- -->

        <section id="recommended-tours">
            <div class="container">
                <header
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
                                        <a href="{{route('tour_details',$tour->slug)}}"
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
                                            <a href="{{route('tour_details',$tour->slug)}}" class="tour-card__link">View Tour</a>
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

        <section id="blog">
            <div class="container">
                <header
                    class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
                >
                    <h2 class="section_heading text-primary">
                        <span>Read</span> Before You Go
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

                <div class="swiper overflow-visible">
                    <div class="swiper-wrapper">
                        @foreach ($blogs as $blog )
                            <div class="swiper-slide">
                                <article class="tour-card">
                                    <div class="tour-card__thumbnail-wrapper">
                                        <a href="{{route('blog_preview', $blog->slug)}}" > <img
                                                src="{{$blog->image_url}}"
                                                class="tour-card__thumbnail"
                                                alt=""
                                            /></a>
                                    </div>

                                    <div class="tour-card__content">
                                        <a href="{{route('blog_preview', $blog->slug)}}" >  <h3>{{ $blog->title}}</h3></a>

                                        <ul class="tour-card__features">
                                            <li>
                                                <svg class="icon">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#calendar-date"
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

                                            <a href="{{route('blog_preview',$blog->slug)}}" class="tour-card__link"
                                            >Read More</a
                                            >
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
                        >Explore All</a
                        >
                    </header>

                    <div class="flex min-w-0 items-center gap-4 lg:col-span-2">
                <span class="rounded-full bg-white/70">
                  <button type="button" class="swiper-btn prev shrink-0">
                    <svg>
                      <use
                          href="./assets/images/icons/sprite.svg#arrow-left"
                      ></use>
                    </svg>
                  </button>
                </span>

                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rounded-3xl bg-white p-6 shadow-xl">
                                        <div class="mb-3 flex items-center gap-2">
                                            <div
                                                class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                                            >
                                                <img
                                                    src="./assets/images/avatar.jpeg"
                                                    class="h-full w-full object-cover object-center"
                                                    alt=""
                                                />
                                            </div>

                                            <div>
                                                <p class="mb-1 text-sm text-black">
                                                    Mai Hussien
                                                    <span class="text-gray">10 Feb 2024</span>
                                                </p>
                                                <div class="flex items-center gap-x-px">
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-gray-200">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <p
                                            class="line-clamp-4 font-normal leading-relaxed text-gray"
                                        >
                                            Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum lpa qui
                                            officia deserunt mollit anim id est laborum...
                                        </p>
                                        <a href="#" class="text-primary hover:underline"
                                        >Read More</a
                                        >
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rounded-3xl bg-white p-6 shadow-xl">
                                        <div class="mb-3 flex items-center gap-2">
                                            <div
                                                class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                                            >
                                                <img
                                                    src="./assets/images/avatar.jpeg"
                                                    class="h-full w-full object-cover object-center"
                                                    alt=""
                                                />
                                            </div>

                                            <div>
                                                <p class="mb-1 text-sm text-black">
                                                    Mai Hussien
                                                    <span class="text-gray">10 Feb 2024</span>
                                                </p>
                                                <div class="flex items-center gap-x-px">
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-gray-200">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <p
                                            class="line-clamp-4 font-normal leading-relaxed text-gray"
                                        >
                                            Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum lpa qui
                                            officia deserunt mollit anim id est laborum...
                                        </p>
                                        <a href="#" class="text-primary hover:underline"
                                        >Read More</a
                                        >
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rounded-3xl bg-white p-6 shadow-xl">
                                        <div class="mb-3 flex items-center gap-2">
                                            <div
                                                class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                                            >
                                                <img
                                                    src="./assets/images/avatar.jpeg"
                                                    class="h-full w-full object-cover object-center"
                                                    alt=""
                                                />
                                            </div>

                                            <div>
                                                <p class="mb-1 text-sm text-black">
                                                    Mai Hussien
                                                    <span class="text-gray">10 Feb 2024</span>
                                                </p>
                                                <div class="flex items-center gap-x-px">
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-secondary">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                    <svg class="size-3 text-gray-200">
                                                        <use
                                                            href="./assets/images/icons/sprite.svg#star"
                                                        ></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <p
                                            class="line-clamp-4 font-normal leading-relaxed text-gray"
                                        >
                                            Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip
                                            ex ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit esse cillum lpa qui
                                            officia deserunt mollit anim id est laborum...
                                        </p>
                                        <a href="#" class="text-primary hover:underline"
                                        >Read More</a
                                        >
                                    </div>
                                </div>
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
                </div>
            </div>

            <img
                src="./assets/images/section-decoration.png"
                class="mt-6 w-full lg:mt-14"
                alt=""
            />
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


<!-- js -->
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
