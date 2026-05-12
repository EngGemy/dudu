<?php

namespace App\Models\Privacy;

use Illuminate\Database\Eloquent\Model;

class PrivacyTranslation extends Model
{
    protected $fillable = ['title', 'description', 'slug'];

    public $timestamps = false;
}
