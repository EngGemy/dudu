@php
    $locale = app()->getLocale();
    $labels = [
        'home' => __('front.site.nav.home'),
        'dream' => __('front.site.nav.dream'),
        'events' => __('front.site.footer.events'),
        'services' => __('front.site.footer.services'),
        'blogs' => __('front.site.footer.blogs'),
        'about' => __('front.site.nav.about'),
        'loyalty' => __('front.site.meta.loyalty_program'),
        'careers' => __('front.site.footer.careers'),
        'how_it_works' => __('front.site.footer.how_it_works'),
        'partner' => __('front.site.footer.become_partner'),
        'contact' => __('front.site.nav.contact'),
        'language' => __('front.site.language.selector'),
        'popular_packages' => __('front.site.footer.popular_tour_packages'),
        'main_links' => __('front.site.footer.main_links'),
        'official_pages' => __('front.site.footer.official_pages'),
        'rights_reserved' => __('front.site.footer.rights_reserved'),
        'faqs' => __('front.site.footer.faqs'),
        'privacy' => __('front.site.footer.privacy_policy'),
        'terms' => __('front.site.footer.terms_conditions'),
        'travel_guide' => __('front.site.footer.egypt_travel_guide'),
    ];
@endphp
<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('front.site.nav.contact') }} - {{ __('front.site.meta.default_title') }}</title>

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
    <style>
      .contact-reveal {
        opacity: 0;
        transform: translateY(22px);
        animation: contactReveal .75s ease forwards;
      }

      .contact-float {
        transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
      }

      .contact-float:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, .12);
      }

      .contact-shell {
        background:
          radial-gradient(circle at top left, rgba(202, 156, 84, .16), transparent 34%),
          linear-gradient(135deg, rgba(255, 255, 255, .98), rgba(255, 255, 255, .9));
      }

      @keyframes contactReveal {
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
    </style>
    <script defer src="{{ asset('assets/scripts/main.js') }}"></script>
    <script defer src="{{ asset('assets/scripts/doudou-design.js') }}"></script>
  </head>

  <body>
    <div class="app">
      <header class="page-header">
        <div class="navbar">
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
                    <x-social-links variant="white" class="mt-7 justify-center" />
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
                              {{ __('front.site.search.hotel_name') }}
                            </button>
                            <button
                              type="button"
                              class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                            >
                              {{ __('front.site.search.hotel_name') }}
                            </button>
                            <button
                              type="button"
                              class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                            >
                              {{ __('front.site.search.hotel_name') }}
                            </button>
                            <button
                              type="button"
                              class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                            >
                              {{ __('front.site.search.hotel_name') }}
                            </button>
                            <button
                              type="button"
                              class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                            >
                              {{ __('front.site.search.hotel_name') }}
                            </button>
                            <button
                              type="button"
                              class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                            >
                              {{ __('front.site.search.hotel_name') }}
                            </button>
                            <button
                              type="button"
                              class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                            >
                              {{ __('front.site.search.hotel_name') }}
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
                      {{ __('front.site.search.search') }}
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
              <h1 class="txt-shadow">{{ $labels['contact'] }}</h1>
            </div>
          </div>
        </div>

        <img
          src="./assets/images/contact-bg.jpeg"
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
                  <a href="{{route('home')}}"> {{ $labels['home'] }} </a>
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
                <li aria-current="page">{{ $labels['contact'] }}</li>
              </ol>

              <div class="grid gap-4 lg:grid-cols-3">
                <div
                  class="flex items-center gap-3 rounded-xl border border-primary p-8"
                >
                  <div
                    class="flex size-14 shrink-0 items-center justify-center rounded-full bg-primary"
                  >
                    <svg class="size-6 text-white">
                      <use
                        href="./assets/images/icons/sprite.svg#location"
                      ></use>
                    </svg>
                  </div>

                  <div>
                    <p class="text-lg font-semibold">{{ $contactCards[0]['title'] ?? __('front.site.contact.cards.location.title') }}</p>
                    <p class="text-gray">{{ $contactCards[0]['value'] ?? __('front.site.contact.cards.location.fallback') }}</p>
                  </div>
                </div>
                <div
                  class="flex items-center gap-3 rounded-xl border border-primary p-8"
                >
                  <div
                    class="flex size-14 shrink-0 items-center justify-center rounded-full bg-primary"
                  >
                    <svg class="size-6 text-white">
                      <use href="./assets/images/icons/sprite.svg#mail"></use>
                    </svg>
                  </div>

                  <div>
                    <p class="text-lg font-semibold">{{ $contactCards[1]['title'] ?? __('front.site.contact.cards.email.title') }}</p>
                    <p class="text-gray">{{ $contactCards[1]['value'] ?? __('front.site.contact.cards.email.fallback') }}</p>
                  </div>
                </div>
                <div
                  class="flex items-center gap-3 rounded-xl border border-primary p-8"
                >
                  <div
                    class="flex size-14 shrink-0 items-center justify-center rounded-full bg-primary"
                  >
                    <svg class="size-6 text-white">
                      <use href="./assets/images/icons/sprite.svg#phone"></use>
                    </svg>
                  </div>

                  <div>
                    <p class="text-lg font-semibold">{{ $contactCards[2]['title'] ?? __('front.site.contact.cards.phone.title') }}</p>
                    <p class="text-gray">{{ $contactCards[2]['value'] ?? __('front.site.contact.cards.phone.fallback') }}</p>
                  </div>
                </div>
              </div>

              <p class="contact-reveal my-6 text-lg">
                {{ __('front.site.contact.intro') }}
              </p>

              <div class="contact-reveal contact-shell rounded-xl border border-primary p-8 lg:p-12">
                <p class="mb-8">
                  {{ __('front.site.contact.form_intro') }}
                </p>

                <form id="contact-form">
                  @csrf
                  <div
                    class="flex flex-col gap-8 lg:grid-cols-2 lg:flex-row lg:gap-16"
                  >
                    <div class="w-full space-y-6 lg:w-1/2">
                      <div class="flex gap-4">
                        <div class="relative max-w-[80px] shrink-0">
                          <label
                            for="title"
                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >{{ __('front.site.contact.title') }}</label
                          >
                          <select
                            id="title"
                            name="title"
                            type="text"
                            class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                            placeholder="{{ __('front.site.form.your_name') }}"
                          >
                            <option value="0">{{ __('front.site.contact.mr') }}</option>
                            <option value="1">{{ __('front.site.contact.ms') }}</option>
                          </select>
                        </div>
                        <div class="relative flex-1">
                          <label
                            for="name"
                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                            >{{ __('front.site.contact.name') }}</label
                          >
                          <input
                            id="names"
                            name="name"
                            type="text"
                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                            placeholder="{{ __('front.site.contact.your_name') }}"
                          />
                        </div>
                      </div>

                      <div
                        class="relative flex-1 rounded-xl border border-primary px-4 py-3"
                      >
                        <label
                          for="tel"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >{{ __('front.site.contact.phone_number') }}</label
                        >
                        <div class="flex items-center gap-3">
                          <select
                            name="code"
                            class="block border-e-2 border-gray bg-transparent text-center"
                          >
                            <option value="+20">EG +20</option>
                            <option value="+86">CN +86</option>
                            <option value="+852">HK +852</option>
                            <option value="+966">SA +966</option>
                          </select>

                          <input
                            id="tels"
                            name="phone"
                            type="text"
                            class="block w-full flex-1 text-black outline-none placeholder:text-gray"
                            placeholder="{{ __('front.site.contact.enter_phone_number') }}"
                          />
                        </div>
                      </div>

                      <div>
                        <p class="mb-2 text-center text-sm">
                          {{ __('front.site.contact.contact_issue') }}
                          <span class="text-primary"
                            >{{ __('front.site.contact.contact_directly_by') }}</span
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
                          <x-social-links variant="primary" class="justify-center" />
                      </div>
                    </div>

                    <div class="w-full space-y-6 lg:w-1/2">
                      <div class="relative flex-1">
                        <label
                          for="email"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >{{ __('front.site.contact.email') }}</label
                        >
                        <input
                          id="emails"
                          name="email"
                          type="email"
                          class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.contact.your_email') }}"
                        />
                      </div>

                      <div class="relative flex-1">
                        <label
                          for="city_id"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >{{ __('front.site.contact.city') }}</label
                        >
                        <select
                          id="city_id"
                          name="city_id"
                          type="text"
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.contact.your_city') }}"
                        >
                          <option value="" hidden>{{ __('front.site.contact.your_city') }}</option>
                          @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name ?? $city->translate(app()->getLocale())?->name ?? $city->translate('en')?->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="relative flex-1">
                        <label
                          for="message"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >{{ __('front.site.contact.message') }}</label
                        >
                        <textarea
                          id="message"
                          name="message"
                          class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.contact.message_placeholder') }}"
                        ></textarea>
                      </div>

                      <button
                        type="submit"
                        data-hs-overlay="#data-sent"
                        class="ms-auto block w-fit rounded-xl bg-primary px-6 py-3 text-lg text-white transition-colors hover:bg-secondary"
                      >
                        {{ __('front.site.contact.send') }}
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
                <span>{{ __('front.site.sections.frequently') }}</span> {{ __('front.site.sections.asked_questions') }}
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

                    {{ $questions->get(0)?->title ?? __('front.site.sections.asked_questions') }}
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
                        {!! $questions->get(0)?->description ?? '' !!}
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

                    {{ $questions->get(1)?->title ?? __('front.site.sections.asked_questions') }}
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
                        {!! $questions->get(1)?->description ?? '' !!}
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

                    {{ $questions->get(2)?->title ?? __('front.site.sections.asked_questions') }}
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
                        {!! $questions->get(2)?->description ?? '' !!}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-6 text-center">
              <a href="{{ route('faq') }}" class="text-lg text-secondary underline">{{ __('front.site.sections.show_more') }}</a>
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
                      href="./assets/images/icons/sprite.svg#arrow-left"
                    ></use>
                  </svg>
                </button>
              </span>

              <div class="swiper flex-1">
                <div class="swiper-wrapper">
                  @foreach($partners as $partner)
                    <div class="swiper-slide w-auto p-2">
                      <div class="img-shadow rounded-xl p-3">
                        <img
                          src="{{ $partner->image_url }}"
                          class="size-28 object-contain object-center lg:size-40"
                          alt="{{ __('front.site.sections.doudou') }} {{ __('front.site.sections.partners') }}"
                        />
                      </div>
                    </div>
                  @endforeach
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
                  <h3>{{ $labels['popular_packages'] }}</h3>

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
                  <h3>{{ $labels['main_links'] }}</h3>

                  <ul>
                    <li>
                      <a href="{{route('about')}}">{{ $labels['about'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('contact')}}">{{ $labels['contact'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('careers')}}">{{ $labels['careers'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('blogs')}}">{{ $labels['blogs'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('faq')}}">{{ $labels['faqs'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('privacy')}}">{{ $labels['privacy'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('terms')}}">{{ $labels['terms'] }}</a>
                    </li>
                  </ul>
                </div>
                <div>
                  <h3>{{ $labels['official_pages'] }}</h3>

                  <ul>
                    <li>
                      <a href="{{route('how-it-works')}}">{{ $labels['how_it_works'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('loyalty-program')}}">{{ $labels['loyalty'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('events')}}">{{ $labels['events'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('partner')}}">{{ $labels['partner'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('events')}}">{{ $labels['travel_guide'] }}</a>
                    </li>
                    <li>
                      <a href="{{route('services')}}">{{ $labels['services'] }}</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="footer__copyright">
              <p class="max-lg:order-2 max-lg:text-center max-lg:text-sm">
                {{ $labels['rights_reserved'] }} &copy;
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
        <button type="button" id="BackToTop" class="back-to-top" onclick="lenis.scrollTo('body')">
            <svg>
                <use href="./assets/images/icons/sprite.svg#back-to-top"></use>
            </svg>
        </button>

    </div>

    @include('front.layouts.floating-contact')

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
                        <div id="myElement1"  data-hs-stepper-content-item='{ "index": 1 }'>
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
                                                onchange="checkInputs()"
                                                required
                                                id="title"
                                                type="text"
                                                name="title"
                                                class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                                placeholder="{{ __('front.site.form.your_name') }}"
                                            >
                                                <option value="0">Mr.</option>
                                                <option value="1">Ms.</option>
                                            </select>
                                        </div>
                                        <div class="relative flex-1">
                                            <label

                                                for="name"
                                                class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                            >{{ __('front.site.form.name') }}</label
                                            >
                                            <input
                                                oninput="checkInputs()"
                                                required
                                                id="name"
                                                name="name"
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
                                                oninput="checkInputs()"
                                                required
                                                id="email"
                                                type="text"
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
                                                onchange="checkInputs()"
                                                required
                                                id="nationality"
                                                type="text"
                                                name="nationality"
                                                class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                                placeholder="{{ __('front.site.form.your_name') }}"
                                            >
                                                <option hidden>{{ __('front.site.form.your_nationality') }}</option>
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
                                        >{{ __('front.site.form.phone_number') }}</label
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
                                                placeholder="{{ __('front.site.form.enter_phone_number') }}"
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
                                            >{{ __('front.site.form.departure_date') }}</label
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
                                        >{{ __('front.site.form.your_destination') }}</label
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
                                                    <label for="destination" class="">{{ __('front.site.form.your_destination') }}</label>
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
                                                placeholder="{{ __('front.site.form.your_name') }}"
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
                                                placeholder="{{ __('front.site.form.your_name') }}"
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
                        {{ __('front.site.footer.contact_us') }}
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
                        <p class="mb-6 text-center text-sm text-gray">
                            {{ __('front.site.contact.contact_issue') }}
                            <span class="font-semibold text-primary">{{ __('front.site.contact.contact_directly_by') }}</span>
                        </p>
                        <x-contact-channel-actions mode="cards" />
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
                document.getElementById('name_error').textContent = @json(__('front.site.form.validation_name_required'));
                isValid = false;
            }

            // Validate Email
            const emailInput = document.getElementById('email');
            if (emailInput.value.trim() === '') {
                document.getElementById('email_error').textContent = @json(__('front.site.form.validation_email_required'));
                isValid = false;
            }

            // Validate Nationality
            const nationalityInput = document.getElementById('nationality');
            if (nationalityInput.value === '0' || nationalityInput.value.trim() === '') {
                document.getElementById('nationality_error').textContent = @json(__('front.site.form.validation_nationality_required'));
                isValid = false;
            }

            // Validate Phone Number
            const telInput = document.getElementById('tel');
            if (telInput.value.trim() === '') {
                document.getElementById('tel_error').textContent = @json(__('front.site.form.validation_phone_required'));
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
                document.getElementById('name_error').textContent = @json(__('front.site.form.validation_name_required'));
                isValid = false;
            }

            // Validate Email
            const emailInput = document.getElementById('email');
            if (emailInput.value.trim() === '') {
                document.getElementById('email_error').textContent = @json(__('front.site.form.validation_email_required'));
                isValid = false;
            }

            // Validate Nationality
            const nationalityInput = document.getElementById('nationality');
            if (nationalityInput.value === '0' || nationalityInput.value.trim() === '') {
                document.getElementById('nationality_error').textContent = @json(__('front.site.form.validation_nationality_required'));
                isValid = false;
            }

            // Validate Phone Number
            const telInput = document.getElementById('tel');
            if (telInput.value.trim() === '') {
                document.getElementById('tel_error').textContent = @json(__('front.site.form.validation_phone_required'));
                isValid = false;
            }
            const departure_date = document.getElementById('departure-date');
            if (departure_date.value.trim() === '') {
                document.getElementById('departure-date').textContent = @json(__('front.site.form.validation_departure_required'));
                isValid = false;
            }

            const arrival_date = document.getElementById('arrival-date');
            if (arrival_date.value.trim() === '') {
                document.getElementById('arrival-date_error').textContent = @json(__('front.site.form.validation_arrival_required'));
                isValid = false;
            }
            const city_id = document.getElementById('destination');
            if (city_id.value === '') {
                document.getElementById('destination_error').textContent = @json(__('front.site.form.validation_destination_required'));

                isValid = false;
            }
            const tour_id = document.getElementById('accommodation');
            if (tour_id.value.trim() === '') {
                document.getElementById('accommodation_error').textContent = @json(__('front.site.form.validation_accommodation_required'));
                isValid = false;
            }
            const range_age = document.getElementById('age');
            if (range_age.value.trim() === '') {
                document.getElementById('age_error').textContent = @json(__('front.site.form.validation_age_required'));
                isValid = false;
            }
            const notes = document.getElementById('notes');
            if (range_age.value.trim() === '') {
                document.getElementById('notes_error').textContent = @json(__('front.site.form.validation_notes_required'));
                isValid = false;
            }
            const adt = document.getElementById('adults-count');
            if (adt.value === '') {
                document.getElementById('adults-count_error').textContent = @json(__('front.site.form.validation_adults_required'));
                isValid = false;
            }
            const chd = document.getElementById('children-count');
            if (chd.value === '') {
                document.getElementById('children-count_error').textContent = @json(__('front.site.form.validation_children_required'));
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
                placeholder: @json(__('front.site.form.choose_hotels')),
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
                placeholder: @json(__('front.site.form.choose_cities')),
                allowClear: true, // Adds a clear button


            });
            $('#selectedHotels').select2({
                placeholder: @json(__('front.site.form.choose_hotels')),
                allowClear: true, // Adds a clear button


            });

        });
    </script>
    <script>
      document.getElementById('contact-form')?.addEventListener('submit', async function (event) {
        event.preventDefault();

        const form = event.currentTarget;
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.textContent;
        submitButton.disabled = true;
        submitButton.textContent = '...';

        try {
          const response = await fetch("{{ route('message') }}", {
            method: 'POST',
            headers: {
              'Accept': 'application/json',
              'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            },
            body: new FormData(form),
          });

          const data = await response.json();
          if (!response.ok) {
            throw data;
          }

          document.querySelector('#data-sent .text-primary').textContent = data.res || @json(__('front.site.blog.message_sent_successfully'));
          document.querySelector('#data-sent .full-message').textContent = data.full_message || '';
          document.querySelector('#data-sent .message-header').textContent = data.message_header || '';
          window.HSOverlay?.open('#data-sent');
          form.reset();
        } catch (error) {
          const message = error?.message || Object.values(error?.errors || {})?.[0]?.[0] || 'Please check the form and try again.';
          alert(message);
        } finally {
          submitButton.disabled = false;
          submitButton.textContent = originalText;
        }
      });
    </script>
  </body>
</html>
