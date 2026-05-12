<?php

namespace App\Models\Hotel;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['name', 'address'];

    protected $translationForeignKey = 'hotel_id';

    protected $fillable = ['phone', 'photo'];

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/hotels/'.$value) : '';
    }

    public function hotel_translations()
    {
        return $this->hasMany(HotelTranslation::class, 'hotel_id');
    }

    public static function booted()
    {
        static::deleted(function ($hotel) {
            $hotel->hotel_translations()->delete();
            delete_photo($hotel->photo);

        });
    }
}
