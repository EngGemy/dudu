@php
    $mobileNavItems = [
        ['route' => 'home', 'label' => __('front.site.nav.home'), 'icon' => 'egyptian-sphinx.png'],
        ['route' => 'egypt-tours', 'label' => __('front.site.sections.egypt_tours'), 'icon' => 'egyptian-sphinx.png'],
        ['route' => 'events', 'label' => __('front.site.footer.events'), 'icon' => 'egyptian-urns.png'],
        ['route' => 'services', 'label' => __('front.site.footer.services'), 'icon' => 'symbols_travel.png'],
        ['route' => 'blogs', 'label' => __('front.site.footer.blogs'), 'icon' => 'egyptian-temple.png'],
        ['route' => 'about', 'label' => __('front.site.nav.about'), 'icon' => 'egyptian-walk.png'],
        ['route' => 'loyalty-program', 'label' => __('front.site.meta.loyalty_program'), 'icon' => 'egyptian-bird.png'],
        ['route' => 'careers', 'label' => __('front.site.footer.careers'), 'icon' => 'egyptian-profile.png'],
        ['route' => 'how-it-works', 'label' => __('front.site.footer.how_it_works'), 'icon' => 'egyptian-pyramids.png'],
        ['route' => 'partner', 'label' => __('front.site.footer.become_partner'), 'icon' => 'deal.png'],
    ];
@endphp

<nav class="space-y-4">
    @foreach($mobileNavItems as $item)
        <a href="{{ route($item['route']) }}" class="flex items-center gap-4 text-white">
            <img src="{{ asset('assets/images/icons/'.$item['icon']) }}" class="size-6" alt="" />
            {{ $item['label'] }}
        </a>
    @endforeach
</nav>
