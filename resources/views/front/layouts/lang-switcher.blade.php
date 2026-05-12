@php
    $currentLocale = app()->getLocale();
    $topBarLangLabel = match($currentLocale) {
        'en'      => '中文（繁體字）',
        'zh-Hant' => 'English',
        'zh'      => 'English',
        default   => '中文（繁體字）',
    };
    $languages = [
        'zh-Hant' => '中文（繁體字）',
        'zh'      => '中文（简体字）',
        'en'      => 'English',
    ];
    $uid = 'ls-' . substr(md5(uniqid()), 0, 8);
@endphp

@once('lang-switcher-css')
<style>
/* ── Self-contained language switcher ── */
.ls-wrap          { position: relative; display: inline-block; }
.ls-btn           { display:inline-flex; align-items:center; gap:6px; border:1.5px solid rgba(255,255,255,.6);
                    border-radius:999px; padding:4px 12px; font-size:13px; font-weight:500; color:#fff;
                    background:transparent; cursor:pointer; white-space:nowrap;
                    transition:background .15s ease; line-height:1.5; }
.ls-btn:hover     { background:rgba(255,255,255,.14); }
.ls-chevron       { transition:transform .2s ease; flex-shrink:0; }
.ls-wrap.is-open .ls-chevron { transform:rotate(180deg); }

.ls-menu          { display:none; position:absolute; top:calc(100% + 8px); right:0; left:auto;
                    z-index:99999; min-width:200px; background:#fff; border-radius:14px;
                    padding:6px; box-shadow:0 20px 60px rgba(0,0,0,.18),0 4px 12px rgba(0,0,0,.08); }
.ls-wrap.is-open .ls-menu { display:block; animation:lsFadeIn .22s cubic-bezier(.16,1,.3,1) both; }
@keyframes lsFadeIn {
    from { opacity:0; transform:translateY(-8px) scale(.97); }
    to   { opacity:1; transform:translateY(0)    scale(1);   }
}

.ls-item          { display:flex; align-items:center; gap:10px; padding:11px 14px; border-radius:8px;
                    font-size:14px; color:#1f2937; text-decoration:none;
                    transition:background .15s, color .15s, padding-left .15s; white-space:nowrap; }
.ls-item + .ls-item { border-top:1px solid rgba(0,0,0,.05); }
.ls-item:hover    { background:rgba(0,113,189,.08); color:#0071bd; padding-left:20px; }
.ls-item.is-cur   { background:rgba(0,113,189,.10); color:#0071bd; font-weight:600; }
.ls-flag          { font-weight:700; min-width:22px; text-align:center; font-size:13px; }
.ls-check         { margin-left:auto; flex-shrink:0; }
</style>
@endonce

<div class="ls-wrap" id="{{ $uid }}">

  {{-- Trigger button --}}
  <button type="button" class="ls-btn" aria-haspopup="listbox" aria-expanded="false"
          onclick="lsToggle('{{ $uid }}')">
    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="10"/>
      <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
    </svg>
    {{ $topBarLangLabel }}
    <svg class="ls-chevron" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
         stroke-linecap="round" stroke-linejoin="round">
      <path d="m6 9 6 6 6-6"/>
    </svg>
  </button>

  {{-- Dropdown panel --}}
  <div class="ls-menu" role="listbox">
    @foreach($languages as $code => $label)
      <a href="{{ route('language.switch', $code) }}"
         class="ls-item {{ $currentLocale === $code ? 'is-cur' : '' }}"
         role="option">
        <span class="ls-flag">{{ ['zh-Hant'=>'繁','zh'=>'简','en'=>'EN'][$code] }}</span>
        {{ $label }}
        @if($currentLocale === $code)
          <svg class="ls-check" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
               viewBox="0 0 24 24" fill="none" stroke="#0071bd" stroke-width="2.5">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
        @endif
      </a>
    @endforeach
  </div>

</div>

@once('lang-switcher-js')
<script>
function lsToggle(id) {
    var wrap = document.getElementById(id);
    if (!wrap) return;
    var isOpen = wrap.classList.toggle('is-open');
    wrap.querySelector('.ls-btn').setAttribute('aria-expanded', isOpen);
}
// Close on outside click
document.addEventListener('click', function(e) {
    document.querySelectorAll('.ls-wrap.is-open').forEach(function(wrap) {
        if (!wrap.contains(e.target)) {
            wrap.classList.remove('is-open');
            var btn = wrap.querySelector('.ls-btn');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        }
    });
});
// Close on Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.querySelectorAll('.ls-wrap.is-open').forEach(function(wrap) {
            wrap.classList.remove('is-open');
        });
    }
});
</script>
@endonce
