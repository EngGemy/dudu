<?php

namespace App\Models\PopularVideo;

use Illuminate\Database\Eloquent\Model;

class PopularVideoTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public $timestamps = false;
}
