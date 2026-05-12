

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
                            <span>{{$site_name->address}}</span>
                        </li>
                        <li>
                            <svg>
                                <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>
                            </svg>

                            <span >{{$site_name->email}}</span>
                        </li>
                        <li>
                            <svg>
                                <use href="{{asset('assets/images/icons/sprite.svg#phone')}}"></use>
                            </svg>

                            <a href="tel:+tel">{{$site_name->manager_phone}}</a>
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
              <div class="flex items-center gap-3">
                @if($fc_n($fc_social?->wechat))
                <a href="{{ $fc_n($fc_social->wechat) }}" target="_blank" rel="noopener" title="WeChat">
                  <svg viewBox="0 0 24 24" fill="currentColor" width="22" height="22"><path d="M8.7 2.2C3.9 2.2 0 5.5 0 9.5c0 2.2 1.2 4.2 3 5.6a.6.6 0 01.2.7l-.4 1.5c0 .1 0 .1 0 .2 0 .2.1.3.3.3a.3.3 0 00.2-.1l1.9-1.1a.9.9 0 01.7-.1c.9.3 1.8.4 2.8.4.3 0 .5 0 .8-.1-.9-2.6.2-5 1.9-6.4 1.7-1.4 3.9-2 5.9-1.8-.6-3.6-3.9-6.4-7.6-6.4zm-2.5 5.3a1.1 1.1 0 110 2.2 1.1 1.1 0 010-2.2zm4.9 0a1.1 1.1 0 110 2.2 1.1 1.1 0 010-2.2zm3.8 1.5c-3.1 0-5.6 2.1-5.6 4.8 0 2.6 2.5 4.8 5.6 4.8.6 0 1.2-.1 1.7-.2l1.9 1-.5-1.7a4.6 4.6 0 002-3.9c0-2.6-2.5-4.8-5.6-4.8zm-2.5 3.6a.9.9 0 110 1.8.9.9 0 010-1.8zm4.9 0a.9.9 0 110 1.8.9.9 0 010-1.8z"/></svg>
                </a>
                @endif
                @if($fc_n($fc_social?->line))
                <a href="{{ $fc_n($fc_social->line) }}" target="_blank" rel="noopener" title="Line">
                  <svg viewBox="0 0 24 24" fill="currentColor" width="22" height="22"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
                </a>
                @endif
                <a href="https://wa.me/{{$site_name->manager_phone}}?text=Hello%20there" target="_blank" title="WhatsApp">
                  <svg>
                    <use href="{{asset('assets/images/icons/sprite.svg#whatsapp')}}"></use>
                  </svg>
                </a>
                <a href="mailto:{{$site_name->email}}" title="Email">
                  <svg>
                    <use href="{{asset('assets/images/icons/sprite.svg#mail')}}"></use>
                  </svg>
                </a>
              </div>
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
