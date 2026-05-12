


@foreach ($questions as $question)
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

                     {{$question->title}}
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
                        <em>{!!$question->description!!}</em>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
