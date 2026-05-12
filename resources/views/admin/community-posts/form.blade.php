@extends('dashboard.layouts.app')

@section('style')
<style>
    .cpf-card { max-width: 760px; margin: 0 auto; }
    .cpf-preview { width: 100%; max-width: 240px; aspect-ratio: 3/4; border-radius: 14px; background: #f3f4f6; object-fit: cover; box-shadow: 0 6px 18px rgba(0,0,0,.08); }
    .cpf-avatar-preview { width: 80px; height: 80px; border-radius: 50%; background: #f3f4f6; object-fit: cover; box-shadow: 0 0 0 3px #fff, 0 0 0 4px #e5e7eb; }
    .cpf-counter { font-size: 11px; color: #9ca3af; }
    .cpf-counter.is-warn { color: #f59e0b; }
    .cpf-counter.is-error { color: #dc2626; }
    .cpf-username-wrap { position: relative; }
    .cpf-username-wrap::before { content: "@"; position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af; font-weight: 600; }
    .cpf-username-wrap input { padding-left: 28px; }
    .cpf-submit-spinner { display: none; width: 14px; height: 14px; border: 2px solid #fff; border-top-color: transparent; border-radius: 50%; animation: cpfspin .7s linear infinite; }
    .is-loading .cpf-submit-spinner { display: inline-block; }
    .is-loading .cpf-submit-label { opacity: .6; }
    @keyframes cpfspin { to { transform: rotate(360deg); } }
</style>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <h3 class="content-header-title">{{ $isEdit ? 'Edit' : 'Create' }} Community Post</h3>
                <small class="text-muted">
                    <a href="{{ route('admin.community-posts.index') }}">← Back to all posts</a>
                </small>
            </div>
        </div>

        <div class="content-body">
            <div class="card cpf-card">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="cp-form" method="POST"
                          action="{{ $isEdit ? route('admin.community-posts.update', $post) : route('admin.community-posts.store') }}"
                          enctype="multipart/form-data">
                        @csrf
                        @if($isEdit) @method('PUT') @endif

                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Username</label>
                                    <div class="cpf-username-wrap">
                                        <input type="text" name="username" class="form-control"
                                               value="{{ old('username', ltrim((string) $post->username, '@')) }}"
                                               placeholder="kate_hogg" required maxlength="50">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Platform</label>
                                    <select name="platform" class="form-control" required>
                                        @foreach(['instagram','tiktok','twitter','manual'] as $p)
                                            <option value="{{ $p }}" {{ old('platform', $post->platform) === $p ? 'selected' : '' }}>{{ ucfirst($p) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @include('dashboard._partials.locale-tabs', [
                                    'field' => 'caption',
                                    'label' => 'Caption',
                                    'type' => 'textarea',
                                    'rows' => 3,
                                    'maxlength' => 200,
                                    'placeholder' => 'Short caption shown in the lightbox modal',
                                    'translations' => $post->translations,
                                    'locales' => ['en', 'zh', 'zh-Hant'],
                                ])

                                <div class="form-group">
                                    <label>Instagram Post URL (optional)</label>
                                    <input type="url" name="instagram_post_url" class="form-control"
                                           value="{{ old('instagram_post_url', $post->instagram_post_url) }}"
                                           placeholder="https://www.instagram.com/p/…">
                                </div>

                                <div class="form-group">
                                    <label class="d-flex align-items-center" style="gap:8px;">
                                        <input type="hidden" name="is_active" value="0">
                                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $post->is_active) ? 'checked' : '' }}>
                                        <span>Active (show on home page)</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Post Image {{ $isEdit ? '(leave empty to keep existing)' : '*' }}</label>
                                    <input type="file" name="image" id="cp-image" accept="image/*" class="form-control-file mb-2"
                                           {{ $isEdit ? '' : 'required' }}>
                                    <img id="cp-image-preview" class="cpf-preview"
                                         src="{{ $post->resolved_image_url ?? '' }}"
                                         style="{{ $post->resolved_image_url ? '' : 'display:none' }}" alt="">
                                    <small class="text-muted d-block mt-1">JPG/PNG/WebP, max 5MB. 3:4 ratio looks best.</small>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Avatar (optional)</label>
                                    <input type="file" name="avatar" id="cp-avatar" accept="image/*" class="form-control-file mb-2">
                                    <img id="cp-avatar-preview" class="cpf-avatar-preview"
                                         src="{{ $post->resolved_avatar_url ?? '' }}"
                                         style="{{ $post->resolved_avatar_url ? '' : 'display:none' }}" alt="">
                                    <small class="text-muted d-block mt-1">Square image, JPG/PNG/WebP, max 2MB.</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-3" style="gap:8px;">
                            <a href="{{ route('admin.community-posts.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary" id="cp-submit">
                                <span class="cpf-submit-spinner"></span>
                                <span class="cpf-submit-label">{{ $isEdit ? 'Save Changes' : 'Create Post' }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function () {
    const caption = document.getElementById('cp-caption');
    const counter = document.getElementById('cp-counter');
    const updateCounter = () => {
        const len = caption.value.length;
        counter.textContent = `${len} / 200`;
        counter.classList.toggle('is-warn', len > 160 && len <= 195);
        counter.classList.toggle('is-error', len > 195);
    };
    caption.addEventListener('input', updateCounter);
    updateCounter();

    const previewFile = (inputId, previewId) => {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        input.addEventListener('change', () => {
            const file = input.files?.[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => { preview.src = e.target.result; preview.style.display = ''; };
            reader.readAsDataURL(file);
        });
    };
    previewFile('cp-image', 'cp-image-preview');
    previewFile('cp-avatar', 'cp-avatar-preview');

    const form = document.getElementById('cp-form');
    const submit = document.getElementById('cp-submit');
    form.addEventListener('submit', () => {
        submit.classList.add('is-loading');
        submit.disabled = true;
    });
})();
</script>
@endsection
