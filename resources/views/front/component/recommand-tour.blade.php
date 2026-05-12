

@foreach ($tours as $tour)
<div class="swiper-slide" style="width: 379.127px; margin-right: 25px;">
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
          <div class="swiper-slide"  role="group" style="width: 377px; margin-right: 2px;">
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
        <p>{{ $tour->rate ?? 0 }} Wonderful <span>({{ $tour->reviews }} Reviews)</span></p>
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

        {{$tour->overview_values('days') ?? 0}} Days / {{$tour->overview_values('nights') ?? 0}} Nights
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
          {{$tour->overview_values('cancellation')}} Cancellation
        </li>
      </ul>

      <div class="tour-card__footer">
        <a href="#" class="tour-card__link">View Tour</a>
        <p>
          Starting from
          <span class="price">{{$tour->price}}$</span>
        </p>
      </div>
    </div>
  </article>
</div>
@endforeach


