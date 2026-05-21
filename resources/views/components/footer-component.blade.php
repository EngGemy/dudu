

<div class="relative">
    <img
        src="{{asset('assets/images/section-decoration.png')}}"
        class="w-full"
        alt=""
    />
{{--    <button type="button" id="toTop" onclick="lenis.scrollTo('body')">--}}
{{--        <svg>--}}
{{--            <use href="{{asset('assets/images/icons/sprite.svg#back-to-top')}}"></use>--}}
{{--        </svg>--}}
{{--    </button>--}}

    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__aside">
                    <a href="{{route('home')}}">
                        <img
                            src="{{footer_logo()}}"
                        class="footer__logo"
                        alt=""
                    />
                    </a>

                    <ul>
                        <li>
                            <svg>
                                <use
                                    href="{{asset('assets/images/icons/sprite.svg#map-pin')}}"
                                ></use>
                            </svg>
                            <?php  $site_name=\App\Models\General_setting::first() ?>
                            <span>{{ $site_name?->address ?? __('front.site.footer.brand') }}</span>
                        </li>
                        <li>
                            <svg>
                                <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>
                            </svg>

                            <span>{{ $site_name?->email ?? '' }}</span>
                        </li>
                        <li>
                            <svg>
                                <use href="{{asset('assets/images/icons/sprite.svg#phone')}}"></use>
                            </svg>

                            <a href="{{ $site_name?->manager_phone ? 'tel:'.$site_name->manager_phone : route('contact') }}">{{ $site_name?->manager_phone ?? __('front.site.footer.contact_us') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__sitemap">
                    <div>
                        <h3>{{ __('front.site.footer.popular_tour_packages') }}</h3>

                        <ul>
                            <li>
                                <a href="{{route('events')}}">{{ __('front.site.footer.egypt_travel_package') }}</a>
                            </li>
                            <li>
                                <a href="{{route('egypt-tours')}}">{{ __('front.site.footer.egypt_shore_excursions') }}</a>
                            </li>
                            <li>
                                <a href="{{route('events')}}">{{ __('front.site.footer.egypt_nile_cruises_package') }}</a>
                            </li>
                            <li>
                                <a href="{{route('egypt-tours')}}">{{ __('front.site.footer.egypt_family_holiday_package') }}</a>
                            </li>
                            <li>
                                <a href="{{route('egypt-tours')}}">{{ __('front.site.footer.group_tours_to_egypt') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3>{{ __('front.site.footer.main_links') }}</h3>

                        <ul>
                            <li>
                                <a href="{{route('about')}}">{{ __('front.site.footer.about_us') }}</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">{{ __('front.site.footer.contact_us') }}</a>
                            </li>
                            <li>
                                <a href="{{route('careers')}}">{{ __('front.site.footer.careers') }}</a>
                            </li>
                            <li>
                                <a href="{{route('blogs')}}">{{ __('front.site.footer.blogs') }}</a>
                            </li>
                            <li>
                                <a href="{{route('faq')}}">{{ __('front.site.footer.faqs') }}</a>
                            </li>
                            <li>
                                <a href="{{route('privacy')}}">{{ __('front.site.footer.privacy_policy') }}</a>
                            </li>
                            <li>
                                <a href="{{route('terms')}}">{{ __('front.site.footer.terms_conditions') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3>{{ __('front.site.footer.official_pages') }}</h3>

                        <ul>
                            <li>
                                <a href="{{route('how-it-works')}}">{{ __('front.site.footer.how_it_works') }}</a>
                            </li>
                            <li>
                                <a href="{{route('loyalty-program')}}">{{ __('front.site.footer.loyalty_program') }}</a>
                            </li>
                            <li>
                                <a href="{{route('events')}}">{{ __('front.site.footer.events') }}</a>
                            </li>
                            <li>
                                <a href="{{route('partner')}}">{{ __('front.site.footer.become_partner') }}</a>
                            </li>
                            <li>
                                <a href="{{route('events')}}">{{ __('front.site.footer.egypt_travel_guide') }}</a>
                            </li>
                            <li>
                                <a href="{{route('services')}}">{{ __('front.site.footer.services') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__copyright">
                <p class="max-lg:order-2 max-lg:text-center max-lg:text-sm">
                    {{ __('front.site.footer.rights_reserved') }} &copy;
                    <span class="text-secondary">{{ __('front.site.footer.brand') }} </span>
                    2024
                </p>
                <x-social-links variant="white" />
            </div>
        </div>
    </footer>
</div>

@include('front.layouts.language_contact_tools')

<div class="btns">
    <button type="button" class="btn" data-hs-overlay="#customize-tour">
          <span class="content-wrapper">
            <span class="content"> {{ __('front.site.footer.customize_your_tour') }} </span>
            <span class="content-bg"></span>
          </span>
        <span class="icon">
            <svg>
              <use href="{{asset('assets/images/icons/sprite.svg#settings')}}"></use>
            </svg>
          </span>
    </button>
    @php
        $site_name = \App\Models\General_setting::first();
        $fc_social = \App\Models\Social_setting::first();
        $fc_n = fn(?string $u): string => ($u = trim((string)$u)) === '' ? '' : (preg_match('/^https?:/i',$u) ? $u : 'https://'.$u);
    @endphp
    <div class="btn">
          <span class="content-wrapper">
            <span class="content">
              <x-contact-channel-actions mode="icons" />
            </span>
            <span class="content-bg"></span>
          </span>
        <span class="icon">
            <span class="icon">
              <svg>
                <use
                    href="{{asset('assets/images/icons/sprite.svg#customer-service-2')}}"
                ></use>
              </svg>
            </span>
          </span>
    </div>
</div>

@once
    @include('front.layouts.floating-contact')
@endonce
