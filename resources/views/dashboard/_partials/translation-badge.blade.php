@php
    $allLocales = $locales ?? ['en', 'zh', 'zh-Hant'];
    $available = [];
    if (isset($translations) && is_iterable($translations)) {
        foreach ($translations as $t) {
            if (!empty($t->{$field ?? 'name'})) {
                $available[] = $t->locale;
            }
        }
    }
    $available = array_unique($available);
    $count = count($available);
    $badgeClass = $count === 3 ? 'success' : ($count >= 1 ? 'warning' : 'danger');
@endphp
<span class="badge badge-{{ $badgeClass }} badge-pill mr-1" title="{{ $count }}/3 locales have content">
    {{ $count }}/3
</span>
@foreach($allLocales as $loc)
    <span class="text-{{ in_array($loc, $available) ? 'success' : 'secondary' }}" style="font-size: 0.75rem;" title="{{ $loc }}">
        {{ in_array($loc, $available) ? '✓' : '✗' }} {{ strtoupper($loc) }}
    </span>
@endforeach
