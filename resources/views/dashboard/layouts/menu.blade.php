<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow {{\Illuminate\Support\Facades\Session::get('menu')}}" data-scroll-to-active="true" style="overflow-y: scroll">
    <div class="navbar-header {{\Illuminate\Support\Facades\Session::get('menu')}}" >
        <ul class="nav navbar-nav flex-row">


            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{{route('admin_dashboard')}}}">
                    <img class="brand-logo"
                         style="object-fit: contain;border-radius: 14px;margin-right: -3px;width: 63%"
                         src="{{header_logo()}}">


                    <h2 class="brand-text mb-0">Dodue {{session("isMenuOpen")}}</h2>

                </a></li>

            <li class="nav-item nav-toggle">

                @if(\Illuminate\Support\Facades\Session::get('menu') != 'expanded')

                    <a id="toggleMenu" class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="icon-disc"></i></a>
                @else
                    <a id="toggleMenu" class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="icon-x d-block d-xl-none font-medium-4 primary toggle-icon feather icon-disc"></i><i
                            class="toggle-icon font-medium-4 d-none d-xl-block collapse-toggle-icon primary feather icon-disc"
                            data-ticon="icon-disc"></i></a>
                @endif



            </li>

{{--            <li class="nav-item nav-toggle"><a id="toggle-menu-button" class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i--}}
{{--                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i--}}
{{--                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"--}}
{{--                        data-ticon="icon-disc"></i></a></li>--}}

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{{route('admin_dashboard')}}}"><i class="feather icon-home"></i><span
                        class="menu-title" data-i18n="Dashboard">{{ __('admin/menu.Dashboard') }}</span></a>
            </li>

            <li class=" nav-item"><a href="#"><i class="fas fa-list"></i><span class="menu-title"
                                                                                     data-i18n="Ecommerce">{{ __('admin/menu.Tours') }}</span></a>
                <ul class="menu-content">

                        <li class=" {{ areActiveRoutes(['categories.index', 'categories.edit','categories.create'])}}"><a
                                href="{{route('categories.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                         data-i18n="Details">{{ __('admin/menu.Categories') }}</span></a>
                        </li>

                        <li class=" {{ areActiveRoutes(['travel_service.index', 'travel_service.edit','travel_service.create'])}}"><a
                            href="{{route('travel_service.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="Details">{{ __('admin/menu.Travel_Service') }}</span></a>
                    </li>

                    <li class=" {{ areActiveRoutes(['tips.index', 'tips.edit','tips.create'])}}"><a
                            href="{{route('tips.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">{{ __('admin/menu.Tips') }}</span></a>
                    </li>

                    <li class=" {{ areActiveRoutes(['inclusions.index', 'inclusions.edit','inclusions.create'])}}"><a
                            href="{{route('inclusions.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Details">{{ __('admin/menu.Inclusions') }}</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['exclusions.index', 'exclusions.edit','exclusions.create'])}}"><a
                            href="{{route('exclusions.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">{{ __('admin/menu.Exclusions') }}</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['tour_type.index', 'tour_type.edit','tour_type.create'])}}"><a
                            href="{{route('tour_type.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">{{ __('admin/menu.Tour_Type') }}</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['tour_group.index', 'tour_group.edit','tour_group.create'])}}"><a
                            href="{{route('tour_group.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                         data-i18n="Details">{{ __('admin/menu.Tour_Group_Size') }}</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['tours.index', 'tours.edit','tours.create'])}}"><a
                            href="{{route('tours.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">{{ __('admin/menu.Tours_List') }}</span></a>
                    </li>












                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fas fa-bomb"></i><span class="menu-title"
                                                                               data-i18n="Ecommerce">Events</span></a>
                <ul class="menu-content">


                    <li class=" {{ areActiveRoutes(['events.index', 'events.edit','events.create'])}}"><a
                            href="{{route('events.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="Details">Events</span></a>
                    </li>






                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fas fa-hotel"></i><span class="menu-title"
                                                                               data-i18n="Ecommerce">Hotels</span></a>
                <ul class="menu-content">


                    <li class=" {{ areActiveRoutes(['hotels.index', 'hotels.edit','hotels.create'])}}"><a
                            href="{{route('hotels.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Details">Hotels</span></a>
                    </li>






                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="fas fa-bookmark"></i><span class="menu-title"
                                                                                data-i18n="Ecommerce">Bookings</span></a>
                <ul class="menu-content">

                    <li class="{{ areActiveRoutes(['nationalities.index', 'nationalities.create', 'nationalities.edit'])}}"><a
                            href="{{route('nationalities.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                       data-i18n="Details">Nationalities</span></a>
                    </li>

                    <li class=" {{ areActiveRoutes(['booking.index', 'booking.delete'])}}"><a
                            href="{{route('booking.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Details">Bookings</span></a>
                    </li>


                </ul>
            </li>

                <li class=" nav-item"><a href="#"><i class="fas fa-city"></i><span class="menu-title"
                                                                                  data-i18n="Ecommerce">Cities</span></a>
                    <ul class="menu-content">

                            <li class="{{ areActiveRoutes(['cities.index', 'cities.create', 'cities.edit'])}}"><a
                                    href="{{route('cities.index')}}"><i class="feather icon-circle"></i><span
                                        class="menu-item" data-i18n="Shop">Cities</span></a>
                            </li>

                    </ul>
                </li>
            <li class=" nav-item"><a href="#"><i class="fas fa-comment"></i><span class="menu-title"
                                                                               data-i18n="Ecommerce">Messages</span></a>
                <ul class="menu-content">
                    <li class="{{ areActiveRoutes(['message.index'])}}"><a
                            href="{{route('message.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Messages</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fas fa-comment"></i><span class="menu-title"
                                                                                  data-i18n="Ecommerce">Join Team</span></a>
                <ul class="menu-content">
                    <li class="{{ areActiveRoutes(['join_teams.index'])}}"><a
                            href="{{route('join_teams.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Join Team</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fas fa-blog"></i><span class="menu-title"
                                                                               data-i18n="Ecommerce">Blogs</span></a>
                <ul class="menu-content">

                    <li class="{{ areActiveRoutes(['tag.index', 'tag.create','tag.edit'])}}"><a
                            href="{{route('tag.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">Tags</span></a>
                    </li>

                    <li class="{{ areActiveRoutes(['blogs.index', 'blogs.create','blogs.edit'])}}"><a
                            href="{{route('blogs.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">Blogs</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fas fa-book"></i><span class="menu-title"
                                                                               data-i18n="Ecommerce">Pages</span></a>
                <ul class="menu-content">

                    <li class="{{ areActiveRoutes(['about_us.index', 'about_us.create','about_us.edit'])}}"><a
                            href="{{route('about_us.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">About Us</span></a>
                    </li>

                    <li class=" {{ areActiveRoutes(['questions.index', 'questions.edit','questions.create'])}}"><a
                            href="{{route('questions.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                         data-i18n="Details">Questions</span></a>
                    </li>
                    <li class="{{ areActiveRoutes(['careers.index', 'careers.create','careers.edit'])}}"><a
                            href="{{route('careers.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Carrers</span></a>
                    </li>


                    <li class="{{ areActiveRoutes(['slider.index', 'slider.create','slider.edit'])}}"><a
                        href="{{route('slider.index')}}"><i class="feather icon-circle"></i><span
                            class="menu-item" data-i18n="Details">Sliders</span></a>
                </li>

                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="fas fa-users"></i><span class="menu-title"
                data-i18n="Community">{{ __('admin/menu.community') }}</span></a>
              <ul class="menu-content">

                <li class="{{ areActiveRoutes(['admin.community-posts.index', 'admin.community-posts.create','admin.community-posts.edit'])}}"><a
                    href="{{route('admin.community-posts.index')}}"><i class="feather icon-circle"></i><span
                        class="menu-item" data-i18n="Community Posts">{{ __('admin/menu.community_posts') }}</span></a>
              </li>

              </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="fas fa-share"></i><span class="menu-title"
                data-i18n="Ecommerce">Parnters</span></a>
              <ul class="menu-content">

                <li class="{{ areActiveRoutes(['partner.index', 'partner.create','partner.edit'])}}"><a
                    href="{{route('partner.index')}}"><i class="feather icon-circle"></i><span
                        class="menu-item" data-i18n="Details">Partners</span></a>
              </li>

              <li class="{{ areActiveRoutes(['doudou_partner.index', 'doudou_partner.update'])}}"><a
                href="{{route('doudou_partner.index')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Details">Doudou Partners</span></a>
        </li>



              </ul>
            </li>

        <li class=" nav-item"><a href="#"><i class="fas fa-file"></i><span class="menu-title"
                data-i18n="Ecommerce">Privacy Policy</span></a>
           <ul class="menu-content">

            <li class="{{ areActiveRoutes(['privacy.index', 'privacy.create','privacy.edit'])}}"><a
                href="{{route('privacy.index')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Details">Privacy</span></a>
        </li>

        <li class="{{ areActiveRoutes(['term.index', 'term.create','term.edit'])}}"><a
            href="{{route('term.index')}}"><i class="feather icon-circle"></i><span
                class="menu-item" data-i18n="Details">Terms</span></a>
      </li>
      <li class="{{ areActiveRoutes(['work.index', 'work.create','work.edit'])}}"><a
        href="{{route('work.index')}}"><i class="feather icon-circle"></i><span
            class="menu-item" data-i18n="Details">How it works</span></a>
</li>

          </ul>
        </li>

        @can('all_settings_edit')
            <li class=" nav-item"><a href="#"><i class="fas fa-cog"></i><span class="menu-title"
                                                                              data-i18n="Ecommerce">Settings</span></a>
                <ul class="menu-content">
                    @can('general_settings_edit')
                    <li class="{{ areActiveRoutes(['settings.index', 'settings.update'])}}"><a
                            href="{{route('settings.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Shop">Public Settings</span></a>
                    </li>
                    @endcan
                        @can('social_settings_edit')

                    <li class="{{ areActiveRoutes(['SocialSettings.index', 'SocialSettings.update'])}}"><a
                            href="{{route('SocialSettings.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Social Settings</span></a>
                    </li>
                        @endcan

                        <li class="{{ areActiveRoutes(['general_comments.index', 'general_comments.edit','general_comments.create'])}}"><a
                                href="{{route('general_comments.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Details">General Comments</span></a>
                        </li>

                        <li class="{{ areActiveRoutes(['gallary_packages.index', 'gallary_packages.update'])}}"><a
                            href="{{route('gallary_packages.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Gallary Packages</span></a>
                    </li>


                        <li class=" {{ areActiveRoutes(['popular_video.index', 'popular_video.edit','popular_video.create'])}}"><a
                                href="{{route('popular_video.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                                 data-i18n="Details">Popular Video</span></a>
                        </li>


                        <li class=" {{ areActiveRoutes(['services.index', 'services.edit','services.create'])}}"><a
                                href="{{route('services.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                            data-i18n="Details">Public Services</span></a>
                        </li>
                        <li class="{{ areActiveRoutes(['special_offer.index', 'special_offer.create','special_offer.edit'])}}"><a
                            href="{{route('special_offer.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Special Offers</span></a>
                       </li>



                </ul>
            </li>
            @endcan


            <li class=" nav-item {{ areActiveRoutes(['translations.index','translations.edit','translations.update']) }}">
                <a href="{{ route('translations.index') }}">
                    <i class="feather icon-globe"></i>
                    <span class="menu-title" data-i18n="Translations">{{ __('admin/menu.translations') }}</span>
                </a>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                                                                                     data-i18n="Ecommerce">Roles</span></a>
                <ul class="menu-content">
                    @can('groups_dashboard')
                    <li class=" {{ areActiveRoutes(['roles.index', 'roles.edit','roles.create'])}}"><a
                            href="{{route('roles.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="Details">Roles</span></a>
                    </li>
                    @endcan
                        @can('users_dashboard')
                    <li class=" {{ areActiveRoutes(['users.Dashboard`.index', 'users.Dashboard.edit','users.Dashboard.create'])}}">
                        <a href="{{route('users.Dashboard.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Employees</span></a>
                    </li>
                        @endcan


                </ul>
            </li>


        </ul>
    </div>
</div>


<!-- END: Main Menu-->











