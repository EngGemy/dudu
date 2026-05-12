<?php

namespace App\Models\Privacy;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug'];

    protected $translationForeignKey = 'privacy_id';
}
