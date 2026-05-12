

@foreach ($tours_transportation as $tour)
    <article class="mega tour-card">
        <div class="tour-card__thumbnail-wrapper">
            <a href="{{route('tour_details',$tour->slug)}}"> <img
                    src="{{$tour->photo }}"
                    class="tour-card__thumbnail"
                    alt=""
                /></a>
        </div>

        <div class="tour-card__content">
            <div class="tour-card__header">
                <a href="{{route('tour_details',$tour->slug)}}"
                ><h3>{{$tour->name}}</h3></a>
                <span class="tour-card__discount">-{{$tour->getDiscountPercentage()}}%</span>
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

            <p class="tour-card__desc">
                {!! $tour->description!!}
            </p>

            <div class="tour-card__footer">
                <a href="{{route('tour_details',$tour->slug)}}" class="tour-card__link"
                >View Tour</a
                >
                <p>
                    <span class="price old">{{$tour->price}}{{currency()}}</span>
                    <span class="price">{{$tour->price_offer}}{{currency()}}</span>
                </p>
            </div>
        </div>
    </article>
@endforeach
