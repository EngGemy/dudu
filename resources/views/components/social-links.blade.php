@props([
    'variant' => 'primary',
    'class' => '',
    'showEmpty' => true,
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

    $socialUrl = static fn (string $field): string => $normalizeUrl($social?->getAttribute($field));
    $instagramGradientId = 'instagram-gradient-' . uniqid();

    $items = [
        [
            'name' => 'Instagram',
            'url' => $socialUrl('instagram'),
            'custom' => 'instagram',
        ],
        [
            'name' => 'Facebook',
            'url' => $socialUrl('facebook'),
            'custom' => 'facebook',
        ],
        [
            'name' => 'YouTube',
            'url' => $socialUrl('youtube'),
            'custom' => 'youtube',
        ],
        [
            'name' => 'TikTok + Douyin',
            'url' => $socialUrl('tiktok') ?: $socialUrl('douyin'),
            'custom' => 'tiktok-douyin',
        ],
        [
            'name' => 'Red Book (小红书)',
            'url' => $socialUrl('redbook'),
            'custom' => 'redbook',
        ],
    ];

    $items[4]['name'] = 'Red Book (Xiaohongshu)';
@endphp

<ul {{ $attributes->merge(['class' => trim("social-list {$variant} {$class}")]) }}>
    @foreach($items as $item)
        @continue(! $showEmpty && $item['url'] === '')
        <li>
            <a
                class="social-list__link {{ $item['url'] === '' ? 'is-empty' : '' }}"
                href="{{ $item['url'] !== '' ? $item['url'] : '#' }}"
                aria-label="{{ $item['name'] }}"
                title="{{ $item['name'] }}"
                @if($item['url'] !== '') target="_blank" rel="noopener noreferrer" @endif
            >
                @if(($item['custom'] ?? null) === 'instagram')
                    <svg class="social-list__icon social-list__icon--instagram" aria-hidden="true" viewBox="0 0 32 32">
                        <defs>
                            <radialGradient id="{{ $instagramGradientId }}" cx="30%" cy="107%" r="120%">
                                <stop offset="0" stop-color="#fdf497"/>
                                <stop offset=".08" stop-color="#fdf497"/>
                                <stop offset=".35" stop-color="#fd5949"/>
                                <stop offset=".62" stop-color="#d6249f"/>
                                <stop offset="1" stop-color="#285aeb"/>
                            </radialGradient>
                        </defs>
                        <rect x="3" y="3" width="26" height="26" rx="8" fill="url(#{{ $instagramGradientId }})"/>
                        <rect x="9.4" y="9.4" width="13.2" height="13.2" rx="4.2" fill="none" stroke="#fff" stroke-width="2"/>
                        <circle cx="16" cy="16" r="3.5" fill="none" stroke="#fff" stroke-width="2"/>
                        <circle cx="21.2" cy="10.8" r="1.25" fill="#fff"/>
                    </svg>
                @elseif(($item['custom'] ?? null) === 'facebook')
                    <svg class="social-list__icon social-list__icon--facebook" aria-hidden="true" viewBox="0 0 32 32">
                        <circle cx="16" cy="16" r="14" fill="#1877f2"/>
                        <path d="M17.9 24.5v-7.6h2.6l.4-3h-3v-1.9c0-.9.3-1.5 1.6-1.5h1.6V7.9c-.8-.1-1.6-.2-2.4-.2-2.4 0-4.1 1.5-4.1 4.2v2.1h-2.7v3h2.7v7.6h3.3Z" fill="#fff"/>
                    </svg>
                @elseif(($item['custom'] ?? null) === 'youtube')
                    <svg class="social-list__icon social-list__icon--youtube" aria-hidden="true" viewBox="0 0 32 32">
                        <rect x="3" y="7.5" width="26" height="17" rx="5.2" fill="#ff0000"/>
                        <path d="M13.6 11.8v8.4l7.2-4.2-7.2-4.2Z" fill="#fff"/>
                    </svg>
                @elseif(($item['custom'] ?? null) === 'tiktok-douyin')
                    <svg class="social-list__icon social-list__icon--tiktok-douyin" aria-hidden="true" viewBox="0 0 32 32">
                        <rect x="2.5" y="2.5" width="27" height="27" rx="8" fill="#111"/>
                        <path d="M19.7 7.1c.8 2.4 2.4 4 4.8 4.3v4.2a8.4 8.4 0 0 1-4.6-1.4v6.3A6.5 6.5 0 1 1 13.4 14c.4 0 .8 0 1.1.1v4.3a2.4 2.4 0 1 0 1.4 2.1V7.1h3.8Z" fill="#25f4ee" opacity=".9"/>
                        <path d="M21.2 7.1c.8 2.1 2.4 3.5 4.3 3.9v4.1a8.7 8.7 0 0 1-4.6-1.3v6.7a6.5 6.5 0 1 1-6.5-6.5h.7v4.2a2.4 2.4 0 1 0 1.4 2.3V7.1h4.7Z" fill="#ff2d55"/>
                        <path d="M20.4 7.1c.8 2.1 2.4 3.5 4.3 3.9v2.1a8.5 8.5 0 0 1-4.6-1.3v6.9a6.5 6.5 0 1 1-6.5-6.5h.7v2.2h-.7a4.3 4.3 0 1 0 4.3 4.3V7.1h2.5Z" fill="#fff"/>
                        <circle cx="24.3" cy="23.9" r="4.2" fill="#fff"/>
                        <path d="M22.2 24.1c1.3-1.8 2.9-2.5 4.7-2.1-.4 1.9-1.7 3.2-3.8 3.9l-.9-1.8Z" fill="#111"/>
                    </svg>
                @else
                    <svg class="social-list__icon social-list__icon--redbook" aria-hidden="true" viewBox="0 0 32 32">
                        <rect x="3" y="5" width="26" height="22" rx="7" fill="#ff2442"/>
                        <path d="M9.2 12.2h13.6M8.8 16h14.4M10.5 19.8h11" stroke="#fff" stroke-width="2.2" stroke-linecap="round"/>
                        <circle cx="10.3" cy="9.9" r="1.3" fill="#fff"/>
                        <circle cx="21.7" cy="9.9" r="1.3" fill="#fff"/>
                        <path d="M11.5 23.1c2.8 1.4 6.2 1.4 9 0" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                    </svg>
                @endif
            </a>
        </li>
    @endforeach
</ul>
