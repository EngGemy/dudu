@props([
    'variant' => 'primary',
    'class' => '',
])

@php
    $social = \App\Models\Social_setting::first();

    $normalizeUrl = static function (?string $url): string {
        $url = trim((string) $url);

        if ($url === '') {
            return '';
        }

        if (preg_match('/^(https?:|mailto:|tel:|weixin:|line:)/i', $url)) {
            return $url;
        }

        return 'https://' . ltrim($url, '/');
    };

    $labelFill = $variant === 'white' ? '#0c3d5e' : '#ffffff';

    $items = [
        [
            'name' => 'Instagram',
            'url' => $normalizeUrl($social?->instagram),
            'sprite' => 'instagram',
        ],
        [
            'name' => 'Facebook',
            'url' => $normalizeUrl($social?->facebook),
            'sprite' => 'facebook',
        ],
        [
            'name' => 'YouTube',
            'url' => $normalizeUrl($social?->youtube),
            'sprite' => 'youtube',
        ],
        [
            'name' => 'TikTok',
            'url' => $normalizeUrl($social?->tiktok),
            'custom' => 'tiktok',
        ],
        [
            'name' => 'Douyin',
            'url' => $normalizeUrl($social?->douyin),
            'custom' => 'douyin',
        ],
        [
            'name' => 'Red Book',
            'url' => $normalizeUrl($social?->redbook),
            'custom' => 'redbook',
        ],
    ];
@endphp

<ul {{ $attributes->merge(['class' => trim("social-list {$variant} {$class}")]) }}>
    @foreach($items as $item)
        <li>
            <a
                href="{{ $item['url'] ?: '#' }}"
                aria-label="{{ $item['name'] }}"
                title="{{ $item['name'] }}"
                @if($item['url'] !== '') target="_blank" rel="noopener noreferrer" @endif
            >
                @if(isset($item['sprite']))
                    <svg aria-hidden="true">
                        <use href="{{ asset('assets/images/icons/sprite.svg#'.$item['sprite']) }}"></use>
                    </svg>
                @elseif($item['custom'] === 'tiktok')
                    <svg aria-hidden="true" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M15.2 3c.35 2.4 1.7 3.9 4.05 4.05v3.25a7.1 7.1 0 0 1-4.05-1.22v5.86c0 3.1-2.08 5.06-5.06 5.06-2.86 0-5.14-2.15-5.14-4.9 0-2.95 2.38-5.02 5.52-4.78v3.28c-1.32-.2-2.24.42-2.24 1.48 0 .93.78 1.6 1.78 1.6 1.14 0 1.82-.66 1.82-2.08V3h3.32Z"/>
                    </svg>
                @elseif($item['custom'] === 'douyin')
                    <svg aria-hidden="true" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" fill="currentColor"/>
                        <text x="12" y="15.2" text-anchor="middle" font-size="7" font-weight="800" fill="{{ $labelFill }}">DY</text>
                    </svg>
                @else
                    <svg aria-hidden="true" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="16" rx="4" fill="currentColor"/>
                        <text x="12" y="14.7" text-anchor="middle" font-size="6" font-weight="800" fill="{{ $labelFill }}">RED</text>
                    </svg>
                @endif
            </a>
        </li>
    @endforeach
</ul>
