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
                    {{ __('front.site.form.customize_your_own_tour') }}
                </h3>
                <button
                    type="button"
                    class="flex size-7 items-center justify-center rounded-full border-2 border-white"
                    data-hs-overlay="#customize-tour"
                >
                    <span class="sr-only">{{ __('front.site.form.close') }}</span>
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
                            >{{ __('front.site.form.your_information') }}</span
                            >
                        </p>

                        <form class="form w-full">
                            <div class="space-y-6">
                                <div class="flex gap-2">
                                    <div class="relative max-w-[80px] shrink-0">
                                        <label
                                            for="title"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.title') }}</label
                                        >
                                        <select
                                            id="title"
                                            type="text"
                                            class="rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option value="mr">{{ __('front.site.form.mr') }}</option>
                                            <option value="ms">{{ __('front.site.form.ms') }}</option>
                                        </select>
                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="name"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.name') }}</label
                                        >
                                        <input
                                            id="name"
                                            type="text"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        />
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="email"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.email') }}</label
                                        >
                                        <input
                                            id="email"
                                            type="email"
                                            class="w-full rounded-xl border border-primary px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_email') }}"
                                        />
                                    </div>
                                    <div class="relative shrink-0 lg:max-w-[180px]">
                                        <label
                                            for="nationality"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.nationality') }}</label
                                        >
                                        <select
                                            id="nationality"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option hidden>{{ __('front.site.form.your_nationality') }}</option>
                                            <option>{{ __('front.site.form.egyptian') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div
                                    class="relative flex-1 rounded-xl border border-primary px-4 py-3"
                                    id="tel-wrapper"
                                >
                                    <label
                                        for="tel"
                                        class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                    >{{ __('front.site.form.phone_number') }}</label
                                    >
                                    <div class="flex items-center gap-3">
                                        <select
                                            id="phone-code"
                                            name="phone_code"
                                            class="block border-e-2 border-gray bg-transparent pe-2 text-sm outline-none"
                                        >
                                            <option data-countryCode="CN" value="+86">China (+86)</option>
                                            <option data-countryCode="TW" value="+886">Taiwan (+886)</option>
                                            <option data-countryCode="HK" value="+852">Hong Kong (+852)</option>
                                            <option data-countryCode="EG" value="+20" selected>Egypt (+20)</option>
                                            <option data-countryCode="US" value="+1">United States (+1)</option>
                                            <option data-countryCode="GB" value="+44">United Kingdom (+44)</option>
                                            <option data-countryCode="DE" value="+49">Germany (+49)</option>
                                            <option data-countryCode="FR" value="+33">France (+33)</option>
                                            <option data-countryCode="IT" value="+39">Italy (+39)</option>
                                            <option data-countryCode="ES" value="+34">Spain (+34)</option>
                                            <option data-countryCode="AU" value="+61">Australia (+61)</option>
                                            <option data-countryCode="JP" value="+81">Japan (+81)</option>
                                            <option data-countryCode="KR" value="+82">South Korea (+82)</option>
                                            <option data-countryCode="RU" value="+7">Russia (+7)</option>
                                            <option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>
                                            <option data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>
                                            <option data-countryCode="NL" value="+31">Netherlands (+31)</option>
                                        </select>

                                        <input
                                            id="tel"
                                            type="tel"
                                            class="flex-1 text-black outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.enter_phone_number') }}"
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
                            >{{ __('front.site.form.tour_information') }}</span
                            >
                        </p>

                        <form class="form w-full">
                            <div class="space-y-6">
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <div class="relative flex-1">
                                        <label
                                            for="arrival-date"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.arrival_date') }}</label
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
                                        >{{ __('front.site.form.departure_date') }}</label
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
                                        >{{ __('front.site.form.your_destination') }}</label
                                        >
                                        <select
                                            id="destination"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option hidden>{{ __('front.site.form.your_destination') }}</option>
                                        </select>
                                    </div>
                                    <div class="relative flex-1">
                                        <label
                                            for="accommodation"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.accommodation_choice') }}</label
                                        >
                                        <select
                                            id="accommodation"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option hidden>{{ __('front.site.form.accommodation_choice') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end gap-2 lg:flex-row">
                                    <div class="relative w-full flex-1">
                                        <label
                                            for="age"
                                            class="absolute start-4 top-0 -translate-y-1/2 bg-white px-1 text-sm text-primary lg:text-base"
                                        >{{ __('front.site.form.age_range_optional') }}</label
                                        >
                                        <select
                                            id="age"
                                            type="text"
                                            class="w-full rounded-xl border border-primary bg-transparent px-4 py-3 text-gray outline-none placeholder:text-gray"
                                            placeholder="{{ __('front.site.form.your_name') }}"
                                        >
                                            <option hidden>{{ __('front.site.form.select_age_range') }}</option>
                                        </select>
                                    </div>
                                    <div class="flex w-full flex-1 justify-center gap-x-4">
                                        <div class="flex-1">
                                            <p class="mb-2 text-center text-primary">{{ __('front.site.form.adults') }}</p>
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
                                            <p class="mb-2 text-center text-primary">{{ __('front.site.form.children') }}</p>
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
                                    >{{ __('front.site.form.extra_notes') }}</label
                                    >
                                    <textarea
                                        id="notes"
                                        type="date"
                                        class="w-full rounded-xl border border-primary px-4 py-3 text-gray outline-none placeholder:text-gray"
                                        placeholder="{{ __('front.site.form.requests_placeholder') }}"
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
                            {{ __('front.site.form.inquire_received') }}
                        </p>
                        <p class="mb-7 lg:mb-10 lg:text-lg">
                            {{ __('front.site.form.inquire_success') }}
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
                            {{ __('front.site.form.cancel') }}
                        </button>
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-next-btn
                        >
                            {{ __('front.site.form.next') }}
                        </button>
                        <button
                            type="button"
                            class="inline-block min-w-36 rounded-lg border border-transparent bg-primary px-3 py-2 font-medium text-white hover:bg-opacity-75 disabled:pointer-events-none disabled:opacity-50 lg:text-xl"
                            data-hs-stepper-finish-btn
                            style="display: none"
                        >
                            {{ __('front.site.form.inquire_now') }}
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

<script>
(function () {
    var i18n = {
        name:          @json(__('front.site.form.validation_name_required')),
        email:         @json(__('front.site.form.validation_email_required')),
        emailInvalid:  @json(__('front.site.form.validation_email_required')),
        nationality:   @json(__('front.site.form.validation_nationality_required')),
        phone:         @json(__('front.site.form.validation_phone_required')),
        arrival:       @json(__('front.site.form.validation_arrival_required')),
        departure:     @json(__('front.site.form.validation_departure_required')),
        destination:   @json(__('front.site.form.validation_destination_required')),
        accommodation: @json(__('front.site.form.validation_accommodation_required')),
    };

    function showError(fieldId, msg) {
        var el = document.getElementById(fieldId) || document.getElementById(fieldId + '-wrapper');
        if (!el) return;
        var wrap = el.closest('.relative') || el.parentElement;
        var existing = wrap.querySelector('.form-error-msg');
        if (existing) existing.remove();
        wrap.classList.add('border-red-500');
        el.classList.add('border-red-500');
        var err = document.createElement('p');
        err.className = 'form-error-msg text-xs text-red-500 mt-1';
        err.textContent = msg;
        wrap.appendChild(err);
    }

    function clearErrors(form) {
        form.querySelectorAll('.form-error-msg').forEach(function (e) { e.remove(); });
        form.querySelectorAll('.border-red-500').forEach(function (e) { e.classList.remove('border-red-500'); });
    }

    function isValidEmail(v) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
    }

    function validateStep1() {
        var form = document.querySelector('[data-hs-stepper-content-item=\'{ "index": 1 }\'] .form');
        if (!form) return true;
        clearErrors(form);
        var ok = true;
        var name = document.getElementById('name');
        if (name && !name.value.trim()) { showError('name', i18n.name); ok = false; }
        var email = document.getElementById('email');
        if (email) {
            if (!email.value.trim()) { showError('email', i18n.email); ok = false; }
            else if (!isValidEmail(email.value.trim())) { showError('email', i18n.emailInvalid); ok = false; }
        }
        var nat = document.getElementById('nationality');
        if (nat && (!nat.value || nat.value === nat.options[0].value)) { showError('nationality', i18n.nationality); ok = false; }
        var tel = document.getElementById('tel');
        if (tel && !tel.value.trim()) { showError('tel-wrapper', i18n.phone); ok = false; }
        return ok;
    }

    function validateStep2() {
        var form = document.querySelector('[data-hs-stepper-content-item=\'{ "index": 2 }\'] .form');
        if (!form) return true;
        clearErrors(form);
        var ok = true;
        var arrival = document.getElementById('arrival-date');
        if (arrival && !arrival.value) { showError('arrival-date', i18n.arrival); ok = false; }
        var departure = document.getElementById('departure-date');
        if (departure && !departure.value) { showError('departure-date', i18n.departure); ok = false; }
        var dest = document.getElementById('destination');
        if (dest && (!dest.value || dest.selectedIndex === 0)) { showError('destination', i18n.destination); ok = false; }
        var acc = document.getElementById('accommodation');
        if (acc && (!acc.value || acc.selectedIndex === 0)) { showError('accommodation', i18n.accommodation); ok = false; }
        return ok;
    }

    document.addEventListener('DOMContentLoaded', function () {
        var nextBtn = document.querySelector('[data-hs-stepper-next-btn]');
        var finishBtn = document.querySelector('[data-hs-stepper-finish-btn]');

        if (nextBtn) {
            nextBtn.addEventListener('click', function (e) {
                var step1Visible = document.querySelector('[data-hs-stepper-content-item=\'{ "index": 1 }\']');
                if (step1Visible && step1Visible.style.display !== 'none') {
                    if (!validateStep1()) { e.stopImmediatePropagation(); e.preventDefault(); }
                }
            }, true);
        }

        if (finishBtn) {
            finishBtn.addEventListener('click', function (e) {
                if (!validateStep2()) { e.stopImmediatePropagation(); e.preventDefault(); }
            }, true);
        }

        var modal = document.getElementById('customize-tour');
        if (modal) {
            var observer = new MutationObserver(function () {
                if (!modal.classList.contains('open') && !modal.classList.contains('hs-overlay-open')) {
                    document.querySelectorAll('#customize-tour .form-error-msg').forEach(function (e) { e.remove(); });
                    document.querySelectorAll('#customize-tour .border-red-500').forEach(function (e) { e.classList.remove('border-red-500'); });
                }
            });
            observer.observe(modal, { attributes: true, attributeFilter: ['class'] });
        }
    });
})();
</script>
