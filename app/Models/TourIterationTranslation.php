<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourIterationTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'content'];

    public $timestamps = false;
}
