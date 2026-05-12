<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GallaryPackage extends Model
{
    use HasFactory;

    protected $fillable = ['image'];

    protected $appends = ['photo'];

    public function getPhotoAttribute()
    {

        if ($this->image) {
            return asset('assets/images/gallary_packages/'.$this->image);

        }
    }
}
