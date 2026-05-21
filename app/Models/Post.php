<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use App\Support\Seo\HasSeoMetadata;

class Post extends Model
{
    use HasSeoMetadata, Translatable;

    protected $fillable = ['user_id', 'post_category_id', 'slug', 'is_published', 'published_at', 'meta_description'];

    public $translatedAttributes = ['title', 'content', 'excerpt', 'meta_title', 'meta_description'];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
