<?php

namespace App\Models\Career;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Career extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    protected $translationForeignKey = 'career_id';

    protected $fillable = ['image', 'status', 'meta_img'];

    protected $appends = ['image_url'];

    // public function getSlugOptions() : SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom('title')
    //         ->saveSlugsTo('slug');
    // }

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/career/'.$this->image);

        }
    }

    public function getStatus($type)
    {
        $data = match ($type) {
            0 => 'Header',
            1 => 'Body',
            default => null,

        };

        return $data;
    }
}
