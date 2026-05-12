<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('front.site.meta.default_title') }}</title>

    @include('front.layouts.hreflang')
      <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">

      {{--      <meta itemprop="name" content="{{ $travel_transportation->meta_title }}">--}}
{{--      <meta itemprop="description" content="{{ $travel_transportation->meta_description }}">--}}
{{--      <meta itemprop="image" content="{{ $travel_transportation->meta_img }}">--}}
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

              <img src="./assets/images/logo-mobile.png" class="h-8" alt="" />
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

        <div class="hero">
          <div class="container">
            <div class="hero_content">
              <h1 class="txt-shadow">{{ __('front.site.sections.our_services') }}</h1>
              <p class="txt-shadow">
                Provide everyone with the finest vacation accompanied by the
                highest level of safety, luxury and affordable prices
              </p>
            </div>
          </div>
        </div>

        <section class="bg-primary py-12 text-white lg:bg-opacity-75 lg:py-16">
          <div class="container">
            <header class="section_header text-center">
              <h2 class="section_heading">{{ __('front.site.sections.egypt_doudou_travel_services') }}</h2>
            </header>

            <div
              class="grid gap-5 text-center md:grid-cols-2 lg:grid-cols-5 lg:gap-10"
            >
                @foreach($travel_services as $service)
                    <div
                        data-aos="fade-up"
                        data-aos-easing="ease-out"
                        data-aos-delay="200"
                    >
                        <div>
                            <img
                                src="{{ $service->icon_url ?? './assets/images/icons/hotel-alt.svg' }}"
                                class="mx-auto mb-2 size-10"
                                alt=""
                            />
                            <h3 class="mb-4 text-2xl font-semibold text-secondary">
                                @if($service->status == 0)
                                    Accommodation
                                @elseif($service->status == 1)
                                    Transportation
                                @elseif($service->status == 2)
                                    Flight Reservation
                                @elseif($service->status == 3)
                                    Visa Formalities
                                @elseif($service->status == 4)
                                    Tour Guidance
                                @else
                                    Accommodation
                                @endif
                            </h3>
                        </div>

                        <p class="line-clamp-3 leading-relaxed">
                            {!! implode(' ', array_slice(str_word_count(strip_tags($service->description), 1), 0, 20)) !!}
                        </p>
                    </div>
                @endforeach

            </div>
          </div>
        </section>

        <img
          src="./assets/images/service-visa-formalities.jpeg"
          class="page-header__bg"
          alt=""
        />
      </header>

      <main class="space-y-12 lg:space-y-16">
        <section>
          <div class="relative pt-8">
            <div class="sticky top-0 z-40 mb-8 bg-white py-4">
              <div class="container">
                  <menu class="tabs mb-0">
                      <li>
                          <a href="{{route('services')}}" class="tab" >
                              Accommodation
                          </a>
                      </li>
                      <li>
                          <a href="{{route('services-transportation')}}" class="tab"  >Transportation</a>
                      </li>
                      <li>
                          <a href="{{route('services-flight-reservation')}}" class="tab">Flight Reservation</a>
                      </li>
                      <li>
                          <a href="{{route('services-visa-formalities')}}" class="tab" aria-current="page">Visa Formalities</a>
                      </li>
                      <li>
                          <a href="{{route('services-tour-guidance')}}" class="tab">Tour Guidance</a>
                      </li>
                  </menu>
              </div>
            </div>

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
                <li aria-current="page">Visa Formalities</li>
              </ol>
            </div>
          </div>
        </section>

        <!-- ---------- -->

        <section id="blog">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>Explore</span> Articles About Visa Formalities in Egypt
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
                  @forelse($visa_blogs as $blog )
                      <div class="swiper-slide">
                          <article class="tour-card">
                              <div class="tour-card__thumbnail-wrapper">
                                  <img
                                      src="{{ $blog->image_url}}"
                                      class="tour-card__thumbnail"
                                      alt=""
                                  />
                              </div>

                              <div class="tour-card__content">
                                  <h3>{{ $blog->title}}</h3>

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
                  @empty

                      <div>
                          <li style="color: #0D6AAD; font-size: 20px">
                              Not Found Blogs Related With Visa-Formalities Service
                          </li>
                      </div>

                  @endforelse
              </div>
            </div>

            <img
              src="./assets/images/section-divider.png"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
          </div>
        </section>

          <x-general-comment-component />

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
              <a href="{{route('faq')}}" class="text-lg text-secondary underline">Show More</a>
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
                          class="flex-1 text-black outline-none placeholder:text-gray"
                          placeholder="Enter your phone number"
                        />
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
                          class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                        />
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
                          class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                        />
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
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="Your Name"
                        >
                          <option hidden>Your Destination</option>
                        </select>
                      </div>
                      <div class="relative flex-1">
                        <label
                          for="accommodation"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >Accommodation Choice</label
                        >
                        <select
                          id="accommodation"
                          type="text"
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="Your Name"
                        >
                          <option hidden>Accommodation Choice</option>
                        </select>
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
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="Your Name"
                        >
                          <option hidden>Select age range</option>
                        </select>
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
                    <div class="relative flex-1">
                      <label
                        for="notes"
                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                        >Extra Notes</label
                      >
                      <textarea
                        id="notes"
                        type="date"
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
                  <!-- data-hs-overlay="#customize-tour" -->
                  Cancel
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

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.js"></script>
    <script>
      function budgetSlider(el) {
        const sliderWrapper = document.querySelector(el);
        console.log(sliderWrapper)
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
      // budgetSlider("#slider-1");
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
