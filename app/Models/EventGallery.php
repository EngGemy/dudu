<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGallery extends Model
{
    use HasFactory;

    protected $table = 'event_photos';

    protected $guarded = [];

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('public/assets/images/events/'.$value) : '';
    }
}
