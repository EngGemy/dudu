@php
    $locale = app()->getLocale();
    $languageOptions = [
        'en' => ['label' => __('front.site.language.en_native'), 'flag' => 'EN'],
        'zh' => ['label' => __('front.site.language.zh_native'), 'flag' => '简'],
        'zh-Hant' => ['label' => __('front.site.language.zh_hant_native'), 'flag' => '繁'],
    ];
@endphp

<style>
    /* ══════════════════════════════════════════════════════
       NAV DROPDOWN — force it above orange banner + dark text
       ══════════════════════════════════════════════════════ */

    /* The navbar has text-white on all children — override for dropdowns */
    .navbar .hs-dropdown-menu,
    .navbar .lang-dropdown-menu {
        color: #1f2937 !important;   /* force dark text */
        z-index: 9999 !important;    /* always above the orange promo banner */
        position: absolute !important;
    }

    /* Every link / item inside any nav dropdown */
    .navbar .hs-dropdown-menu a,
    .navbar .hs-dropdown-menu button,
    .navbar .lang-dropdown-menu a {
        color: #1f2937 !important;
    }

    /* ── Dream itineraries dropdown ──────────────────── */
    .nav-dropdown-menu {
        position: absolute !important;
        top: calc(100% + 6px) !important;
        left: 0 !important;
        background: #fff;
        border-radius: 12px;
        padding: 6px;
        box-shadow: 0 20px 60px rgba(0,0,0,.18), 0 4px 16px rgba(0,0,0,.08);
        min-width: 200px;
        z-index: 9999 !important;
    }

    .nav-dropdown-menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 11px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #1f2937 !important;
        text-decoration: none;
        transition: background 0.18s ease, color 0.18s ease, transform 0.18s ease, padding-left 0.18s ease;
    }

    .nav-dropdown-menu a + a {
        border-top: 1px solid rgba(0,0,0,.05);
    }

    .nav-dropdown-menu a:hover {
        background: rgba(0, 113, 189, 0.08);
        color: #0071bd !important;
        padding-left: 22px;
    }

    .nav-dropdown-menu a:first-child { border-radius: 8px 8px 0 0; }
    .nav-dropdown-menu a:last-child  { border-radius: 0 0 8px 8px; }
    .nav-dropdown-menu a:only-child  { border-radius: 8px; }

    .nav-dropdown-menu a.is-active {
        background: rgba(0, 113, 189, 0.12);
        color: #0071bd !important;
        font-weight: 600;
    }

    /* ── Language dropdown in top bar ────────────────── */
    .lang-dropdown-menu {
        position: absolute !important;
        top: calc(100% + 8px) !important;
        right: 0 !important;
        left: auto !important;
        background: #fff;
        border-radius: 12px;
        padding: 6px;
        box-shadow: 0 20px 60px rgba(0,0,0,.18), 0 4px 16px rgba(0,0,0,.08);
        min-width: 200px;
        z-index: 9999 !important;
        overflow: hidden;
    }

    .lang-option {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 14px;
        color: #1f2937 !important;
        text-decoration: none;
        transition: background 0.15s ease, color 0.15s ease, transform 0.15s ease;
    }

    .lang-option:hover {
        background: rgba(0, 113, 189, 0.08);
        color: #0071bd !important;
        transform: translateX(4px);
    }

    .lang-option.is-active-lang {
        background: rgba(0, 113, 189, 0.1);
        color: #0071bd !important;
        font-weight: 600;
    }

    /* ── Shared entrance animation ───────────────────── */
    .hs-dropdown.open .nav-dropdown-menu,
    .hs-dropdown.open .lang-dropdown-menu {
        animation: ddFadeIn 0.22s cubic-bezier(0.16, 1, 0.3, 1) both;
    }

    @keyframes ddFadeIn {
        from { opacity: 0; transform: translateY(-10px) scale(0.96); }
        to   { opacity: 1; transform: translateY(0)     scale(1); }
    }

    /* ── Language modal ─────────────────────────────────── */
    .language-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(13, 34, 48, .62);
        backdrop-filter: blur(4px);
    }

    .language-modal.is-open {
        display: flex;
    }

    .language-modal__panel {
        position: relative;
        width: min(760px, 100%);
        border-radius: 8px;
        background: #fff;
        padding: 28px 32px 34px;
        color: #0d2230;
        box-shadow: 0 28px 80px rgba(0, 0, 0, .24);
    }

    .language-modal__close {
        position: absolute;
        top: 16px;
        right: 18px;
        color: #0d2230;
        font-size: 28px;
        line-height: 1;
    }

    .language-modal__title {
        padding-right: 40px;
        font-size: clamp(1.35rem, 3vw, 2rem);
        font-weight: 700;
        line-height: 1.35;
    }

    .language-modal__title span {
        color: #0071bd;
    }

    .language-modal__subtitle {
        margin-top: 6px;
        color: #4b5563;
        font-size: 15px;
    }

    .language-modal__actions {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px 18px;
        margin-top: 24px;
    }

    .language-modal__actions a {
        display: flex;
        min-height: 44px;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 1px solid #d1d0d0;
        border-radius: 2px;
        background: #fff;
        color: #0d2230;
        padding: 10px 12px;
        font-size: 14px;
        font-weight: 700;
        text-align: center;
        transition: border-color .18s ease, background .18s ease, color .18s ease;
    }

    .language-modal__actions a:hover,
    .language-modal__actions a.is-active {
        border-color: #0071bd;
        background: rgba(0, 113, 189, .08);
        color: #005690;
    }

    .language-modal__flag {
        font-size: 19px;
        line-height: 1;
    }

    @media (max-width: 640px) {
        .language-modal {
            padding: 14px;
            align-items: flex-start;
            padding-top: 9vh;
        }

        .language-modal__panel {
            padding: 24px 18px 22px;
        }

        .language-modal__actions {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .language-modal__actions a {
            justify-content: flex-start;
        }
    }
</style>

<div class="language-modal" id="language-modal" aria-hidden="true">
    <div class="language-modal__panel" role="dialog" aria-modal="true" aria-labelledby="language-modal-title">
        <button class="language-modal__close" type="button" data-language-close aria-label="Close language selector">&times;</button>
        <h2 id="language-modal-title" class="language-modal__title">
            <span>歡迎來到埃及豆豆中文站</span>，請選擇語言站點
        </h2>
        <p class="language-modal__subtitle">Welcome to Egyptdoudou, please select your preferred language</p>
        <div class="language-modal__actions">
            @foreach($languageOptions as $code => $option)
                <a href="{{ route('language.switch', $code) }}" data-language-choice class="{{ $locale === $code ? 'is-active' : '' }}">
                    <span class="language-modal__flag" aria-hidden="true">{{ $option['flag'] }}</span>
                    <span>{{ $option['label'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.querySelector("#language-modal");
        const storageKey = "egyptdoudou_language_selected";

        if (!modal) {
            return;
        }

        try {
            if (!localStorage.getItem(storageKey)) {
                modal.classList.add("is-open");
                modal.setAttribute("aria-hidden", "false");
            }
        } catch (error) {
            modal.classList.add("is-open");
            modal.setAttribute("aria-hidden", "false");
        }

        document.querySelectorAll("[data-language-choice]").forEach(function (link) {
            link.addEventListener("click", function () {
                try {
                    localStorage.setItem(storageKey, "1");
                } catch (error) {}
            });
        });

        document.querySelectorAll("[data-language-close]").forEach(function (button) {
            button.addEventListener("click", function () {
                try {
                    localStorage.setItem(storageKey, "1");
                } catch (error) {}

                modal.classList.remove("is-open");
                modal.setAttribute("aria-hidden", "true");
            });
        });

        modal.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.classList.remove("is-open");
                modal.setAttribute("aria-hidden", "true");
            }
        });
    });
</script>
