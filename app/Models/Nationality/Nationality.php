<?php

namespace App\Models\Nationality;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'slug'];

    protected $translationForeignKey = 'nationality_id';

    protected $table = 'nationalities';
}
