<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('front.site.meta.default_title') }}</title>

    @include('front.layouts.hreflang')
      <link rel="icon" <?php  $site_name=\App\Models\General_setting::select('site_logo_icon')->first() ?> href="{{$site_name->site_logo_icon}}"  type="image/png">

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/css/spotlight.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.css"
    />
    <link rel="stylesheet" href="{{asset('assets/styles/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/doudou-design.css') }}?v={{ filemtime(public_path('assets/styles/doudou-design.css')) }}" />

    <script
      defer
      src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
    <script defer src="{{asset('assets/scripts/main.js')}}"></script>
    <script defer src="{{ asset('assets/scripts/doudou-design.js') }}?v={{ filemtime(public_path('assets/scripts/doudou-design.js')) }}"></script>
  </head>

  <body>
    <div class="app">
      <header class="page-header">
        @include('front.layouts.header')
        {{-- ↑ shared header partial — same nav on every page --}}


        <div class="hero">
          <div class="container">
            <div class="hero_content">
              <h1 class="txt-shadow">
                {{ $slider->title ?? __('front.site.sections.default_slider_title') }}
              </h1>
            </div>
          </div>
        </div>

        <section class="bg-primary/75 py-12 text-white lg:py-16">
          <div class="container">
            <header class="section_header text-center">
              <h2 class="section_heading">{{ __('front.site.sections.what_is_doudou') }}</h2>
            </header>

            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4 lg:gap-10">
              @foreach ($services as $service)
              <div>
                <div class="text-center">
                  <img
                    src="{{$service->icon_url}}"
                    class="mx-auto mb-2 size-10"
                    alt=""
                  />
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    {{$service->title}}
                  </h3>
                </div>

                <p class="line-clamp-3 leading-relaxed">
                  {{-- {!!$service->description!!} --}}
                  {!! implode(' ', array_slice(str_word_count(strip_tags($service->description), 1), 0, 15)) !!} ....
                </p>
              </div>
              @endforeach

            </div>
          </div>
        </section>

        <img
          src="{{$slider->image_url ?? asset('assets/images/sub-hero-bg.jpeg')}}"
          class="page-header__bg"
          alt="slider"
        />
      </header>

      <section class="relative isolate flex min-h-dvh flex-col">
        <img
          src="{{asset('assets/images/sub-hero-bg.jpeg')}}"
          class="absolute inset-0 -z-10 h-full w-full object-cover object-center"
          alt=""
        />

        <header
          class="container flex flex-1 flex-col items-end justify-center py-20"
        >
          <h2
            class="txt-shadow max-w-3xl text-3xl text-white lg:text-5xl lg:leading-normal"
          >
            {{-- Experience A Spectacular And A Memorable Egypt Guided Tour --}}
            {{$slider?->title ?? __('front.site.sections.default_slider_title')}}
          </h2>
        </header>

        <section class="bg-primary/75 py-12 text-white lg:py-16">
          <div class="container">
            <header class="section_header text-center">
              <h2 class="section_heading">
                {{ __('front.site.sections.success_title') }}
              </h2>
            </header>

            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-4 lg:gap-10">
              <div class="text-center">
                <figure class="mb-2">
                  <img
                    src="{{asset('assets/images/icons/user-business.svg')}}"
                    class="mx-auto size-12"
                    alt=""
                  />
                </figure>

                <figcaption>
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    25+
                  </h3>
                  <p class="text-2xl leading-normal">
                    {{ __('front.site.sections.years_tourism') }}
                  </p>
                </figcaption>
              </div>
              <div class="text-center">
                <figure class="mb-2">
                  <img
                    src="{{asset('assets/images/icons/travel.svg')}}"
                    class="mx-auto size-12"
                    alt=""
                  />
                </figure>

                <figcaption>
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    10000+
                  </h3>
                  <p class="text-2xl leading-normal">
                    {{ __('front.site.sections.satisfied_travelers') }}
                  </p>
                </figcaption>
              </div>
              <div class="text-center">
                <figure class="mb-2">
                  <img
                    src="{{asset('assets/images/icons/dislike.svg')}}"
                    class="mx-auto size-12"
                    alt=""
                  />
                </figure>

                <figcaption>
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    5000+
                  </h3>
                  <p class="text-2xl leading-normal">
                    {{ __('front.site.sections.excellent_reviews') }}
                  </p>
                </figcaption>
              </div>
              <div class="text-center">
                <figure class="mb-2">
                  <img
                    src="{{asset('assets/images/icons/globe.svg')}}"
                    class="mx-auto size-12"
                    alt=""
                  />
                </figure>

                <figcaption>
                  <h3 class="mb-4 text-2xl font-semibold text-secondary">
                    500+
                  </h3>
                  <p class="text-2xl leading-normal">
                    {{ __('front.site.sections.egypt_tour_options') }}
                  </p>
                </figcaption>
              </div>
            </div>
          </div>
        </section>
      </section>

      <main class="space-y-12 lg:space-y-16">
        <section class="pt-12 lg:py-16">
          <div class="container">
            <header class="section_header">
              <h2 class="section_heading text-primary">
                <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.sections.dream_egypt_tour') }}
              </h2>
            </header>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">

              @foreach ($tours as $tour )
              <div
              class="h-full"
              data-aos="zoom-in"
              data-aos-delay="400"
              data-aos-duration="600"
            >

              <a href="#" class="card">
                <figure>
                  <img src="{{$tour->photo  }}" alt="" />
                </figure>

                <figcaption>
                  <h3>{{$tour->translate(app()->getLocale(), true)->name ?? ''}}</h3>
                  <span>{{ __('front.site.sections.view_all_tours') }}</span>
                </figcaption>
              </a>
        </div>
              @endforeach

            </div>

            <img
              src="{{asset('assets/images/section-divider.png')}}"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
          </div>
        </section>


          <section id="recommended-tours">
            <div class="container">
              <header
                data-aos="fade-up"
                class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
              >
                <h2 class="section_heading text-primary">
                  <span>{{ __('front.site.sections.recommended') }}</span> {{ __('front.site.sections.egypt_tours') }}
                </h2>

                <div class="flex items-center gap-4 max-lg:ms-auto">
                  <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

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
                <div class="swiper-wrapper"  id="recommand_tours">
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
                        <a href="./tour-details.html"
                          ><h3>{{$tour->translate(app()->getLocale(), true)->name ?? ''}}</h3></a
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
                          <p>{{ $tour->rate ?? 0 }} {{ __('front.site.sections.wonderful') }} <span>({{ $tour->reviews }} {{ __('front.site.sections.reviews') }})</span></p>
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

                          {{$tour->overview_values('days') ?? 0}} {{ __('front.site.sections.days') }} / {{$tour->overview_values('nights') ?? 0}} {{ __('front.site.sections.nights') }}
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
                            {{$tour->overview_values('cancellation')}} {{ __('front.site.sections.cancellation') }}
                          </li>
                        </ul>

                        <div class="tour-card__footer">
                          <a href="{{route('tour_details',$tour->slug)}}" class="tour-card__link">{{ __('front.site.sections.view_tour') }}</a>
                          <p>
                            {{ __('front.site.sections.starting_from') }}
                            <span class="price">{{$tour->price}}$</span>
                          </p>
                        </div>
                      </div>
                    </article>
                  </div>
                  @endforeach


                </div>
              </div>

              <div class="mt-5 lg:mt-10"></div>
            </div>
          </section>



        <section id="egypt-tour-opp">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.sections.egypt_tours_opportunities') }}
              </h2>

              <div class="flex items-center gap-4 max-lg:ms-auto">
                <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

                <menu class="flex items-center gap-2">
                  <li>
                    <button type="button" class="swiper-btn prev">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-left')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="swiper-btn next">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-right')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                </menu>
              </div>
            </header>

            <div class="swiper overflow-visible">
              <div class="swiper-wrapper">
                @foreach ($tours as $tour)
                <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{ $tour->photo}}" alt="tour" />
                    </figure>

                    <figcaption>
                      <h3>{{ $tour->translate(app()->getLocale(), true)->name ?? ''}}</h3>
                      <p>
                        {!! implode(' ', array_slice(str_word_count(strip_tags($tour->translate(app()->getLocale(), true)->description ?? ''), 1), 0, 20)) !!}
                        </p>
                      <span>{{ __('front.site.sections.view_deal') }}</span>
                    </figcaption>
                  </a>
                </div>
                @endforeach
                {{-- <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{asset('assets/images/tour-opp-1.png')}}" alt="" />
                    </figure>

                    <figcaption>
                      <h3>{{ __('front.site.sections.last_minute_nile_cruises') }}</h3>
                      <p>
                        Celebrate the moment with an unexpected Nile Cruises
                      </p>
                      <span>{{ __('front.site.sections.view_deal') }}</span>
                    </figcaption>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{asset('assets/images/tour-opp-2.png')}}" alt="" />
                    </figure>

                    <figcaption>
                      <h3>{{ __('front.site.sections.last_minute_nile_cruises') }}</h3>
                      <p>
                        Celebrate the moment with an unexpected Nile Cruises
                      </p>
                      <span>{{ __('front.site.sections.view_deal') }}</span>
                    </figcaption>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{asset('assets/images/tour-opp-2.png')}}" alt="" />
                    </figure>

                    <figcaption>
                      <h3>{{ __('front.site.sections.last_minute_nile_cruises') }}</h3>
                      <p>
                        Celebrate the moment with an unexpected Nile Cruises
                      </p>
                      <span>{{ __('front.site.sections.view_deal') }}</span>
                    </figcaption>
                  </a>
                </div> --}}
              </div>
            </div>

            <img
              src="{{asset('assets/images/section-divider.png')}}"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
          </div>
        </section>

        <section id="egypt-tour-dest">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.sections.top_egypt_destinations') }}
              </h2>

              <div class="flex items-center gap-4 max-lg:ms-auto">
                <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

                <menu class="flex items-center gap-2">
                  <li>
                    <button type="button" class="swiper-btn prev">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-left')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="swiper-btn next">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-right')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                </menu>
              </div>
            </header>

            <div class="swiper overflow-visible">
              <div class="swiper-wrapper">
                @foreach ($cities as $city)
                <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{ $city->image_url}}" alt="city" />
                    </figure>

                    <figcaption>
                      <h3>{{ $city->translate(app()->getLocale(), true)->name ?? '—' }}</h3>
                    </figcaption>
                  </a>
                </div>
                @endforeach

                {{-- <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{asset('assets/images/dest-2.jpeg')}}" alt="" />
                    </figure>

                    <figcaption>
                      <h3>{{ __('front.site.sections.alexandria') }}</h3>
                    </figcaption>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{asset('assets/images/dest-3.jpeg')}}" alt="" />
                    </figure>

                    <figcaption>
                      <h3>{{ __('front.site.sections.luxor_aswan') }}</h3>
                    </figcaption>
                  </a>
                </div>
                <div class="swiper-slide">
                  <a href="#" class="card">
                    <figure>
                      <img src="{{asset('assets/images/dest-4.jpeg')}}" alt="" />
                    </figure>

                    <figcaption>
                      <h3>{{ __('front.site.sections.sharm_el_sheik') }}</h3>
                    </figcaption>
                  </a>
                </div> --}}
              </div>
            </div>

            <img
              src="{{asset('assets/images/section-divider.png')}}"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
          </div>
        </section>

        <section id="blog">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>{{ __('front.site.sections.learn') }}</span> {{ __('front.site.sections.more_about_egyptian_culture') }}
              </h2>

              <div class="flex items-center gap-4 max-lg:ms-auto">
                <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>

                <menu class="flex items-center gap-2">
                  <li>
                    <button type="button" class="swiper-btn prev">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-left')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="swiper-btn next">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-right')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                </menu>
              </div>
            </header>

            <div class="swiper swiper-lg overflow-visible">
              <div class="swiper-wrapper">
                @foreach ($blogs as $blog )

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
                              href="{{asset('assets/images/icons/sprite.svg#calendar-date')}}"
                            ></use>
                          </svg>
                         {{ $blog->getFormattedDate()}}
                        </li>
                      </ul>

                      <p class="tour-card__desc">
                        {{-- {!!$blog->description!!} --}}
                        {!! implode(' ', array_slice(str_word_count(strip_tags($blog->description), 1), 0, 20)) !!}
                      </p>


                      <div class="tour-card__footer">
                        <p>
                          {{ __('front.site.sections.published_by') }}
                          <a href="#">{{ __('front.site.sections.doudou_team') }}</a>
                        </p>

                        <a href="{{route('blog_preview',$blog->slug)}}" class="tour-card__link">{{ __('front.site.sections.read_more') }}</a>
                      </div>
                    </div>
                  </article>
                </div>
                @endforeach
              </div>
            </div>

            <img
              src="{{asset('assets/images/section-divider.png')}}"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
          </div>
        </section>

        <section id="videos">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>{{ __('front.site.sections.popular') }}</span> {{ __('front.site.sections.videos') }}
              </h2>

              <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>
            </header>

            <div class="items-start lg:grid lg:grid-cols-8 lg:gap-8">
              <div class="h-[400px] max-lg:mb-8 lg:col-span-6 lg:h-[600px]">
                <div class="swiper videos h-full w-full">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <video class="h-full w-full object-cover object-center"   controls>
                          <source src="{{$popular_video?->video}}" type="video/mp4">
                        </video>

                        <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-8 lg:p-10"
                        >
                          <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="{{asset('assets/images/logo-sm.png')}}"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            {{$popular_video->title ?? __('front.site.sections.default_video_title')}}
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          {{-- <img src="{{asset('assets/images/icons/play.svg')}}" alt="" /> --}}
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="{{asset('assets/images/video-poster.jpeg')}}"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        />

                        <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-8 lg:p-10"
                        >
                          <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="{{asset('assets/images/logo-sm.png')}}"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            {{ __('front.site.sections.default_video_title') }}
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          <img src="{{asset('assets/images/icons/play.svg')}}" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="{{asset('assets/images/video-poster.jpeg')}}"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        />

                        <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-8 lg:p-10"
                        >
                          <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="{{asset('assets/images/logo-sm.png')}}"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            {{ __('front.site.sections.default_video_title') }}
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          <img src="{{asset('assets/images/icons/play.svg')}}" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="{{asset('assets/images/video-poster.jpeg')}}"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        />

                        <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-8 lg:p-10"
                        >
                          <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="{{asset('assets/images/logo-sm.png')}}"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            {{ __('front.site.sections.default_video_title') }}
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          <img src="{{asset('assets/images/icons/play.svg')}}" alt="" />
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="flex h-[150px] flex-col gap-4 lg:col-span-2 lg:h-[600px] lg:flex-row lg:gap-6"
              >
                <div class="swiper thumbs h-full w-full flex-1">
                  <div class="swiper-wrapper h-full">
                    @foreach ($popular_videos as $popular_video)

                    <div class="swiper-slide h-full cursor-pointer">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        {{-- <img
                          src="{{asset('assets/images/video-poster.jpeg')}}"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        /> --}}

                        <video class="h-full w-full object-cover object-center"   controls>
                          <source src="{{$popular_video->video}}" type="video/mp4">
                        </video>

                        <!-- <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-6"
                        >
                          <div
                            class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="{{asset('assets/images/logo-sm.png')}}"
                              class="size-8 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p class="font-semibold text-white">
                            {{ __('front.site.sections.default_video_title') }}
                          </p>
                        </div> -->

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-8 -translate-x-1/2 -translate-y-1/2 lg:size-12"
                        >
                          {{-- <img src="{{asset('assets/images/icons/play.svg')}}" alt="" /> --}}
                        </button>
                      </div>
                    </div>
                    @endforeach

                  </div>
                </div>

                <menu
                  class="thumbs-arrows flex items-center justify-center gap-12 lg:flex-col"
                >
                  <li>
                    <button type="button" class="swiper-btn prev lg:rotate-90">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-left')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="swiper-btn next lg:rotate-90">
                      <svg>
                        <use
                          href="{{asset('assets/images/icons/sprite.svg#arrow-right')}}"
                        ></use>
                      </svg>
                    </button>
                  </li>
                </menu>
              </div>
            </div>
          </div>
        </section>

        <section id="reviews" class="bg-secondary pt-12 text-white lg:pt-20">
          <div class="container">
            <div class="grid gap-12 lg:grid-cols-3">
              <header class="lg:col-span-1">
                <h2 class="txt-shadow mb-4 text-3xl">
                  {{ __('front.site.about.reviews_title') }}
                </h2>
                <p class="mb-6 lg:mb-8">
                  {{ __('front.site.about.reviews_intro') }}
                </p>
                <a
                  href="#"
                  class="inline-flex h-10 items-center justify-center rounded-xl bg-primary px-5 text-center text-sm text-white transition-colors hover:bg-opacity-80"
                  >{{ __('front.site.sections.explore_all') }}</a
                >
              </header>

              <div class="flex min-w-0 items-center gap-4 lg:col-span-2">
                <span class="rounded-full bg-white/70">
                  <button type="button" class="swiper-btn prev shrink-0">
                    <svg>
                      <use
                        href="{{asset('assets/images/icons/sprite.svg#arrow-left')}}"
                      ></use>
                    </svg>
                  </button>
                </span>

                <div class="swiper">
                  <div class="swiper-wrapper">
                    @foreach ($tours as $tour)
                    @foreach ($tour->tour_comments as $comment)
                    <div class="swiper-slide">
                      <div class="rounded-3xl bg-white p-6 shadow-xl">
                        <div class="mb-3 flex items-center gap-2">
                          <div
                            class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                          >
                            <img
                              src="{{$comment->photo}}"
                              class="h-full w-full object-cover object-center"
                              alt=""
                            />
                          </div>

                          <div>
                            <p class="mb-1 text-sm text-black">
                              {{$comment->username}}
                              <span class="text-gray">{{$comment->getFormattedDate()}}</span>
                            </p>
                            <div class="flex items-center gap-x-px">
                              @for ($i = 1; $i <= 5; $i++)
                                  @if ($i <= $comment->rate)
                                      <svg class="size-3 text-secondary">
                                          <use href="{{asset('assets/images/icons/sprite.svg#star')}}"></use>
                                      </svg>
                                  @else
                                      <svg class="size-3 text-gray-200">
                                          <use href="{{asset('assets/images/icons/sprite.svg#star')}}"></use>
                                      </svg>
                                  @endif
                              @endfor
                          </div>
                            {{-- <div class="flex items-center gap-x-px">
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-gray-200">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                            </div> --}}
                          </div>
                        </div>

                        <p
                          class="line-clamp-4 font-normal leading-relaxed text-gray"
                        >
                        {!! implode(' ', array_slice(str_word_count(strip_tags($comment->comment), 1), 0, 17)) !!}

                        </p>
                        <a href="#" class="text-primary hover:underline"
                          >{{ __('front.site.sections.read_more') }}</a
                        >
                      </div>
                    </div>

                    @endforeach
                    @endforeach

                    {{-- <div class="swiper-slide">
                      <div class="rounded-3xl bg-white p-6 shadow-xl">
                        <div class="mb-3 flex items-center gap-2">
                          <div
                            class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                          >
                            <img
                              src="{{asset('assets/images/avatar.jpeg')}}"
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
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-gray-200">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
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
                          >{{ __('front.site.sections.read_more') }}</a
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
                              src="{{asset('assets/images/avatar.jpeg')}}"
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
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
                                ></use>
                              </svg>
                              <svg class="size-3 text-gray-200">
                                <use
                                  href="{{asset('assets/images/icons/sprite.svg#star')}}"
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
                          >{{ __('front.site.sections.read_more') }}</a
                        >
                      </div>
                    </div> --}}
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
          </div>

          <img
            src="{{asset('assets/images/section-decoration.png')}}"
            class="mt-6 w-full lg:mt-14"
            alt=""
          />
        </section>

        <section id="gallery">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>{{ __('front.site.sections.explore') }}</span> {{ __('front.site.sections.gallery_packages') }}
              </h2>

              <a href="#" class="text-secondary lg:text-lg">{{ __('front.site.sections.view_all') }}</a>
            </header>

            <div class="swiper">
              <div class="swiper-wrapper">
                @foreach ($gallary_packages as $gallary_package)

                <div class="swiper-slide">
                  <img
                    src="{{$gallary_package->photo}}"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div>
                @endforeach

                {{-- <div class="swiper-slide">
                  <img
                    src="{{asset('assets/images/gallery-2.jpeg')}}"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="{{asset('assets/images/gallery-3.jpeg')}}"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="{{asset('assets/images/gallery-4.jpeg')}}"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div> --}}
              </div>

              <button
                type="button"
                class="swiper-btn prev absolute left-0 top-1/2 z-20 -translate-y-1/2 lg:left-1/4"
              >
                <svg>
                  <use href="{{asset('assets/images/icons/sprite.svg#arrow-left')}}"></use>
                </svg>
              </button>
              <button
                type="button"
                class="swiper-btn next absolute right-0 top-1/2 z-20 -translate-y-1/2 lg:right-1/4"
              >
                <svg>
                  <use
                    href="{{asset('assets/images/icons/sprite.svg#arrow-right')}}"
                  ></use>
                </svg>
              </button>
            </div>

            <img
              src="{{asset('assets/images/section-divider.png')}}"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
          </div>
        </section>

        <section>
          <div class="container">
            <header class="section_header">
              <h2 class="section_heading text-primary">
                <span>{{ __('front.site.sections.frequently') }}</span> {{ __('front.site.sections.asked_questions') }}
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
              <a href="#" class="text-lg text-secondary underline">{{ __('front.site.sections.show_more') }}</a>
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
      <div class="relative">
        <img
          src="{{asset('assets/images/section-decoration.png')}}"
          class="w-full"
          alt=""
        />
        <button type="button" id="toTop" onclick="lenis.scrollTo('body')">
          <svg>
            <use href="{{asset('assets/images/icons/sprite.svg#back-to-top')}}"></use>
          </svg>
        </button>

        @php
          $footerSettings = \App\Models\General_setting::first();
          $footerEmail = trim((string) $footerSettings?->email);
          $footerPhone = trim((string) $footerSettings?->manager_phone);
        @endphp
        <footer class="footer">
          <div class="container">
            <div class="footer__grid">
              <div class="footer__aside">
                <img
                  src="{{asset('assets/images/logo-footer.png')}}"
                  class="footer__logo"
                  alt=""
                />

                <ul>
                  <li>
                    <svg>
                      <use
                        href="{{asset('assets/images/icons/sprite.svg#map-pin')}}"
                      ></use>
                    </svg>
                    <a href="#">{{ $footerSettings?->address ?: __('front.site.contact.cards.location.fallback') }}</a>
                  </li>
                  <li>
                    <svg>
                      <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>
                    </svg>

                    <a href="{{ $footerEmail !== '' ? 'mailto:'.$footerEmail : '#' }}">{{ $footerEmail !== '' ? $footerEmail : __('front.site.contact.cards.email.fallback') }}</a>
                  </li>
                  <li>
                    <svg>
                      <use href="{{asset('assets/images/icons/sprite.svg#phone')}}"></use>
                    </svg>

                    <a href="{{ $footerPhone !== '' ? 'tel:'.$footerPhone : '#' }}">{{ $footerPhone !== '' ? $footerPhone : __('front.site.contact.cards.phone.fallback') }}</a>
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

              <x-social-links variant="white" />
            </div>
          </div>
        </footer>
      </div>

      <div class="btns">
        <button type="button" class="btn" data-hs-overlay="#customize-tour">
          <span class="content-wrapper">
            <span class="content"> {{ __('front.site.footer.customize_your_tour') }} </span>
            <span class="content-bg"></span>
          </span>
          <span class="icon">
            <svg>
              <use href="{{asset('assets/images/icons/sprite.svg#settings')}}"></use>
            </svg>
          </span>
        </button>
        <div class="btn">
          <span class="content-wrapper">
            <span class="content">
              <div class="flex items-center gap-3">
                <a href="#">
                  <svg>
                    <use href="{{asset('assets/images/icons/sprite.svg#whatsapp')}}"></use>
                  </svg>
                </a>
                <a href="#">
                  <svg>
                    <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>
                  </svg>
                </a>
              </div>
            </span>
            <span class="content-bg"></span>
          </span>
          <span class="icon">
            <span class="icon">
              <svg>
                <use
                  href="{{asset('assets/images/icons/sprite.svg#customer-service-2')}}"
                ></use>
              </svg>
            </span>
          </span>
        </div>
      </div>
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
          <div class="flex items-center justify-between bg-primary px-6 py-5" style="background: linear-gradient(90deg, #005690 0%, #0071BD 100%)">
            <h3 class="text-lg font-semibold text-white lg:text-xl">
              {{ __('front.site.form.customize_your_own_tour') }}
            </h3>
            <button
              type="button"
              class="flex size-7 items-center justify-center rounded-full border-2 border-white"
              data-hs-overlay="#customize-tour"
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

          <!-- Stepper -->
          <div
            data-hs-stepper
            id="stepper"
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
              <div id="step_1" data-hs-stepper-content-item='{ "index": 1 }'>
                <p class="mb-8 flex items-center gap-2">
                  <span
                    class="inline-flex size-7 items-center justify-center rounded-full bg-secondary text-white"
                    >1</span
                  >
                  <span class="text-lg font-semibold text-primary lg:text-xl"
                    >{{ __('front.site.form.your_information') }}</span
                  >
                </p>

                <form id="bookingForm">
                  <div class="space-y-6">
                    <div class="flex gap-2">
                      <div class="relative max-w-[80px] shrink-0">
                        <label
                          for="title"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >{{ __('front.site.form.title') }}</label
                        >
                        <select
                          id="title"
                          type="text"
                          name="title"
                          class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.form.your_name') }}"
                        >
                          <option value="0">{{ __('front.site.form.mr') }}</option>
                          <option value="1">{{ __('front.site.form.ms') }}</option>
                        </select>
                      </div>
                      <div class="relative flex-1">
                        <label
                          for="name"
                          class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                          >{{ __('front.site.form.name') }}</label
                        >
                        <input
                          id="name"
                          type="text"
                          name="name"
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
                          id="email"
                          type="email"
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
                          id="nationality"
                          type="text"
                          name="nationality"
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.form.your_nationality') }}"
                        >
                          <option hidden>{{ __('front.site.form.your_nationality') }}</option>
                          <option value="0">{{ __('front.site.form.egyptian') }}</option>
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
                          placeholder="{{ __('front.site.form.enter_phone_number') }}"
                        />
                          <span class="invalid text-danger" id="tel_error"></span>

                      </div>

                    </div>
                  </div>
                </form>
              </div>
              <!-- End First Contnet -->

              <!-- Second Contnet -->
              <div id="step_2"
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
                          >{{ __('front.site.form.departure_date') }}</label
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
                          >{{ __('front.site.form.your_destination') }}</label
                        >
                        <select
                          id="destination"
                          type="text"
                          name ='city_id'
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.form.select_city') }}"
                        >
                            <option value="" disabled selected>{{ __('front.site.form.select_city') }}</option>
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
                          >{{ __('front.site.form.accommodation_tour') }}</label
                        >
                        <select
                          id="accommodation"
                          type="text"
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.form.select_accommodation_tour') }}"
                        >
                            <option value="" disabled selected>{{ __('front.site.form.select_accommodation_tour') }}</option>
                            @foreach ($tours as $tour )
                                <option value="{{ $tour->id }}">{{ $tour->translate(app()->getLocale(), true)->description ?? '' }}</option>
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
                          >{{ __('front.site.form.age_range_optional') }}</label
                        >
                        <select
                          id="age"
                          type="text"
                          name="range_age"
                          class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                          placeholder="{{ __('front.site.form.select_age_range') }}"
                        >
                            <option value="" disabled selected>{{ __('front.site.form.select_age_range') }}</option>
                            <option value="0">{{ __('front.site.form.age_1_to_10') }}</option>
                            <option value="1">{{ __('front.site.form.age_11_to_20') }}</option>
                            <option value="2">{{ __('front.site.form.age_21_to_30') }}</option>
                        </select>
                      </div>
                      <div class="flex w-full flex-1 justify-center gap-x-4">
                        <div class="flex-1">
                          <p class="mb-2 text-center text-primary">{{ __('front.site.form.adults') }}</p>
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
                          <p class="mb-2 text-center text-primary">{{ __('front.site.form.children') }}</p>
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
                        >{{ __('front.site.form.extra_notes') }}</label
                      >
                      <textarea
                        id="notes"
                        type="date"
                        name="notes"
                        class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                        placeholder="{{ __('front.site.blog.write_your_note') }}"
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
                  src="{{asset('assets/images/icons/approve.png')}}"
                  class="mx-auto mb-4 max-w-40"
                  alt=""
                />
                <p class="text-2xl text-primary lg:text-3xl">
                  {{ __('front.site.form.inquire_received') }}
                </p>
                <p class="mb-7 lg:mb-10 lg:text-lg">
                  {{ __('front.site.form.inquire_success') }}
                </p>

                <x-social-links variant="primary" class="justify-center" />
              </div>
              <!-- End Final Contnet -->

              <!-- Button Group -->
              <div class="mt-5 flex items-center justify-center gap-x-4">
                <button
                  type="button"

                  class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                  data-hs-stepper-back-btn
                >
                  {{ __('front.site.form.cancel') }}
                </button>
                <button
                  type="button"
                  id="nextButton"
{{--                  onclick="validateFirstForm()"--}}
                  class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                  data-hs-stepper-next-btn
                >
                  {{ __('front.site.form.next') }}
                </button>
                  <!-- Next Button -->



                <button
                  type="button"
                  onclick="submitForms()"
                  class="inline-block min-w-36 rounded-lg border border-transparent bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                  data-hs-stepper-finish-btn
                  style="display: none"
                >
                  {{ __('front.site.form.inquire_now') }}
                </button>
              </div>
              <!-- End Button Group -->
            </div>
          </div>
          <!-- End Stepper -->

          <img
            src="{{asset('assets/images/icons/model-decoration.png')}}"
            class="w-full"
            alt=""
          />
        </div>
      </div>
    </div>

    <!-- js -->
    <!-- https://refreshless.com/nouislider/ -->
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
        });
      }
      budgetSlider("#slider-1");
      budgetSlider("#slider-2");
      budgetSlider("#slider-3");
    </script>

    <!-- https://flatpickr.js.org/getting-started/ -->
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

      // egypt-tour-opp
      new Swiper("#egypt-tour-opp .swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
          768: {
            slidesPerView: 1.25,
            spaceBetween: 15,
          },
          1024: {
            slidesPerView: 2.25,
            spaceBetween: 25,
          },
        },
        navigation: {
          nextEl: "#egypt-tour-opp .next",
          prevEl: "#egypt-tour-opp .prev",
        },
      });

      // egypt-tour-dest
      new Swiper("#egypt-tour-dest .swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
          768: {
            slidesPerView: 2.25,
            spaceBetween: 15,
          },
          1024: {
            slidesPerView: 3.5,
            spaceBetween: 25,
          },
        },
        navigation: {
          nextEl: "#egypt-tour-dest .next",
          prevEl: "#egypt-tour-dest .prev",
        },
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

      // video-thumbs
      const sliderThumbs = new Swiper(".swiper.thumbs", {
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
      const sliderImages = new Swiper(".swiper.videos", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: 32,
        mousewheel: false,
        grabCursor: false,
        thumbs: {
          swiper: sliderThumbs,
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
        slidesPerView: 1.25,
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
              $('#recommand_tours').html(data.output);
              console.log(data.output);
              initializeSwipers();

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
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
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
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
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


    <script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
    @include('front.layouts.language_contact_tools')
    @include('front.layouts.model')
  </body>
</html>
