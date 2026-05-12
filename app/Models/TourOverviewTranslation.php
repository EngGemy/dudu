<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourOverviewTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['values'];

    public $timestamps = false;
}
