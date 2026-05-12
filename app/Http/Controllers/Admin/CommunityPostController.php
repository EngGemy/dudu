<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CommunityPostController extends Controller
{
    private const CACHE_KEY = 'community_posts';

    public function index(): View
    {
        $posts = CommunityPost::orderBy('sort_order')->orderByDesc('id')->paginate(15);

        return view('admin.community-posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.community-posts.form', [
            'post' => new CommunityPost(['platform' => 'instagram', 'is_active' => true]),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateRequest($request);
        $data['image_url'] = $this->storeUpload($request, 'image', 'community/posts');
        $data['avatar_url'] = $this->storeUpload($request, 'avatar', 'community/avatars');
        $data['sort_order'] = $data['sort_order'] ?? ((int) CommunityPost::max('sort_order') + 1);
        $data['is_active'] = $request->boolean('is_active');

        $data = $this->injectCaptionTranslations($data);

        CommunityPost::create($data);
        $this->forgetCache();

        return redirect()->route('admin.community-posts.index')->with('success', 'Community post created.');
    }

    public function edit(CommunityPost $communityPost): View
    {
        return view('admin.community-posts.form', [
            'post' => $communityPost,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, CommunityPost $communityPost): RedirectResponse
    {
        $data = $this->validateRequest($request, isUpdate: true);

        if ($request->hasFile('image')) {
            $this->deleteFile($communityPost->image_url);
            $data['image_url'] = $this->storeUpload($request, 'image', 'community/posts');
        }
        if ($request->hasFile('avatar')) {
            $this->deleteFile($communityPost->avatar_url);
            $data['avatar_url'] = $this->storeUpload($request, 'avatar', 'community/avatars');
        }
        $data['is_active'] = $request->boolean('is_active');

        $data = $this->injectCaptionTranslations($data);

        $communityPost->update($data);
        $this->forgetCache();

        return redirect()->route('admin.community-posts.index')->with('success', 'Community post updated.');
    }

    public function destroy(CommunityPost $communityPost): RedirectResponse
    {
        $this->deleteFile($communityPost->image_url);
        $this->deleteFile($communityPost->avatar_url);
        $communityPost->delete();
        $this->forgetCache();

        return redirect()->route('admin.community-posts.index')->with('success', 'Community post deleted.');
    }

    public function toggleActive(CommunityPost $communityPost): JsonResponse
    {
        $communityPost->update(['is_active' => ! $communityPost->is_active]);
        $this->forgetCache();

        return response()->json([
            'success' => true,
            'is_active' => $communityPost->is_active,
        ]);
    }

    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'items' => ['required', 'array'],
            'items.*.id' => ['required', 'integer', 'exists:community_posts,id'],
            'items.*.sort_order' => ['required', 'integer', 'min:0'],
        ]);

        foreach ($data['items'] as $item) {
            CommunityPost::where('id', $item['id'])->update(['sort_order' => $item['sort_order']]);
        }
        $this->forgetCache();

        return response()->json(['success' => true]);
    }

    private function validateRequest(Request $request, bool $isUpdate = false): array
    {
        return $request->validate([
            'username' => ['required', 'string', 'max:50'],
            'platform' => ['required', 'in:instagram,tiktok,twitter,manual'],
            'caption' => ['nullable', 'array'],
            'caption.*' => ['nullable', 'string', 'max:200'],
            'instagram_post_url' => ['nullable', 'url', 'max:500'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => [$isUpdate ? 'nullable' : 'required', 'image', 'max:5120', 'mimes:jpg,jpeg,png,webp'],
            'avatar' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
        ]);
    }

    private function storeUpload(Request $request, string $field, string $path): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        return $request->file($field)->store($path, 'public');
    }

    private function deleteFile(?string $path): void
    {
        if (! $path || preg_match('#^(https?:)?//#i', $path)) {
            return;
        }
        Storage::disk('public')->delete($path);
    }

    private function forgetCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    private function injectCaptionTranslations(array $data): array
    {
        $captions = $data['caption'] ?? [];
        unset($data['caption']);

        foreach ($captions as $locale => $value) {
            $data[$locale] = ['caption' => $value];
        }

        return $data;
    }
}
