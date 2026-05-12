<div
    id="customize-tour"
    class="hs-overlay fixed start-0 top-0 z-[100] hidden size-full overflow-y-auto overflow-x-hidden hs-overlay-backdrop-open:bg-black/50"
>
    <div
        class="m-3 mt-0 flex min-h-[calc(100%-3.5rem)] items-center opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-[550px]"
    >
        <div class="flex w-full flex-col overflow-hidden rounded-3xl bg-white">
            <div class="flex items-center justify-between bg-primary px-6 py-5" style="background: linear-gradient(90deg, #005690 0%, #0071BD 100%)">
                <h3 class="text-lg font-semibold text-white lg:text-xl">
                    Customize Your Own Tour
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#customize-tour"
                >
                    <span class="sr-only">Close</span>
                    <svg
                        class="size-5 shrink-0 text-white"
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
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>

            <!-- Stepper -->
            <div
                data-hs-stepper
                class="overflow-y-auto overflow-x-hidden px-6 py-8 max-lg:max-h-[35rem]"
                data-lenis-prevent
            >
                <ul
                    class="relative mx-auto flex max-w-[225px] flex-row gap-x-2 hs-stepper-completed:hidden"
                >
                    <li
                        class="group flex-1 shrink basis-0"
                        data-hs-stepper-nav-item='{ "index": 1 }'
                    >
                        <div
                            class="inline-flex min-h-7 w-full min-w-7 items-center align-middle text-xs"
                        >
                  <span
                      class="flex size-7 flex-shrink-0 items-center justify-center rounded-full bg-secondary font-medium text-white group-focus:bg-gray-200"
                  >
                    <span
                        class="hs-stepper-success:hidden hs-stepper-completed:hidden"
                    >1</span
                    >
                    <svg
                        class="hidden size-3 flex-shrink-0 text-white hs-stepper-success:block"
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
                      <polyline points="20 6 9 17 4 12" />
                    </svg>
                  </span>
                            <div
                                class="ms-2 h-0.5 w-full flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-secondary"
                            ></div>
                        </div>
                    </li>
                    <li
                        class="group shrink basis-0"
                        data-hs-stepper-nav-item='{ "index": 2 }'
                    >
                        <div
                            class="inline-flex min-h-7 w-full min-w-7 items-center align-middle text-xs"
                        >
                  <span
                      class="flex size-7 flex-shrink-0 items-center justify-center rounded-full border border-gray font-medium text-gray hs-stepper-active:border-secondary hs-stepper-active:bg-secondary hs-stepper-active:text-white hs-stepper-success:border-secondary hs-stepper-success:bg-secondary"
                  >
                    <span
                        class="hs-stepper-success:hidden hs-stepper-completed:hidden"
                    >2</span
                    >
                    <svg
                        class="hidden size-3 flex-shrink-0 text-white hs-stepper-success:block"
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
                      <polyline points="20 6 9 17 4 12" />
                    </svg>
                  </span>
                        </div>
                    </li>
                </ul>

                <div class="mt-5 sm:mt-8">
                    <!-- First Contnet -->
                    <div data-hs-stepper-content-item='{ "index": 1 }'>
                        <p class="mb-8 flex items-center gap-2">
                  <span
                      class="inline-flex size-7 items-center justify-center rounded-full bg-secondary text-white"
                  >1</span
                  >
                            <span class="text-lg font-semibold text-primary lg:text-xl"
                            >Your Information</span
                            >
                        </p>

                        <form class="form w-full">
                            <div class="space-y-6">
                                <div class="flex gap-2">
                                    <div class="relative max-w-[80px] shrink-0">
                                        <label
                                            for="title"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Title</label
                                        >
                                        <select
                                            id="title"
                                            type="text"
                                            class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option value="mr">Mr.</option>
                                            <option value="ms">Ms.</option>
                                        </select>
                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="name"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Name</label
                                        >
                                        <input
                                            id="name"
                                            type="text"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="email"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Email</label
                                        >
                                        <input
                                            id="email"
                                            type="text"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        />
                                    </div>
                                    <div class="relative shrink-0 lg:max-w-[180px]">
                                        <label
                                            for="nationality"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Nationality</label
                                        >
                                        <select
                                            id="nationality"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option hidden>Your Nationality</option>
                                            <option>Egyption</option>
                                        </select>
                                    </div>
                                </div>
                                <div
                                    class="relative flex-1 rounded-xl border border-primary px-4 py-3"
                                >
                                    <label
                                        for="tel"
                                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                    >Phone Number</label
                                    >
                                    <div class="flex items-center gap-3">
                                        <select
                                            name="countries"
                                            class="block border-e-2 border-gray bg-transparent pe-2"
                                        >
                                            <option value="NL">🇳🇱</option>
                                            <option value="DE">🇩🇪</option>
                                            <option value="FR">🇫🇷</option>
                                            <option value="ES">🇪🇸</option>
                                        </select>

                                        <input
                                            id="tel"
                                            type="text"
                                            class="flex-1 text-black outline-none placeholder:text-gray"
                                            placeholder="Enter your phone number"
                                        />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End First Contnet -->

                    <!-- Second Contnet -->
                    <div
                        data-hs-stepper-content-item='{ "index": 2 }'
                        style="display: none"
                    >
                        <p class="mb-8 flex items-center gap-4 lg:gap-2">
                  <span
                      class="inline-flex size-7 items-center justify-center rounded-full bg-secondary text-white"
                  >2</span
                  >
                            <span class="text-lg font-semibold text-primary lg:text-xl"
                            >Tour Information</span
                            >
                        </p>

                        <form class="form w-full">
                            <div class="space-y-6">
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="arrival-date"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Arrival Date</label
                                        >
                                        <input
                                            id="arrival-date"
                                            type="date"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        />
                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="departure-date"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Departure Date</label
                                        >
                                        <input
                                            id="departure-date"
                                            type="date"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="destination"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Your Destination</label
                                        >
                                        <select
                                            id="destination"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option hidden>Your Destination</option>
                                        </select>
                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="accommodation"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Accommodation Choice</label
                                        >
                                        <select
                                            id="accommodation"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option hidden>Accommodation Choice</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-2 lg:flex-row">
                                    <div class="relative w-full flex-1">
                                        <label
                                            for="age"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >Age Range (Optional)</label
                                        >
                                        <select
                                            id="age"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="Your Name"
                                        >
                                            <option hidden>Select age range</option>
                                        </select>
                                    </div>
                                    <div class="flex w-full flex-1 justify-center gap-x-4">
                                        <div class="flex-1">
                                            <p class="mb-2 text-center text-primary">Adults</p>
                                            <div class="flex items-center justify-center gap-4">
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                >
                                                    +
                                                </button>
                                                <span class="text-black">1</span>
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                >
                                                    -
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <p class="mb-2 text-center text-primary">Children</p>
                                            <div class="flex items-center justify-center gap-4">
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                >
                                                    +
                                                </button>
                                                <span class="text-black">1</span>
                                                <button
                                                    type="button"
                                                    class="inline-flex size-9 items-center justify-center rounded-md border border-primary text-primary hover:bg-primary hover:text-white"
                                                >
                                                    -
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative flex-1">
                                    <label
                                        for="notes"
                                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                    >Extra Notes</label
                                    >
                                    <textarea
                                        id="notes"
                                        type="date"
                                        class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        placeholder="Write your note here..."
                                    ></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Second Contnet -->

                    <!-- Final Contnet -->
                    <div
                        data-hs-stepper-content-item='{ "isFinal": true }'
                        class="text-center"
                        style="display: none"
                    >
                        <img
                            src="./assets/images/icons/approve.png"
                            class="mx-auto mb-4 max-w-40"
                            alt=""
                        />
                        <p class="text-2xl text-primary lg:text-3xl">
                            An Inquire Received
                        </p>
                        <p class="mb-7 lg:mb-10 lg:text-lg">
                            Your tour Inquire has been successfully recived. We look
                            forward to contact you very soon!
                        </p>

                        <x-social-links variant="primary" class="justify-center" />
                    </div>
                    <!-- End Final Contnet -->

                    <!-- Button Group -->
                    <div class="mt-5 flex items-center justify-center gap-x-4">
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg border border-primary bg-white px-3 py-2 font-medium text-primary hover:bg-primary hover:text-white disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-back-btn
                        >
                            <!-- data-hs-overlay="#customize-tour" -->
                            Cancel
                        </button>
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-next-btn
                        >
                            Next
                        </button>
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg border border-transparent bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-finish-btn
                            style="display: none"
                        >
                            Inquire Now
                        </button>
                    </div>
                    <!-- End Button Group -->
                </div>
            </div>
            <!-- End Stepper -->

            <img
                src="./assets/images/icons/model-decoration.png"
                class="w-full"
                alt=""
            />
        </div>
    </div>
</div>
