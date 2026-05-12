<?php

namespace App\Models\Terms;

use Illuminate\Database\Eloquent\Model;

class TermTranslation extends Model
{
    protected $fillable = ['title', 'description', 'slug'];

    public $timestamps = false;
}
