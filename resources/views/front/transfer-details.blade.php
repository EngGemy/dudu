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
    <link rel="stylesheet" href="./assets/styles/main.css" />

    <script
      defer
      src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
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
                    <a href="{{route('about')}}">
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
              <ul class="navbar_list">
                <li>
                  <a href="./index.html" class="navbar_link">Home</a>
                </li>
                <li>
                  <a href="./egypt-tours.html" class="navbar_link" aria-current="page">Egypt Tours</a>
                </li>
                <li>
                  <a href="./events.html" class="navbar_link">{{ __('front.site.footer.events') }}</a>
                </li>
                <li>
                  <a href="./services.html" class="navbar_link">{{ __('front.site.footer.services') }}</a>
                </li>
                <li>
                  <a href="./blogs.html" class="navbar_link">{{ __('front.site.footer.blogs') }}</a>
                </li>
                <li>
                  <a href="./about.html" class="navbar_link">About us</a>
                </li>
                <li>
                  <a href="./loyalty-program.html" class="navbar_link">{{ __('front.site.meta.loyalty_program') }}</a>
                </li>
                <li>
                  <a href="./careers.html" class="navbar_link">{{ __('front.site.footer.careers') }}</a>
                </li>
                <li>
                  <a href="./how-it-works.html" class="navbar_link">How it works?</a>
                </li>
                <li>
                  <a href="./partner.html" class="navbar_link">Become our Partner</a>
                </li>
              </ul>
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
                    <nav class="space-y-4">
                      <a
                        href="./index.html"
                        class="flex items-center gap-4 text-white"
                      >
                        <img
                          src="./assets/images/icons/egyptian-sphinx.png"
                          class="size-6"
                          alt=""
                        />
                        Egypt Tour
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/egyptian-urns.png"
                          class="size-6"
                          alt=""
                        />
                        Event
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/symbols_travel.png"
                          class="size-6"
                          alt=""
                        />
                        Services
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/egyptian-temple.png"
                          class="size-6"
                          alt=""
                        />
                        Blog
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/egyptian-walk.png"
                          class="size-6"
                          alt=""
                        />
                        Reviews
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/egyptian-bird.png"
                          class="size-6"
                          alt=""
                        />
                        Loyalty Program
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/egyptian-profile.png"
                          class="size-6"
                          alt=""
                        />
                        Careers
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/egyptian-pyramids.png"
                          class="size-6"
                          alt=""
                        />
                        How it works
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="./assets/images/icons/deal.png"
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

        <div class="hero justify-center p-0">
          <div class="container">
            <div class="hero_content">
              <h1 class="txt-shadow">{{ __('front.site.sections.cairo_transfer_hurghada') }}</h1>
            </div>
          </div>
        </div>

        <section class="bg-primary/75 py-12 text-white lg:py-16">
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
                    src="./assets/images/icons/map-signs.svg"
                    class="mx-auto mb-2 size-10"
                    alt=""
                  />
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    Tour Guide
                  </h3>
                </div>

                <p class="line-clamp-3 leading-relaxed">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do tationÃ‚Â 
                </p>
              </div>
              <div>
                <div>
                  <img
                    src="./assets/images/icons/safety-certificate.svg"
                    class="mx-auto mb-2 size-10"
                    alt=""
                  />
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    Safety
                  </h3>
                </div>

                <p class="line-clamp-3 leading-relaxed">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do tationÃ‚Â 
                </p>
              </div>
              <div>
                <div>
                  <img
                    src="./assets/images/icons/smile-beam.svg"
                    class="mx-auto mb-2 size-10"
                    alt=""
                  />
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    Luxury
                  </h3>
                </div>
                <p class="line-clamp-3 leading-relaxed">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do tationÃ‚Â 
                </p>
              </div>
              <div>
                <div>
                  <img
                    src="./assets/images/icons/take-my-money.svg"
                    class="mx-auto mb-2 size-10"
                    alt=""
                  />
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    Affordable Prices
                  </h3>
                </div>
                <p class="line-clamp-3 leading-relaxed">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do tationÃ‚Â 
                </p>
              </div>
              <div>
                <div>
                  <img
                    src="./assets/images/icons/map-cancel.svg"
                    class="mx-auto mb-2 size-10"
                    alt=""
                  />
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    Fair Cancellation
                  </h3>
                </div>
                <p class="line-clamp-3 leading-relaxed">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do tationÃ‚Â 
                </p>
              </div>
            </div>
          </div>
        </section>

        <img
          src="./assets/images/transfer-bg.jpeg"
          class="page-header__bg"
          alt=""
        />
      </header>

      <main class="relative space-y-12 lg:space-y-16">
        <section class="pt-12">
          <div class="container">
            <ol class="breadcrumb" aria-label="Breadcrumb">
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
                  Services
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
              <li>
                <a href="#">
                  Transportation
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
              <li>
                <a href="#">
                  Cairo Transfer
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
              <li aria-current="page">{{ __('front.site.sections.cairo_transfer_hurghada') }}</li>
            </ol>

            <div
              class="top-0 z-30 mb-6 bg-white py-4 lg:sticky lg:mb-10 lg:py-6"
            >
              <div
                class="flex flex-col gap-2 lg:flex-row lg:items-center lg:justify-between"
              >
                <p class="section_heading text-primary">
                  <span>{{ __('front.site.sections.cairo') }}</span> Transfer to Hurghada
                </p>

                <div class="flex items-center gap-2">
                  <span
                    class="rounded-md bg-primary px-5 py-3 text-lg text-white lg:text-xl"
                    >From 180$</span
                  >
                  <button
                    type="button"
                    data-hs-overlay="#customize-tour"
                    class="rounded-xl bg-primary px-5 py-3 text-lg text-white shadow-md transition-colors hover:bg-secondary lg:text-xl"
                  >
                    Send an Enquiry
                  </button>
                  <button type="button">
                    <img
                      src="./assets/images/icons/share.svg"
                      class="size-6 lg:size-8"
                      alt=""
                    />
                  </button>
                </div>
              </div>
            </div>

            <div class="flex flex-col gap-7 lg:flex-row">
              <div class="w-full shrink-0 lg:max-w-[380px]">
                <div class="space-y-2">
                  <a
                    href="#"
                    class="flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                  >
                    <span class="flex items-center gap-3">
                      <svg class="size-4 text-secondary lg:size-6">
                        <use
                          href="./assets/images/icons/sprite.svg#movement"
                        ></use>
                      </svg>

                      Transfer Overview
                    </span>
                  </a>

                  <a
                    href="#"
                    class="flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                  >
                    <span class="flex items-center gap-3">
                      <svg class="size-4 text-secondary lg:size-6">
                        <use
                          href="./assets/images/icons/sprite.svg#checkmark"
                        ></use>
                      </svg>

                      Trip Inclusion/ Exclusion
                    </span>
                  </a>

                  <a
                    href="#"
                    class="flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                  >
                    <span class="flex items-center gap-3">
                      <svg class="size-4 text-secondary lg:size-6">
                        <use
                          href="./assets/images/icons/sprite.svg#subscription-cashflow"
                        ></use>
                      </svg>

                      Transfer Prices
                    </span>
                  </a>

                  <a
                    href="#"
                    class="flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                  >
                    <span class="flex items-center gap-3">
                      <svg class="size-4 text-secondary lg:size-6">
                        <use href="./assets/images/icons/sprite.svg#map"></use>
                      </svg>

                      Transfer Map
                    </span>
                  </a>

                  <div class="hs-accordion-group space-y-2">
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
                              href="./assets/images/icons/sprite.svg#task"
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
                <div class="space-y-4 lg:space-y-5.5">
                  <div
                    class="rounded-xl border border-primary p-4 pb-12 lg:rounded-3xl lg:p-6"
                  >
                    <h3
                      class="mb-8 text-lg font-semibold text-primary lg:text-xl"
                    >
                      <span class="text-secondary">Transfer</span> Overview
                    </h3>

                    <div
                      class="flex flex-wrap items-center justify-center gap-x-4 gap-y-6 text-center lg:justify-evenly"
                    >
                      <div>
                        <div
                          class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                        >
                          <svg class="size-6 text-primary lg:size-10">
                            <use
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                        </div>
                        <p
                          class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                        >
                          From
                        </p>
                        <p class="font-medium">{{ __('front.site.sections.cairo') }}</p>
                      </div>
                      <div>
                        <div
                          class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                        >
                          <svg class="size-6 text-primary lg:size-10">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-clock"
                            ></use>
                          </svg>
                        </div>
                        <p
                          class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                        >
                          To
                        </p>
                        <p class="font-medium">Hurghada</p>
                      </div>
                      <div>
                        <div
                          class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                        >
                          <svg class="size-6 text-primary lg:size-10">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-card"
                            ></use>
                          </svg>
                        </div>
                        <p
                          class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                        >
                          Transfer Type
                        </p>
                        <p class="font-medium">Mini Bus</p>
                      </div>
                      <div>
                        <div
                          class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                        >
                          <svg class="size-6 text-primary lg:size-10">
                            <use
                              href="./assets/images/icons/sprite.svg#event-available"
                            ></use>
                          </svg>
                        </div>
                        <p
                          class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                        >
                          Availability
                        </p>
                        <p class="font-medium">Everyday</p>
                      </div>
                      <div>
                        <div
                          class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                        >
                          <svg class="size-6 text-primary lg:size-10">
                            <use
                              href="./assets/images/icons/sprite.svg#group-3"
                            ></use>
                          </svg>
                        </div>
                        <p
                          class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                        >
                          Group Size
                        </p>
                        <p class="font-medium">Private Tour</p>
                      </div>
                      <div>
                        <div
                          class="mb-3 inline-flex size-14 items-center justify-center rounded-full border border-primary lg:size-20"
                        >
                          <svg class="size-6 text-primary lg:size-10">
                            <use
                              href="./assets/images/icons/sprite.svg#cancel"
                            ></use>
                          </svg>
                        </div>
                        <p
                          class="mb-4 text-lg font-semibold text-primary lg:text-xl"
                        >
                          Cancellation
                        </p>
                        <p class="font-medium">Free Cancellation</p>
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
                          <span class="text-secondary">{{ __('front.site.sections.cairo') }}</span> Transfer to
                          hurghada
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore
                            eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum
                          </p>
                        </div>
                      </div>
                    </div>

                    <div
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
                                    href="./assets/images/icons/sprite.svg#checkmark-filled"
                                  ></use>
                                </svg>

                                Tour Inclusion
                              </p>
                              <ul class="space-y-1">
                                <li class="flex items-center gap-2">
                                  <svg class="size-5 shrink-0 text-green">
                                    <use
                                      href="./assets/images/icons/sprite.svg#checkmark"
                                    ></use>
                                  </svg>
                                  Meet and greet service by our representatives
                                  at airportsamids
                                </li>
                                <li class="flex items-center gap-2">
                                  <svg class="size-5 shrink-0 text-green">
                                    <use
                                      href="./assets/images/icons/sprite.svg#checkmark"
                                    ></use>
                                  </svg>
                                  Assistance of our guest relations during your
                                  stay
                                </li>
                                <li class="flex items-center gap-2">
                                  <svg class="size-5 shrink-0 text-green">
                                    <use
                                      href="./assets/images/icons/sprite.svg#checkmark"
                                    ></use>
                                  </svg>
                                  Assistance of our guest relations during your
                                  stay
                                </li>
                                <li class="flex items-center gap-2">
                                  <svg class="size-5 shrink-0 text-green">
                                    <use
                                      href="./assets/images/icons/sprite.svg#checkmark"
                                    ></use>
                                  </svg>
                                  Assistance of our guest relations during your
                                  stay
                                </li>
                              </ul>
                            </div>

                            <div class="w-full lg:w-2/5">
                              <p
                                class="mb-4 flex items-center gap-1 text-lg font-medium text-primary"
                              >
                                <svg class="size-5 text-red">
                                  <use
                                    href="./assets/images/icons/sprite.svg#baseline-cancel"
                                  ></use>
                                </svg>

                                Tour Exlusion
                              </p>
                              <ul class="space-y-1">
                                <li class="flex items-center gap-2">
                                  <svg class="size-5 shrink-0 text-red">
                                    <use
                                      href="./assets/images/icons/sprite.svg#cancel-outline"
                                    ></use>
                                  </svg>
                                  International Airfare
                                </li>
                                <li class="flex items-center gap-2">
                                  <svg class="size-5 shrink-0 text-red">
                                    <use
                                      href="./assets/images/icons/sprite.svg#cancel-outline"
                                    ></use>
                                  </svg>
                                  Egypt Entry Visa
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div
                      class="hs-accordion active rounded-xl border border-primary lg:rounded-3xl"
                    >
                      <button
                        class="hs-accordion-toggle flex w-full items-center justify-between p-4 text-start text-lg font-semibold text-primary lg:p-6 lg:text-xl"
                      >
                        <span>
                          <span class="text-secondary">Transfer</span> Prices
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
                          <div class="flex flex-col lg:flex-row">
                            <ul class="w-full gap-y-2 lg:w-1/2">
                              <li
                                class="flex items-center gap-2 md:w-1/2 lg:w-1/3"
                              >
                                <svg class="size-5 shrink-0 text-primary">
                                  <use
                                    href="./assets/images/icons/sprite.svg#group-3"
                                  ></use>
                                </svg>
                                Group (1-2)
                              </li>
                            </ul>
                            <ul class="w-full gap-y-2 lg:w-1/2">
                              <li
                                class="flex items-center gap-2 md:w-1/2 lg:w-1/3"
                              >
                                <svg class="size-5 shrink-0 text-primary">
                                  <use
                                    href="./assets/images/icons/sprite.svg#subscription-cashflow"
                                  ></use>
                                </svg>
                                130$
                              </li>
                            </ul>
                          </div>

                          <p class="mt-4 font-medium lg:mt-6">
                            <span class="text-secondary">Note:</span> Check our
                            blogs about
                            <a href="#" class="text-primary underline"
                              >Transportation with Doudou</a
                            >
                          </p>
                        </div>
                      </div>
                    </div>

                    <div
                      class="hs-accordion active rounded-xl border border-primary lg:rounded-3xl"
                    >
                      <button
                        class="hs-accordion-toggle flex w-full items-center justify-between p-4 text-start text-lg font-semibold text-primary lg:p-6 lg:text-xl"
                      >
                        <span>
                          <span class="text-secondary">Tour </span> Map
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
                          <div
                            class="overflow-hidden rounded-2xl border border-primary"
                          >
                            <iframe
                              class="w-full"
                              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3643941.487269758!2d33.516827808152584!3d26.886459940706857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14368976c35c36e9%3A0x2c45a00925c4c444!2z2YXYtdix!5e0!3m2!1sar!2seg!4v1711479836264!5m2!1sar!2seg"
                              height="450"
                              style="border: 0"
                              allowfullscreen=""
                              loading="lazy"
                              referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <img
              src="./assets/images/section-divider.png"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
          </div>
        </section>

        <!-- ---------- -->

        <section id="recommended-tours">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>Explore</span> Related Transfers
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
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <article class="tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="./assets/images/transfer-card.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.cairo_transfer_hurghada') }}</h3>
                      <div class="tour-card__review">
                        <div class="flex items-center gap-x-px">
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-gray-200">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                        </div>
                        <p>4.5, Wonderful <span>(330 Reviews)</span></p>
                      </div>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-clock"
                            ></use>
                          </svg>
                          From Cairo
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          To Hurghada
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-card"
                            ></use>
                          </svg>
                          Mini Bus
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#event-available"
                            ></use>
                          </svg>
                          Everyday
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#group-3"
                            ></use>
                          </svg>
                          Private Tour
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#cancel"
                            ></use>
                          </svg>
                          Free Cancellation
                        </li>
                      </ul>

                      <div class="tour-card__footer">
                        <a href="#" class="tour-card__link">View Details</a>
                        <p>
                          Starting from
                          <span class="price">550$</span>
                        </p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="./assets/images/transfer-card.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.cairo_transfer_hurghada') }}</h3>
                      <div class="tour-card__review">
                        <div class="flex items-center gap-x-px">
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-gray-200">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                        </div>
                        <p>4.5, Wonderful <span>(330 Reviews)</span></p>
                      </div>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-clock"
                            ></use>
                          </svg>
                          From Cairo
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          To Hurghada
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-card"
                            ></use>
                          </svg>
                          Mini Bus
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#event-available"
                            ></use>
                          </svg>
                          Everyday
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#group-3"
                            ></use>
                          </svg>
                          Private Tour
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#cancel"
                            ></use>
                          </svg>
                          Free Cancellation
                        </li>
                      </ul>

                      <div class="tour-card__footer">
                        <a href="#" class="tour-card__link">View Details</a>
                        <p>
                          Starting from
                          <span class="price">550$</span>
                        </p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="./assets/images/transfer-card.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.cairo_transfer_hurghada') }}</h3>
                      <div class="tour-card__review">
                        <div class="flex items-center gap-x-px">
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-gray-200">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                        </div>
                        <p>4.5, Wonderful <span>(330 Reviews)</span></p>
                      </div>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-clock"
                            ></use>
                          </svg>
                          From Cairo
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          To Hurghada
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-card"
                            ></use>
                          </svg>
                          Mini Bus
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#event-available"
                            ></use>
                          </svg>
                          Everyday
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#group-3"
                            ></use>
                          </svg>
                          Private Tour
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#cancel"
                            ></use>
                          </svg>
                          Free Cancellation
                        </li>
                      </ul>

                      <div class="tour-card__footer">
                        <a href="#" class="tour-card__link">View Details</a>
                        <p>
                          Starting from
                          <span class="price">550$</span>
                        </p>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="./assets/images/transfer-card.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.cairo_transfer_hurghada') }}</h3>
                      <div class="tour-card__review">
                        <div class="flex items-center gap-x-px">
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-secondary">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                          <svg class="star text-gray-200">
                            <use
                              href="./assets/images/icons/sprite.svg#star"
                            ></use>
                          </svg>
                        </div>
                        <p>4.5, Wonderful <span>(330 Reviews)</span></p>
                      </div>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-clock"
                            ></use>
                          </svg>
                          From Cairo
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          To Hurghada
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#bus-card"
                            ></use>
                          </svg>
                          Mini Bus
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#event-available"
                            ></use>
                          </svg>
                          Everyday
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#group-3"
                            ></use>
                          </svg>
                          Private Tour
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#cancel"
                            ></use>
                          </svg>
                          Free Cancellation
                        </li>
                      </ul>

                      <div class="tour-card__footer">
                        <a href="#" class="tour-card__link">View Details</a>
                        <p>
                          Starting from
                          <span class="price">550$</span>
                        </p>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
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
              <div
                class="hs-accordion border-transparent hs-accordion-active:border-gray"
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
                  id="faq-content-1"
                  class="hs-accordion-content accordion-content-wrapper hidden"
                  aria-labelledby="faq-1"
                >
                  <div class="px-5 pb-5">
                    <div
                      class="rounded-bl-xl rounded-br-xl bg-white p-8 shadow-lg"
                    >
                      <p class="text-black">
                        <em>This is the third item's accordion body.</em> It is
                        hidden by default, until the collapse plugin adds the
                        appropriate classes that we use to style each element.
                        These classes control the overall appearance, as well as
                        the showing and hiding via CSS transitions.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="hs-accordion border-transparent hs-accordion-active:border-gray"
                id="faq-2"
              >
                <button
                  class="hs-accordion-toggle flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                  aria-controls="faq-content-2"
                >
                  <span class="flex items-center gap-3">
                    <svg class="size-4 text-secondary lg:size-6">
                      <use
                        href="./assets/images/icons/sprite.svg#question"
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
                  id="faq-content-2"
                  class="hs-accordion-content accordion-content-wrapper hidden"
                  aria-labelledby="faq-2"
                >
                  <div class="px-5 pb-5">
                    <div
                      class="rounded-bl-xl rounded-br-xl bg-white p-8 shadow-lg"
                    >
                      <p class="text-black">
                        <em>This is the third item's accordion body.</em> It is
                        hidden by default, until the collapse plugin adds the
                        appropriate classes that we use to style each element.
                        These classes control the overall appearance, as well as
                        the showing and hiding via CSS transitions.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="hs-accordion border-transparent hs-accordion-active:border-gray"
                id="faq-3"
              >
                <button
                  class="hs-accordion-toggle flex w-full items-center justify-between gap-x-3 rounded-xl bg-primary px-6 py-4 text-start font-semibold text-white"
                  aria-controls="faq-content-3"
                >
                  <span class="flex items-center gap-3">
                    <svg class="size-4 text-secondary lg:size-6">
                      <use
                        href="./assets/images/icons/sprite.svg#question"
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
                  id="faq-content-3"
                  class="hs-accordion-content accordion-content-wrapper hidden"
                  aria-labelledby="faq-3"
                >
                  <div class="px-5 pb-5">
                    <div
                      class="rounded-bl-xl rounded-br-xl bg-white p-8 shadow-lg"
                    >
                      <p class="text-black">
                        <em>This is the third item's accordion body.</em> It is
                        hidden by default, until the collapse plugin adds the
                        appropriate classes that we use to style each element.
                        These classes control the overall appearance, as well as
                        the showing and hiding via CSS transitions.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
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
                      href="./assets/images/icons/sprite.svg#arrow-left"
                    ></use>
                  </svg>
                </button>
              </span>

              <div class="swiper flex-1">
                <div class="swiper-wrapper">
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
                    </div>
                  </div>
                  <div class="swiper-slide w-auto p-2">
                    <div class="img-shadow rounded-xl p-3">
                      <img
                        src="./assets/images/egyptair.png"
                        class="size-28 object-contain object-center lg:size-40"
                        alt=""
                      />
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
        </section>
      </main>

      <!-- footer -->
      <div class="relative">
        <img
          src="./assets/images/section-decoration.png"
          class="w-full"
          alt=""
        />


        <footer class="footer">
          <div class="container">
            <div class="footer__grid">
              <div class="footer__aside">
                <img
                  src="./assets/images/logo-footer.png"
                  class="footer__logo"
                  alt=""
                />

                <ul>
                  <li>
                    <svg>
                      <use
                        href="./assets/images/icons/sprite.svg#map-pin"
                      ></use>
                    </svg>
                    <a href="#">Put Address Here</a>
                  </li>
                  <li>
                    <svg>
                      <use href="./assets/images/icons/sprite.svg#mail"></use>
                    </svg>

                    <a href="mailto:email">Put Email Here</a>
                  </li>
                  <li>
                    <svg>
                      <use href="./assets/images/icons/sprite.svg#phone"></use>
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
        </footer>
      </div>
        <button type="button" id="toTop" onclick="lenis.scrollTo('body')">
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
                <div class="flex flex-col gap-4 lg:flex-row">
                  <div class="relative w-full lg:w-1/2">
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
                  <div class="relative w-full lg:w-1/2">
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

                <div class="flex w-full flex-1 justify-center gap-x-4">
                  <div class="flex-1">
                    <p class="mb-2 text-center text-primary">Adults</p>
                    <div class="flex items-center justify-center gap-4">
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
                    <p class="mb-2 text-center text-primary">Children</p>
                    <div class="flex items-center justify-center gap-4">
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

            <div class="mt-8 flex items-center justify-center gap-x-4">
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

            <div class='mt-8'>
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
                        href="{{route('about')}}"
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

    <!-- modals -->
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
              src="./assets/images/icons/approve.png"
              class="mx-auto mb-4 max-w-40"
              alt=""
            />
            <p class="text-2xl mb-4 font-semibold text-primary lg:text-3xl">An Inquire Received</p>
            <p class="mb-7 lg:mb-10 lg:text-lg">
              Your tour Inquire has been successfully recived. We look forward
              to contact you very soon!
            </p>

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
          <!-- End Final Contnet -->

          <img
            src="./assets/images/icons/model-decoration.png"
            class="w-full"
            alt=""
          />
        </div>
      </div>
    </div>

    <!-- js -->
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
