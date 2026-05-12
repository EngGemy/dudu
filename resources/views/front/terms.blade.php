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

        <div class="hero justify-center p-0">
          <div class="container">
            <div class="hero_content">
              <h1 class="txt-shadow">{{ __('front.site.meta.terms') }}</h1>
            </div>
          </div>
        </div>

        <img
          src="./assets/images/terms-bg.jpeg"
          class="page-header__bg"
          alt=""
        />
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
                <li aria-current="page">{{ __('front.site.meta.terms') }}</li>
              </ol>

              <div class="mb-12">
                <h2
                  class="mb-10 text-xl font-semibold text-primary lg:text-2xl"
                >
                  <span class="text-secondary">Terms</span> and Conditions
                </h2>

                <div class="space-y-6">
                    @foreach($terms as $term)
                  <div>
                    <h3 class="mb-3 text-lg font-semibold">
                        {{$term->title}}
                    </h3>
                    <p class="text-gray/90">
                        {!!  $term->description !!}
                    </p>
                  </div>

                    @endforeach

                </div>
              </div>

              <div class="rounded-xl border border-primary p-8 lg:p-12">
                <p class="mb-8">
                  Please send us a massage and weÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ll respond as soon as possible
                </p>

                <form>
                  <div
                    class="flex flex-col gap-8 lg:grid-cols-2 lg:flex-row lg:gap-16"
                  >
                    <div class="w-full space-y-6 lg:w-1/2">
                      <div class="flex gap-4">
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
                            name="countries"
                            class="block border-e-2 border-gray bg-transparent text-center"
                          >
                            <option value="NL">ÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚Â³ÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚Â±</option>
                            <option value="DE">ÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚Â©ÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚Âª</option>
                            <option value="FR">ÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚Â«ÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚Â·</option>
                            <option value="ES">ÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚ÂªÃƒÂ°Ã…Â¸Ã¢â‚¬Â¡Ã‚Â¸</option>
                          </select>

                          <input
                            id="tel"
                            type="text"
                            class="block w-full flex-1 text-black outline-none placeholder:text-gray"
                            placeholder="Enter your phone number"
                          />
                        </div>
                      </div>

                      <div>
                        <p class="mb-2 text-center text-sm">
                          Do you face any issue sending a Request?
                          <span class="text-primary"
                            >Please contact directly by</span
                          >
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

                    <div class="w-full space-y-6 lg:w-1/2">
                      <div class="relative flex-1">
                        <label
                          for="email"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >Email</label
                        >
                        <input
                          id="email"
                          type="email"
                          class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                          placeholder="Your Email"
                        />
                      </div>

                      <div class="relative flex-1">
                        <label
                          for="nationality"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >Nationality</label
                        >
                        <select
                          id="nationality"
                          type="text"
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="Your Nationality"
                        >
                          <option hidden>Your City</option>
                        </select>
                      </div>

                      <div class="relative flex-1">
                        <label
                          for="message"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >Message</label
                        >
                        <textarea
                          id="message"
                          class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                          placeholder="Write your Message here..."
                        ></textarea>
                      </div>

                      <button
                        type="button"
                        data-hs-overlay="#data-sent"
                        class="ms-auto block w-fit rounded-xl bg-primary px-6 py-3 text-lg text-white transition-colors hover:bg-secondary"
                      >
                        Send
                      </button>
                    </div>
                  </div>
                </form>
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

        <section>
          <div class="container">
            <header class="section_header">
              <h2 class="section_heading text-primary">
                <span>Frequently</span> Asked Questions
              </h2>
            </header>

            <div class="hs-accordion-group space-y-2">
                <x-question-component/>
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

              <ul class="flex items-center gap-x-3 max-lg:order-1">
                <li>
                  <a href="#">
                    <img
                      src="./assets/images/icons/facebook.png"
                      class="size-8"
                      alt=""
                    />
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img
                      src="./assets/images/icons/linkedin.png"
                      class="size-8"
                      alt=""
                    />
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img
                      src="./assets/images/icons/youtube.png"
                      class="size-8"
                      alt=""
                    />
                  </a>
                </li>
                <li>
                  <a href="#">
                    <img
                      src="./assets/images/icons/instagram.png"
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
        <button type="button" id="toTop" onclick="lenis.scrollTo('body')">
            <svg>
                <use href="./assets/images/icons/sprite.svg#back-to-top"></use>
            </svg>
        </button>

    </div>

    <!-- modals -->
    <div
      id="data-sent"
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
              Your Message Received
            </h3>
            <button
              type="button"
              class="flex size-7 items-center justify-center rounded-full border-2 border-white"
              data-hs-overlay="#data-sent"
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
            <p class="mb-3 text-2xl text-primary lg:text-3xl">
              Message Received Successfully
            </p>
            <p class="mb-7 lg:mb-10 lg:text-lg">
              Your message has been sent to us successfully, We will contact you
              soon Have a nice day
            </p>

            <ul class="social-list primary justify-center">
              <li>
                <a href="#">
                  <svg>
                    <use href="./assets/images/icons/sprite.svg#facebook"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg>
                    <use href="./assets/images/icons/sprite.svg#linkedin"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg>
                    <use href="./assets/images/icons/sprite.svg#youtube"></use>
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

          <img
            src="./assets/images/icons/model-decoration.png"
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
                        <div data-hs-stepper-content-item='{ "index": 1 }'>
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
                                                id="names"
                                                name="names"
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
                                                id="emails"
                                                type="text"
                                                name="emails"
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
                                                id="nationality"
                                                type="text"
                                                name="nationality"
                                                class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                                placeholder="Your Name"
                                            >
                                                <option hidden>Your Nationality</option>
                                                <option value="0">Egyption</option>
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
                                                placeholder="Enter your phone number"
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
                                            >Departure Date</label
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
                                            </select>
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
                                        >Extra Notes</label
                                        >
                                        <textarea
                                            id="notes"
                                            type="date"
                                            name="notes"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Write your note here..."
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
                            >
                                Back
                            </button>
                            <button
                                type="button"
                                class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                                data-hs-stepper-next-btn
                            >
                                Next
                            </button>
                            <button
                                type="button"
                                onclick="submitForms()"
                                class="inline-block min-w-36 rounded-lg border border-transparent bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                                data-hs-stepper-finish-btn
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
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
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
