@php
    $currentLocale = app()->getLocale();
    $topBarLangLabel = match($currentLocale) {
        'en' => '??????',
        'zh-Hant' => 'English',
        'zh' => 'English',
        default => '??????',
    };
    $languages = [
        'zh-Hant' => '??????',
        'zh' => '??????',
        'en' => 'English',
    ];
@endphp
        <div class="navbar site-header" data-sticky-header>
           {{--            Yield --}}
          <div class="container">
            <div class="navbar_top">
              {{-- Social icons left side --}}
              <x-social-links variant="white" class="topbar-socials max-md:hidden" />

              <div class="flex items-center gap-4 lg:gap-6">
                <div class="flex items-center gap-2">
                  <svg class="size-5 text-white">
                    <use href="{{asset('assets/images/icons/sprite.svg#clock')}}"></use>
                  </svg>
                  <span class="text-sm text-white"
                    >{{ __('front.site.nav.cairo') }} : <span id="time">05: 14</span></span
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

                {{-- Language switcher — self-contained partial with its own CSS+JS --}}
                @include('front.layouts.lang-switcher')
              </div>
            </div>
          </div>
            {{--          end  Yield --}}

          <nav class="navbar_nav">
            <div class="container">
              @include('front.layouts.nav-list')
            </div>
          </nav>

          <div class="promo-bar bg-secondary py-2.5 max-lg:hidden overflow-hidden">
            <style>
              .promo-bar{position:relative}
              .promo-bar::before,.promo-bar::after{content:'';position:absolute;top:0;bottom:0;width:60px;z-index:2;pointer-events:none}
              .promo-bar::before{left:0;background:linear-gradient(90deg,#f7931e,transparent)}
              .promo-bar::after{right:0;background:linear-gradient(270deg,#f7931e,transparent)}
              .promo-track{display:flex;align-items:center;gap:0;white-space:nowrap;animation:promoScroll 28s linear infinite}
              .promo-track:hover{animation-play-state:paused}
              @keyframes promoScroll{0%{transform:translateX(0)}100%{transform:translateX(-50%)}}
              .promo-item{display:inline-flex;align-items:center;gap:10px;padding:0 32px;font-size:.875rem;color:#fff}
              .promo-item .promo-star{color:rgba(255,255,255,.7);font-size:10px;letter-spacing:2px}
              .promo-item a{color:#fff;font-weight:700;background:rgba(0,86,144,.55);border-radius:20px;padding:3px 12px;margin-left:6px;transition:background .2s ease,transform .15s ease;display:inline-block;text-decoration:none}
              .promo-item a:hover{background:rgba(0,86,144,.85);transform:scale(1.06)}
            </style>
            <div class="promo-track" aria-live="polite">
              @php $promoText = __('front.site.sections.easter_banner'); $bookNow = __('front.site.sections.book_now'); @endphp
              @for($i = 0; $i < 6; $i++)
              <span class="promo-item">
                <span class="promo-star">✦ ✦ ✦</span>
                {{ $promoText }}
                <a href="#">{{ $bookNow }}</a>
                <span class="promo-star">✦ ✦ ✦</span>
              </span>
              @endfor
            </div>
          </div>

          <div class="navbar_desktop">
            <img
              src="{{asset('assets/images/logo.png')}}"
              class="w-48 shrink-0 lg:w-60"
              alt=""
            />

            <div class="header-search relative flex flex-1 max-w-2xl items-center gap-3 rounded-full border border-primary/30 bg-white px-5 py-3 shadow-sm transition-all focus-within:border-primary focus-within:shadow-md hover:border-primary">
              <svg class="size-5 text-primary shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
              </svg>
              <input
                type="text"
                id="header-search-input"
                autocomplete="off"
                class="header-search__input flex-1 bg-transparent text-gray-800 outline-none placeholder:text-gray-500"
                placeholder="{{ __('front.site.search.search') }} {{ strtolower(__('front.site.sections.egypt_tours')) }}, {{ strtolower(__('front.site.sections.top_egypt_destinations')) }}…"
              />
              <button type="button" id="header-search-clear" class="header-search__clear hidden text-gray-400 hover:text-gray-600 shrink-0" aria-label="{{ __('front.site.form.clear') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
              </button>
              <div id="header-search-results" class="header-search__results hidden"></div>
            </div>

            <form id="searchForm" style="display:none !important">
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
                          href="{{asset('assets/images/icons/sprite.svg#hotel')}}"
                        ></use>
                      </svg>
                      <p id="selectedHotel">{{ __('front.site.search.hotel_placeholder') }}</p>
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
                      class="hs-dropdown-menu duration inset-x-0 z-10 mt-2 hidden space-y-3 rounded-lg bg-white p-5 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                    >
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        aria-pressed="true"
                        data-rate="5"
                      >
                      {{ __('front.site.search.hotel_placeholder') }}
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="4"
                      >
                      {{ __('front.site.search.luxury_4_stars') }}
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="3"
                      >
                      {{ __('front.site.search.standard_3_stars') }}
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="2"
                      >
                      {{ __('front.site.search.budget_2_stars') }}
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="1"
                      >
                      {{ __('front.site.search.economy_1_star') }}
                      </button>
                    </div>
                  </div>
                </div>
                <div class="flex flex-1 items-center gap-3 px-4">
                  <svg class="size-6 text-primary">
                    <use href="{{asset('assets/images/icons/sprite.svg#calender')}}"></use>
                  </svg>
                  <input
                    id="range"
                    name = "checkIn_checkOut"
                    type="text"
                    class="flatpickr flatpickr-input flex-1 bg-transparent text-black outline-none placeholder:text-black"
                    placeholder="{{ __('front.site.search.date_placeholder') }}"
                  />
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
                </div>

                <div class="flex-1">
                  <div
                    class="hs-dropdown relative flex h-full [--strategy:absolute] [--auto-close:inside]"
                  >
                    <button
                      type="button"
                      class="hs-dropdown-toggle flex h-full w-full items-center gap-3 text-nowrap px-4"
                    >
                      <svg class="size-6 text-primary">
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#subscription-cashflow')}}"
                        ></use>
                      </svg>
                      {{ __('front.site.search.budget_from_to') }}
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
                      class="hs-dropdown-menu duration inset-x-0 z-10 mt-2 hidden rounded-lg bg-white p-6 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                    >
                      <p class="mb-4 text-sm">{{ __('front.site.search.your_budget') }}</p>
                      <div id="slider-1">
                        <div class="slider mb-3"></div>
                        <p class="flex items-center justify-between text-sm">
                          <span>$<span class="slider-min" name ="slider-min" id="slider-min"></span></span>
                          <span>$<span class="slider-max" name ="slider-max" id="slider-max"></span></span>

                        </p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <button
              type="button"
                class="rounded-br-xl rounded-tr-xl bg-primary px-5 py-3 text-white transition-colors hover:bg-opacity-80"
                onclick="filterTable()"
              >
                {{ __('front.site.search.search') }}
              </button>
            </div>
            </form>

            <button
              type="button"
              data-hs-overlay="#customize-tour"
              class="flex items-center gap-2 rounded-lg bg-primary px-4 py-3 text-white transition-colors hover:bg-opacity-75"
            >
              <svg class="size-5 text-white">
                <use href="{{asset('assets/images/icons/sprite.svg#settings')}}"></use>
              </svg>

              {{ __('front.site.footer.customize_your_tour') }}
            </button>
          </div>

          <div class="navbar_mobile">
            <div class="mobile-header-main flex items-center gap-2">
              <div class="hs-dropdown relative inline-flex">
                <button type="button">
                  <svg class="size-6 text-white">
                    <use href="{{asset('assets/images/icons/sprite.svg#menu')}}"></use>
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
                        href="{{route('home')}}"
                        class="flex items-center gap-4 text-white"
                      >
                        <img
                          src="{{asset('assets/images/icons/egyptian-sphinx.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.egypt_tour') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-urns.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.event') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/symbols_travel.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.services') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-temple.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.blog') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-walk.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.reviews') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-bird.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.loyalty_program') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-profile.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.careers') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-pyramids.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.how_it_works') }}
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/deal.png')}}"
                          class="size-6"
                          alt=""
                        />
                        {{ __('front.site.sections.become_our_partner') }}
                      </a>
                    </nav>

                    <ul class="social-list white mt-7 justify-center">

                      <li>
                        <a href="#">
                          <svg>
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#facebook')}}"
                            ></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg>
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#linkedin')}}"
                            ></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg>
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#youtube')}}"
                            ></use>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <svg>
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#instagram')}}"
                            ></use>
                          </svg>
                        </a>
                      </li>

                    </ul>
                  </div>
                </div>
              </div>

              <img src="{{asset('assets/images/logo-mobile.png')}}" class="h-8" alt="" />
            </div>

            <div class="mobile-header-actions flex items-center gap-4">
              <div
                class="mobile-filter-dropdown hs-dropdown group relative inline-flex [--auto-close:outside] [--offset:20]"
              >
                <button type="button" data-search-open aria-label="Search">
                  <svg class="size-4.5 text-white group-[.open]:hidden">
                    <use href="{{asset('assets/images/icons/sprite.svg#search')}}"></use>
                  </svg>
                  <svg class="hidden size-6 text-white group-[.open]:block">
                    <use href="{{asset('assets/images/icons/sprite.svg#close')}}"></use>
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
                                href="{{asset('assets/images/icons/sprite.svg#hotel')}}"
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
                            href="{{asset('assets/images/icons/sprite.svg#calender')}}"
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
                                href="{{asset('assets/images/icons/sprite.svg#subscription-cashflow')}}"
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
                    href="{{asset('assets/images/icons/sprite.svg#customer-service-2')}}"
                  ></use>
                </svg>
              </button>
              <button type="button" data-hs-overlay="#customize-tour">
                <svg class="size-5 text-white">
                  <use href="{{asset('assets/images/icons/sprite.svg#settings')}}"></use>
                </svg>
              </button>
            </div>

            {{-- Mobile search bar: tap-to-open, only visible on mobile --}}
            <button type="button" data-search-open class="mobile-search-bar" aria-label="{{ __('front.site.search.search') }}">
              <svg xmlns="http://www.w3.org/2000/svg" class="mobile-search-bar__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
              <span class="mobile-search-bar__text">{{ __('front.site.search.search') }} {{ strtolower(__('front.site.sections.egypt_tours')) }}, {{ strtolower(__('front.site.sections.top_egypt_destinations')) }}…</span>
              <span class="mobile-search-bar__kbd">⌘K</span>
            </button>
          </div>
        </div>

<style>
    .site-header {
        transition: background .24s ease, box-shadow .24s ease, transform .24s ease, color .24s ease;
    }
    .site-header .navbar_desktop,
    .site-header .navbar_nav,
    .site-header .navbar_top,
    .site-header .promo-bar,
    .site-header .navbar_desktop img {
        transition: padding .24s ease, background .24s ease, box-shadow .24s ease, opacity .2s ease, transform .24s ease, width .24s ease;
    }
    @media (min-width: 1024px) {
        .site-header.is-sticky {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 160;
            background: rgba(255,255,255,.94);
            color: #0d2230;
            box-shadow: 0 18px 45px rgba(0,40,70,.14);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }
        .site-header.is-sticky .navbar_top,
        .site-header.is-sticky .navbar_nav,
        .site-header.is-sticky .promo-bar {
            display: none !important;
        }
        .site-header.is-sticky .navbar_desktop {
            padding-top: .65rem;
            padding-bottom: .65rem;
        }
        .site-header.is-sticky .navbar_desktop > img {
            width: 9.25rem !important;
        }
        .site-header.is-sticky .header-search {
            box-shadow: 0 10px 26px rgba(0,40,70,.08);
        }
        .site-header.is-sticky .bg-gradient {
            box-shadow: 0 10px 24px rgba(247,147,30,.24);
        }
    }
    @media (max-width: 1023px) {
        .site-header.is-sticky .navbar_mobile {
            background: rgba(0,113,189,.96);
            box-shadow: 0 12px 28px rgba(0,40,70,.22);
        }
    }
    .header-search { position: relative; }
    .header-search__results {
        position: absolute; left: 0; right: 0; top: calc(100% + 8px); z-index: 80;
        max-height: 70vh; overflow-y: auto; padding: 8px;
        background: #fff; border: 1px solid rgba(0,113,189,.16); border-radius: 14px;
        box-shadow: 0 18px 50px rgba(0,40,70,.18);
    }
    .header-search__results.hidden { display: none; }
    .header-search__group { padding: 8px 4px 4px; }
    .header-search__group-label { font-size: 10px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #727171; padding: 4px 10px 6px; }
    .header-search__hit { display: flex; align-items: center; gap: 12px; padding: 9px 10px; border-radius: 8px; color: #0d2230; transition: background .15s; cursor: pointer; }
    .header-search__hit:hover, .header-search__hit.is-active { background: rgba(0,113,189,.08); }
    .header-search__hit-thumb { width: 40px; height: 40px; border-radius: 8px; background: #f3f4f6; flex: none; object-fit: cover; }
    .header-search__hit-body { flex: 1; min-width: 0; }
    .header-search__hit-title { font-size: 14px; font-weight: 700; line-height: 1.3; }
    .header-search__hit-title mark { background: rgba(247,147,30,.3); color: inherit; padding: 0 2px; border-radius: 3px; }
    .header-search__hit-snippet { font-size: 12px; color: #727171; line-height: 1.4; margin-top: 2px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
    .header-search__hit-snippet mark { background: rgba(247,147,30,.3); color: inherit; padding: 0 2px; border-radius: 3px; }
    .header-search__empty { padding: 18px 14px; text-align: center; color: #727171; font-size: 13px; }
    .header-search__skel { display: flex; gap: 12px; padding: 10px; }
    .header-search__skel > div:first-child { width: 40px; height: 40px; border-radius: 8px; background: linear-gradient(90deg,#f3f4f6,#e5e7eb,#f3f4f6); background-size: 200% 100%; animation: hsskel 1.4s infinite; flex: none; }
    .header-search__skel > div:last-child { flex: 1; display: flex; flex-direction: column; gap: 6px; padding-top: 6px; }
    .header-search__skel > div:last-child > span { height: 11px; border-radius: 4px; background: linear-gradient(90deg,#f3f4f6,#e5e7eb,#f3f4f6); background-size: 200% 100%; animation: hsskel 1.4s infinite; }
    .header-search__skel > div:last-child > span:first-child { width: 60%; }
    .header-search__skel > div:last-child > span:last-child { width: 40%; }
    @keyframes hsskel { 0% { background-position: 200% 0; } 100% { background-position: -200% 0; } }

    /* Mobile tap-to-search bar */
    .mobile-search-bar { display: flex; align-items: center; gap: 10px; width: 100%; margin-top: 10px; padding: 10px 16px; background: rgba(255,255,255,.12); border: 1px solid rgba(255,255,255,.25); border-radius: 10px; cursor: pointer; text-align: left; }
    .mobile-search-bar__icon { width: 18px; height: 18px; color: rgba(255,255,255,.75); flex: none; }
    .mobile-search-bar__text { flex: 1; font-size: 14px; color: rgba(255,255,255,.6); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .mobile-search-bar__kbd { font-size: 10px; padding: 2px 6px; border: 1px solid rgba(255,255,255,.3); border-radius: 4px; color: rgba(255,255,255,.45); flex: none; }
    @media (min-width: 1024px) { .mobile-search-bar { display: none; } }
    @media (max-width: 1023px) {
        .navbar_mobile {
            align-items: center;
            flex-wrap: wrap;
            gap: 8px 10px;
            padding: 8px 12px 10px;
            background: rgba(0,113,189,.92);
            box-shadow: 0 8px 22px rgba(0,40,70,.16);
        }
        .navbar_mobile .mobile-header-main,
        .navbar_mobile .mobile-header-actions { width: auto; min-width: 0; }
        .navbar_mobile .mobile-header-main img { max-width: 74px; height: 30px; object-fit: contain; }
        .navbar_mobile .mobile-header-actions { margin-inline-start: auto; gap: 12px; }
        .navbar_mobile .mobile-filter-dropdown { display: none; }
        .mobile-search-bar {
            order: 3;
            flex: 0 0 100%;
            min-height: 42px;
            margin-top: 0;
            border-color: rgba(255,255,255,.28);
            border-radius: 8px;
            background: rgba(255,255,255,.14);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.12);
        }
        .mobile-search-bar__text { color: rgba(255,255,255,.82); font-size: 13px; }
        .mobile-search-bar__kbd { display: none; }
        .search-modal { padding-top: 96px !important; }
    }
</style>

<script>
(function () {
    const header = document.querySelector('[data-sticky-header]');
    if (!header) return;

    const syncHeader = () => {
        const y = window.scrollY || document.documentElement.scrollTop || 0;
        header.classList.toggle('is-sticky', y > 44);
        header.classList.toggle('is-past-hero', y > Math.max(220, window.innerHeight * 0.38));
    };

    syncHeader();
    window.addEventListener('scroll', syncHeader, { passive: true });
    window.addEventListener('resize', syncHeader);
})();

(function () {
    const wrap = document.querySelector('.header-search');
    if (!wrap) return;
    const input = document.getElementById('header-search-input');
    const results = document.getElementById('header-search-results');
    const clearBtn = document.getElementById('header-search-clear');
    const endpoint = @json(route('search.suggest'));
    const tNoResults = @json(__('front.site.search.no_results_for'));
    const tSearchUnavailable = @json(__('front.site.search.search_unavailable'));
    let activeIndex = -1, hits = [], reqId = 0, debounceTimer = null;

    function escapeHtml(s) { return String(s ?? '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c])); }
    function highlightedHtml(s) {
        const parts = String(s ?? '').split(/(<mark>|<\/mark>)/g);
        let out = '';
        for (const p of parts) {
            if (p === '<mark>') out += '<mark>';
            else if (p === '</mark>') out += '</mark>';
            else out += escapeHtml(p);
        }
        return out;
    }

    function show() { results.classList.remove('hidden'); }
    function hide() { results.classList.add('hidden'); activeIndex = -1; }

    function renderSkeleton() {
        let h = '';
        for (let i = 0; i < 3; i++) h += '<div class="header-search__skel"><div></div><div><span></span><span></span></div></div>';
        results.innerHTML = h;
        show();
    }
    function renderEmpty(msg) { results.innerHTML = '<div class="header-search__empty">' + escapeHtml(msg) + '</div>'; show(); }

    function render(data) {
        hits = [];
        if (!data.groups || data.groups.length === 0) {
            renderEmpty(tNoResults + ' "' + (data.query || '') + '"');
            return;
        }
        let html = '';
        for (const group of data.groups) {
            html += '<div class="header-search__group"><div class="header-search__group-label">' + escapeHtml(group.label) + '</div>';
            for (const hit of group.hits) {
                const idx = hits.length;
                hits.push(hit);
                const thumb = hit.image ? '<img class="header-search__hit-thumb" src="' + escapeHtml(hit.image) + '" alt="" />' : '<div class="header-search__hit-thumb"></div>';
                html += '<a class="header-search__hit" data-idx="' + idx + '" href="' + escapeHtml(hit.url) + '">';
                html += thumb;
                html += '<div class="header-search__hit-body">';
                html += '<div class="header-search__hit-title">' + highlightedHtml(hit.title) + '</div>';
                if (hit.description) html += '<div class="header-search__hit-snippet">' + highlightedHtml(hit.description) + '</div>';
                html += '</div></a>';
            }
            html += '</div>';
        }
        results.innerHTML = html;
        activeIndex = -1;
        show();
    }

    function setActive(idx) {
        const nodes = results.querySelectorAll('.header-search__hit');
        nodes.forEach(n => n.classList.remove('is-active'));
        if (idx >= 0 && nodes[idx]) {
            nodes[idx].classList.add('is-active');
            nodes[idx].scrollIntoView({ block: 'nearest' });
        }
        activeIndex = idx;
    }

    async function doSearch(q) {
        const myReq = ++reqId;
        if (!q.trim()) { hide(); return; }
        renderSkeleton();
        try {
            const res = await fetch(endpoint + '?q=' + encodeURIComponent(q), { headers: { 'Accept': 'application/json' }});
            const data = await res.json();
            if (myReq !== reqId) return;
            render(data);
        } catch (e) {
            if (myReq !== reqId) return;
            renderEmpty(tSearchUnavailable);
        }
    }

    input.addEventListener('input', e => {
        clearTimeout(debounceTimer);
        clearBtn.classList.toggle('hidden', e.target.value === '');
        debounceTimer = setTimeout(() => doSearch(e.target.value), 150);
    });
    input.addEventListener('focus', () => { if (input.value.trim()) doSearch(input.value); });
    input.addEventListener('keydown', e => {
        if (e.key === 'Escape') { input.blur(); hide(); }
        else if (e.key === 'ArrowDown') { e.preventDefault(); if (hits.length) setActive((activeIndex + 1) % hits.length); }
        else if (e.key === 'ArrowUp') { e.preventDefault(); if (hits.length) setActive((activeIndex - 1 + hits.length) % hits.length); }
        else if (e.key === 'Enter' && activeIndex >= 0 && hits[activeIndex]) { e.preventDefault(); window.location.href = hits[activeIndex].url; }
    });

    clearBtn.addEventListener('click', () => { input.value = ''; clearBtn.classList.add('hidden'); hide(); input.focus(); });

    document.addEventListener('click', e => { if (!wrap.contains(e.target)) hide(); });
    document.addEventListener('keydown', e => {
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); input.focus(); input.select(); }
    });
})();
</script>
