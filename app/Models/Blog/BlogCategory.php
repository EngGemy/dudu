<?php

namespace App\Models\Blog;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['status', 'image'];

    protected $translationForeignKey = 'category_id';

    protected $fillable = ['status', 'image'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/blog_categories/'.$this->image);

        }
    }
}
