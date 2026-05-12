<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['ar','he']) ? 'rtl' : 'ltr' }}">


<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('front.site.meta.default_title'))</title>

    @include('front.layouts.hreflang')

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
    <link rel="stylesheet" href="{{asset('assets/styles/doudou-design.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIjA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script
        defer
        src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
    <script defer src="{{asset('assets/scripts/main.js')}}"></script>
    <script defer src="{{asset('assets/scripts/doudou-design.js')}}"></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
        defer
        src="https://cdn.jsdelivr.net/npm/headroom.js@0.12.0/dist/headroom.min.js"
    ></script>
    @yield('style')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
<div class="app">

    @yield('headroom')
    <!-- BEGIN: Header-->
    @include('front.layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <!-- END: Main Menu-->

    <!-- BEGIN: Content -->


                <!-- Dashboard Analytics Start -->
                @yield('content')
                <!-- Dashboard Analytics end -->


    <!-- END: Content-->

    <!-- BEGIN: Footer-->


    @include('front.layouts.footer')
</div>
    @include('front.layouts.model')
    @include('front.layouts.language_contact_tools')
    @include('front.layouts.search-modal')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('scripts')
    <script>
        @if(\Illuminate\Support\Facades\Session::has('success'))

            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": 'toast-bottom-right',

        };
        toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}");
        @endif
            @if(\Illuminate\Support\Facades\Session::has('error'))

            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": 'toast-bottom-right',

        };
        toastr.error("{{\Illuminate\Support\Facades\Session::get('error')}}");
        @endif
            @if(\Illuminate\Support\Facades\Session::has('errors'))

            toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": 'toast-bottom-right',

        };
        @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
        @endif
    </script>
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>


    @yield('scripts')
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
<script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.js"></script>
<script>
    function budgetSlider(el) {
        const sliderWrapper = document.querySelector(el);
        if (!sliderWrapper) return;
        const slider = sliderWrapper.querySelector(".slider");
        const minEl = sliderWrapper.querySelector(".slider-min");
        const maxEl = sliderWrapper.querySelector(".slider-max");
        if (!slider || !minEl || !maxEl) return;
        noUiSlider.create(slider, {
            start: [1, 10000],
            connect: true,
            range: { min: 0, max: 10000 },
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '{{ route('search') }}',
            data: {checkInCheckOut: checkInCheckOut , selectedHotel: selectedHotel, selectedHotelRate: selectedHotelRate},
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

<script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
