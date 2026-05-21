@php
    $settings = $settings ?? \App\Models\General_setting::first();
    $seoTitle = trim((string) ($seoTitle ?? $__env->yieldContent('title') ?: __('front.site.meta.default_title')));
    $seoDescription = trim(strip_tags((string) ($seoDescription ?? $settings?->opening_words ?? $seoTitle)));
    $seoDescription = \Illuminate\Support\Str::limit(preg_replace('/\s+/u', ' ', $seoDescription), 160, '');
    $seoImage = $seoImage ?? $settings?->site_logo_header ?? asset('assets/images/logo.png');
    $seoUrl = $seoUrl ?? url()->current();
    $seoType = $seoType ?? 'website';
    $seoRobots = $seoRobots ?? 'index, follow, max-image-preview:large';
    $seoSchema = $seoSchema ?? [
        '@context' => 'https://schema.org',
        '@type' => 'TravelAgency',
        'name' => $settings?->site_name ?? __('front.site.meta.default_title'),
        'url' => url('/'),
        'logo' => $settings?->site_logo_header ?? asset('assets/images/logo.png'),
        'email' => $settings?->email,
        'telephone' => $settings?->manager_phone,
        'address' => $settings?->address,
    ];
    $seoSchema = array_filter($seoSchema);
@endphp

<meta name="description" content="{{ $seoDescription }}">
<meta name="robots" content="{{ $seoRobots }}">
<link rel="canonical" href="{{ $seoUrl }}">

<meta property="og:locale" content="{{ str_replace('-', '_', app()->getLocale()) }}">
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $seoUrl }}">
<meta property="og:site_name" content="{{ $settings?->site_name ?? __('front.site.meta.default_title') }}">
<meta property="og:image" content="{{ $seoImage }}">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

<script type="application/ld+json">
{!! json_encode($seoSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
