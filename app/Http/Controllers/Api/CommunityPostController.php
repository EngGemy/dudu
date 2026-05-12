<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Models\CommunityPost;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

class CommunityPostController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $posts = Cache::remember('community_posts', 3600, function () {
            return CommunityPost::active()->get();
        });

        return CommunityPostResource::collection($posts);
    }
}
