<?php

namespace App\Models\Slider;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'slug'];

    public $timestamps = false;
}
