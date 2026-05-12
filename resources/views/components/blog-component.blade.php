

@foreach ($blogs as $blog )
    <div class="swiper-slide">
        <article class="tour-card">
            <div class="tour-card__thumbnail-wrapper">
                <img
                    src="{{$blog->image_url}}"
                    class="tour-card__thumbnail"
                    alt=""
                />
            </div>

            <div class="tour-card__content">
                <a href="{{route('blog_preview', $blog->slug)}}" >  <h3>{{ $blog->title}}</h3></a>

                <ul class="tour-card__features">
                    <li>
                        <svg class="icon">
                            <use
                                href="./assets/images/icons/sprite.svg#calendar-date"
                            ></use>
                        </svg>
                        {{ $blog->getFormattedDate()}}
                    </li>
                </ul>

                <p class="tour-card__desc">
                    {!! implode(' ', array_slice(str_word_count(strip_tags($blog->description), 1), 0, 20)) !!}
                </p>

                <div class="tour-card__footer">
                    <p>
                        Published By
                        <a href="#">Doudue Team</a>
                    </p>

                    <a href="{{route('blog_preview',$blog->slug)}}" class="tour-card__link"
                    >Read More</a
                    >
                </div>
            </div>
        </article>
    </div>
@endforeach
