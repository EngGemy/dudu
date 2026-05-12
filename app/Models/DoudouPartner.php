<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoudouPartner extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/doudou_partner/'.$this->image);

        }
    }
}
