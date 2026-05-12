@extends('dashboard.layouts.app')

@section('style')
<style>
    .cp-table img.thumb { width: 56px; height: 70px; object-fit: cover; border-radius: 8px; }
    .cp-table img.avatar { width: 32px; height: 32px; object-fit: cover; border-radius: 50%; box-shadow: 0 0 0 2px #fff, 0 0 0 3px #e5e7eb; }
    .cp-handle { cursor: grab; color: #9ca3af; user-select: none; }
    .cp-handle:hover { color: #4839EB; }
    .cp-row.dragging { opacity: .5; background: #f3f4f6; }
    .cp-platform { display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 999px; font-size: 11px; font-weight: 600; text-transform: capitalize; }
    .cp-platform.instagram { background: #fdf2f8; color: #be185d; }
    .cp-platform.tiktok { background: #f1f5f9; color: #0f172a; }
    .cp-platform.twitter { background: #eff6ff; color: #1d4ed8; }
    .cp-platform.manual { background: #f3f4f6; color: #4b5563; }
    .cp-toggle { position: relative; display: inline-block; width: 42px; height: 22px; }
    .cp-toggle input { opacity: 0; width: 0; height: 0; }
    .cp-toggle .slider { position: absolute; cursor: pointer; inset: 0; background: #cbd5e1; border-radius: 999px; transition: .25s; }
    .cp-toggle .slider::before { content: ""; position: absolute; height: 16px; width: 16px; left: 3px; top: 3px; background: white; border-radius: 50%; transition: .25s; }
    .cp-toggle input:checked + .slider { background: #16a34a; }
    .cp-toggle input:checked + .slider::before { transform: translateX(20px); }
    .cp-empty { text-align: center; padding: 60px 24px; }
    .cp-empty-icon { width: 64px; height: 64px; margin: 0 auto 16px; border-radius: 50%; background: #eef2ff; color: #4839EB; display: inline-flex; align-items: center; justify-content: center; }
</style>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <h3 class="content-header-title mb-0">Community Gallery</h3>
                <small class="text-muted">User-generated posts featured on the home page.</small>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <a href="{{ route('admin.community-posts.create') }}" class="btn btn-primary mb-2 waves-effect waves-light">
                    <i class="feather icon-plus"></i>&nbsp; Add Post
                </a>
            </div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        @if($posts->isEmpty())
                            <div class="cp-empty">
                                <div class="cp-empty-icon">
                                    <i class="feather icon-image" style="font-size: 28px;"></i>
                                </div>
                                <h4>No community posts yet</h4>
                                <p class="text-muted">Add posts that will appear in the "From The Community" section on the home page.</p>
                                <a href="{{ route('admin.community-posts.create') }}" class="btn btn-primary mt-2">
                                    <i class="feather icon-plus"></i> Create your first post
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table cp-table" id="cp-table">
                                    <thead>
                                        <tr>
                                            <th style="width:40px"></th>
                                            <th style="width:80px">Image</th>
                                            <th>Username</th>
                                            <th>Platform</th>
                                            <th>Caption</th>
                                            <th style="width:90px">Active</th>
                                            <th style="width:120px;text-align:right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cp-tbody">
                                        @foreach($posts as $post)
                                            <tr class="cp-row" data-id="{{ $post->id }}">
                                                <td><span class="cp-handle" title="Drag to reorder">⠿</span></td>
                                                <td>
                                                    <img class="thumb" src="{{ $post->resolved_image_url }}" alt="{{ $post->username }}" loading="lazy">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center" style="gap:8px;">
                                                        @if($post->resolved_avatar_url)
                                                            <img class="avatar" src="{{ $post->resolved_avatar_url }}" alt="">
                                                        @endif
                                                        <strong>{{ $post->username }}</strong>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="cp-platform {{ $post->platform }}">{{ $post->platform }}</span>
                                                </td>
                                                <td style="max-width:320px;color:#6b7280;">{{ $post->caption ?: '—' }}</td>
                                                <td>
                                                    <label class="cp-toggle" title="Toggle active">
                                                        <input type="checkbox" class="cp-toggle-input" data-id="{{ $post->id }}" {{ $post->is_active ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </td>
                                                <td style="text-align:right">
                                                    <a href="{{ route('admin.community-posts.edit', $post) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="feather icon-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.community-posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this post?');">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                            <i class="feather icon-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-end mt-2">
                                {{ $posts->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
(function () {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content;

    const tbody = document.getElementById('cp-tbody');
    if (tbody && window.Sortable) {
        Sortable.create(tbody, {
            handle: '.cp-handle',
            animation: 150,
            ghostClass: 'dragging',
            onEnd: function () {
                const items = Array.from(tbody.querySelectorAll('.cp-row')).map((row, idx) => ({
                    id: parseInt(row.dataset.id, 10),
                    sort_order: idx + 1,
                }));
                fetch("{{ route('admin.community-posts.reorder') }}", {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' },
                    body: JSON.stringify({ items }),
                }).catch(() => {});
            },
        });
    }

    document.querySelectorAll('.cp-toggle-input').forEach(input => {
        input.addEventListener('change', async function () {
            const id = this.dataset.id;
            const original = !this.checked;
            this.disabled = true;
            try {
                const res = await fetch(`{{ url('cp_admins/community-posts') }}/${id}/toggle`, {
                    method: 'PATCH',
                    headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' },
                });
                if (!res.ok) throw new Error('failed');
                const data = await res.json();
                this.checked = data.is_active;
            } catch (e) {
                this.checked = original;
                alert('Could not update. Please try again.');
            } finally {
                this.disabled = false;
            }
        });
    });
})();
</script>
@endsection
