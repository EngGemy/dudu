@php
    $locale = app()->getLocale();
@endphp

<ul class="navbar_list" style="display:flex;align-items:center;list-style:none;margin:0;padding:0">
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

    {{-- Dream itineraries — CSS-only hover dropdown (no JS dependency) --}}
    <li class="dd-parent">
        <button type="button" class="navbar_link dd-trigger">
            {{ __('front.site.nav.dream') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"
                 class="dd-arrow">
                <path d="m6 9 6 6 6-6"/>
            </svg>
        </button>
        <div class="dd-menu">
            <a href="{{ route('egypt-tours') }}" class="dd-item">
                {{ __('front.site.nav.economy') }}
            </a>
            <a href="{{ route('egypt-tours') }}" class="dd-item">
                {{ __('front.site.nav.business') }}
            </a>
            <a href="{{ route('egypt-tours') }}" class="dd-item">
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
/* ── CSS-only nav dropdown ─────────────────────────────── */
.dd-parent {
    position: relative;
    list-style: none;
}
.dd-trigger {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
}
.dd-arrow {
    transition: transform .2s ease;
    flex-shrink: 0;
}
.dd-parent:hover .dd-arrow,
.dd-parent:focus-within .dd-arrow {
    transform: rotate(180deg);
}

/* The menu itself */
.dd-menu {
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    z-index: 9999;
    min-width: 190px;
    background: #fff;
    border-radius: 12px;
    padding: 6px;
    box-shadow: 0 20px 60px rgba(0,0,0,.18), 0 4px 12px rgba(0,0,0,.08);
    /* hidden by default */
    opacity: 0;
    visibility: hidden;
    transform: translateY(-8px);
    transition: opacity .22s cubic-bezier(.16,1,.3,1),
                transform .22s cubic-bezier(.16,1,.3,1),
                visibility .22s;
    pointer-events: none;
}

/* Show on hover or keyboard focus */
.dd-parent:hover .dd-menu,
.dd-parent:focus-within .dd-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    pointer-events: auto;
}

.dd-item {
    display: block;
    padding: 11px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    color: #1f2937 !important;
    text-decoration: none;
    transition: background .15s ease, color .15s ease, padding-left .15s ease;
    white-space: nowrap;
}
.dd-item + .dd-item {
    border-top: 1px solid rgba(0,0,0,.05);
}
.dd-item:hover {
    background: rgba(0,113,189,.08);
    color: #0071bd !important;
    padding-left: 22px;
}
.dd-item:first-child { border-radius: 8px 8px 0 0; }
.dd-item:last-child  { border-radius: 0 0 8px 8px; }
.dd-item:only-child  { border-radius: 8px; }
</style>
