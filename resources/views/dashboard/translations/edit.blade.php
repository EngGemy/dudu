@extends('dashboard.layouts.app')

@section('style')
<style>
    /* Search box */
    .translation-search {
        max-width: 360px;
        position: relative;
    }
    .translation-search input {
        padding-left: 36px;
        border-radius: 6px;
        border: 1px solid #d8d6de;
        height: 38px;
        width: 100%;
        font-size: .9rem;
    }
    .translation-search .search-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #b9b9c3;
    }

    /* Lang switcher */
    .lang-switcher .btn {
        font-size: .8rem;
        font-weight: 600;
        letter-spacing: .4px;
        text-transform: uppercase;
    }

    /* Section header */
    .section-group-header {
        background: #f8f7ff;
        color: #7367f0;
        font-weight: 700;
        font-size: .78rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 8px 14px;
        border-left: 4px solid #7367f0;
        margin-bottom: 0;
    }

    /* Table rows */
    .trans-row { transition: background .15s; }
    .trans-row:hover { background: #fafafa; }
    .trans-row.hidden-row { display: none; }

    .key-label {
        font-family: 'SFMono-Regular', Consolas, monospace;
        font-size: .78rem;
        color: #6e6b7b;
        word-break: break-all;
        max-width: 280px;
    }
    .key-label .key-segment { color: #7367f0; }
    .key-label .key-sep { color: #ccc; margin: 0 2px; }

    .value-input {
        width: 100%;
        border: 1px solid #d8d6de;
        border-radius: 5px;
        padding: 6px 10px;
        font-size: .88rem;
        color: #3d3d4e;
        transition: border-color .15s;
        resize: vertical;
        min-height: 36px;
    }
    .value-input:focus {
        outline: none;
        border-color: #7367f0;
        box-shadow: 0 0 0 3px rgba(115,103,240,.1);
    }
    .value-input.changed {
        border-color: #28a745;
        background: #f6fff8;
    }

    /* Sticky save bar */
    .save-bar {
        position: sticky;
        bottom: 0;
        background: #fff;
        border-top: 1px solid #ebe9f1;
        padding: 12px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 10;
        box-shadow: 0 -4px 12px rgba(0,0,0,.06);
    }
    .save-bar .changed-count {
        font-size: .85rem;
        color: #6e6b7b;
    }
    .save-bar .changed-count span {
        font-weight: 700;
        color: #7367f0;
    }

    /* Stats chips */
    .stat-chip {
        display: inline-flex;
        align-items: center;
        background: #f3f2ff;
        color: #7367f0;
        border-radius: 20px;
        padding: 3px 12px;
        font-size: .78rem;
        font-weight: 600;
        margin-right: 8px;
    }
    .stat-chip i { margin-right: 4px; font-size: .8rem; }

    table { width: 100%; }
    td { vertical-align: middle !important; }
</style>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        {{-- Header --}}
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Translations</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('translations.index') }}">Translations</a></li>
                                <li class="breadcrumb-item active">{{ strtoupper($locale) }} / {{ $file }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="feather icon-check-circle mr-1"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="feather icon-alert-circle mr-1"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif

            <form id="translation-form"
                  action="{{ route('translations.update', ['locale' => $locale, 'file' => $file]) }}"
                  method="POST">
                @csrf

                {{-- Top toolbar card --}}
                <div class="card mb-1">
                    <div class="card-body py-2">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">

                            {{-- File info --}}
                            <div class="d-flex align-items-center">
                                <i class="feather icon-file-text text-primary mr-2" style="font-size:1.3rem;"></i>
                                <div>
                                    <div style="font-weight:700; color:#3d3d4e; font-size:.95rem;">
                                        lang/{{ $locale }}/{{ $file }}.php
                                    </div>
                                    <div>
                                        @php $totalKeys = collect($grouped)->flatten(1)->count(); @endphp
                                        <span class="stat-chip"><i class="feather icon-key"></i> {{ $totalKeys }} keys</span>
                                        <span class="stat-chip"><i class="feather icon-layers"></i> {{ count($grouped) }} groups</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Language switcher --}}
                            <div class="lang-switcher d-flex align-items-center">
                                <span class="text-muted mr-2" style="font-size:.82rem; font-weight:600;">Switch locale:</span>
                                @foreach($locales as $loc)
                                    <a href="{{ route('translations.edit', ['locale' => $loc, 'file' => $currentFile]) }}"
                                       class="btn btn-sm mr-1 {{ $loc === $locale ? 'btn-primary' : 'btn-outline-secondary' }}">
                                        {{ strtoupper($loc) }}
                                    </a>
                                @endforeach
                            </div>

                            {{-- Auto-fill --}}
                            @if($locale !== 'en')
                            <form method="POST" action="{{ route('translations.auto-fill', ['locale' => $locale, 'file' => $currentFile]) }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="source" value="en">
                                <button type="submit" class="btn btn-sm btn-outline-success" onclick="return confirm('This will overwrite empty values with DeepL translations from English. Continue?')">
                                    <i class="feather icon-zap mr-1"></i> Auto-fill from EN
                                </button>
                            </form>
                            @endif

                            {{-- Search --}}
                            <div class="translation-search">
                                <span class="search-icon"><i class="feather icon-search"></i></span>
                                <input type="text" id="searchInput" placeholder="Search keys or values…" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Translation table --}}
                <div class="card">
                    <div class="card-content">
                        <table id="transTable">
                            <thead style="display:none;">
                                <tr>
                                    <th style="width:35%">Key</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody id="transBody">

                                @foreach($grouped as $groupName => $rows)
                                    {{-- Section header --}}
                                    <tr class="section-group-row" data-group="{{ strtolower($groupName) }}">
                                        <td colspan="2" class="p-0">
                                            <div class="section-group-header">
                                                <i class="feather icon-folder mr-1"></i>
                                                {{ $groupName }}
                                                <span style="font-weight:400; opacity:.7; margin-left:6px; font-size:.72rem;">
                                                    ({{ count($rows) }} keys)
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                                    @foreach($rows as $row)
                                        @php
                                            // Build the pretty key label with segments coloured
                                            $segments = explode(' › ', $row['display_path']);
                                            $lastSeg  = array_pop($segments);
                                        @endphp
                                        <tr class="trans-row"
                                            data-key="{{ strtolower($row['display_path']) }}"
                                            data-value="{{ strtolower($row['value']) }}">
                                            <td style="padding: 10px 16px; width: 36%;">
                                                <div class="key-label">
                                                    @foreach($segments as $seg)
                                                        <span class="key-segment">{{ $seg }}</span>
                                                        <span class="key-sep">›</span>
                                                    @endforeach
                                                    <strong style="color:#3d3d4e;">{{ $lastSeg }}</strong>
                                                </div>
                                            </td>
                                            <td style="padding: 8px 16px 8px 6px;">
                                                @if($row['is_long'])
                                                    <textarea
                                                        name="{{ $row['html_name'] }}"
                                                        class="value-input"
                                                        rows="2"
                                                    >{{ $row['value'] }}</textarea>
                                                @else
                                                    <input
                                                        type="text"
                                                        name="{{ $row['html_name'] }}"
                                                        class="value-input"
                                                        value="{{ $row['value'] }}"
                                                    >
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach

                            </tbody>
                        </table>

                        {{-- Empty state for search --}}
                        <div id="noResults" class="text-center text-muted py-5" style="display:none;">
                            <i class="feather icon-search" style="font-size:2rem;"></i>
                            <p class="mt-2">No keys match your search.</p>
                        </div>
                    </div>
                </div>

                {{-- Sticky save bar --}}
                <div class="save-bar">
                    <div class="changed-count">
                        <span id="changedCount">0</span> unsaved changes
                    </div>
                    <div>
                        <a href="{{ route('translations.index') }}" class="btn btn-outline-secondary mr-2">
                            <i class="feather icon-x mr-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class="feather icon-save mr-1"></i> Save Translations
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function () {
    // Track changes
    var originalValues = {};
    var changedCount   = 0;

    document.querySelectorAll('.value-input').forEach(function (el) {
        originalValues[el.name] = el.tagName === 'TEXTAREA' ? el.value : el.value;

        el.addEventListener('input', function () {
            var orig    = originalValues[this.name];
            var current = this.value;
            var wasChanged = this.classList.contains('changed');

            if (current !== orig) {
                if (!wasChanged) { this.classList.add('changed'); changedCount++; }
            } else {
                if (wasChanged)  { this.classList.remove('changed'); changedCount--; }
            }
            document.getElementById('changedCount').textContent = changedCount;
        });
    });

    // Live search
    var searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function () {
        var q          = this.value.trim().toLowerCase();
        var rows       = document.querySelectorAll('.trans-row');
        var groupRows  = document.querySelectorAll('.section-group-row');
        var visibleMap = {};

        rows.forEach(function (row) {
            var key = row.dataset.key   || '';
            var val = row.dataset.value || '';
            var match = !q || key.includes(q) || val.includes(q);
            row.classList.toggle('hidden-row', !match);
            if (match) {
                // Extract the group: first segment of the key
                var groupLabel = (row.dataset.key || '').split(' › ')[0];
                visibleMap[groupLabel] = true;
            }
        });

        // Show/hide group headers based on whether they have visible rows
        groupRows.forEach(function (gr) {
            var g     = (gr.dataset.group || '').toLowerCase();
            var label = (gr.querySelector('.section-group-header') || {}).textContent || '';

            // Check if any trans-row below this header is visible
            var nextRows = [];
            var sib = gr.nextElementSibling;
            while (sib && !sib.classList.contains('section-group-row')) {
                if (sib.classList.contains('trans-row')) nextRows.push(sib);
                sib = sib.nextElementSibling;
            }
            var anyVisible = nextRows.some(r => !r.classList.contains('hidden-row'));
            gr.classList.toggle('hidden-row', !anyVisible);
        });

        // No-results state
        var allHidden = Array.from(rows).every(r => r.classList.contains('hidden-row'));
        document.getElementById('noResults').style.display = (q && allHidden) ? 'block' : 'none';
    });

    // Confirm before leaving with unsaved changes
    window.addEventListener('beforeunload', function (e) {
        if (changedCount > 0) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
    document.getElementById('translation-form').addEventListener('submit', function () {
        changedCount = 0; // allow navigation after save
    });
})();
</script>
@endsection
