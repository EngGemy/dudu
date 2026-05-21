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
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/doudou-design.css') }}?v={{ filemtime(public_path('assets/styles/doudou-design.css')) }}" />

    <script
      defer
      src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
      <link rel="stylesheet" href="{{asset('node_modules/select2/dist/css/select2.min.css')}}">
    <script defer src="{{ asset('assets/scripts/main.js') }}"></script>
    <script defer src="{{ asset('assets/scripts/doudou-design.js') }}?v={{ filemtime(public_path('assets/scripts/doudou-design.js')) }}"></script>
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

          <x-slider-blog-component/>
      </header>

      <main class="relative space-y-12 lg:space-y-16">
        <section class="pt-8">
          <div class="relative">
            <div class="sticky top-0 z-40 mb-8 bg-white py-4">
              <div class="container">
                  <menu class="tabs mb-0">
                      <li>
                          <a href="{{route('blogs')}}" class="tab"
                          >{{ __('front.site.blog.essential_tour_tips') }}</a
                          >
                      </li>
                      <li>
                          <a href="{{route('blogs-destination')}}" class="tab"
                          >{{ __('front.site.blog.explore_by_destination') }}</a
                          >
                      </li>
                      <li>
                          <a href="{{route('blogs-interest')}}" class="tab" aria-current="page"
                          >{{ __('front.site.blog.explore_by_interest') }}</a
                          >
                      </li>
                      <li>
                          <a href="{{route('blogs-trending')}}" class="tab">{{ __('front.site.blog.trending_now') }}</a>
                      </li>
                  </menu>
              </div>
            </div>

            <div class="container">
              <ol class="breadcrumb mb-8" aria-label="Breadcrumb">
                <li>
                  <a href="{{route('home')}}"> Home </a>
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
                  <a href="{{route('blogs')}}">
                    Blogs
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
                <li aria-current="page">{{ __('front.site.blog.explore_by_interest') }}</li>
              </ol>

              <div class="mb-8">
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                      <x-blog-interest-component/>
                </div>

                <img
                  src="./assets/images/section-divider.png"
                  class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
                  alt=""
                />
              </div>

              <div class="flex flex-col gap-10 lg:flex-row">
                <div class="w-full shrink-0 lg:max-w-[420px]">
                  <div
                    class="hs-accordion-group mb-2 space-y-2"
                    data-hs-accordion-always-open
                  >
                    <div class="hs-accordion active accordion-filter">
                      <button
                        class="hs-accordion-toggle accordion-btn font-medium"
                      >
                        <svg class="accordion-icon size-4.5">
                          <use
                            href="./assets/images/icons/sprite.svg#search"
                          ></use>
                        </svg>
                        Search Articles
                      </button>
                      <div
                        class="hs-accordion-content accordion-content-wrapper"
                      >
                          <div class="accordion-content">
                              <form  method="get" action="{{route('search_blogs')}}" enctype="multipart/form-data">
                                  <div
                                      class="relative flex items-center overflow-hidden rounded-xl border border-primary ps-10"
                                  >
                                      <svg class="absolute start-4 size-4 text-gray/90">
                                          <use
                                              href="./assets/images/icons/sprite.svg#search"
                                          ></use>
                                      </svg>
                                      <input
                                          type="text"
                                          name="search"
                                          class="block w-full text-sm font-normal text-black outline-none placeholder:text-gray"
                                          placeholder="{{ __('front.site.blog.search_blogs_placeholder') }}"
                                          required
                                      />
                                      <button
                                          type="submit"
                                          class="bg-primary px-6 py-2 text-white"
                                      >
                                          Search
                                      </button>
                                  </div>
                              </form>
                          </div>

                      </div>
                    </div>

                    <div class="hs-accordion active accordion-filter">
                      <button
                        class="hs-accordion-toggle accordion-btn font-medium"
                      >
                        <svg class="accordion-icon size-4.5">
                          <use
                            href="./assets/images/icons/sprite.svg#articles"
                          ></use>
                        </svg>
                        {{ __('front.site.blog.latest_articles') }}
                      </button>
                      <div
                        class="hs-accordion-content accordion-content-wrapper"
                      >
                        <div class="accordion-content">
                          <div
                            class="hs-dropdown relative flex-1 [--strategy:absolute]"
                          >
                            <button
                              type="button"
                              class="hs-dropdown-toggle inline-flex items-center gap-2 text-nowrap rounded-xl border border-primary p-3 text-sm xl:px-4 xl:text-base"
                            >
                              <svg class="size-6 text-primary">
                                <use
                                  href="./assets/images/icons/sprite.svg#sort"
                                ></use>
                              </svg>
                              <span>{{ __('front.site.blog.sort_by_recommended') }}</span>
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
                              class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden min-w-72 space-y-3 rounded-lg bg-white p-5 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                            >
                              <button
                                type="button"
                                class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                                aria-pressed="true"
                              >
                                Our Top Picks
                              </button>
                              <button
                                type="button"
                                class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                              >
                                Traveler Rating
                              </button>
                              <button
                                type="button"
                                class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                              >
                                Price (Low to High)
                              </button>
                              <button
                                type="button"
                                class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                              >
                                Price (High to Low)
                              </button>
                              <button
                                type="button"
                                class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                              >
                                Duration (Low to High)
                              </button>
                              <button
                                type="button"
                                class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                              >
                                Duration (High to Low)
                              </button>
                              <button
                                type="button"
                                class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                              >
                                Most Popular First
                              </button>
                            </div>
                          </div>
                        </div>

                        <div
                          class="max-h-[640px] space-y-4 overflow-auto p-4 pt-0 lg:p-6 lg:pt-0"
                          data-lenis-prevent
                        >
                            @foreach($blog_interest as $blog)
                                <div class="flex gap-4.5 rounded-xl p-4 shadow-xl">
                                    <a href="{{route('blog_preview', $blog->slug)}}" > <img
                                        src="{{$blog->image_url}}"
                                        class="max-w-[125px] shrink-0 rounded"
                                        alt=""
                                        /></a>

                                    <div>
                                        <p class="mb-2 line-clamp-2 font-medium">
                                            <a href="{{route('blog_preview', $blog->slug)}}" >{{$blog->title}}</a>
                                        </p>
                                        <p
                                            class="flex items-center gap-2 text-sm text-gray"
                                        >
                                            <svg class="size-4 text-primary">
                                                <use
                                                    href="../../assets/images/icons/sprite.svg#calendar-date"
                                                ></use>
                                            </svg>
                                            {{$blog->getFormattedDate()}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                      </div>
                    </div>

                    <div class="hs-accordion active accordion-filter">
                      <button
                        class="hs-accordion-toggle accordion-btn font-medium"
                      >
                        <svg class="accordion-icon size-4.5">
                          <use
                            href="./assets/images/icons/sprite.svg#tag"
                          ></use>
                        </svg>
                        Tags
                      </button>
                      <div
                        class="hs-accordion-content accordion-content-wrapper"
                      >
                        <div class="accordion-content">
                          <div class="tags">
                              @foreach($tags as $tag)

                                  <button type="button" onclick="window.location='{{ route('tag_blogs', ['tag' => $tag->name]) }}'">{{$tag->name}}</button>
                              @endforeach
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="hs-accordion active accordion-filter">
                      <button
                        class="hs-accordion-toggle accordion-btn font-medium"
                      >
                        <svg class="accordion-icon size-5">
                          <use
                            href="./assets/images/icons/sprite.svg#info"
                          ></use>
                        </svg>
                        About Us
                      </button>
                      <div
                        class="hs-accordion-content accordion-content-wrapper"
                      >
                          <div class="accordion-content">
                              <img
                                  src="{{$about->image_url ?? "../../assets/images/article-mini-placeholder.jpeg"}}"
                                  class="mb-6 max-h-[150px] w-full rounded-xl object-cover object-center"
                                  alt=""
                              />
                              <p class="mb-5">
                                  {!! implode(' ', array_slice(str_word_count(strip_tags($about->description), 1), 0, 30))
                                        ??
                                        "Lorem ipsum dolor sit, amet consectetur adipisicing
                                         elit. Sequi quos, repudiandae quisquam ducimus rem
                                          quibusdam veritatis distinctio possimus corrupti quia?" !!} ??


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
                      </div>
                    </div>

                    <div class="hs-accordion active accordion-filter">
                      <button
                        class="hs-accordion-toggle accordion-btn font-medium"
                      >
                        <svg class="accordion-icon size-5">
                          <use
                            href="./assets/images/icons/sprite.svg#mail"
                          ></use>
                        </svg>
                        Enter Email Address
                      </button>
                      <div
                        class="hs-accordion-content accordion-content-wrapper"
                      >
                        <div class="accordion-content">
                          <p class="mb-6">
                            {{ __('front.site.blog.subscribe_for_updates') }}
                          </p>

                          <div class="relative mb-4 flex-1">
                            <label
                              for="email"
                              class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                              >{{ __('front.site.contact.email') }}</label
                            >
                            <input
                              id="email"
                              type="email"
                              class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                              placeholder="{{ __('front.site.contact.your_email') }}"
                            />
                            <button
                              data-hs-overlay="#send-email"
                              class="absolute inset-y-0 end-0 rounded-br-xl rounded-tr-xl bg-primary px-5 py-2 text-white"
                            >
                              {{ __('front.site.blog.go') }}
                            </button>
                          </div>

                          <p class="flex items-center gap-2 text-sm">
                            <svg class="accordion-icon size-4">
                              <use
                                href="./assets/images/icons/sprite.svg#lock"
                              ></use>
                            </svg>
                            {{ __('front.site.blog.your_information_is_safe') }}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="flex-1">
                  <div
                    class="mb-5 flex flex-col items-start gap-4 lg:mb-6 lg:flex-row lg:items-center lg:justify-between"
                  >
                    <p class="text-xl font-semibold lg:text-2xl">
                      <span class="text-primary"
                        ><span class="text-secondary">{{ __('front.site.search.search') }}</span>
                        {{ __('front.site.blog.results') }}</span
                      >: {{\App\Models\Blog\Blog::count()}} {{ __('front.site.blog.available_tours') }}
                    </p>

                    <div class="hs-dropdown relative [--strategy:absolute]">
                      <button
                        type="button"
                        class="hs-dropdown-toggle inline-flex items-center gap-2 text-nowrap rounded-xl border border-primary p-3 text-sm xl:px-4 xl:text-base"
                      >
                        <svg class="size-6 text-primary">
                          <use
                            href="./assets/images/icons/sprite.svg#sort"
                          ></use>
                        </svg>
                        <span>{{ __('front.site.blog.sort_by_recommended') }}</span>
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
                        class="hs-dropdown-menu duration inset-x-0 top-0 z-10 mt-2 hidden min-w-72 space-y-3 rounded-lg bg-white p-5 opacity-0 shadow-md transition-[opacity,margin] before:absolute before:-top-4 before:start-0 before:h-4 before:w-full after:absolute after:-bottom-4 after:start-0 after:h-4 after:w-full hs-dropdown-open:opacity-100"
                      >
                        <button
                          type="button"
                          class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                          aria-pressed="true"
                        >
                          Our Top Picks
                        </button>
                        <button
                          type="button"
                          class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                        >
                          Traveler Rating
                        </button>
                        <button
                          type="button"
                          class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                        >
                          Price (Low to High)
                        </button>
                        <button
                          type="button"
                          class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                        >
                          Price (High to Low)
                        </button>
                        <button
                          type="button"
                          class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                        >
                          Duration (Low to High)
                        </button>
                        <button
                          type="button"
                          class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                        >
                          Duration (High to Low)
                        </button>
                        <button
                          type="button"
                          class="block font-normal text-black hover:text-primary aria-pressed:text-primary"
                        >
                          Most Popular First
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="grid gap-8 lg:grid-cols-2 lg:gap-10">
                      <x-blog-extra-component/>
                  </div>
                </div>
              </div>

              <!-- Pagination -->
              <nav class="pagination">
                <button type="button" class="pagination__arrow" disabled>
                  <svg
                    class="pagination__icon"
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
                    <path d="m15 18-6-6 6-6" />
                  </svg>
                  <span aria-hidden="true" class="sr-only">{{ __('pagination.previous') }}</span>
                </button>
                <div class="pagination__numbers">
                  <button
                    type="button"
                    class="pagination__number"
                    aria-pressed="true"
                  >
                    1
                  </button>
                  <button type="button" class="pagination__number">2</button>
                  <button type="button" class="pagination__number">3</button>
                </div>
                <button type="button" class="pagination__arrow">
                  <span aria-hidden="true" class="sr-only">{{ __('pagination.next') }}</span>
                  <svg
                    class="pagination__icon"
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
                    <path d="m9 18 6-6-6-6" />
                  </svg>
                </button>
              </nav>

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
                <span>{{ __('front.site.blog.frequently') }}</span> {{ __('front.site.blog.asked_questions') }}
              </h2>
            </header>

            <div class="hs-accordion-group space-y-2">
                <x-question-component/>
            </div>

            <div class="mt-6 text-center">
              <a href="{{route('faq')}}" class="text-lg text-secondary underline">{{ __('front.site.sections.show_more') }}</a>
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
      id="send-email"
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
              {{ __('front.site.blog.email_received') }}
            </h3>
            <button
              type="button"
              class="flex size-7 items-center justify-center rounded-full border-2 border-white"
              data-hs-overlay="#send-email"
            >
              <span class="sr-only">{{ __('front.site.form.close') }}</span>
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
              Your Email Received
            </p>
            <p class="mb-7 lg:mb-10 lg:text-lg">
              {{ __('front.site.form.inquire_success') }}
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
    <script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
  </body>
</html>
