<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinOurTeam extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'message', 'code', 'title', 'city_id', 'resume', 'hear_about_us'];

    //    protected $appends = ['resume'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getResumeAttribute($value)
    {

        return ($value !== null) ? asset('public/'.$value) : '';

    }
}
