

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
        ><h3>{{$tour->name}}</h3></a
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
        <a href="#" class="tour-card__link">{{ __('front.site.sections.view_tour') }}</a>
        <p>
          {{ __('front.site.sections.starting_from') }}
          <span class="price">{{$tour->price}}$</span>
        </p>
      </div>
    </div>
  </article>
</div>
@endforeach
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
<script src="https://cdn.jsdelivr.net/npm/spotlight.js@0.7.8/dist/spotlight.bundle.min.js"></script>


<script
      defer
      src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"
    ></script>
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/preline.min.js"
    ></script>
    <script defer src="{{asset('assets/scripts/main.js')}}"></script>
