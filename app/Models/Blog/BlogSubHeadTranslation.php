<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogSubHeadTranslation extends Model
{
    protected $table = 'blog_sub_head_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'blog_sub_head_id'];

    public $timestamps = false;
}
