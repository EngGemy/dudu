<?php

namespace App\Models\Terms;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug'];

    protected $translationForeignKey = 'term_id';
}
