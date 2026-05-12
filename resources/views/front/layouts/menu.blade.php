<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">


            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{{route('admin_dashboard')}}}">
                    <img class="brand-logo"
                         style="object-fit: contain;border-radius: 14px;margin-right: -3px;width: 63%"
                         src="{{header_logo()}}">


                    <h2 class="brand-text mb-0">Dodue</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{{route('admin_dashboard')}}}"><i class="feather icon-home"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>

            <li class=" nav-item"><a href="#"><i class="fas fa-list"></i><span class="menu-title"
                                                                                     data-i18n="Ecommerce">Tours</span></a>
                <ul class="menu-content">

                        <li class=" {{ areActiveRoutes(['categories.index', 'categories.edit','categories.create'])}}"><a
                                href="{{route('categories.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                         data-i18n="Details">Categories</span></a>
                        </li>
                    <li class=" {{ areActiveRoutes(['tips.index', 'tips.edit','tips.create'])}}"><a
                            href="{{route('tips.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">Tips</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['inclusions.index', 'inclusions.edit','inclusions.create'])}}"><a
                            href="{{route('inclusions.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Details">Inclusions</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['exclusions.index', 'exclusions.edit','exclusions.create'])}}"><a
                            href="{{route('exclusions.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">Exclusions</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['tour_type.index', 'tour_type.edit','tour_type.create'])}}"><a
                            href="{{route('tour_type.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">Tour Type</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['tour_group.index', 'tour_group.edit','tour_group.create'])}}"><a
                            href="{{route('tour_group.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                         data-i18n="Details">Tour Group Size</span></a>
                    </li>
                    <li class=" {{ areActiveRoutes(['tours.index', 'tours.edit','tours.create'])}}"><a
                            href="{{route('tours.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                          data-i18n="Details">Tours</span></a>
                    </li>

                     <li class=" {{ areActiveRoutes(['services.index', 'services.edit','services.create'])}}"><a
                        href="{{route('services.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Details">{{ __('front.site.footer.services') }}</span></a>
                </li>

                <li class=" {{ areActiveRoutes(['popular_video.index', 'popular_video.edit','popular_video.create'])}}"><a
                    href="{{route('popular_video.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                  data-i18n="Details">Popular Vedio</span></a>
            </li>

            <li class=" {{ areActiveRoutes(['blogs.index', 'blogs.edit','blogs.create'])}}"><a
                href="{{route('blogs.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Details">{{ __('front.site.footer.blogs') }}</span></a>
        </li>

        <li class=" {{ areActiveRoutes(['questions.index', 'questions.edit','questions.create'])}}"><a
            href="{{route('questions.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                          data-i18n="Details">Questions</span></a>
    </li>






                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="fas fa-list"></i><span class="menu-title"
                                                                               data-i18n="Ecommerce">{{ __('front.site.footer.events') }}</span></a>
                <ul class="menu-content">


                    <li class=" {{ areActiveRoutes(['events.index', 'events.edit','events.create'])}}"><a
                            href="{{route('events.index')}}"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="Details">{{ __('front.site.footer.events') }}</span></a>
                    </li>






                </ul>
            </li>

                <li class=" nav-item"><a href="#"><i class="fas fa-city"></i><span class="menu-title"
                                                                                  data-i18n="Ecommerce">Cities</span></a>
                    <ul class="menu-content">

                            <li class="{{ areActiveRoutes(['cities.index', 'cities.update'])}}"><a
                                    href="{{route('cities.index')}}"><i class="feather icon-circle"></i><span
                                        class="menu-item" data-i18n="Shop">Cities</span></a>
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

                         <li class="{{ areActiveRoutes(['sliders.index', 'sliders.update'])}}"><a
                                href="{{route('sliders.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Details">Sliders</span></a>
                        </li>

                        <li class="{{ areActiveRoutes(['gallary_packages.index', 'gallary_packages.update'])}}"><a
                            href="{{route('gallary_packages.index')}}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Details">Gallary Packages</span></a>
                    </li>

                    <li class="{{ areActiveRoutes(['about_us.index', 'about_us.create','about_us.edit'])}}"><a
                        href="{{route('about_us.index')}}"><i class="feather icon-circle"></i><span
                            class="menu-item" data-i18n="Details">{{ __('front.site.footer.about_us') }}</span></a>
                </li>

                <li class="{{ areActiveRoutes(['message.index'])}}"><a
                    href="{{route('message.index')}}"><i class="feather icon-circle"></i><span
                        class="menu-item" data-i18n="Details">Messages</span></a>
            </li>
            <li class="{{ areActiveRoutes(['careers.index', 'careers.create','careers.edit'])}}"><a
                href="{{route('careers.index')}}"><i class="feather icon-circle"></i><span
                    class="menu-item" data-i18n="Details">Carrers</span></a>
        </li>


                </ul>
            </li>
            @endcan


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











