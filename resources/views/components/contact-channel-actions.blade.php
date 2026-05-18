@props(['mode' => 'cards'])

@php
    $settings = \App\Models\General_setting::first();
    $social = \App\Models\Social_setting::first();
    $normalize = fn (?string $url): string => ($url = trim((string) $url)) === ''
        ? ''
        : (preg_match('/^(https?:|mailto:|tel:|weixin:|line:)/i', $url) ? $url : 'https://'.$url);
    $phone = preg_replace('/\D/', '', (string) $settings?->manager_phone);
    $email = trim((string) $settings?->email);

    $channels = [
        [
            'name' => 'WeChat',
            'url' => $normalize($social?->wechat),
            'class' => 'wechat',
            'svg' => '<path d="M8.691 2.188C3.891 2.188 0 5.476 0 9.53c0 2.212 1.17 4.203 3.002 5.55a.59.59 0 0 1 .213.665l-.39 1.48c-.019.07-.048.141-.048.213 0 .163.13.295.295.295a.326.326 0 0 0 .167-.054l1.903-1.114a.864.864 0 0 1 .717-.098 10.16 10.16 0 0 0 2.837.403c.276 0 .543-.027.811-.05-.857-2.578.157-4.972 1.932-6.446 1.703-1.415 3.882-1.98 5.853-1.838-.576-3.583-3.895-6.348-7.601-6.348zm-2.46 5.304a1.1 1.1 0 0 1 0 2.2 1.1 1.1 0 0 1 0-2.2zm4.919 0a1.1 1.1 0 0 1 0 2.2 1.1 1.1 0 0 1 0-2.2zm3.788 1.5c-3.076 0-5.564 2.14-5.564 4.773 0 2.632 2.488 4.771 5.564 4.771.586 0 1.161-.073 1.72-.206l1.893.98-.505-1.687a4.64 4.64 0 0 0 2.016-3.858c0-2.632-2.489-4.773-5.564-4.773zm-2.46 3.576a.916.916 0 1 1 0 1.833.916.916 0 0 1 0-1.833zm4.919 0a.916.916 0 1 1 0 1.833.916.916 0 0 1 0-1.833z"/>',
        ],
        [
            'name' => 'LINE',
            'url' => $normalize($social?->line),
            'class' => 'line',
            'svg' => '<path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/>',
        ],
        [
            'name' => 'WhatsApp',
            'url' => $phone ? 'https://wa.me/'.$phone.'?text=Hello%20there' : '',
            'class' => 'whatsapp',
            'svg' => '<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.422 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/>',
        ],
        [
            'name' => 'Email',
            'url' => $email ? 'mailto:'.$email : '',
            'class' => 'email',
            'svg' => '<path d="M2 4h20v16H2z" fill="none" stroke="currentColor" stroke-width="1.8"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>',
        ],
    ];
@endphp

@once
    <style>
        .contact-channels{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
        .contact-channels__item{display:flex;align-items:center;gap:12px;padding:14px;border:1px solid rgba(0,113,189,.14);border-radius:14px;background:linear-gradient(180deg,#fff,#f8fbfd);box-shadow:0 12px 26px rgba(0,40,70,.08);transition:transform .22s ease,box-shadow .22s ease,border-color .22s ease}
        .contact-channels__item:hover{transform:translateY(-3px);box-shadow:0 18px 36px rgba(0,40,70,.14);border-color:rgba(0,113,189,.34)}
        .contact-channels__icon{display:flex;width:42px;height:42px;flex:none;align-items:center;justify-content:center;border-radius:12px;color:#fff}
        .contact-channels__icon svg{width:23px;height:23px}
        .contact-channels__label{font-size:14px;font-weight:700;color:#0d2230}
        .contact-channels__hint{display:block;margin-top:2px;font-size:11px;color:#727171}
        .contact-channels__item--wechat .contact-channels__icon{background:#08c160}
        .contact-channels__item--line .contact-channels__icon{background:#06c755}
        .contact-channels__item--whatsapp .contact-channels__icon{background:#25d366}
        .contact-channels__item--email .contact-channels__icon{background:#0071bd}
        .contact-channels--icons{display:flex;align-items:center;gap:9px}
        .contact-channels--icons .contact-channels__item{width:42px;height:42px;padding:0;justify-content:center;border:1px solid rgba(255,255,255,.24);border-radius:50%;background:transparent;box-shadow:0 8px 18px rgba(0,0,0,.16)}
        .contact-channels--icons .contact-channels__item:hover,
        .contact-channels--icons .contact-channels__item:focus-visible{transform:translateY(-2px) scale(1.05);box-shadow:0 12px 24px rgba(0,0,0,.2)}
        .contact-channels--icons .contact-channels__icon{width:100%;height:100%;border-radius:50%;color:#fff}
        .contact-channels--icons .contact-channels__item--wechat .contact-channels__icon{background:#08c160}
        .contact-channels--icons .contact-channels__item--line .contact-channels__icon{background:#06c755}
        .contact-channels--icons .contact-channels__item--whatsapp .contact-channels__icon{background:#25d366}
        .contact-channels--icons .contact-channels__item--email .contact-channels__icon{background:#0071bd}
        .contact-channels--icons .contact-channels__label,.contact-channels--icons .contact-channels__hint{display:none}
        @media (max-width:640px){.contact-channels{grid-template-columns:1fr}}
    </style>
@endonce

<div class="contact-channels contact-channels--{{ $mode }}">
    @foreach ($channels as $channel)
        @php $tag = $channel['url'] ? 'a' : 'span'; @endphp
        <{{ $tag }}
            @if($channel['url']) href="{{ $channel['url'] }}" target="_blank" rel="noopener" @endif
            class="contact-channels__item contact-channels__item--{{ $channel['class'] }}"
            title="{{ $channel['name'] }}"
            aria-label="{{ $channel['name'] }}"
        >
            <span class="contact-channels__icon">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">{!! $channel['svg'] !!}</svg>
            </span>
            <span>
                <span class="contact-channels__label">{{ $channel['name'] }}</span>
                <span class="contact-channels__hint">{{ __('front.site.contact.contact_directly_by') }}</span>
            </span>
        </{{ $tag }}>
    @endforeach
</div>
