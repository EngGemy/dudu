<style>
    .search-modal { position: fixed; inset: 0; z-index: 9998; display: none; padding: 8vh 16px 16px; background: rgba(13,34,48,.72); backdrop-filter: blur(6px); }
    .search-modal.is-open { display: block; }
    .search-modal__panel { width: min(720px, 100%); margin: 0 auto; background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 30px 80px rgba(0,0,0,.3); }
    .search-modal__input-wrap { display: flex; align-items: center; gap: 12px; padding: 16px 18px; border-bottom: 1px solid #eee; }
    .search-modal__input-wrap svg { width: 22px; height: 22px; color: #0071bd; flex: none; }
    .search-modal__input { flex: 1; border: 0; outline: 0; font-size: 18px; color: #0d2230; background: transparent; }
    .search-modal__kbd { font-size: 11px; padding: 3px 7px; border: 1px solid #d1d0d0; border-radius: 5px; color: #727171; }
    .search-modal__results { max-height: 65vh; overflow-y: auto; padding: 8px; }
    .search-modal__group { padding: 10px 6px 6px; }
    .search-modal__group-label { font-size: 11px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: #727171; padding: 4px 10px 8px; }
    .search-modal__hit { display: flex; align-items: center; gap: 12px; padding: 10px; border-radius: 8px; color: #0d2230; transition: background .15s; cursor: pointer; }
    .search-modal__hit:hover, .search-modal__hit.is-active { background: rgba(0,113,189,.08); }
    .search-modal__hit-thumb { width: 44px; height: 44px; border-radius: 8px; background: #f3f4f6; flex: none; object-fit: cover; }
    .search-modal__hit-body { flex: 1; min-width: 0; }
    .search-modal__hit-title { font-size: 14px; font-weight: 700; line-height: 1.3; }
    .search-modal__hit-title mark { background: rgba(247,147,30,.3); color: inherit; padding: 0 2px; border-radius: 3px; }
    .search-modal__hit-snippet { font-size: 12px; color: #727171; line-height: 1.4; margin-top: 2px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
    .search-modal__hit-snippet mark { background: rgba(247,147,30,.3); color: inherit; padding: 0 2px; border-radius: 3px; }
    .search-modal__empty { padding: 30px; text-align: center; color: #727171; font-size: 14px; }
    .search-modal__skeleton { padding: 14px 16px; }
    .search-modal__skeleton-row { display: flex; gap: 12px; padding: 8px 0; }
    .search-modal__skeleton-row > div:first-child { width: 44px; height: 44px; border-radius: 8px; background: linear-gradient(90deg, #f3f4f6, #e5e7eb, #f3f4f6); background-size: 200% 100%; animation: skel 1.4s infinite; flex: none; }
    .search-modal__skeleton-row > div:last-child { flex: 1; display: flex; flex-direction: column; gap: 6px; padding-top: 4px; }
    .search-modal__skeleton-row > div:last-child > span { height: 12px; border-radius: 4px; background: linear-gradient(90deg, #f3f4f6, #e5e7eb, #f3f4f6); background-size: 200% 100%; animation: skel 1.4s infinite; }
    .search-modal__skeleton-row > div:last-child > span:first-child { width: 60%; }
    .search-modal__skeleton-row > div:last-child > span:last-child { width: 40%; }
    @keyframes skel { 0% { background-position: 200% 0; } 100% { background-position: -200% 0; } }
    .search-modal__footer { display: flex; gap: 14px; padding: 10px 16px; border-top: 1px solid #eee; font-size: 11px; color: #727171; }
    .search-modal__footer span { display: inline-flex; align-items: center; gap: 5px; }
</style>

<div class="search-modal" id="search-modal" aria-hidden="true">
    <div class="search-modal__panel" role="dialog" aria-modal="true">
        <div class="search-modal__input-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            <input id="search-modal-input" class="search-modal__input" type="text" autocomplete="off" placeholder="{{ __('front.site.search.search') }}..." />
            <span class="search-modal__kbd">ESC</span>
        </div>
        <div class="search-modal__results" id="search-modal-results">
            <div class="search-modal__empty" id="search-modal-initial">{{ __('front.site.search.search') }}…</div>
        </div>
        <div class="search-modal__footer">
            <span><span class="search-modal__kbd">↑↓</span> navigate</span>
            <span><span class="search-modal__kbd">↵</span> open</span>
            <span><span class="search-modal__kbd">⌘K</span> toggle</span>
        </div>
    </div>
</div>

<script>
(function () {
    const modal = document.getElementById('search-modal');
    const input = document.getElementById('search-modal-input');
    const results = document.getElementById('search-modal-results');
    const endpoint = @json(route('search.suggest'));
    var _i18n = {
        noResults:   @json(__('front.site.search.no_results_for')),
        unavailable: @json(__('front.site.search.search_unavailable')),
        typeSearch:  @json(__('front.site.search.search')),
    };
    let activeIndex = -1, hits = [], reqId = 0, debounceTimer = null;

    function open() { modal.classList.add('is-open'); modal.setAttribute('aria-hidden', 'false'); setTimeout(() => input.focus(), 30); if (!input.value) renderEmpty(_i18n.typeSearch + '…'); }
    function close() { modal.classList.remove('is-open'); modal.setAttribute('aria-hidden', 'true'); }
    function toggle() { modal.classList.contains('is-open') ? close() : open(); }

    function escapeHtml(s) {
        return String(s ?? '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
    }
    function highlightedHtml(s) {
        // server returns <mark>...</mark>. Escape everything else, allow only <mark>.
        const parts = String(s ?? '').split(/(<mark>|<\/mark>)/g);
        let inMark = false, out = '';
        for (const p of parts) {
            if (p === '<mark>') { inMark = true; out += '<mark>'; }
            else if (p === '</mark>') { inMark = false; out += '</mark>'; }
            else { out += escapeHtml(p); }
        }
        return out;
    }

    function renderSkeleton() {
        let h = '<div class="search-modal__skeleton">';
        for (let i = 0; i < 4; i++) h += '<div class="search-modal__skeleton-row"><div></div><div><span></span><span></span></div></div>';
        results.innerHTML = h + '</div>';
    }
    function renderEmpty(msg) { results.innerHTML = '<div class="search-modal__empty">' + escapeHtml(msg) + '</div>'; }

    function render(data) {
        hits = [];
        if (!data.groups || data.groups.length === 0) {
            renderEmpty(_i18n.noResults + (data.query ? ' "' + data.query + '"' : ''));
            return;
        }
        let html = '';
        for (const group of data.groups) {
            html += '<div class="search-modal__group">';
            html += '<div class="search-modal__group-label">' + escapeHtml(group.label) + '</div>';
            for (const hit of group.hits) {
                const idx = hits.length;
                hits.push(hit);
                const thumb = hit.image ? '<img class="search-modal__hit-thumb" src="' + escapeHtml(hit.image) + '" alt="" />' : '<div class="search-modal__hit-thumb"></div>';
                html += '<a class="search-modal__hit" data-idx="' + idx + '" href="' + escapeHtml(hit.url) + '">';
                html += thumb;
                html += '<div class="search-modal__hit-body">';
                html += '<div class="search-modal__hit-title">' + highlightedHtml(hit.title) + '</div>';
                if (hit.description) html += '<div class="search-modal__hit-snippet">' + highlightedHtml(hit.description) + '</div>';
                html += '</div></a>';
            }
            html += '</div>';
        }
        results.innerHTML = html;
        activeIndex = -1;
    }

    function setActive(idx) {
        const nodes = results.querySelectorAll('.search-modal__hit');
        nodes.forEach(n => n.classList.remove('is-active'));
        if (idx >= 0 && nodes[idx]) {
            nodes[idx].classList.add('is-active');
            nodes[idx].scrollIntoView({ block: 'nearest' });
        }
        activeIndex = idx;
    }

    async function doSearch(q) {
        const myReq = ++reqId;
        if (!q.trim()) { renderEmpty(_i18n.typeSearch + '…'); return; }
        renderSkeleton();
        try {
            const res = await fetch(endpoint + '?q=' + encodeURIComponent(q), { headers: { 'Accept': 'application/json' }});
            const data = await res.json();
            if (myReq !== reqId) return;
            render(data);
        } catch (e) {
            if (myReq !== reqId) return;
            renderEmpty(_i18n.unavailable);
        }
    }

    input.addEventListener('input', e => {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => doSearch(e.target.value), 150);
    });

    document.addEventListener('keydown', e => {
        if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); toggle(); return; }
        if (!modal.classList.contains('is-open')) return;
        if (e.key === 'Escape') { close(); }
        else if (e.key === 'ArrowDown') { e.preventDefault(); if (hits.length) setActive((activeIndex + 1) % hits.length); }
        else if (e.key === 'ArrowUp') { e.preventDefault(); if (hits.length) setActive((activeIndex - 1 + hits.length) % hits.length); }
        else if (e.key === 'Enter') {
            if (activeIndex >= 0 && hits[activeIndex]) { window.location.href = hits[activeIndex].url; }
        }
    });

    modal.addEventListener('click', e => { if (e.target === modal) close(); });

    document.querySelectorAll('[data-search-open]').forEach(btn => {
        btn.addEventListener('click', e => { e.preventDefault(); open(); });
    });
})();
</script>
