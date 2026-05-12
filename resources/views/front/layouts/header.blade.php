@php
    $currentLocale = app()->getLocale();
    $topBarLangLabel = match($currentLocale) {
        'en'      => '中文（繁體字）',
        'zh-Hant' => 'English',
        'zh'      => 'English',
        default   => '中文（繁體字）',
    };
    $languages = [
        'zh-Hant' => '中文（繁體字）',
        'zh'      => '中文（简体字）',
        'en'      => 'English',
    ];
@endphp
        <div class="navbar">
           {{--            Yield --}}
          <div class="container">
            @php
                $topSocial = \App\Models\Social_setting::first();
                $normalizeTopUrl = fn(?string $u): string => ($u = trim((string)$u)) === '' ? '' : (preg_match('/^https?:/i',$u) ? $u : 'https://'.$u);
            @endphp
            <div class="navbar_top">
              {{-- Social icons left side --}}
              <div class="flex items-center gap-x-2 topbar-socials max-md:hidden">
                @if($normalizeTopUrl($topSocial?->facebook))
                <a href="{{ $normalizeTopUrl($topSocial?->facebook) }}" target="_blank" rel="noopener" class="topbar-social-link" title="Facebook" aria-label="Facebook">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.9 2H3.1A1.1 1.1 0 002 3.1v17.8A1.1 1.1 0 003.1 22h9.58v-7.75h-2.6v-3h2.6V9a3.64 3.64 0 013.88-4 20.26 20.26 0 012.33.12v2.7H17.3c-1.26 0-1.5.6-1.5 1.47v1.93h3l-.39 3H15.8V22h5.1a1.1 1.1 0 001.1-1.1V3.1A1.1 1.1 0 0020.9 2z"/></svg>
                </a>
                @endif
                @if($normalizeTopUrl($topSocial?->instagram))
                <a href="{{ $normalizeTopUrl($topSocial?->instagram) }}" target="_blank" rel="noopener" class="topbar-social-link" title="Instagram" aria-label="Instagram">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2c3.2 0 3.6.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.26.07 1.64.07 4.85 0 3.2-.01 3.6-.07 4.85-.15 3.23-1.66 4.77-4.92 4.92-1.25.06-1.63.07-4.85.07-3.2 0-3.6-.01-4.85-.07C3.67 21.52 2.15 20 2 16.85 1.94 15.6 1.93 15.2 1.93 12c0-3.2.01-3.6.07-4.85C2.15 3.92 3.67 2.48 7.15 2.07 8.4 2.01 8.8 2 12 2zm0 5.84a4.16 4.16 0 100 8.32 4.16 4.16 0 000-8.32zm0 6.86a2.7 2.7 0 110-5.4 2.7 2.7 0 010 5.4zm5.3-7.02a.97.97 0 110 1.94.97.97 0 010-1.94z"/></svg>
                </a>
                @endif
                @if($normalizeTopUrl($topSocial?->youtube))
                <a href="{{ $normalizeTopUrl($topSocial?->youtube) }}" target="_blank" rel="noopener" class="topbar-social-link" title="YouTube" aria-label="YouTube">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 00-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 00.5 6.2 31.2 31.2 0 000 12a31.2 31.2 0 00.5 5.8 3 3 0 002.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 002.1-2.1A31.2 31.2 0 0024 12a31.2 31.2 0 00-.5-5.8zM9.6 15.6V8.4l6.3 3.6-6.3 3.6z"/></svg>
                </a>
                @endif
                @if($normalizeTopUrl($topSocial?->tiktok))
                <a href="{{ $normalizeTopUrl($topSocial?->tiktok) }}" target="_blank" rel="noopener" class="topbar-social-link" title="TikTok" aria-label="TikTok">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19.6 3.3A5.1 5.1 0 0115 0h-3.9v16.4a3.1 3.1 0 01-3.1 2.6 3.1 3.1 0 01-3.1-3.1 3.1 3.1 0 013.1-3.1c.3 0 .6 0 .9.1V8.8a7 7 0 00-.9-.1 7 7 0 00-7 7 7 7 0 007 7 7 7 0 007-7V8.1a9 9 0 005.3 1.7V6a5.1 5.1 0 01-2.7-.7z"/></svg>
                </a>
                @endif
                @if($normalizeTopUrl($topSocial?->twitter))
                <a href="{{ $normalizeTopUrl($topSocial?->twitter) }}" target="_blank" rel="noopener" class="topbar-social-link" title="X / Twitter" aria-label="X Twitter">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.763l7.736-8.855L2.34 2.25H9.08l4.258 5.624L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/></svg>
                </a>
                @endif
                @if($normalizeTopUrl($topSocial?->wechat))
                <a href="{{ $normalizeTopUrl($topSocial?->wechat) }}" target="_blank" rel="noopener" class="topbar-social-link" title="WeChat" aria-label="WeChat">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8.7 2.2C3.9 2.2 0 5.5 0 9.5c0 2.2 1.2 4.2 3 5.6a.6.6 0 01.2.7l-.4 1.5c0 .1 0 .1 0 .2 0 .2.1.3.3.3a.3.3 0 00.2-.1l1.9-1.1a.9.9 0 01.7-.1c.9.3 1.8.4 2.8.4.3 0 .5 0 .8-.1-.9-2.6.2-5 1.9-6.4 1.7-1.4 3.9-2 5.9-1.8-.6-3.6-3.9-6.4-7.6-6.4zm-2.5 5.3a1.1 1.1 0 110 2.2 1.1 1.1 0 010-2.2zm4.9 0a1.1 1.1 0 110 2.2 1.1 1.1 0 010-2.2zm3.8 1.5c-3.1 0-5.6 2.1-5.6 4.8 0 2.6 2.5 4.8 5.6 4.8.6 0 1.2-.1 1.7-.2l1.9 1-.5-1.7a4.6 4.6 0 002-3.9c0-2.6-2.5-4.8-5.6-4.8zm-2.5 3.6a.9.9 0 110 1.8.9.9 0 010-1.8zm4.9 0a.9.9 0 110 1.8.9.9 0 010-1.8z"/></svg>
                </a>
                @endif
                @if($normalizeTopUrl($topSocial?->telegram))
                <a href="https://wa.me/{{ preg_replace('/\D/','',$topSocial->telegram) }}" target="_blank" rel="noopener" class="topbar-social-link" title="WhatsApp" aria-label="WhatsApp">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.5 14.4c-.3-.1-1.8-.9-2-.9-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.2-.2.2-.4.2-.6.1-.3-.2-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6.1-.1.3-.4.4-.5.2-.2.2-.3.3-.5.1-.2.1-.4 0-.5-.1-.2-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6a1 1 0 00-.8.4 3 3 0 00-.9 2.2 5.2 5.2 0 001.2 2.7 11.7 11.7 0 005.1 4.5 5 5 0 003 .8 2.6 2.6 0 001.7-1.2 2 2 0 00.1-1.2c-.1-.1-.3-.2-.6-.3m-5.4 7.4h-.1a9.9 9.9 0 01-5-1.4l-.4-.2-3.7 1 1-3.6-.2-.4a9.9 9.9 0 01-1.5-5.3C2.1 6.4 6.6 2 12 2a9.9 9.9 0 017 2.9A9.8 9.8 0 0122 12c0 5.5-4.4 9.9-9.9 9.8m8.4-18.3A11.8 11.8 0 0012.1 0C5.5 0 .2 5.3.2 11.9a11.8 11.8 0 001.6 5.9L.1 24l6.3-1.7a11.9 11.9 0 005.7 1.4h.1c6.5 0 11.9-5.3 11.9-11.9a11.8 11.8 0 00-3.5-8.4"/></svg>
                </a>
                @else
                <a href="#" class="topbar-social-link" title="WhatsApp" aria-label="WhatsApp">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.5 14.4c-.3-.1-1.8-.9-2-.9-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.2-.2.2-.4.2-.6.1-.3-.2-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6.1-.1.3-.4.4-.5.2-.2.2-.3.3-.5.1-.2.1-.4 0-.5-.1-.2-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6a1 1 0 00-.8.4 3 3 0 00-.9 2.2 5.2 5.2 0 001.2 2.7 11.7 11.7 0 005.1 4.5 5 5 0 003 .8 2.6 2.6 0 001.7-1.2 2 2 0 00.1-1.2c-.1-.1-.3-.2-.6-.3m-5.4 7.4h-.1a9.9 9.9 0 01-5-1.4l-.4-.2-3.7 1 1-3.6-.2-.4a9.9 9.9 0 01-1.5-5.3C2.1 6.4 6.6 2 12 2a9.9 9.9 0 017 2.9A9.8 9.8 0 0122 12c0 5.5-4.4 9.9-9.9 9.8m8.4-18.3A11.8 11.8 0 0012.1 0C5.5 0 .2 5.3.2 11.9a11.8 11.8 0 001.6 5.9L.1 24l6.3-1.7a11.9 11.9 0 005.7 1.4h.1c6.5 0 11.9-5.3 11.9-11.9a11.8 11.8 0 00-3.5-8.4"/></svg>
                </a>
                @endif
                <a href="mailto:info@egyptdoudou.com" class="topbar-social-link" title="Email" aria-label="Email">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 01-2.06 0L2 7"/></svg>
                </a>
              </div>

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
              <button type="button" id="header-search-clear" class="header-search__clear hidden text-gray-400 hover:text-gray-600 shrink-0" aria-label="Clear">
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
                      <p id="selectedHotel">High Luxury 5 Stars</p>
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
                      High Luxury 5 Stars
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="4"
                      >
                      Luxury 4 Stars
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="3"
                      >
                      Standard 3 Stars
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="2"
                      >
                      Budget 2 Stars
                      </button>
                      <button
                        type="button"
                        class="block font-normal text-black hover:text-primary aria-pressed:text-primary hotel-rate"
                        data-rate="1"
                      >
                      Economy 1 Star
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
                    placeholder="Check in date - Check out date"
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
                      Budget From - to
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
                      <p class="mb-4 text-sm">Your Budget</p>
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
                Search
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
            <div class="flex items-center gap-2">
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
                        Egypt Tour
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-urns.png')}}"
                          class="size-6"
                          alt=""
                        />
                        Event
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/symbols_travel.png')}}"
                          class="size-6"
                          alt=""
                        />
                        Services
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-temple.png')}}"
                          class="size-6"
                          alt=""
                        />
                        Blog
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-walk.png')}}"
                          class="size-6"
                          alt=""
                        />
                        Reviews
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-bird.png')}}"
                          class="size-6"
                          alt=""
                        />
                        Loyalty Program
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-profile.png')}}"
                          class="size-6"
                          alt=""
                        />
                        Careers
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/egyptian-pyramids.png')}}"
                          class="size-6"
                          alt=""
                        />
                        How it works
                      </a>
                      <a href="#" class="flex items-center gap-4 text-white">
                        <img
                          src="{{asset('assets/images/icons/deal.png')}}"
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

            <div class="flex items-center gap-4">
              <div
                class="hs-dropdown group relative inline-flex [--auto-close:outside] [--offset:20]"
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
                            href="{{asset('assets/images/icons/sprite.svg#calender')}}"
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
                                href="{{asset('assets/images/icons/sprite.svg#subscription-cashflow')}}"
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

{{-- Sticky nav is handled by headroom.js targeting #headroom in main.js.
     The navbar_nav already becomes sticky via the .navbar_nav.primary variant.
     No duplicate headroom element needed here. --}}

<style>
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
</style>

<script>
(function () {
    const wrap = document.querySelector('.header-search');
    if (!wrap) return;
    const input = document.getElementById('header-search-input');
    const results = document.getElementById('header-search-results');
    const clearBtn = document.getElementById('header-search-clear');
    const endpoint = @json(route('search.suggest'));
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
            renderEmpty('No results for "' + (data.query || '') + '"');
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
            renderEmpty('Search unavailable');
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
