<?php

namespace App\Models\Slider;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug'];

    protected $translationForeignKey = 'slider_id';

    protected $fillable = ['image', 'status'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/slider/'.$this->image);

        }
    }

    public function getStatus($type)
    {
        $data = match ($type) {
            0 => 'Home',
            1 => 'Blog',
            2 => 'About_us',
            3 => 'Loyalty',
            4 => 'Careers',
            5 => 'ToursDetails',
            6 => 'Tours',
            7 => 'Privacy',
            8 => 'Works',
            9 => 'Partners',
            10 => 'Services',
            11 => 'Terms',
            default => null,

        };

        return $data;
    }
}
