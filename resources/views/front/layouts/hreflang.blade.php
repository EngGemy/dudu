@php
    $locales = ['en', 'zh', 'zh-Hant'];
@endphp
@foreach ($locales as $locale)
    <link rel="alternate" hreflang="{{ $locale }}" href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($locale) }}" />
@endforeach
    <link rel="alternate" hreflang="x-default" href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL('en') }}" />
