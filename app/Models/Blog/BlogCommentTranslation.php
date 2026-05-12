<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogCommentTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'username'];

    public $timestamps = false;
}
