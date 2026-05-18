

 @foreach($blogs as $blog)

    <article class="tour-card blog-reveal-card" data-aos="fade-up" data-aos-delay="{{ min($loop->index * 70, 280) }}">
        <div class="tour-card__thumbnail-wrapper">
            <a href="{{route('blog_preview', $blog->slug)}}" > <img
                src="{{$blog->image_url}}"
                class="tour-card__thumbnail"
                alt=""
                /></a>
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
                    {{ __('front.site.sections.published_by') }}
                    <a href="#">{{ __('front.site.sections.doudou_team') }}</a>
                </p>

                <a href="{{route('blog_preview',$blog->slug)}}" class="tour-card__link"
                >{{ __('front.site.sections.read_more') }}</a
                >
            </div>
        </div>
    </article>


@endforeach
