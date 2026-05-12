<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogService extends Model
{
    use HasFactory;

    protected $table = 'blog_services';

    protected $fillable = ['blog_id', 'service_id'];

    public $timestamps = false;
}
