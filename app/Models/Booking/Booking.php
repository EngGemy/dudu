<?php

namespace App\Models\Booking;

use App\Models\City;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'code', 'title', 'city_id', 'arrival_date', 'departure_date', 'range_age', 'nationality', 'adt', 'chd', 'notes', 'tour_id', 'program_file'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
