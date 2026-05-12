<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'tip_info', 'meta_title', 'meta_description'];

    public $timestamps = false;
}
