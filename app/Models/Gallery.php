<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tour_photos';

    protected $guarded = [];

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/tours/'.$value) : '';
    }
}
