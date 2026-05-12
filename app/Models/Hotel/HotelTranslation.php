<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address'];
}
