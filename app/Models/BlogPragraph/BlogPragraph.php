<?php

namespace App\Models\BlogPragraph;

use App\Models\Blog\Blog;
use App\Models\PragraphDetails\PragraphDetails;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPragraph extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title'];

    protected $translationForeignKey = 'blog_pragraph_id';

    protected $fillable = ['image', 'blog_id'];

    protected $appends = ['image_url'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/blog_pragraph/'.$this->image);

        }
    }

    public function pragraph_details()
    {
        return $this->hasMany(PragraphDetails::class, 'blog_pragraph_id');
    }
}
