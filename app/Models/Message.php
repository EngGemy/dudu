<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'message', 'code', 'title', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getTitle($type)
    {
        $data = match ($type) {
            0 => 'Mr',
            1 => 'Ms',

            default => null,

        };

        return $data;
    }
}
