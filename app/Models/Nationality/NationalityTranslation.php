<?php

namespace App\Models\Nationality;

use Illuminate\Database\Eloquent\Model;

class NationalityTranslation extends Model
{
    protected $table = 'nationality_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'locale'];

    public $timestamps = false;
}
