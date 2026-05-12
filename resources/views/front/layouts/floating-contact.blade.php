@php
    /* ── Render-once guard: prevents duplicate when both footer files are included ── */
    if (!empty($GLOBALS['__fc_rendered'])) return;
    $GLOBALS['__fc_rendered'] = true;

    $social   = \App\Models\Social_setting::first();
    $n        = fn(?string $u): string => ($u = trim((string)$u)) === '' ? '' : (preg_match('/^https?:/i',$u) ? $u : 'https://'.$u);
    $wechat   = $n($social?->wechat);
    $line     = $n($social?->line);
    $telegram = $n($social?->telegram);
@endphp

<style>
/* ════════════════════════════════════
   FLOATING CONTACT WIDGET
   [panel][tab▶]  tab always at right edge
════════════════════════════════════ */
.fc{
    position:fixed; right:0; top:50%;
    transform:translateY(-50%);
    z-index:9980;
    display:flex; align-items:center;
}

/* Panel — slides open/shut via width */
.fc__panel{
    width:66px; overflow:hidden;
    background:#0c3d5e;
    border-radius:14px 0 0 14px;
    padding:12px 10px;
    display:flex; flex-direction:column;
    gap:9px; align-items:center;
    box-shadow:-4px 0 20px rgba(0,0,0,.25);
    transition:
        width .35s cubic-bezier(.16,1,.3,1),
        padding .35s cubic-bezier(.16,1,.3,1),
        opacity .25s;
}
.fc.fc--closed .fc__panel{
    width:0; padding-left:0; padding-right:0;
    opacity:0; pointer-events:none;
}

/* Tab — always glued to the right edge */
.fc__tab{
    width:20px; height:64px;
    background:#0c3d5e;
    border-radius:0 8px 8px 0;
    border-left:1px solid rgba(255,255,255,.1);
    display:flex; align-items:center; justify-content:center;
    cursor:pointer; flex:none;
    transition:background .2s;
}
.fc__tab:hover{ background:#0a3252; }
.fc__tab svg{
    width:11px; height:11px;
    color:rgba(255,255,255,.65);
    transition:transform .3s, color .2s;
    /* open → point left (< close panel) */
    transform:rotate(180deg);
}
.fc__tab:hover svg{ color:#fff; }
/* closed → point right (> open panel) */
.fc.fc--closed .fc__tab svg{ transform:rotate(0deg); }

/* Tooltip */
.fc__item{ position:relative; display:flex; align-items:center; justify-content:center; }
.fc__tip{
    position:absolute; right:calc(100% + 8px); top:50%;
    transform:translateY(-50%) translateX(6px);
    background:rgba(8,22,38,.9); color:#fff;
    font-size:11px; font-weight:700;
    padding:4px 9px; border-radius:6px;
    white-space:nowrap; pointer-events:none;
    opacity:0; transition:opacity .18s, transform .18s;
}
.fc__tip::after{
    content:''; position:absolute; left:100%; top:50%;
    transform:translateY(-50%);
    border:5px solid transparent;
    border-left-color:rgba(8,22,38,.9);
}
.fc__item:hover .fc__tip{ opacity:1; transform:translateY(-50%) translateX(0); }

/* Buttons */
.fc__btn{
    width:46px; height:46px; border-radius:12px;
    background:rgba(255,255,255,.1);
    color:#fff;
    display:flex; align-items:center; justify-content:center;
    text-decoration:none;
    border:1px solid rgba(255,255,255,.12);
    flex:none;
    transition:background .2s, transform .2s, box-shadow .2s;
}
.fc__btn svg{ width:24px; height:24px; flex:none; }
.fc__btn:hover{
    transform:scale(1.1) translateX(-3px);
    box-shadow:0 4px 16px rgba(0,0,0,.3);
    color:#fff; text-decoration:none;
}
.fc__btn--wechat   { background:#07c160; border-color:transparent; }
.fc__btn--wechat:hover{ background:#09d468; box-shadow:0 4px 16px rgba(7,193,96,.5); }
.fc__btn--line:hover    { background:#06c755; border-color:transparent; }
.fc__btn--whatsapp:hover{ background:#25d366; border-color:transparent; }
.fc__btn--email:hover   { background:#ea4335; border-color:transparent; }

/* Entrance */
@keyframes fcIn{
    from{opacity:0; transform:translateY(-50%) translateX(80px);}
    to  {opacity:1; transform:translateY(-50%) translateX(0);}
}
.fc{ animation:fcIn .55s 1s cubic-bezier(.16,1,.3,1) both; }

@media(max-width:480px){
    .fc__btn{ width:40px; height:40px; border-radius:10px; }
    .fc__btn svg{ width:20px; height:20px; }
    .fc__panel{ width:60px; gap:7px; padding:10px 7px; }
    .fc.fc--closed .fc__panel{ width:0; padding-left:0; padding-right:0; }
    .fc__tip{ display:none; }
}
</style>

<div class="fc" id="fc-widget">

    {{-- Panel (LEFT) --}}
    <div class="fc__panel" id="fc-panel">

        {{-- WeChat --}}
        <div class="fc__item">
            <span class="fc__tip">WeChat</span>
            <a href="{{ $wechat ?: '#' }}" @if($wechat) target="_blank" rel="noopener" @endif
               class="fc__btn fc__btn--wechat" aria-label="WeChat">
                {{-- WeChat: two overlapping chat bubbles --}}
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M8.691 2.188C3.891 2.188 0 5.476 0 9.53c0 2.212 1.17 4.203 3.002 5.55a.59.59 0 0 1 .213.665l-.39 1.48c-.019.07-.048.141-.048.213 0 .163.13.295.295.295a.326.326 0 0 0 .167-.054l1.903-1.114a.864.864 0 0 1 .717-.098 10.16 10.16 0 0 0 2.837.403c.276 0 .543-.027.811-.05-.857-2.578.157-4.972 1.932-6.446 1.703-1.415 3.882-1.98 5.853-1.838-.576-3.583-3.895-6.348-7.601-6.348zm-2.46 5.304a1.1 1.1 0 0 1 0 2.2 1.1 1.1 0 0 1 0-2.2zm4.919 0a1.1 1.1 0 0 1 0 2.2 1.1 1.1 0 0 1 0-2.2zm3.788 1.5c-3.076 0-5.564 2.14-5.564 4.773 0 2.632 2.488 4.771 5.564 4.771.586 0 1.161-.073 1.72-.206l1.893.98-.505-1.687a4.64 4.64 0 0 0 2.016-3.858c0-2.632-2.489-4.773-5.564-4.773zm-2.46 3.576a.916.916 0 1 1 0 1.833.916.916 0 0 1 0-1.833zm4.919 0a.916.916 0 1 1 0 1.833.916.916 0 0 1 0-1.833z"/>
                </svg>
            </a>
        </div>

        {{-- Line --}}
        <div class="fc__item">
            <span class="fc__tip">Line</span>
            <a href="{{ $line ?: '#' }}" @if($line) target="_blank" rel="noopener" @endif
               class="fc__btn fc__btn--line" aria-label="Line">
                {{-- Line official logo path --}}
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/>
                </svg>
            </a>
        </div>

        {{-- WhatsApp --}}
        <div class="fc__item">
            <span class="fc__tip">WhatsApp</span>
            <a href="{{ $telegram ? 'https://wa.me/'.preg_replace('/\D/','',$telegram) : '#' }}"
               @if($telegram) target="_blank" rel="noopener" @endif
               class="fc__btn fc__btn--whatsapp" aria-label="WhatsApp">
                {{-- WhatsApp official path --}}
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.422 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/>
                </svg>
            </a>
        </div>

        {{-- Email --}}
        <div class="fc__item">
            <span class="fc__tip">Email</span>
            <a href="mailto:info@egyptdoudou.com"
               class="fc__btn fc__btn--email" aria-label="Email">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
            </a>
        </div>
    </div>

    {{-- Tab — always at right screen edge --}}
    <button class="fc__tab" id="fc-tab" type="button" aria-label="Toggle">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"/>
        </svg>
    </button>
</div>

<script>
(function(){
    var w=document.getElementById('fc-widget');
    var t=document.getElementById('fc-tab');
    if(!w||!t)return;
    t.addEventListener('click',function(){
        w.classList.toggle('fc--closed');
        sessionStorage.setItem('fc',w.classList.contains('fc--closed')?'-1':'1');
    });
})();
</script>
