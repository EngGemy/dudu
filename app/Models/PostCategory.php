<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'meta_description'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function translations()
    {
        return $this->hasMany(PostCategoryTranslation::class);
    }
}
