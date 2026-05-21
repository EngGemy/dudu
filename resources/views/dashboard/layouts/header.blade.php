@php
    $dashboardUser = \Illuminate\Support\Facades\Auth::user();
    $unreadNotifications = $dashboardUser ? $dashboardUser->unreadNotifications : collect();
@endphp

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow doudou-dashboard-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ficon feather icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm doudou-visit-site" href="{{ route('home') }}" target="_blank" rel="noopener">
                                <i class="feather icon-external-link"></i>
                                <span>Visit Website</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Change language">
                            <i class="fas fa-globe"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag" id="lang-change">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                                @if(! $loop->last)
                                    <div class="dropdown-divider"></div>
                                @endif
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand" href="#" aria-label="Expand dashboard">
                            <i class="ficon feather icon-maximize"></i>
                        </a>
                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown" aria-label="Notifications">
                            <i class="ficon feather icon-bell"></i>
                            <span class="badge badge-pill badge-primary badge-up">{{ $unreadNotifications->count() }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">{{ $unreadNotifications->count() }} New</h3>
                                    <span class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list">
                                @foreach ($unreadNotifications as $notification)
                                    @php($notificationType = $notification->data['type'] ?? null)
                                    <a class="d-flex justify-content-between"
                                       @if($notificationType == 'message') href="{{ route('message.index', $notification->id) }}"
                                       @elseif($notificationType == 'booking') href="{{ route('booking.index', $notification->id) }}"
                                       @elseif($notificationType == 'join') href="{{ route('join_teams.index', $notification->id) }}"
                                       @else href="#"
                                       @endif>
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">{{ $notification->data['title'] ?? 'Notification' }}</h6>
                                            </div>
                                            <small>
                                                <time class="media-meta" datetime="{{ $notification->created_at->toIso8601String() }}">{{ $notification->created_at->diffForHumans() }}</time>
                                            </small>
                                        </div>
                                    </a>
                                @endforeach
                            </li>
                            <li class="dropdown-menu-footer">
                                <a class="dropdown-item p-1 text-center" href="{{ route('MarkAsRead_all') }}">Read all notifications</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link doudou-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{ $dashboardUser->username ?? 'Admin' }}</span>
                                <span class="user-status">Active</span>
                            </div>
                            <div class="doudou-user-avatar">
                                {{ strtoupper(substr($dashboardUser->username ?? 'A', 0, 1)) }}
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('edit.profile') }}">
                                <i class="feather icon-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                <i class="feather icon-power"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
