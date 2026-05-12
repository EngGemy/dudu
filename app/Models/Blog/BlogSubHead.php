<?php

namespace App\Models\Blog;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSubHead extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['name'];

    protected $translationForeignKey = 'blog_sub_head_id';

    protected $fillable = ['blog_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function sub_head_translations()
    {
        return $this->hasMany(BlogSubHeadTranslation::class, 'blog_sub_head_id');
    }
}
