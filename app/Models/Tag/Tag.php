<?php

namespace App\Models\Tag;

use App\Models\Blog\Blog;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'tag_id';

    protected $guarded = [];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tags', 'tag_id', 'blog_id');
    }
}
