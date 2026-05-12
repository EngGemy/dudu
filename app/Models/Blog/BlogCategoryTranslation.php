<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'category_id'];

    public $timestamps = false;
}
