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
    <link rel="stylesheet" href="./assets/styles/main.css" />

    <script
        defer
        src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
    <link rel="stylesheet" href="{{asset('node_modules/select2/dist/css/select2.min.css')}}">
    <script defer src="./assets/scripts/main.js"></script>
</head>

<body>
<div class="app">
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
                        src="{{header_logo()}}"
                    class="w-48 shrink-0 lg:w-60"
                    alt=""
                />
                </a>
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
                            class="hs-dropdown-menu duration hidden min-w-72 opacity-0 transition-opacity hs-dropdown-open:opacity-100"
                            style="height: calc(100vh - 45px)"
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

                    <img src="{{footer_logo()}}" class="h-8" alt="" />
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
                            <div class="rounded-xl border border-primary bg-white">
                                <div class="divide-y divide-primary">
                                    <div class="px-4 py-3">
                                        <div
                                            class="hs-dropdown relative flex h-full [--auto-close:outside] [--offset:5] [--strategy:absolute]"
                                        >
                                            <button
                                                type="button"
                                                class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap text-start"
                                            >
                                                <svg class="size-6 shrink-0 text-primary">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#hotel"
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
                                                href="./assets/images/icons/sprite.svg#calender"
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
                                            class="hs-dropdown relative flex h-full w-full [--offset:5] [--strategy:absolute] [--auto-close:inside]"
                                        >
                                            <button
                                                type="button"
                                                class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap text-start"
                                            >
                                                <svg class="size-6 shrink-0 text-primary">
                                                    <use
                                                        href="./assets/images/icons/sprite.svg#subscription-cashflow"
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

        <div class="hero justify-center pb-0">
            <div class="container">
                <div class="hero_content">
                    <h1 class="txt-shadow">{{ __('front.site.meta.faq') }}</h1>
                </div>
            </div>
        </div>

        <img src="./assets/images/faq-bg.jpeg" class="page-header__bg" alt="" />
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
                        <li aria-current="page">{{ __('front.site.meta.faq') }}</li>
                    </ol>

                    <h2 class="mb-8 text-xl text-primary lg:text-2xl">
                        <span class="text-secondary">Frequently</span> Asked Questions:
                        <span class="text-black">{{$question_count}} FAQs</span>
                    </h2>

                    <div class="hs-accordion-group space-y-2">
                        @foreach($questions as $question)
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
                            href="./assets/images/icons/sprite.svg#question"
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

{{--                    <div class="mt-6 text-center">--}}
{{--                        <button--}}
{{--                            type="button"--}}
{{--                            class="text-lg text-secondary underline lg:text-xl"--}}
{{--                        >--}}
{{--                            Show More--}}
{{--                        </button>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>

        <!-- ---------- -->

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
            </div>
        </section>
    </main>

    <!-- footer -->
    <div class="relative">
        <img
            src="./assets/images/section-decoration.png"
            class="w-full"
            alt=""
        />

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

<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
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
