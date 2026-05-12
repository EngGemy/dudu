<?php

namespace App\Models\aboutUs;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    protected $translationForeignKey = 'about_us_id';

    protected $fillable = ['image', 'status', 'meta_img'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/about_us/'.$this->image);

        }
    }

    public function getStatus($type)
    {
        $data = match ($type) {
            0 => 'Header',
            1 => 'Who We Are',
            2 => 'Mission',
            3 => 'Vision',
            4 => 'Services',
            5 => 'Team',
            default => null,

        };

        return $data;
    }
}
