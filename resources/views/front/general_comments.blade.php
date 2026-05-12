<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('front.site.meta.default_title') }} | {{ __('front.site.sections.reviews') }}</title>

    @include('front.layouts.hreflang')
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
      {{--    <link rel="stylesheet" href="./assets/styles/main.css" />--}}

      <link rel="stylesheet" href="{{asset('assets/styles/main.css')}}" />
      <script src="https://cdn.tailwindcss.com"></script>

      <script
          defer
          src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
      ></script>
      <script
          defer
          src="https://cdn.jsdelivr.net/npm/headroom.js@0.12.0/dist/headroom.min.js"
      ></script>
      <script
          defer
          src="https://cdn.jsdelivr.net/npm/preline@2.4.1/dist/preline.min.js"
      ></script>
      <link rel="stylesheet" href="{{asset('node_modules/select2/dist/css/select2.min.css')}}">
      {{--    <script defer src="./assets/scripts/main.js"></script>--}}
      <script defer src="{{asset('assets/scripts/main.js')}}"></script>
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

                <a href="{{route('home')}}"> <img src="{{footer_logo()}}" class="h-8" alt="" /></a>
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


              </div>
            </div>
          </div>
        </div>

        <div class="hero">
          <div class="container">
            <div class="hero_content">
              <h1 class="txt-shadow">Clients Reviews!</h1>
              <p class="txt-shadow">
                We give the customer the best experience in our platform and the freedom to choose our services.
              </p>
            </div>
          </div>
        </div>

        <img
          src="./assets/images/how-it-works-bg.jpeg"
          class="page-header__bg"
          alt=""
        />
      </header>

      <main class="relative space-y-8 lg:space-y-10">
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
                <li aria-current="page">Genereal Comments</li>
              </ol>

            </div>
          </div>
        </section>


        <section id="partners" class="pb-20 pt-12 lg:pb-32">
          <div class="container">
            <header class="section_header">
              <h2 class="section_heading text-primary">
                <span>Doudou</span> Reviews
              </h2>
            </header>

            <div class="flex flex-col items-center justify-center ">
              @foreach ($general_comments as $comment)

              <div class="w-1/2 p-6 bg-white rounded-3xl border border-yellow-400 gap-6 mb-6 shadow-lg">
                <div class="flex gap-x-4 items-center justify-start mb-4">
                  <img
                    src="https://picsum.photos/id/646/200/200"
                    class=" object-cover ratio-1/1 rounded-full"
                    alt=""
                    style="width: 5rem; height: 5rem"
                  />
                  <div class="flex flex-col items-start gap-x-px">
                    <p class="mb-1 text-sm font-bold text-black">
                        {{ $comment->username }}
                      </p>
                      <span class="text-gray text-xs">{{$comment->getFormattedDate()}}</span>
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
                </div>
                </div class="mt-4">
                <div>{!! $comment->comment !!}</div>
              </div>

              @endforeach
            </div>
          </div>
        </section>
      </main>

      <!-- footer -->
      <div class="relative">

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

    </div>

    <!-- js -->

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
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

                    sliderWrapper.querySelector("#min").value = Math.round(values[0]);
                    sliderWrapper.querySelector("#max").value = Math.round(values[1]);
                });
            }
            budgetSlider("#slider-1");
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

            // video-thumbs
            const videosThumbs = new Swiper("#videos .swiper.thumbs", {
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
            new Swiper("#videos .swiper.videos", {
                direction: "vertical",
                slidesPerView: 1,
                spaceBetween: 32,
                mousewheel: false,
                grabCursor: false,
                thumbs: {
                    swiper: videosThumbs,
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
                slidesPerView: 1.5,
                initialIndex: 2,
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

            // filters
            new Swiper(".filters.swiper", {
                grabCursor: true,
                a11y: false,
                freeMode: true,
                slidesPerView: "auto",
                breakpoints: {
                    0: {
                        spaceBetween: 10,
                    },
                    1024: {
                        spaceBetween: 20,
                    },
                },
                navigation: {
                    nextEl: ".filter-next",
                    prevEl: ".filter-prev",
                },
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
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
