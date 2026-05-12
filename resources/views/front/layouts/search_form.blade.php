<div class="bg-secondary py-3 max-lg:hidden">
    <div class="container">
        <p class="text-center text-sm text-white lg:text-base">
            {{ __('front.site.sections.easter_banner') }}
            <a href="#" class="px-1 font-semibold text-primary underline"
            >{{ __('front.site.sections.book_now') }}</a
            >
        </p>
    </div>
</div>
<div class="navbar_desktop">
    <img
        src="{{asset('assets/images/logo.png')}}"
        class="w-48 shrink-0 lg:w-60"
        alt=""
    />


    <form id="searchForm">
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
                                    <span>$<span class="slider-min" name ="slider-min"></span></span>
                                    <span>$<span class="slider-max" name ="slider-max"></span></span>

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
            <use href="{}}{asset('assets/images/icons/sprite.svg#settings')}}"></use>
        </svg>

        {{ __('front.site.footer.customize_your_tour') }}
    </button>
</div>
