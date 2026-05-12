<?php

namespace App\Models\SpecialOffer;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug'];

    protected $translationForeignKey = 'special_offer_id';

    protected $fillable = ['image', 'status'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/special_offer/'.$this->image);

        }
    }

    public function getStatus($type)
    {
        $data = match ($type) {
            '0' => 'A',
            '1' => 'B',
            default => null,

        };

        return $data;
    }
}
