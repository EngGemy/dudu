<div class="relative">
    <img
        src="{{asset('assets/images/section-decoration.png')}}"
        class="w-full"
        alt=""
    />
    <button type="button" id="BackToTop" class="back-to-top" onclick="lenis.scrollTo('body')">
        <svg>
            <use href="{{asset('assets/images/icons/sprite.svg#back-to-top')}}"></use>
        </svg>
    </button>

    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__aside">
                    <img
                        src="{{asset('assets/images/logo-footer.png')}}"
                        class="footer__logo"
                        alt=""
                    />

                    <ul>
                        <li>
                            <svg>
                                <use
                                    href="{{asset('assets/images/icons/sprite.svg#map-pin')}}"
                                ></use>
                            </svg>
                            <a href="#">Put Address Here</a>
                        </li>
                        <li>
                            <svg>
                                <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>
                            </svg>

                            <a href="mailto:email">Put Email Here</a>
                        </li>
                        <li>
                            <svg>
                                <use href="{{asset('assets/images/icons/sprite.svg#phone')}}"></use>
                            </svg>

                            <a href="tel:+tel">Put Phone Here</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__sitemap">
                    <div>
                        <h3>{{ __('front.site.footer.popular_tour_packages') }}</h3>

                        <ul>
                            <li>
                                <a href="#">{{ __('front.site.footer.egypt_travel_package') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.egypt_shore_excursions') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.egypt_nile_cruises_package') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.egypt_family_holiday_package') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.group_tours_to_egypt') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3>{{ __('front.site.footer.main_links') }}</h3>

                        <ul>
                            <li>
                                <a href="#">{{ __('front.site.footer.about_us') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.contact_us') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.careers') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.blogs') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.faqs') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.privacy_policy') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.terms_conditions') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3>{{ __('front.site.footer.official_pages') }}</h3>

                        <ul>
                            <li>
                                <a href="#">{{ __('front.site.footer.how_it_works') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.loyalty_program') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.events') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.become_partner') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.egypt_travel_guide') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('front.site.footer.services') }}</a>
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

@once
    @include('front.layouts.floating-contact')
@endonce
