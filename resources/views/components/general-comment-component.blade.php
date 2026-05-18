<style>
    /* ===== Scrollbar CSS ===== */
    *::-webkit-scrollbar {
    width: 0.6vw;
}

*::-webkit-scrollbar-track {
    background-color: #ffedd8;
    border-radius: 6px;
    width: 0.65vw;
}

*::-webkit-scrollbar-thumb {
    background-color: #f7931e;
    border-radius: 8px;
    width: 0.73vw;
}

*::-webkit-scrollbar-thumb:hover {
    background-color: #ff8900;
}

</style>
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
                    href="{{ route('general-comments') }}"
                    class="inline-flex h-10 items-center justify-center rounded-xl bg-primary px-5 text-center text-sm text-white transition-colors hover:bg-opacity-80"
                >{{ __('front.site.about.explore_all') }}</a
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

                        @foreach ($general_comments as $comment)
                        <div class="swiper-slide">
                            <div class="rounded-3xl bg-white p-6 shadow-xl">
                                <div class="mb-3 flex items-center gap-2">
                                    <div
                                        class="size-8 shrink-0 overflow-hidden rounded-full lg:size-10"
                                    >
                                        <img
                                            src="{{ $comment->image_url }}"
                                            class="h-full w-full object-cover object-center"
                                            alt=""
                                        />
                                    </div>

                                    <div>
                                        <p class="mb-1 text-sm text-black">
                                            {{ $comment->username }}
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
                                    </div>
                                </div>

                                <div class="mb-3 overflow-y-scroll" style="overflow-y: scroll;height: 5rem; ">
                                <p
                                    class="line-clamp-4 font-normal leading-relaxed text-gray"
                                >
                                    {!! strip_tags($comment->comment) !!}
                                </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

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
