<?php

namespace App\Models\BlogPragraph;

use Illuminate\Database\Eloquent\Model;

class BlogPragraphTranslation extends Model
{
    protected $table = 'blog_pragraph_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public $timestamps = false;
}
