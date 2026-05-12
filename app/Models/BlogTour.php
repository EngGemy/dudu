<?php

namespace App\Models;

use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BlogTour extends Pivot
{
    use HasFactory;

    protected $table = 'blog_tours';

    protected $fillable = ['blog_id', 'tour_id'];

    public $timestamps = false;

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
