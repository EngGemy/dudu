<?php

namespace App\Models;

use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogGallary extends Model
{
    use HasFactory;

    protected $table = 'blog_gallaries';

    protected $fillable = ['photo', 'blog_id'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->photo) {
            return asset('/assets/images/blog_gallary/'.$this->photo);

        }
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
