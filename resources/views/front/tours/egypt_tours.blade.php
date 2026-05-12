
@extends('front.layouts.app')
@section('slider_title')
    <div class="hero">
        <div class="container">
            <div class="hero_content">
                <h1 class="txt-shadow">
                    {{ $slider->title ?? "Default slider title" }}
                </h1>
            </div>
        </div>
    </div>
@endsection
@section('services')
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
                            {!!$service->description!!}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
@section('slider_img')
    <img
        src="{{$slider->image_url ?? asset('assets/images/sub-hero-bg.jpeg')}}"
        class="page-header__bg"
        alt="slider"
    />
@endsection


@section('content')

      <main class="space-y-12 lg:space-y-16">
        <section class="relative pt-8 lg:pt-10">
            <div class="sticky top-0 z-40 mb-8 bg-white py-4">
                <div class="container">
                    <menu class="tabs mb-0">
                        @foreach($parent_category as $parent)
                        <li>
                            <a href="{{route('egypt-tours',$parent->slug)}}" class="tab" @if(in_array($parent->id,$categories_id)) aria-current="page" @endif>{{$parent->name}}</a>
                        </li>
                        @endforeach



                    </menu>
                </div>
            </div>
            <header class="mb-6 lg:mb-10">
                <div class="container">
                    @if($category->parent_id ==null)
                    <div
                        class="mb-6 flex flex-nowrap items-center gap-2 overflow-y-auto lg:mb-10"
                    >
                        @foreach($category->childrens as $child)
                        <a
                            href="{{route('egypt-tours',$child->slug)}}"
                            type="button"
                            @if($category->id ==$child->id)
                            aria-pressed="true"
                            @endif
                            class="text-nowrap rounded-lg border border-primary px-4 py-2 text-primary transition-colors hover:bg-opacity-75 aria-pressed:bg-primary aria-pressed:text-white lg:text-lg"
                        >
                            {{$child->name}}
                        </a>
                        @endforeach

                    </div>
                    @else
                        <div
                            class="mb-6 flex flex-nowrap items-center gap-2 overflow-y-auto lg:mb-10"
                        >
                            @foreach(\App\Models\Category::find($category->parent_id)->childrens as $child)
                                <a
                                    href="{{route('egypt-tours',$child->slug)}}"
                                    type="button"
                                    @if($category->id ==$child->id)
                                        aria-pressed="true"
                                    @endif
                                    class="text-nowrap rounded-lg border border-primary px-4 py-2 text-primary transition-colors hover:bg-opacity-75 aria-pressed:bg-primary aria-pressed:text-white lg:text-lg"
                                >
                                    {{$child->name}}
                                </a>
                            @endforeach

                        </div>
                    @endif

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
                            <a href="{{route('egypt-tours')}}">
                                Egypt Tours
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

                        @isset($category->parent_id)
                        <li>
                            <a href="{{route('egypt-tours',$category->_parent->slug)}}">
                                {{$category->_parent->name}}
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
                        @endisset
                        <li aria-current="page">   <a href="{{route('egypt-tours',$category->slug)}}">{{$category->name}}</a></li>
                    </ol>
                </div>
            </header>

          <div class="container">
            <div class="flex flex-col gap-7 lg:flex-row">
              <div class="w-full shrink-0 lg:max-w-[290px]">
                <button
                  type="button"
                  data-hs-overlay="#customize-tour"
                  class="mb-2 flex w-full items-center justify-center gap-2 rounded-lg bg-primary px-4 py-3 text-white transition-colors hover:bg-opacity-75 lg:text-lg"
                >
                  <svg class="size-5 text-white">
                    <use href="./assets/images/icons/sprite.svg#settings"></use>
                  </svg>

                  {{ __('front.site.footer.customize_your_tour') }}
                </button>
                  <form class="" id="sort_products" action="" method="GET">

                <div
                  class="hs-accordion-group mb-2 space-y-2"
                  data-hs-accordion-always-open
                >


                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle accordion-btn"
                      aria-controls="duration"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#clipboard-text-time"
                        ></use>
                      </svg>
                      Tours By Duration
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="duration"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="duration"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="duration"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            3 Days Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="duration"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            5 Days Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="duration"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            7 Days Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="duration"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            10 Days Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="duration"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            14 Days Tour
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle accordion-btn"
                      aria-controls="month"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#clipboard-text-time"
                        ></use>
                      </svg>
                      Tours By Month
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="month"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="mb-3 space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="month"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="month"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            January
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="month"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            February
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="month"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            March
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="month"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            April
                          </label>
                        </div>

                        <button type="button" class="text-secondary underline">
                          Show +8
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle inline-flex w-full items-center gap-x-2 text-nowrap rounded-lg px-4 py-4 text-start font-semibold text-black lg:px-6 lg:text-lg"
                      aria-controls="destination"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#location"
                        ></use>
                      </svg>
                      Tours By Destination
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="destination"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="relative mb-4 flex items-center">
                          <svg class="absolute start-4 size-4 text-primary">
                            <use
                              href="./assets/images/icons/sprite.svg#search"
                            ></use>
                          </svg>
                          <input
                            type="text"
                            class="block w-full rounded-xl border border-primary py-2.5 pe-4 ps-10 text-xs font-normal text-black outline-none placeholder:text-gray"
                            placeholder="Search Destinations"
                          />
                        </div>

                        <div class="mb-3 space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="destination"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            All Cities
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="destination"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Cairo
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="destination"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Luxor
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="destination"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Aswan
                          </label>
                        </div>

                        <button type="button" class="text-secondary underline">
                          Show +25
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle inline-flex w-full items-center gap-x-2 text-nowrap rounded-lg px-4 py-4 text-start font-semibold text-black lg:px-6 lg:text-lg"
                      aria-controls="type"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#travel-card"
                        ></use>
                      </svg>
                      Tours Type
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="type"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="mb-3 space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="type"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="type"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Classic Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="type"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Luxury Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="type"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Romantic Tours
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="type"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Accessible Tour
                          </label>
                        </div>

                        <button type="button" class="text-secondary underline">
                          Show +25
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle inline-flex w-full items-center gap-x-2 text-nowrap rounded-lg px-4 py-4 text-start font-semibold text-black lg:px-6 lg:text-lg"
                      aria-controls="available"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#event-available"
                        ></use>
                      </svg>
                      Availability
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="available"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="available"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="available"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Everyday
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="available"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Every Monday
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="available"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Every Friday
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle inline-flex w-full items-center gap-x-2 text-nowrap rounded-lg px-4 py-4 text-start font-semibold text-black lg:px-6 lg:text-lg"
                      aria-controls="rating"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#dislike"
                        ></use>
                      </svg>
                      Rating
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="rating"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="rating"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="rating"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            <div class="inline-flex items-center gap-1">
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                            </div>
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="rating"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            <div class="inline-flex items-center gap-1">
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                            </div>
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="rating"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            <div class="inline-flex items-center gap-1">
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                            </div>
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="rating"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            <div class="inline-flex items-center gap-1">
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                            </div>
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="checkbox"
                              name="rating"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            <div class="inline-flex items-center gap-1">
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                            </div>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle inline-flex w-full items-center gap-x-2 text-nowrap rounded-lg px-4 py-4 text-start font-semibold text-black lg:px-6 lg:text-lg"
                      aria-controls="special-event"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#event"
                        ></use>
                      </svg>
                      Special Events
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="special-event"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="available"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="available"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Christmas Tours
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="available"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Easter Offers
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle inline-flex w-full items-center gap-x-2 text-nowrap rounded-lg px-4 py-4 text-start font-semibold text-black lg:px-6 lg:text-lg"
                      aria-controls="opportunities"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#offer"
                        ></use>
                      </svg>
                      Tours Opportunities
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="opportunities"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="opportunities"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="opportunities"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            10-30% Discount
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="opportunities"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            35-50% Discount
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="opportunities"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            More than 50% Discount
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hs-accordion active accordion-filter">
                    <button
                      class="hs-accordion-toggle inline-flex w-full items-center gap-x-2 text-nowrap rounded-lg px-4 py-4 text-start font-semibold text-black lg:px-6 lg:text-lg"
                      aria-controls="size"
                    >
                      <svg class="accordion-icon">
                        <use
                          href="./assets/images/icons/sprite.svg#group-3"
                        ></use>
                      </svg>
                      Group Size
                      <svg
                        class="accordion-arrow shrink-0 hs-accordion-active:rotate-180"
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
                      id="size"
                      class="hs-accordion-content accordion-content-wrapper"
                    >
                      <div class="accordion-content">
                        <div class="space-y-2">
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="size"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Any
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="size"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Group Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="size"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Private Tour
                          </label>
                          <label class="flex items-center gap-4 font-normal">
                            <input
                              type="radio"
                              name="size"
                              class="size-3.5 rounded-none accent-primary"
                            />
                            Small Group Tour
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

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
                            href="./assets/images/icons/sprite.svg#info"
                          ></use>
                        </svg>

                        General Tips
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
                      id="accordion-content-1"
                      class="hs-accordion-content accordion-content-wrapper hidden"
                    >
                      <div class="px-2 pb-2">
                        <div
                          class="rounded-bl-xl rounded-br-xl bg-white p-4 shadow-lg"
                        >
                          <div class="space-y-2">
                            <div class="flex items-center gap-3">
                              <svg class="size-5 text-green">
                                <use
                                  href="./assets/images/icons/sprite.svg#checkmark-starburst"
                                ></use>
                              </svg>
                              Buy a local SIM card
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

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
                            href="./assets/images/icons/sprite.svg#info"
                          ></use>
                        </svg>

                        General Highlights
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
                      id="accordion-content-1"
                      class="hs-accordion-content accordion-content-wrapper hidden"
                    >
                      <div class="px-2 pb-2">
                        <div
                          class="rounded-bl-xl rounded-br-xl bg-white p-4 shadow-lg"
                        >
                          <div class="space-y-1">
                            <div class="flex items-center gap-3">
                              <svg class="size-5 text-green">
                                <use
                                  href="./assets/images/icons/sprite.svg#checkmark-starburst"
                                ></use>
                              </svg>
                              Buy a local SIM card
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  </form>
              </div>

              <div class="w-full lg:flex-1">
                <div
                  class="mb-5 flex flex-col items-start gap-4 lg:mb-6 lg:flex-row lg:items-center lg:justify-between"
                >
                  <p class="text-xl font-semibold lg:text-2xl">
                    <span class="text-primary"
                      ><span class="text-secondary">Egypt</span> {{$category->name}}</span
                    >: {{$tours->count()}} Available Tours
                  </p>

                  <button
                    type="button"
                    class="text-lg font-medium text-primary underline"
                  >
                    Clear All Filters
                  </button>
                </div>

                <div
                  class="mb-8 flex flex-col flex-nowrap gap-2 pb-2 lg:mb-10 lg:flex-row"
                >
                  <div
                    class="hs-dropdown relative flex-1 [--strategy:absolute]"
                  >
                    <button
                      type="button"
                      class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap rounded-xl border border-primary p-3 text-sm xl:px-4 xl:text-base"
                    >
                      <svg class="size-6 text-primary">
                        <use href="./assets/images/icons/sprite.svg#sort"></use>
                      </svg>
                      <span>Sort by: Our Top Picks</span>
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
                  <div class="hs-dropdown relative flex-1">
                    <div
                      class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap rounded-xl border border-primary p-3 text-sm xl:px-4 xl:text-base"
                    >
                      <svg class="size-6 text-primary">
                        <use
                          href="./assets/images/icons/sprite.svg#calender"
                        ></use>
                      </svg>
                      <input
                        id="range"
                        type="text"
                        class="flatpickr flatpickr-input inline bg-transparent outline-none"
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
                  </div>
                  <div
                    class="hs-dropdown relative flex-1 [--strategy:absolute]"
                  >
                    <button
                      type="button"
                      class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap rounded-xl border border-primary p-3 xl:px-4"
                    >
                      <svg class="size-6 text-primary">
                        <use
                          href="./assets/images/icons/sprite.svg#hotel"
                        ></use>
                      </svg>
                      High Luxury 5 Stars
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
                  <div
                    class="hs-dropdown relative flex flex-1 [--strategy:absolute] [--auto-close:inside]"
                  >
                    <button
                      type="button"
                      class="hs-dropdown-toggle flex w-full items-center gap-3 text-nowrap rounded-xl border border-primary p-3 text-sm xl:px-4 xl:text-base"
                    >
                      <svg class="size-6 text-primary">
                        <use
                          href="./assets/images/icons/sprite.svg#subscription-cashflow"
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
                          <span>$<span class="slider-min"></span></span>
                          <span>$<span class="slider-max"></span></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- tours -->
                <div class="space-y-6">
                    @isset($tours)
                        @foreach ($tours as $tour )
                  <article class="mega tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="{{$tour->photo  }}"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <div class="tour-card__header">
                        <h3>{{$tour->name}}</h3>
                        <span class="tour-card__discount">{{$tour->getDiscountPercentage()}} %</span>
                      </div>
                      <div class="tour-card__review">
                        <div class="flex items-center gap-x-px">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $tour->rate)
                                    <svg class="star text-secondary">
                                        <use href="{{asset('assets/images/icons/sprite.svg#star')}}"></use>
                                    </svg>
                                @else
                                    <svg class="star text-gray-200">
                                        <use href="{{asset('assets/images/icons/sprite.svg#star')}}"></use>
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
                              href="{{asset('assets/images/icons/sprite.svg#location')}}"
                            ></use>
                          </svg>
                            {{$tour->overview_values('location_from')}}, {{$tour->overview_values('location_to')}}
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#clipboard-text-time')}}"
                            ></use>
                          </svg>
                            {{$tour->overview_values('days') ?? 0}} Days / {{$tour->overview_values('nights') ?? 0}} Nights
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#travel-card')}}"
                            ></use>
                          </svg>
                            {{$tour->overview_values('type')}}
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#event-available')}}"
                            ></use>
                          </svg>
                            {{$tour->overview_values('availability')}}
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#group-3')}}"
                            ></use>
                          </svg>
                            {{$tour->overview_values('group')}}
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="{{asset('assets/images/icons/sprite.svg#cancel')}}"
                            ></use>
                          </svg>
                            {{$tour->overview_values('cancellation')}} Cancellation
                        </li>
                      </ul>

                      <p class="tour-card__desc">
                          {!! implode(' ', array_slice(str_word_count(strip_tags($tour->description), 1), 0, 20)) !!}
                      </p>

                      <div class="tour-card__footer">
                        <a href="{{route('tour_details',$tour->slug)}}" class="tour-card__link"
                          >View Tour</a
                        >
                        <p>
                          <span class="price old">{{$tour->price}}</span>
                          <span class="price">{{$tour->price_offer}}</span>
                        </p>
                      </div>
                    </div>
                  </article>
                        @endforeach
                    @endisset

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
                    <span aria-hidden="true" class="sr-only">Previous</span>
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
                    <span aria-hidden="true" class="sr-only">Next</span>
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

        <section id="blog">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>Learn</span> More About Egyptian Culture
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
                        src="./assets/images/tour-1.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#calendar-date"
                            ></use>
                          </svg>
                          13 March, 2024
                        </li>
                      </ul>

                      <p class="tour-card__desc">
                        DOUDOU is about meeting others. You can get to know
                        people online through the website...
                      </p>

                      <div class="tour-card__footer">
                        <p>
                          Published By
                          <a href="#">Doudue Team</a>
                        </p>

                        <a href="./tour-details.html" class="tour-card__link"
                          >Read More</a
                        >
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="./assets/images/tour-2.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#calendar-date"
                            ></use>
                          </svg>
                          13 March, 2024
                        </li>
                      </ul>

                      <p class="tour-card__desc">
                        DOUDOU is about meeting others. You can get to know
                        people online through the website...
                      </p>

                      <div class="tour-card__footer">
                        <p>
                          Published By
                          <a href="#">Doudue Team</a>
                        </p>

                        <a href="./tour-details.html" class="tour-card__link"
                          >Read More</a
                        >
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="./assets/images/tour-3.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#calendar-date"
                            ></use>
                          </svg>
                          13 March, 2024
                        </li>
                      </ul>

                      <p class="tour-card__desc">
                        DOUDOU is about meeting others. You can get to know
                        people online through the website...
                      </p>

                      <div class="tour-card__footer">
                        <p>
                          Published By
                          <a href="#">Doudue Team</a>
                        </p>

                        <a href="./tour-details.html" class="tour-card__link"
                          >Read More</a
                        >
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="tour-card">
                    <div class="tour-card__thumbnail-wrapper">
                      <img
                        src="./assets/images/tour-4.jpeg"
                        class="tour-card__thumbnail"
                        alt=""
                      />
                    </div>

                    <div class="tour-card__content">
                      <h3>{{ __('front.site.sections.best_time_to_visit_egypt') }}</h3>

                      <ul class="tour-card__features">
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#calendar-date"
                            ></use>
                          </svg>
                          13 March, 2024
                        </li>
                      </ul>

                      <p class="tour-card__desc">
                        DOUDOU is about meeting others. You can get to know
                        people online through the website...
                      </p>

                      <div class="tour-card__footer">
                        <p>
                          Published By
                          <a href="#">Doudue Team</a>
                        </p>

                        <a href="./tour-details.html" class="tour-card__link"
                          >Read More</a
                        >
                      </div>
                    </div>
                  </article>
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
                      <div class="swiper swiper-sm">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
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
                      <h3>{{ __('front.site.sections.cairo_luxor_tour') }}</h3>
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
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          Cairo, Luxor
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#clipboard-text-time"
                            ></use>
                          </svg>
                          5 Days / 4 Nights
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#travel-card"
                            ></use>
                          </svg>
                          Classic Tour
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
                        <a href="#" class="tour-card__link">View Tour</a>
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
                      <div class="swiper swiper-sm">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-2.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
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
                      <h3>{{ __('front.site.sections.cairo_luxor_tour') }}</h3>
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
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          Cairo, Luxor
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#clipboard-text-time"
                            ></use>
                          </svg>
                          5 Days / 4 Nights
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#travel-card"
                            ></use>
                          </svg>
                          Classic Tour
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
                        <a href="#" class="tour-card__link">View Tour</a>
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
                      <div class="swiper swiper-sm">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-3.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
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
                      <h3>{{ __('front.site.sections.cairo_luxor_tour') }}</h3>
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
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          Cairo, Luxor
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#clipboard-text-time"
                            ></use>
                          </svg>
                          5 Days / 4 Nights
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#travel-card"
                            ></use>
                          </svg>
                          Classic Tour
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
                        <a href="#" class="tour-card__link">View Tour</a>
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
                      <div class="swiper swiper-sm">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-4.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
                          <div class="swiper-slide">
                            <img
                              src="./assets/images/tour-1.jpeg"
                              class="tour-card__thumbnail"
                              alt=""
                            />
                          </div>
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
                      <h3>{{ __('front.site.sections.cairo_luxor_tour') }}</h3>
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
                              href="./assets/images/icons/sprite.svg#location"
                            ></use>
                          </svg>
                          Cairo, Luxor
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#clipboard-text-time"
                            ></use>
                          </svg>
                          5 Days / 4 Nights
                        </li>
                        <li>
                          <svg class="icon">
                            <use
                              href="./assets/images/icons/sprite.svg#travel-card"
                            ></use>
                          </svg>
                          Classic Tour
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
                        <a href="#" class="tour-card__link">View Tour</a>
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

        <section id="videos">
          <div class="container">
            <header
              class="section_header flex flex-col justify-between gap-6 lg:flex-row lg:items-center"
            >
              <h2 class="section_heading text-primary">
                <span>Popular</span> Videos
              </h2>

              <a href="#" class="text-secondary lg:text-lg">View All</a>
            </header>

            <div class="items-start lg:grid lg:grid-cols-8 lg:gap-8">
              <div class="h-[400px] max-lg:mb-8 lg:col-span-6 lg:h-[600px]">
                <div class="swiper videos h-full w-full">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
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
                              src="./assets/images/logo-sm.png"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
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
                              src="./assets/images/logo-sm.png"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
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
                              src="./assets/images/logo-sm.png"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
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
                              src="./assets/images/logo-sm.png"
                              class="size-10 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p
                            class="text-lg font-semibold text-white lg:text-xl"
                          >
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div>

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-12 -translate-x-1/2 -translate-y-1/2 lg:size-20"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
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
                    <div class="swiper-slide h-full cursor-pointer">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        />

                        <!-- <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-6"
                        >
                          <div
                            class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="./assets/images/logo-sm.png"
                              class="size-8 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p class="font-semibold text-white">
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div> -->

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-8 -translate-x-1/2 -translate-y-1/2 lg:size-12"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full cursor-pointer">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        />

                        <!-- <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-6"
                        >
                          <div
                            class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="./assets/images/logo-sm.png"
                              class="size-8 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p class="font-semibold text-white">
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div> -->

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-8 -translate-x-1/2 -translate-y-1/2 lg:size-12"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full cursor-pointer">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        />

                        <!-- <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-6"
                        >
                          <div
                            class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="./assets/images/logo-sm.png"
                              class="size-8 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p class="font-semibold text-white">
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div> -->

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-8 -translate-x-1/2 -translate-y-1/2 lg:size-12"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
                        </button>
                      </div>
                    </div>
                    <div class="swiper-slide h-full cursor-pointer">
                      <div
                        class="relative z-20 h-full overflow-hidden rounded-xl border-2 border-primary lg:border-4"
                      >
                        <img
                          src="./assets/images/video-poster.jpeg"
                          class="h-full w-full object-cover object-center"
                          alt=""
                        />

                        <!-- <div
                          class="absolute inset-x-0 top-0 flex items-center gap-4 p-6"
                        >
                          <div
                            class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white"
                          >
                            <img
                              src="./assets/images/logo-sm.png"
                              class="size-8 object-contain object-center"
                              alt=""
                            />
                          </div>
                          <p class="font-semibold text-white">
                            A Great Holiday Review on Nile Cruises ...
                          </p>
                        </div> -->

                        <button
                          type="button"
                          class="absolute start-1/2 top-1/2 z-30 block size-8 -translate-x-1/2 -translate-y-1/2 lg:size-12"
                        >
                          <img src="./assets/images/icons/play.svg" alt="" />
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <menu
                  class="thumbs-arrows flex items-center justify-center gap-12 lg:flex-col"
                >
                  <li>
                    <button type="button" class="swiper-btn prev lg:rotate-90">
                      <svg>
                        <use
                          href="./assets/images/icons/sprite.svg#arrow-left"
                        ></use>
                      </svg>
                    </button>
                  </li>
                  <li>
                    <button type="button" class="swiper-btn next lg:rotate-90">
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
          </div>
        </section>

        <section id="reviews" class="bg-secondary pt-12 text-white lg:pt-20">
          <div class="container">
            <div class="grid gap-12 lg:grid-cols-3">
              <header class="lg:col-span-1">
                <h2 class="txt-shadow mb-4 text-3xl">
                  How Good is Egypt Doudou Travel?
                </h2>
                <p class="mb-6 lg:mb-8">
                  DOUDOU is about meeting others. You can get to know people
                  online through the website or meet them in real life...
                </p>
                <a
                  href="#"
                  class="inline-flex h-10 items-center justify-center rounded-xl bg-primary px-5 text-center text-sm text-white transition-colors hover:bg-opacity-80"
                  >Explore All</a
                >
              </header>

              <div class="flex min-w-0 items-center gap-4 lg:col-span-2">
                <span class="rounded-full bg-white/70">
                  <button type="button" class="swiper-btn prev shrink-0">
                    <svg>
                      <use
                        href="./assets/images/icons/sprite.svg#arrow-left"
                      ></use>
                    </svg>
                  </button>
                </span>

                <div class="swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="rounded-3xl bg-white p-6 shadow-xl">
                        <div class="mb-3 flex items-center gap-2">
                          <div
                            class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                          >
                            <img
                              src="./assets/images/avatar.jpeg"
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
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-gray-200">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
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
                          >Read More</a
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
                              src="./assets/images/avatar.jpeg"
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
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-gray-200">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
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
                          >Read More</a
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
                              src="./assets/images/avatar.jpeg"
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
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-secondary">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
                                ></use>
                              </svg>
                              <svg class="size-3 text-gray-200">
                                <use
                                  href="./assets/images/icons/sprite.svg#star"
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
                          >Read More</a
                        >
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
          </div>

          <img
            src="./assets/images/section-decoration.png"
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
                <span>Explore</span> Gallery packages
              </h2>

              <a href="#" class="text-secondary lg:text-lg">View All</a>
            </header>

            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img
                    src="./assets/images/gallery-1.jpeg"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="./assets/images/gallery-2.jpeg"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="./assets/images/gallery-3.jpeg"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="./assets/images/gallery-4.jpeg"
                    class="spotlight h-[350px] w-full rounded-xl object-cover object-center"
                    alt=""
                  />
                </div>
              </div>

              <button
                type="button"
                class="swiper-btn prev absolute left-0 top-1/2 z-20 -translate-y-1/2 lg:left-1/4"
              >
                <svg>
                  <use href="./assets/images/icons/sprite.svg#arrow-left"></use>
                </svg>
              </button>
              <button
                type="button"
                class="swiper-btn next absolute right-0 top-1/2 z-20 -translate-y-1/2 lg:right-1/4"
              >
                <svg>
                  <use
                    href="./assets/images/icons/sprite.svg#arrow-right"
                  ></use>
                </svg>
              </button>
            </div>

            <img
              src="./assets/images/section-divider.png"
              class="pointer-events-none mx-auto mt-5 lg:mt-10 lg:w-4/5"
              alt=""
            />
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
                  class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
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
                class="hs-accordion border-transparent hs-accordion-active:border-gray-200"
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
                  class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
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
                class="hs-accordion border-transparent hs-accordion-active:border-gray-200"
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
                  class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
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
@endsection
@section('scripts')
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        function sort_products(el){
            $('#sort_products').submit();
        }
    </script>
    <script>
        var categorySelect = document.getElementById("category");
        var buttons = categorySelect.getElementsByTagName("button");

        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener("click", handleCategoryChange);
        }

        function handleCategoryChange(event) {
            var selectedCategory = event.target.textContent;
            console.log("Selected category: " + selectedCategory);

            // Perform any additional actions based on the selected category
            // For example, you can update the page content or make an AJAX request
        }
    </script>
@endsection

      <!-- footer -->


