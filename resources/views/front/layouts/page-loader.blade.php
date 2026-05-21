<div class="doudou-page-loader" data-page-loader role="status" aria-live="polite" aria-label="Loading">
    <div class="doudou-page-loader__mark">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" />
    </div>
    <div class="doudou-page-loader__bar" aria-hidden="true"><span></span></div>
</div>

<style>
    .doudou-page-loader{position:fixed;inset:0;z-index:9999;display:grid;place-items:center;background:linear-gradient(135deg,#f8fbfd 0%,#ffffff 46%,#eef7fc 100%);transition:opacity .45s ease,visibility .45s ease;overflow:hidden}
    .doudou-page-loader:before{content:"";position:absolute;inset:0;background:linear-gradient(90deg,rgba(0,113,189,.08),transparent 34%,rgba(247,147,30,.08));opacity:.9}
    .doudou-page-loader__mark{position:relative;display:grid;place-items:center;width:112px;height:112px;border:1px solid rgba(0,113,189,.14);border-radius:28px;background:rgba(255,255,255,.82);box-shadow:0 28px 70px rgba(0,40,70,.16);animation:doudouLoaderFloat 1.5s ease-in-out infinite}
    .doudou-page-loader__mark:after{content:"";position:absolute;inset:-9px;border:2px solid transparent;border-top-color:#0071bd;border-right-color:#f7931e;border-radius:34px;animation:doudouLoaderSpin 1.05s linear infinite}
    .doudou-page-loader__mark img{width:76px;height:76px;object-fit:contain}
    .doudou-page-loader__bar{position:absolute;left:50%;bottom:14%;width:min(260px,62vw);height:3px;overflow:hidden;border-radius:999px;background:rgba(0,113,189,.13);transform:translateX(-50%)}
    .doudou-page-loader__bar span{display:block;width:42%;height:100%;border-radius:inherit;background:linear-gradient(90deg,#0071bd,#f7931e);animation:doudouLoaderBar 1.05s ease-in-out infinite}
    .doudou-page-loader.is-hidden{opacity:0;visibility:hidden;pointer-events:none}
    .doudou-page-loader.is-leaving{opacity:1;visibility:visible;pointer-events:auto}
    @keyframes doudouLoaderSpin{to{transform:rotate(360deg)}}
    @keyframes doudouLoaderFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-7px)}}
    @keyframes doudouLoaderBar{0%{transform:translateX(-110%)}100%{transform:translateX(245%)}}
    @media (prefers-reduced-motion:reduce){
        .doudou-page-loader,.doudou-page-loader__mark,.doudou-page-loader__mark:after,.doudou-page-loader__bar span{animation:none;transition:none}
        .doudou-page-loader__bar span{width:100%;transform:none}
    }
</style>

<script>
    (function () {
        const loader = document.querySelector('[data-page-loader]');
        if (!loader) return;

        const hideLoader = () => {
            window.setTimeout(() => loader.classList.add('is-hidden'), 180);
        };

        if (document.readyState === 'complete') {
            hideLoader();
        } else {
            window.addEventListener('load', hideLoader, { once: true });
        }

        window.addEventListener('pageshow', function () {
            loader.classList.add('is-hidden');
            loader.classList.remove('is-leaving');
        });

        document.addEventListener('click', function (event) {
            const link = event.target.closest('a[href]');
            if (!link || event.defaultPrevented || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
            if (link.target && link.target !== '_self') return;
            if (link.hasAttribute('download')) return;

            const url = new URL(link.href, window.location.href);
            if (url.origin !== window.location.origin) return;
            if (url.pathname === window.location.pathname && url.search === window.location.search && url.hash) return;

            loader.classList.remove('is-hidden');
            loader.classList.add('is-leaving');
        });
    })();
</script>
