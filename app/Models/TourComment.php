<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TourComment extends Model
{
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $table = 'tour_comments';

    protected $guarded = [];

    public function getFormattedDate()
    {
        return Carbon::parse($this->created_at)->format('d F, Y'); // like 28 May, 2024
    }

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/comments/'.$value) : '';
    }

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
