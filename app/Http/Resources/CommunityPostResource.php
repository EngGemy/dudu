<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommunityPostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'avatar_url' => $this->resolved_avatar_url,
            'image_url' => $this->resolved_image_url,
            'instagram_post_url' => $this->instagram_post_url,
            'platform' => $this->platform,
            'caption' => $this->caption,
        ];
    }
}
