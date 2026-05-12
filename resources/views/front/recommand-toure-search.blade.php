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
    <link rel="stylesheet" href="../../assets/styles/main.css" />

    <script
        defer
        src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
    <script defer src="../../assets/scripts/main.js"></script>
</head>

<body>
<div class="app">
    <header class="page-header">
        <div class="navbar static border-b border-primary/20">
{{--            <div class="container">--}}
{{--                <div class="navbar_top">--}}
{{--                    <?php  $site_name=\App\Models\General_setting::first() ?>--}}

{{--                    <div class="flex items-center gap-3">--}}
{{--                        <a href="https://wa.me/{{$site_name->manager_phone}}?text=Hello%20there">--}}
{{--                            <svg class="size-5 text-white">--}}
{{--                                <use href="{{asset('assets/images/icons/sprite.svg#whatsapp')}}"></use>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                        <a href="{{route('about')}}">--}}
{{--                            <svg class="size-5 text-white">--}}
{{--                                <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>--}}
{{--                            </svg>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="flex items-center gap-4 lg:gap-10">--}}
{{--                        <div class="flex items-center gap-2">--}}
{{--                            <svg class="size-5 text-white">--}}
{{--                                <use href="{{asset('assets/images/icons/sprite.svg#clock')}}"></use>--}}
{{--                            </svg>--}}
{{--                            <span class="text-sm text-white"--}}
{{--                            >{{ __('front.site.nav.cairo') }} : <span id="time">{{time()}}</span></span--}}
{{--                            >--}}
{{--                        </div>--}}
{{--                        <div class="flex items-center gap-2">--}}
{{--                            <svg class="size-5 text-white">--}}
{{--                                <use--}}
{{--                                    href="{{asset('assets/images/icons/sprite.svg#cloud-sun')}}"--}}
{{--                                ></use>--}}
{{--                            </svg>--}}
{{--                            <span class="text-sm text-white">: 15 OC/ 60 OF</span>--}}
{{--                        </div>--}}
@include('front.layouts.lang-switcher')
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <nav class="navbar_nav bg-primary">
                <div class="container">
                    @include('front.layouts.nav-list')
                </div>
            </nav>


        </div>
    </header>
    <br><br> <br>

    <main class="relative space-y-12 lg:space-y-16">


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
                        @forelse($tours as $tour)
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
                                                <span class="price">{{$tour->price}}$</span>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @empty

                            <div>
                                <li style="color: #0D6AAD; font-size: 20px">
                                    Not Found Tours For Related With This Search
                                </li>
                            </div>

                        @endforelse
                    </div>
                </div>
            </div>
        </section>


    </main>
    <br><br>
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
{{--                    <span class="sr-only">Close</span>--}}
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
<script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
</body>
</html>
