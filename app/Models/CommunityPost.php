<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CommunityPost extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['caption'];

    protected $fillable = [
        'username',
        'avatar_url',
        'image_url',
        'instagram_post_url',
        'platform',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getPlatformIconAttribute(): string
    {
        return match ($this->platform) {
            'instagram' => 'instagram',
            'tiktok' => 'tiktok',
            'twitter' => 'twitter',
            default => 'globe',
        };
    }

    public function getResolvedAvatarUrlAttribute(): ?string
    {
        return $this->resolveUrl($this->avatar_url);
    }

    public function getResolvedImageUrlAttribute(): ?string
    {
        return $this->resolveUrl($this->image_url);
    }

    private function resolveUrl(?string $value): ?string
    {
        if (! $value) {
            return null;
        }
        if (preg_match('#^(https?:)?//#i', $value)) {
            return $value;
        }

        return Storage::disk('public')->url($value);
    }
}
