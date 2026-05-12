<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategoryTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['post_category_id', 'locale', 'name', 'meta_title', 'description'];

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
