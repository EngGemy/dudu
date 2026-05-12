<?php

namespace App\Models\PopularVideo;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularVideo extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title'];

    protected $translationForeignKey = 'popular_video_id';

    protected $fillable = ['link', 'status'];

    protected $appends = ['video'];

    //    public function getVideoAttribute()
    //    {
    //
    //         return asset($this->link) ?? null;
    //    }

    public function video_translations()
    {
        return $this->hasMany(PopularVideoTranslation::class, 'popular_video_id', 'id');
    }

    public static function booted()
    {
        static::deleted(function ($popular_video) {
            $popular_video->video_translations()->delete();

        });
    }
}
