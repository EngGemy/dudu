<?php

namespace App\Models\aboutUs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    public $timestamps = false;
}
