@extends('dashboard.layouts.app')

@section('style')
<style>
    .locale-tab-btn {
        border: none;
        background: none;
        padding: 10px 20px;
        font-weight: 600;
        color: #6e6b7b;
        border-bottom: 3px solid transparent;
        cursor: pointer;
        transition: all .2s;
    }
    .locale-tab-btn.active {
        color: #7367f0;
        border-bottom-color: #7367f0;
    }
    .locale-tab-panel { display: none; }
    .locale-tab-panel.active { display: block; }
    .file-card {
        border: 1px solid #ebe9f1;
        border-radius: 8px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        transition: box-shadow .2s;
        background: #fff;
    }
    .file-card:hover { box-shadow: 0 4px 16px rgba(115,103,240,.12); }
    .file-icon { font-size: 1.4rem; color: #7367f0; margin-right: 14px; }
    .file-name { font-weight: 600; color: #3d3d4e; font-size: .95rem; }
    .file-path { font-size: .8rem; color: #aaa; }
    .key-badge {
        background: #f3f2ff;
        color: #7367f0;
        border-radius: 20px;
        padding: 2px 12px;
        font-size: .78rem;
        font-weight: 600;
        margin-right: 12px;
        white-space: nowrap;
    }
    .locale-badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 4px;
        font-size: .75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .5px;
    }
    .locale-badge-en   { background: #e8f5e9; color: #2e7d32; }
    .locale-badge-zh   { background: #fff3e0; color: #e65100; }
    .locale-badge-zhHant { background: #fce4ec; color: #880e4f; }
    .locale-badge-other { background: #e3f2fd; color: #0d47a1; }
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
                        <h2 class="content-header-title float-left mb-0">Translation Manager</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Translations</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="feather icon-check-circle mr-1"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="feather icon-alert-circle mr-1"></i> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header pb-1">
                    <h4 class="card-title"><i class="feather icon-globe mr-1 text-primary"></i> Language Files</h4>
                    <p class="card-text text-muted" style="font-size:.85rem;">
                        Select a language and file to edit its translation keys.
                    </p>
                </div>

                {{-- Locale Tabs --}}
                <div class="card-body pt-0">
                    <div style="border-bottom: 1px solid #ebe9f1; margin-bottom: 20px;">
                        @foreach($locales as $locale)
                            <button class="locale-tab-btn {{ $loop->first ? 'active' : '' }}"
                                    data-tab="tab-{{ $locale }}">
                                <i class="feather icon-flag mr-1"></i>
                                {{ strtoupper($locale) }}
                                <span class="key-badge ml-1">{{ count($files[$locale] ?? []) }}</span>
                            </button>
                        @endforeach
                    </div>

                    @foreach($locales as $locale)
                        <div id="tab-{{ $locale }}" class="locale-tab-panel {{ $loop->first ? 'active' : '' }}">
                            @forelse($files[$locale] ?? [] as $item)
                                <div class="file-card">
                                    <div class="d-flex align-items-center">
                                        <span class="file-icon"><i class="feather icon-file-text"></i></span>
                                        <div>
                                            @php
                                                $localeClass = preg_replace('/[^A-Za-z0-9]/', '', $locale);
                                            @endphp
                                            <div class="file-name">
                                                {{ basename($item['file']) }}
                                                <span class="locale-badge locale-badge-{{ $localeClass }} ml-2">{{ $locale }}</span>
                                                @if(! $item['exists'])
                                                    <span class="badge badge-light-warning ml-1">missing file</span>
                                                @endif
                                            </div>
                                            <div class="file-path">lang/{{ $locale }}/{{ $item['file'] }}.php</div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="key-badge">
                                            <i class="feather icon-key" style="font-size:.75rem"></i>
                                            {{ $item['count'] }} / {{ $item['source_count'] }} keys
                                        </span>
                                        @if(($item['missing'] ?? 0) > 0)
                                            <span class="badge badge-light-danger mr-1">{{ $item['missing'] }} missing</span>
                                        @endif
                                        <a href="{{ route('translations.edit', ['locale' => $locale, 'file' => $item['file']]) }}"
                                           class="btn btn-primary btn-sm waves-effect waves-light">
                                            <i class="feather icon-edit-2 mr-1"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-muted py-4">
                                    <i class="feather icon-inbox" style="font-size:2rem;"></i>
                                    <p class="mt-1">No translation files found for <strong>{{ strtoupper($locale) }}</strong>.</p>
                                </div>
                            @endforelse
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.querySelectorAll('.locale-tab-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.locale-tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.locale-tab-panel').forEach(p => p.classList.remove('active'));
        this.classList.add('active');
        document.getElementById(this.dataset.tab).classList.add('active');
    });
});
</script>
@endsection
