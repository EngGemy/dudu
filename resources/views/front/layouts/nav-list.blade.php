@php
    $locale = app()->getLocale();
@endphp

<ul class="navbar_list doudou-main-nav">
    <li>
        <a href="{{ route('home') }}" class="navbar_link"
           @if(request()->routeIs('home')) aria-current="page" @endif>
            {{ __('front.site.nav.home') }}
        </a>
    </li>
    <li>
        <a href="{{ route('about') }}" class="navbar_link"
           @if(request()->routeIs('about')) aria-current="page" @endif>
            {{ __('front.site.nav.about') }}
        </a>
    </li>

    <li class="dd-parent">
        <button type="button" class="navbar_link dd-trigger" aria-expanded="false" aria-haspopup="true">
            {{ __('front.site.nav.dream') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                 class="dd-arrow">
                <path d="m6 9 6 6 6-6"/>
            </svg>
        </button>
        <div class="dd-menu" role="menu">
            <a href="{{ route('egypt-tours') }}" class="dd-item" role="menuitem">
                {{ __('front.site.nav.economy') }}
            </a>
            <a href="{{ route('egypt-tours') }}" class="dd-item" role="menuitem">
                {{ __('front.site.nav.business') }}
            </a>
            <a href="{{ route('egypt-tours') }}" class="dd-item" role="menuitem">
                {{ __('front.site.nav.first') }}
            </a>
        </div>
    </li>

    <li>
        <button type="button" class="navbar_link" data-hs-overlay="#customize-tour">
            {{ __('front.site.nav.customize') }}
        </button>
    </li>
    <li>
        <a href="{{ route('blogs') }}" class="navbar_link"
           @if(request()->routeIs('blogs', 'blog_preview', 'blogs-*')) aria-current="page" @endif>
            {{ __('front.site.nav.blog') }}
        </a>
    </li>
    <li>
        <a href="{{ route('contact') }}" class="navbar_link"
           @if(request()->routeIs('contact')) aria-current="page" @endif>
            {{ __('front.site.nav.contact') }}
        </a>
    </li>
</ul>

<style>
.doudou-main-nav {
    display: flex;
    align-items: stretch;
    justify-content: space-between;
    width: 100%;
    list-style: none;
    margin: 0;
    padding: 0;
    overflow: visible;
}
.doudou-main-nav > li {
    display: flex;
    flex: 1 1 0;
    min-width: 0;
}
.doudou-main-nav .navbar_link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    min-height: 48px;
    padding: 12px 14px;
    white-space: nowrap;
}
.doudou-main-nav .navbar_link:hover,
.doudou-main-nav .navbar_link[aria-current="page"],
.dd-parent.is-open > .dd-trigger {
    background-color: rgb(0 113 189 / 1);
}

.dd-parent {
    position: relative;
    list-style: none;
    z-index: 200;
}
.dd-trigger {
    align-items: center;
    gap: 6px;
    background: none;
    border: none;
    cursor: pointer;
}
.dd-arrow {
    transition: transform .2s ease;
    flex-shrink: 0;
}
.dd-parent:hover .dd-arrow,
.dd-parent:focus-within .dd-arrow,
.dd-parent.is-open .dd-arrow {
    transform: rotate(180deg);
}

.dd-menu {
    position: absolute;
    top: 100%;
    left: 50%;
    z-index: 10050;
    width: max-content;
    min-width: 238px;
    background: #fff;
    border: 1px solid rgba(15, 23, 42, .08);
    border-radius: 14px;
    padding: 8px;
    box-shadow: 0 24px 70px rgba(0,0,0,.2), 0 6px 18px rgba(0,0,0,.10);
    opacity: 0;
    visibility: hidden;
    transform: translate(-50%, 8px) scale(.98);
    transform-origin: top center;
    transition: opacity .22s cubic-bezier(.16,1,.3,1),
                transform .22s cubic-bezier(.16,1,.3,1),
                visibility .22s;
    pointer-events: none;
}
.dd-parent:hover .dd-menu,
.dd-parent:focus-within .dd-menu,
.dd-parent.is-open .dd-menu {
    opacity: 1;
    visibility: visible;
    transform: translate(-50%, 0) scale(1);
    pointer-events: auto;
}

.navbar_nav {
    position: relative;
    z-index: 9001;
    overflow: visible;
}
.navbar_nav .container {
    overflow: visible;
}
.promo-bar {
    position: relative;
    z-index: 1;
}

.dd-item {
    display: flex;
    align-items: center;
    min-height: 44px;
    padding: 10px 18px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    color: #0f172a !important;
    text-decoration: none;
    transition: background .16s ease, color .16s ease, transform .16s ease;
    white-space: nowrap;
}
.dd-item + .dd-item {
    border-top: 1px solid rgba(0,0,0,.05);
}
.dd-item:hover,
.dd-item:focus-visible {
    background: rgba(0,113,189,.10);
    color: #0071bd !important;
    transform: translateX(3px);
    outline: none;
}
@media (max-width: 1023px) {
    .doudou-main-nav {
        display: none;
    }
}
</style>
