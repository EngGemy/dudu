<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourTip extends Model
{
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $table = 'tour_tips';

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
