<?php

namespace App\Models\Blog;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['comment', 'username'];

    protected $translationForeignKey = 'blog_comment_id';

    protected $fillable = ['rate', 'blog_id', 'photo', 'date'];

    public function getFormattedDate()
    {
        return Carbon::parse($this->date)->format('d F Y'); // like 28 May, 2024
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/blog_comments/'.$value) : '';
    }
}
