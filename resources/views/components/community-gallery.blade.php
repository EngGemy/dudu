@props(['posts' => collect()])

@php
    $posts = collect($posts);
    $payload = $posts->map(function ($p) {
        return [
            'id' => $p->id,
            'username' => $p->username,
            'avatar_url' => $p->resolved_avatar_url,
            'image_url' => $p->resolved_image_url,
            'instagram_post_url' => $p->instagram_post_url,
            'platform' => $p->platform,
            'caption' => $p->caption,
        ];
    })->values();
    $platformsCount = $posts->pluck('platform')->unique()->count();
@endphp

@if($posts->isEmpty())
@else
<section
    x-data="communityGallery()"
    x-init="init()"
    class="community-v2"
    aria-labelledby="community-heading"
>
    {{-- Decorative blobs / sparkles --}}
    <span class="community-v2__blob community-v2__blob--a" aria-hidden="true"></span>
    <span class="community-v2__blob community-v2__blob--b" aria-hidden="true"></span>
    <span class="community-v2__blob community-v2__blob--c" aria-hidden="true"></span>
    <span class="community-v2__sparkle community-v2__sparkle--1" aria-hidden="true">✦</span>
    <span class="community-v2__sparkle community-v2__sparkle--2" aria-hidden="true">✦</span>
    <span class="community-v2__sparkle community-v2__sparkle--3" aria-hidden="true">✦</span>

    {{-- HERO HEADER --}}
    <div class="container mx-auto px-4 community-v2__header"
         x-show="visible"
         x-transition:enter="transition ease-out duration-700"
         x-transition:enter-start="opacity-0 -translate-y-6"
         x-transition:enter-end="opacity-100 translate-y-0">

        <div class="community-v2__hashtag">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 9h16M4 15h16M10 3 8 21M16 3l-2 18"/></svg>
            <span>#EgyptDoudou</span>
        </div>

        <h2 id="community-heading" class="community-v2__title">
            <span class="community-v2__title-line">{{ __('front.site.community.real_travelers') }}</span>
            <span class="community-v2__title-line community-v2__title-line--accent">
                <em>{{ __('front.site.community.real_moments') }}</em>
                <svg class="community-v2__underline" viewBox="0 0 240 14" preserveAspectRatio="none" aria-hidden="true">
                    <path d="M2 9 C 60 1, 120 1, 238 8" stroke="#f7931e" stroke-width="4" stroke-linecap="round" fill="none"/>
                </svg>
            </span>
        </h2>

        <p class="community-v2__lede">
            {!! __('front.site.community.lede') !!}
        </p>

        <div class="community-v2__stats">
            <div class="community-v2__stat">
                <span class="community-v2__stat-num" data-count="{{ $posts->count() }}">{{ $posts->count() }}</span>
                <span class="community-v2__stat-label">{{ __('front.site.community.stories_shared') }}</span>
            </div>
            <span class="community-v2__stat-sep" aria-hidden="true"></span>
            <div class="community-v2__stat">
                <span class="community-v2__stat-num" data-count="{{ $platformsCount }}">{{ $platformsCount }}</span>
                <span class="community-v2__stat-label">{{ __('front.site.community.platforms') }}</span>
            </div>
            <span class="community-v2__stat-sep" aria-hidden="true"></span>
            <div class="community-v2__stat">
                <span class="community-v2__stat-num">∞</span>
                <span class="community-v2__stat-label">{{ __('front.site.community.memories') }}</span>
            </div>
        </div>

        <div class="community-v2__nav">
            <button type="button" @click="prevSlide()" class="community-v2__nav-btn" aria-label="{{ __('front.site.community.previous') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button type="button" @click="nextSlide()" class="community-v2__nav-btn" aria-label="{{ __('front.site.community.next') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </div>
    </div>

    {{-- CAROUSEL --}}
    <div class="community-v2__viewport"
         @mouseenter="pauseScroll()"
         @mouseleave="resumeScroll()"
         @touchstart.passive="pauseScroll()"
         @touchend.passive="resumeScroll()">
        <div class="community-v2__fade community-v2__fade--left"></div>
        <div class="community-v2__fade community-v2__fade--right"></div>

        <div x-ref="track"
             class="community-v2__track"
             :class="{ 'is-paused': !isScrolling }">
            @foreach($posts->concat($posts) as $loopIndex => $post)
                @php
                    $isClone = $loopIndex >= $posts->count();
                    $tilt = ($loopIndex % 4 === 0) ? -2 : (($loopIndex % 4 === 1) ? 1.5 : (($loopIndex % 4 === 2) ? -1 : 2));
                @endphp
                <button type="button"
                        @if(! $isClone)
                            x-show="visible"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-10"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            :style="'transition-delay: {{ ($loopIndex % $posts->count()) * 70 }}ms; --tilt: {{ $tilt }}deg;'"
                        @else
                            aria-hidden="true"
                            tabindex="-1"
                            style="--tilt: {{ $tilt }}deg;"
                        @endif
                        @click="openModal({{ $post->id }})"
                        class="community-v2__card group">
                    <span class="community-v2__pin" aria-hidden="true"></span>
                    <div class="community-v2__media">
                        <img src="{{ $post->resolved_image_url }}"
                             alt="{{ $post->username }}"
                             loading="lazy"
                             class="community-v2__img"/>
                        <span class="community-v2__platform">
                            @switch($post->platform)
                                @case('instagram')
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="#E1306C"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 3.3.1 4.8 1.7 4.9 4.9.1 1.3.1 1.6.1 4.8 0 3.2 0 3.6-.1 4.8-.1 3.2-1.7 4.8-4.9 4.9-1.3.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-3.3-.2-4.8-1.7-4.9-4.9-.1-1.3-.1-1.6-.1-4.8 0-3.2 0-3.6.1-4.8.1-3.2 1.7-4.8 4.9-4.9 1.2-.1 1.6-.1 4.8-.1zm0 5.6a4.2 4.2 0 1 0 0 8.4 4.2 4.2 0 0 0 0-8.4zm6.4-1.7a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM12 14.6a2.6 2.6 0 1 1 0-5.2 2.6 2.6 0 0 1 0 5.2z"/></svg>
                                    @break
                                @case('tiktok')
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="#000"><path d="M19.6 6.7a4.8 4.8 0 0 1-3.8-4.3V2h-3.4v13.7a2.9 2.9 0 1 1-2.9-2.9c.3 0 .5 0 .8.1V9.4a6.3 6.3 0 1 0 5.6 6.3V8.7a8.2 8.2 0 0 0 4.8 1.5V6.8a4.9 4.9 0 0 1-1.1-.1z"/></svg>
                                    @break
                                @case('twitter')
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="#1DA1F2"><path d="M24 4.6a10 10 0 0 1-2.8.8 4.9 4.9 0 0 0 2.2-2.7 9.8 9.8 0 0 1-3.1 1.2 4.9 4.9 0 0 0-8.4 4.5A14 14 0 0 1 1.6 3.2a4.8 4.8 0 0 0 1.5 6.6 4.9 4.9 0 0 1-2.2-.6v.1a4.9 4.9 0 0 0 4 4.8 4.9 4.9 0 0 1-2.2.1 4.9 4.9 0 0 0 4.6 3.4A9.9 9.9 0 0 1 0 19.5 14 14 0 0 0 7.6 22c9 0 14-7.5 14-14v-.6A10 10 0 0 0 24 4.6z"/></svg>
                                    @break
                                @default
                                    <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#0071bd" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 0 20 15.3 15.3 0 0 1 0-20z"/></svg>
                            @endswitch
                        </span>
                        <span class="community-v2__view-hint">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h6v6M14 10l6.1-6.1M9 21H3v-6M10 14l-6.1 6.1"/></svg>
                            {{ __('front.site.community.view') }}
                        </span>
                    </div>
                    <div class="community-v2__meta">
                        @if($post->resolved_avatar_url)
                            <img src="{{ $post->resolved_avatar_url }}" alt="{{ $post->username }}" class="community-v2__avatar" loading="lazy"/>
                        @else
                            <span class="community-v2__avatar community-v2__avatar--initial">{{ strtoupper(substr(ltrim($post->username, '@'), 0, 1)) }}</span>
                        @endif
                        <span class="community-v2__username">{{ $post->username }}</span>
                        <span class="community-v2__heart" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 21s-7-4.5-9.5-9C.7 8.5 3 4 7 4c2 0 3.5 1 5 2.7C13.5 5 15 4 17 4c4 0 6.3 4.5 4.5 8-2.5 4.5-9.5 9-9.5 9z"/></svg>
                        </span>
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    {{-- LIGHTBOX MODAL --}}
    <div x-show="modalOpen"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="community-v2__modal"
         @click.self="closeModal()"
         @keydown.escape.window="closeModal()"
         @keydown.arrow-left.window="prevPost()"
         @keydown.arrow-right.window="nextPost()">
        <div class="community-v2__modal-backdrop"></div>

        <div x-show="modalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="community-v2__modal-panel">
            <button type="button" @click="closeModal()" class="community-v2__modal-close" aria-label="{{ __('front.site.community.close') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>

            <div class="community-v2__modal-media">
                <img :src="activePost.image_url" :alt="activePost.username" x-show="activePost.image_url"/>
            </div>

            <div class="community-v2__modal-body">
                <div class="community-v2__modal-user">
                    <template x-if="activePost.avatar_url">
                        <img :src="activePost.avatar_url" :alt="activePost.username" class="community-v2__modal-avatar"/>
                    </template>
                    <template x-if="!activePost.avatar_url">
                        <span class="community-v2__modal-avatar community-v2__modal-avatar--initial"
                              x-text="(activePost.username || 'U').replace('@','').charAt(0).toUpperCase()"></span>
                    </template>
                    <div>
                        <p class="community-v2__modal-username" x-text="activePost.username"></p>
                        <p class="community-v2__modal-platform" x-text="activePost.platform"></p>
                    </div>
                </div>

                <p class="community-v2__modal-caption" x-show="activePost.caption" x-text="activePost.caption"></p>

                <div class="community-v2__modal-divider"></div>

                <div class="community-v2__modal-actions">
                    <template x-if="activePost.instagram_post_url">
                        <a :href="activePost.instagram_post_url" target="_blank" rel="noopener noreferrer" class="community-v2__cta community-v2__cta--instagram">
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="white"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 3.3.1 4.8 1.7 4.9 4.9.1 1.3.1 1.6.1 4.8 0 3.2 0 3.6-.1 4.8-.1 3.2-1.7 4.8-4.9 4.9-1.3.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-3.3-.2-4.8-1.7-4.9-4.9-.1-1.3-.1-1.6-.1-4.8 0-3.2 0-3.6.1-4.8.1-3.2 1.7-4.8 4.9-4.9 1.2-.1 1.6-.1 4.8-.1zm0 5.6a4.2 4.2 0 1 0 0 8.4 4.2 4.2 0 0 0 0-8.4zm6.4-1.7a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM12 14.6a2.6 2.6 0 1 1 0-5.2 2.6 2.6 0 0 1 0 5.2z"/></svg>
                            {{ __('front.site.community.view_on_instagram') }}
                        </a>
                    </template>
                    <button type="button" @click="sharePost()" class="community-v2__cta community-v2__cta--ghost">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.6 13.5 6.8 4M15.4 6.5l-6.8 4"/></svg>
                        {{ __('front.site.community.share') }}
                    </button>
                </div>

                <div class="community-v2__modal-nav">
                    <button type="button" @click="prevPost()" class="community-v2__modal-nav-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                        {{ __('front.site.community.previous') }}
                    </button>
                    <span class="community-v2__modal-counter" x-text="`${activeIndex + 1} / ${posts.length}`"></span>
                    <button type="button" @click="nextPost()" class="community-v2__modal-nav-btn">
                        {{ __('front.site.community.next') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Section background — multi-layer gradient with depth */
        .community-v2 {
            position: relative;
            overflow: hidden;
            padding: 96px 0 120px;
            background:
                radial-gradient(circle at 12% 18%, rgba(247,147,30,.18), transparent 38%),
                radial-gradient(circle at 88% 78%, rgba(255,255,255,.10), transparent 40%),
                linear-gradient(135deg, #003e69 0%, #005690 38%, #0071bd 70%, #1a8fd6 100%);
            color: #fff;
            isolation: isolate;
        }
        .community-v2::before {
            content: ""; position: absolute; inset: 0; pointer-events: none;
            background-image: radial-gradient(rgba(255,255,255,.07) 1px, transparent 1px);
            background-size: 24px 24px;
            mask-image: radial-gradient(ellipse at center, #000 30%, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at center, #000 30%, transparent 80%);
            opacity: .6;
            z-index: 0;
        }

        /* Decorative blobs */
        .community-v2__blob {
            position: absolute; border-radius: 50%; filter: blur(60px); opacity: .42;
            pointer-events: none; z-index: 0;
        }
        .community-v2__blob--a { width: 320px; height: 320px; background: #f7931e; top: -80px; left: -80px; animation: blobFloatA 14s ease-in-out infinite; }
        .community-v2__blob--b { width: 380px; height: 380px; background: #00a3ff; bottom: -120px; right: -120px; opacity: .35; animation: blobFloatB 18s ease-in-out infinite; }
        .community-v2__blob--c { width: 220px; height: 220px; background: #ff6b9d; top: 35%; right: 22%; opacity: .22; animation: blobFloatA 22s ease-in-out infinite reverse; }
        @keyframes blobFloatA { 0%,100% { transform: translate(0,0) scale(1); } 50% { transform: translate(30px,40px) scale(1.08); } }
        @keyframes blobFloatB { 0%,100% { transform: translate(0,0) scale(1); } 50% { transform: translate(-40px,-30px) scale(1.05); } }

        /* Sparkles */
        .community-v2__sparkle { position: absolute; color: #f7931e; font-size: 18px; opacity: .8; z-index: 1; pointer-events: none; animation: sparkleTwinkle 3s ease-in-out infinite; text-shadow: 0 0 12px rgba(247,147,30,.6); }
        .community-v2__sparkle--1 { top: 12%; right: 18%; font-size: 22px; animation-delay: 0s; }
        .community-v2__sparkle--2 { top: 70%; left: 10%; font-size: 14px; animation-delay: 1s; color: #fff; text-shadow: 0 0 12px rgba(255,255,255,.7); }
        .community-v2__sparkle--3 { top: 28%; left: 8%; font-size: 16px; animation-delay: 2s; color: #ffd700; text-shadow: 0 0 12px rgba(255,215,0,.6); }
        @keyframes sparkleTwinkle { 0%,100% { opacity: .35; transform: scale(0.8) rotate(0deg); } 50% { opacity: 1; transform: scale(1.2) rotate(180deg); } }

        /* HEADER */
        .community-v2__header { position: relative; z-index: 2; text-align: center; margin-bottom: 56px; max-width: 800px; }
        .community-v2__hashtag {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 7px 16px; border-radius: 999px;
            background: rgba(247,147,30,.18); border: 1px solid rgba(247,147,30,.45);
            color: #ffd9a8; font-size: 13px; font-weight: 700; letter-spacing: .04em;
            margin-bottom: 22px;
            backdrop-filter: blur(6px);
        }
        .community-v2__title {
            margin: 0 0 18px; padding: 0;
            font-size: clamp(36px, 5.5vw, 64px);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -.02em;
            color: #fff;
        }
        .community-v2__title-line { display: block; }
        .community-v2__title-line--accent { position: relative; display: inline-block; margin-top: 4px; }
        .community-v2__title-line--accent em { font-style: italic; font-weight: 800; background: linear-gradient(135deg, #fff 0%, #ffd9a8 60%, #f7931e 100%); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .community-v2__underline { position: absolute; left: 50%; bottom: -8px; transform: translateX(-50%); width: 84%; height: 14px; pointer-events: none; }

        .community-v2__lede { font-size: 16px; line-height: 1.7; color: rgba(255,255,255,.82); max-width: 580px; margin: 0 auto 28px; }
        .community-v2__lede strong { color: #ffd9a8; font-weight: 700; }

        .community-v2__stats { display: inline-flex; align-items: center; gap: 18px; padding: 14px 24px; border-radius: 999px; background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.15); backdrop-filter: blur(8px); }
        .community-v2__stat { display: flex; flex-direction: column; align-items: center; min-width: 70px; }
        .community-v2__stat-num { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
        .community-v2__stat-label { font-size: 10.5px; font-weight: 600; color: rgba(255,255,255,.7); text-transform: uppercase; letter-spacing: .12em; margin-top: 4px; }
        .community-v2__stat-sep { width: 1px; height: 26px; background: rgba(255,255,255,.2); }

        .community-v2__nav { display: none; gap: 10px; justify-content: center; margin-top: 28px; }
        @media (min-width: 1024px) { .community-v2__nav { display: inline-flex; } }
        .community-v2__nav-btn {
            display: inline-flex; align-items: center; justify-content: center;
            width: 46px; height: 46px; border-radius: 999px;
            background: rgba(255,255,255,.10); border: 1px solid rgba(255,255,255,.22);
            color: #fff; cursor: pointer;
            transition: all .25s ease;
        }
        .community-v2__nav-btn:hover { background: #f7931e; border-color: #f7931e; transform: scale(1.08); box-shadow: 0 8px 22px rgba(247,147,30,.42); }

        /* CAROUSEL VIEWPORT */
        .community-v2__viewport { position: relative; overflow: hidden; padding: 24px 0 32px; z-index: 2; }
        .community-v2__fade { position: absolute; top: 0; bottom: 0; width: 110px; z-index: 4; pointer-events: none; }
        .community-v2__fade--left { left: 0; background: linear-gradient(to right, #003e69, transparent); }
        .community-v2__fade--right { right: 0; background: linear-gradient(to left, #003e69, transparent); }

        .community-v2__track {
            display: flex; gap: 28px; padding: 30px 48px;
            width: max-content;
            animation: communityV2Scroll 55s linear infinite;
            will-change: transform;
        }
        .community-v2__track.is-paused { animation-play-state: paused; }

        /* POLAROID CARD */
        .community-v2__card {
            position: relative; flex: 0 0 240px; width: 240px;
            background: #fff; border-radius: 6px; overflow: visible; cursor: pointer;
            padding: 12px 12px 0;
            box-shadow:
                0 18px 40px rgba(0, 30, 56, .35),
                0 4px 10px rgba(0, 30, 56, .15);
            transform: rotate(var(--tilt, 0deg)) translateZ(0);
            transition: transform .35s cubic-bezier(.2,.8,.2,1), box-shadow .35s ease;
            text-align: left; border: 0;
        }
        .community-v2__card:hover {
            transform: rotate(0deg) translateY(-12px) scale(1.04);
            box-shadow:
                0 28px 60px rgba(0, 30, 56, .45),
                0 8px 18px rgba(0, 30, 56, .25),
                0 0 0 3px rgba(247,147,30,.6);
            z-index: 3;
        }
        .community-v2__card:focus-visible { outline: 3px solid #f7931e; outline-offset: 4px; }

        /* Pin/sticker on top of polaroid */
        .community-v2__pin {
            position: absolute; top: -10px; left: 50%; transform: translateX(-50%);
            width: 56px; height: 14px;
            background: linear-gradient(180deg, rgba(247,147,30,.85), rgba(247,147,30,.55));
            border-radius: 2px;
            box-shadow: 0 2px 6px rgba(0,0,0,.25);
            z-index: 5;
        }
        .community-v2__pin::before, .community-v2__pin::after {
            content: ""; position: absolute; top: 50%; transform: translateY(-50%);
            width: 6px; height: 6px; border-radius: 50%;
            background: rgba(0,0,0,.25);
        }
        .community-v2__pin::before { left: 6px; }
        .community-v2__pin::after { right: 6px; }

        .community-v2__media { position: relative; aspect-ratio: 4 / 5; overflow: hidden; background: #f3f4f6; border-radius: 3px; }
        .community-v2__img { width: 100%; height: 100%; object-fit: cover; transition: transform .8s cubic-bezier(.2,.8,.2,1); display: block; }
        .community-v2__card:hover .community-v2__img { transform: scale(1.10); }

        .community-v2__platform {
            position: absolute; top: 10px; right: 10px; z-index: 2;
            display: inline-flex; align-items: center; justify-content: center;
            width: 30px; height: 30px; border-radius: 999px;
            background: rgba(255,255,255,.96); box-shadow: 0 4px 14px rgba(0,0,0,.25);
            backdrop-filter: blur(4px);
        }

        .community-v2__view-hint {
            position: absolute; bottom: 10px; left: 10px; z-index: 2;
            display: inline-flex; align-items: center; gap: 5px;
            padding: 6px 11px; border-radius: 999px;
            background: rgba(0, 0, 0, .55); color: #fff;
            font-size: 11px; font-weight: 700; letter-spacing: .04em;
            opacity: 0; transform: translateY(8px);
            transition: opacity .25s ease, transform .25s ease;
            backdrop-filter: blur(4px);
        }
        .community-v2__card:hover .community-v2__view-hint { opacity: 1; transform: translateY(0); }

        .community-v2__meta { position: relative; display: flex; align-items: center; gap: 9px; padding: 12px 4px 14px; }
        .community-v2__avatar {
            width: 30px; height: 30px; border-radius: 999px; object-fit: cover; flex: none;
            box-shadow: 0 0 0 2px #fff, 0 0 0 3px rgba(247,147,30,.4);
        }
        .community-v2__avatar--initial {
            display: inline-flex; align-items: center; justify-content: center;
            background: linear-gradient(135deg, #0071bd, #f7931e); color: #fff; font-weight: 700; font-size: 12px;
        }
        .community-v2__username { font-size: 13px; font-weight: 700; color: #1f2937; flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-family: 'Caveat', 'Patrick Hand', cursive, system-ui; letter-spacing: .02em; }
        .community-v2__heart { color: #ef4444; opacity: .55; transition: opacity .25s, transform .25s; }
        .community-v2__card:hover .community-v2__heart { opacity: 1; transform: scale(1.18); animation: heartPulse 1.4s ease-in-out infinite; }
        @keyframes heartPulse { 0%,100% { transform: scale(1.1); } 50% { transform: scale(1.28); } }

        @keyframes communityV2Scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* MODAL */
        .community-v2__modal { position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; padding: 16px; }
        .community-v2__modal-backdrop { position: absolute; inset: 0; background: rgba(8, 24, 38, .8); backdrop-filter: blur(8px); }
        .community-v2__modal-panel {
            position: relative; z-index: 1;
            display: flex; flex-direction: column;
            background: #fff; border-radius: 24px; overflow: hidden;
            width: min(960px, 100%); max-height: 92vh;
            box-shadow: 0 50px 120px rgba(0, 30, 56, .6);
        }
        @media (min-width: 768px) { .community-v2__modal-panel { flex-direction: row; } }
        .community-v2__modal-close {
            position: absolute; top: 14px; right: 14px; z-index: 4;
            display: inline-flex; align-items: center; justify-content: center;
            width: 38px; height: 38px; border-radius: 999px;
            background: rgba(255,255,255,.96); color: #1f2937; border: 0;
            box-shadow: 0 6px 16px rgba(0,0,0,.2); transition: transform .2s, background .2s;
        }
        .community-v2__modal-close:hover { transform: scale(1.1); background: #f7931e; color: #fff; }
        .community-v2__modal-media { flex: 1 1 50%; background: #000; display: flex; align-items: center; justify-content: center; min-height: 280px; }
        .community-v2__modal-media img { width: 100%; height: 100%; object-fit: cover; max-height: 84vh; }
        .community-v2__modal-body { flex: 1 1 50%; display: flex; flex-direction: column; gap: 16px; padding: 30px; }
        .community-v2__modal-user { display: flex; align-items: center; gap: 12px; }
        .community-v2__modal-avatar { width: 48px; height: 48px; border-radius: 999px; object-fit: cover; box-shadow: inset 0 0 0 2px #fff, 0 0 0 1px rgba(0,0,0,.08); }
        .community-v2__modal-avatar--initial { display: inline-flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #0071bd, #f7931e); color: #fff; font-weight: 700; }
        .community-v2__modal-username { font-size: 15px; font-weight: 800; color: #0d2230; }
        .community-v2__modal-platform { font-size: 12px; color: #9ca3af; text-transform: capitalize; }
        .community-v2__modal-caption { font-size: 15px; color: #4b5563; line-height: 1.65; }
        .community-v2__modal-divider { border-top: 1px solid #e5e7eb; }
        .community-v2__modal-actions { display: flex; flex-direction: column; gap: 10px; }
        .community-v2__cta { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 13px 16px; border-radius: 14px; font-size: 14px; font-weight: 700; cursor: pointer; border: 0; transition: transform .2s, box-shadow .2s, background .2s; text-decoration: none; }
        .community-v2__cta--instagram { background: linear-gradient(135deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); color: #fff; box-shadow: 0 10px 24px rgba(220, 39, 67, .3); }
        .community-v2__cta--instagram:hover { transform: translateY(-2px) scale(1.01); box-shadow: 0 16px 30px rgba(220, 39, 67, .45); }
        .community-v2__cta--ghost { background: #fff; color: #4b5563; border: 1.5px solid #e5e7eb; }
        .community-v2__cta--ghost:hover { background: #f9fafb; border-color: #d1d5db; }
        .community-v2__modal-nav { display: flex; align-items: center; justify-content: space-between; padding-top: 4px; }
        .community-v2__modal-nav-btn { display: inline-flex; align-items: center; gap: 6px; font-size: 12px; color: #6b7280; background: none; border: 0; cursor: pointer; transition: color .2s; }
        .community-v2__modal-nav-btn:hover { color: #0071bd; }
        .community-v2__modal-counter { font-size: 12px; color: #9ca3af; font-weight: 700; }

        @media (max-width: 640px) {
            .community-v2 { padding: 64px 0 80px; }
            .community-v2__header { margin-bottom: 36px; }
            .community-v2__stats { gap: 12px; padding: 10px 16px; }
            .community-v2__card { flex-basis: 200px; width: 200px; }
        }

        [x-cloak] { display: none !important; }
    </style>

    <script>
    (function () {
        if (window.__communityGalleryRegistered) return;
        window.__communityGalleryRegistered = true;
        window.communityGallery = function () {
            return {
                visible: false,
                isScrolling: true,
                modalOpen: false,
                activePost: {},
                activeIndex: 0,
                posts: @json($payload),

                init() {
                    if ('IntersectionObserver' in window) {
                        const obs = new IntersectionObserver((entries) => {
                            if (entries[0].isIntersecting) { this.visible = true; obs.disconnect(); }
                        }, { threshold: 0.15 });
                        obs.observe(this.$el);
                    } else {
                        this.visible = true;
                    }
                },
                openModal(id) {
                    const idx = this.posts.findIndex(p => p.id === id);
                    if (idx === -1) return;
                    this.activeIndex = idx;
                    this.activePost = this.posts[idx];
                    this.modalOpen = true;
                    this.pauseScroll();
                    document.body.style.overflow = 'hidden';
                },
                closeModal() {
                    this.modalOpen = false;
                    this.resumeScroll();
                    document.body.style.overflow = '';
                },
                nextPost() {
                    this.activeIndex = (this.activeIndex + 1) % this.posts.length;
                    this.activePost = this.posts[this.activeIndex];
                },
                prevPost() {
                    this.activeIndex = (this.activeIndex - 1 + this.posts.length) % this.posts.length;
                    this.activePost = this.posts[this.activeIndex];
                },
                pauseScroll() { this.isScrolling = false; },
                resumeScroll() { if (!this.modalOpen) this.isScrolling = true; },
                nextSlide() {
                    const track = this.$refs.track;
                    if (track) track.scrollBy({ left: 280, behavior: 'smooth' });
                },
                prevSlide() {
                    const track = this.$refs.track;
                    if (track) track.scrollBy({ left: -280, behavior: 'smooth' });
                },
                async sharePost() {
                    const url = this.activePost.instagram_post_url || window.location.href;
                    if (navigator.share) {
                        try { await navigator.share({ title: `Check out ${this.activePost.username} on Doudou Travel`, url }); } catch (e) {}
                    } else {
                        try { await navigator.clipboard.writeText(url); alert('Link copied to clipboard!'); } catch (e) {}
                    }
                },
            };
        };
    })();
    </script>
</section>
@endif
