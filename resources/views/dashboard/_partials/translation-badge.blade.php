@php
    $allLocales = $locales ?? config('translatable.locales', ['en', 'zh', 'zh-Hant']);
    $available = [];

    if (isset($translations) && is_iterable($translations)) {
        foreach ($translations as $translation) {
            if (! empty($translation->{$field ?? 'name'})) {
                $available[] = $translation->locale;
            }
        }
    }

    $available = array_unique($available);
    $count = count($available);
    $total = count($allLocales);
    $badgeClass = $count === $total ? 'success' : ($count >= 1 ? 'warning' : 'danger');
@endphp

<span class="badge badge-{{ $badgeClass }} badge-pill mr-1" title="{{ $count }}/{{ $total }} locales have content">
    {{ $count }}/{{ $total }}
</span>
@foreach($allLocales as $locale)
    <span class="text-{{ in_array($locale, $available) ? 'success' : 'secondary' }}" style="font-size: 0.75rem;" title="{{ $locale }}">
        {!! in_array($locale, $available) ? '&#10003;' : '&#10007;' !!} {{ strtoupper($locale) }}
    </span>
@endforeach
