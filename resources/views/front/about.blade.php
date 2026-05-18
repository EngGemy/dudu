@extends('front.layouts.app')

@php
    $aboutMetaTitle = $who_we_are?->meta_title ?: __('front.site.meta.about');
    $aboutMetaDescription = $who_we_are?->meta_description ?: strip_tags((string) ($who_we_are?->description ?? __('front.site.about.hero_description')));
    $aboutHeroImage = $header?->image_url ?: ($who_we_are?->image_url ?? asset('assets/images/about-bg.jpeg'));
    $settings = \App\Models\General_setting::first();
@endphp

@section('title', $aboutMetaTitle)

@section('style')
    <style>
        .about-page{background:#fff;color:#0d2230;overflow:hidden}
        .about-hero{position:relative;min-height:620px;display:flex;align-items:flex-end;background:center/cover no-repeat;isolation:isolate}
        .about-hero:before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,rgba(5,22,36,.72),rgba(5,22,36,.32) 48%,rgba(5,22,36,.08));z-index:-1}
        .about-hero__content{width:min(1180px,calc(100% - 32px));margin:0 auto;padding:150px 0 90px;color:#fff}
        .about-kicker{display:inline-flex;align-items:center;gap:10px;padding:8px 14px;border:1px solid rgba(255,255,255,.34);border-radius:999px;background:rgba(255,255,255,.12);backdrop-filter:blur(12px);font-weight:700}
        .about-kicker:before{content:"";width:9px;height:9px;border-radius:50%;background:#f7931e;box-shadow:0 0 0 6px rgba(247,147,30,.22)}
        .about-hero h1{max-width:760px;margin:24px 0 18px;font-size:clamp(42px,6vw,82px);line-height:1.02;font-weight:900;text-shadow:0 12px 34px rgba(0,0,0,.26)}
        .about-hero p{max-width:760px;font-size:clamp(18px,2vw,25px);line-height:1.65;color:rgba(255,255,255,.92)}
        .about-section{width:min(1180px,calc(100% - 32px));margin:0 auto;padding:86px 0}
        .about-grid{display:grid;grid-template-columns:minmax(0,1fr) minmax(330px,.78fr);gap:48px;align-items:center}
        .about-grid.reverse{grid-template-columns:minmax(330px,.78fr) minmax(0,1fr)}
        .about-eyebrow{color:#f7931e;font-size:15px;font-weight:900;text-transform:uppercase;letter-spacing:.08em}
        .about-title{margin:10px 0 18px;font-size:clamp(32px,4.2vw,58px);line-height:1.08;font-weight:900;color:#0071bd}
        .about-copy{font-size:18px;line-height:1.85;color:#4b5563}
        .about-copy p+p{margin-top:12px}
        .about-media{position:relative;min-height:410px;border-radius:8px;overflow:hidden;box-shadow:0 28px 70px rgba(0,55,100,.18)}
        .about-media img{width:100%;height:100%;min-height:410px;object-fit:cover;display:block;transition:transform .7s ease}
        .about-media:hover img{transform:scale(1.05)}
        .about-cards{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px}
        .about-card{border:1px solid rgba(0,113,189,.12);border-radius:8px;background:#fff;padding:24px;box-shadow:0 16px 36px rgba(0,40,70,.08);transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease}
        .about-card:hover{transform:translateY(-7px);box-shadow:0 24px 48px rgba(0,40,70,.14);border-color:rgba(247,147,30,.45)}
        .about-card img,.about-card svg{width:44px;height:44px;object-fit:contain;margin-bottom:18px;color:#f7931e}
        .about-card h3{font-size:20px;font-weight:900;color:#0d2230;margin-bottom:9px}
        .about-card p{font-size:15px;line-height:1.7;color:#667085}
        .about-band{background:#f7931e;color:#fff}
        .about-band .about-section{padding:78px 0}
        .about-band .about-title{color:#fff}
        .about-band .about-copy{color:rgba(255,255,255,.92)}
        .about-video{display:grid;grid-template-columns:minmax(0,.75fr) minmax(0,1fr);gap:34px;align-items:center}
        .about-video__thumb{position:relative;border-radius:8px;overflow:hidden;box-shadow:0 28px 70px rgba(0,40,70,.18);aspect-ratio:16/10;background:#d7e7ef}
        .about-video__thumb img{width:100%;height:100%;object-fit:cover;display:block}
        .about-video__play{position:absolute;inset:auto auto 22px 22px;width:64px;height:64px;border-radius:50%;background:#f7931e;color:#fff;display:grid;place-items:center;box-shadow:0 16px 35px rgba(0,0,0,.22)}
        .about-faq{display:grid;grid-template-columns:.72fr 1fr;gap:40px;align-items:start}
        .about-faq details{border:1px solid rgba(0,113,189,.12);border-radius:8px;padding:18px 20px;background:#fff;box-shadow:0 12px 28px rgba(0,40,70,.06)}
        .about-faq details+details{margin-top:12px}
        .about-faq summary{cursor:pointer;font-weight:900;color:#0071bd}
        .about-faq details div{margin-top:12px;color:#667085;line-height:1.75}
        .about-contact{display:grid;grid-template-columns:.8fr 1.2fr;gap:36px;align-items:start}
        .about-contact__panel{border:1px solid rgba(0,113,189,.13);border-radius:8px;padding:28px;background:#fff;box-shadow:0 18px 44px rgba(0,40,70,.08)}
        .about-form{display:grid;grid-template-columns:1fr 1fr;gap:16px}
        .about-form label{display:grid;gap:7px;font-weight:800;color:#0071bd}
        .about-form input,.about-form textarea,.about-form select{width:100%;border:1px solid rgba(0,113,189,.35);border-radius:8px;padding:13px 14px;color:#0d2230;outline:none}
        .about-form textarea{grid-column:1/-1;min-height:130px;resize:vertical}
        .about-form button{grid-column:1/-1;justify-self:end;border:0;border-radius:8px;background:#0071bd;color:#fff;padding:14px 34px;font-weight:900;transition:transform .2s ease,background .2s ease}
        .about-form button:hover{background:#f7931e;transform:translateY(-2px)}
        .about-reveal{opacity:0;transform:translateY(26px);transition:opacity .65s ease,transform .65s ease}
        .about-reveal.is-visible{opacity:1;transform:translateY(0)}
        @media (max-width:1000px){
            .about-grid,.about-grid.reverse,.about-video,.about-faq,.about-contact{grid-template-columns:1fr}
            .about-cards{grid-template-columns:repeat(2,minmax(0,1fr))}
            .about-hero{min-height:560px}
        }
        @media (max-width:640px){
            .about-cards,.about-form{grid-template-columns:1fr}
            .about-hero__content{padding:130px 0 60px}
            .about-section{padding:62px 0}
        }
    </style>
@endsection

@section('content')
    <main class="about-page">
        <section class="about-hero" style="background-image:url('{{ $aboutHeroImage }}')">
            <div class="about-hero__content about-reveal">
                <span class="about-kicker">{{ __('front.site.meta.about') }}</span>
                <h1>{{ $header?->title ?: __('front.site.about.hero_title') }}</h1>
                <p>{!! strip_tags($header?->description ?: __('front.site.about.hero_description')) !!}</p>
            </div>
        </section>

        <section class="about-section about-grid">
            <div class="about-reveal">
                <span class="about-eyebrow">{{ __('front.site.about.who_we_are_title') }}</span>
                <h2 class="about-title">{{ $who_we_are?->title ?: __('front.site.about.who_we_are_title') }}</h2>
                <div class="about-copy">{!! $who_we_are?->description ?: __('front.site.about.who_we_are_description') !!}</div>
            </div>
            <div class="about-media about-reveal">
                <img src="{{ $who_we_are?->image_url ?? asset('assets/images/careers.jpeg') }}" alt="{{ $who_we_are?->title ?: __('front.site.about.who_we_are_title') }}">
            </div>
        </section>

        <section class="about-section about-cards">
            @foreach($services as $service)
                <article class="about-card about-reveal">
                    @if($service->icon_url ?? false)
                        <img src="{{ $service->icon_url }}" alt="">
                    @else
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M2 12h20"/><circle cx="12" cy="12" r="7"/></svg>
                    @endif
                    <h3>{{ $service->title }}</h3>
                    <div>{!! $service->description !!}</div>
                </article>
            @endforeach
        </section>

        <section class="about-band">
            <div class="about-section about-grid reverse">
                <div class="about-media about-reveal">
                    <img src="{{ $mission?->image_url ?? asset('assets/images/about-bg.jpeg') }}" alt="{{ $mission?->title ?: __('front.site.about.mission_title') }}">
                </div>
                <div class="about-reveal">
                    <span class="about-eyebrow">{{ __('front.site.about.our') }}</span>
                    <h2 class="about-title">{{ $mission?->title ?: __('front.site.about.mission_title') }}</h2>
                    <div class="about-copy">{!! $mission?->description ?: __('front.site.about.mission_description') !!}</div>
                </div>
            </div>
        </section>

        <section class="about-section about-grid">
            <div class="about-reveal">
                <span class="about-eyebrow">{{ __('front.site.about.our') }}</span>
                <h2 class="about-title">{{ $vision?->title ?: __('front.site.about.vision_title') }}</h2>
                <div class="about-copy">{!! $vision?->description ?: __('front.site.about.vision_description') !!}</div>
            </div>
            <div class="about-media about-reveal">
                <img src="{{ $vision?->image_url ?? asset('assets/images/hero-bg.jpeg') }}" alt="{{ $vision?->title ?: __('front.site.about.vision_title') }}">
            </div>
        </section>

        @if($travel_services->isNotEmpty())
            <section class="about-section">
                <div class="about-reveal">
                    <span class="about-eyebrow">{{ __('front.site.sections.our_services') }}</span>
                    <h2 class="about-title">{{ __('front.site.sections.egypt_doudou_travel_services') }}</h2>
                </div>
                <div class="about-cards">
                    @foreach($travel_services as $travel_service)
                        <article class="about-card about-reveal">
                            @if($travel_service->icon_url)
                                <img src="{{ $travel_service->icon_url }}" alt="">
                            @endif
                            <h3>{{ $travel_service->title }}</h3>
                            <div>{!! $travel_service->description !!}</div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if($popular_video)
            <section class="about-section about-video">
                <div class="about-video__thumb about-reveal">
                    <img src="{{ getYoutubeThumbnail($popular_video->link) }}" alt="{{ $popular_video->title }}">
                    <a class="about-video__play" href="{{ $popular_video->link }}" target="_blank" rel="noopener" aria-label="{{ $popular_video->title }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                    </a>
                </div>
                <div class="about-reveal">
                    <span class="about-eyebrow">{{ __('front.site.about.reputations_reviews') }}</span>
                    <h2 class="about-title">{{ $popular_video->title ?: __('front.site.about.video_fallback_title') }}</h2>
                    <div class="about-copy">{{ __('front.site.about.reviews_intro') }}</div>
                </div>
            </section>
        @endif

        <x-general-comment-component />

        @if($questions->isNotEmpty())
            <section class="about-section about-faq">
                <div class="about-reveal">
                    <span class="about-eyebrow">{{ __('front.site.sections.frequently') }}</span>
                    <h2 class="about-title">{{ __('front.site.sections.asked_questions') }}</h2>
                </div>
                <div class="about-reveal">
                    @foreach($questions as $question)
                        <details>
                            <summary>{{ $question->title }}</summary>
                            <div>{!! $question->description !!}</div>
                        </details>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="about-section about-contact">
            <div class="about-reveal">
                <span class="about-eyebrow">{{ __('front.site.footer.contact_us') }}</span>
                <h2 class="about-title">{{ __('front.site.contact.intro') }}</h2>
                <x-contact-channel-actions mode="cards" />
            </div>
            <div class="about-contact__panel about-reveal">
                <p class="about-copy">{{ __('front.site.contact.form_intro') }}</p>
                <form class="about-form" method="POST" action="#">
                    @csrf
                    <label>{{ __('front.site.contact.title') }}
                        <select name="title">
                            <option>{{ __('front.site.contact.mr') }}</option>
                            <option>{{ __('front.site.contact.ms') }}</option>
                        </select>
                    </label>
                    <label>{{ __('front.site.contact.name') }}
                        <input name="name" placeholder="{{ __('front.site.contact.your_name') }}">
                    </label>
                    <label>{{ __('front.site.contact.email') }}
                        <input name="email" type="email" placeholder="{{ __('front.site.contact.your_email') }}">
                    </label>
                    <label>{{ __('front.site.contact.phone_number') }}
                        <input name="phone" placeholder="{{ __('front.site.contact.enter_phone_number') }}">
                    </label>
                    <textarea name="message" placeholder="{{ __('front.site.contact.message_placeholder') }}"></textarea>
                    <button type="submit">{{ __('front.site.contact.send') }}</button>
                </form>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.about-reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.14 });

            items.forEach((item, index) => {
                item.style.transitionDelay = `${Math.min(index * 35, 220)}ms`;
                observer.observe(item);
            });
        });
    </script>
@endsection
