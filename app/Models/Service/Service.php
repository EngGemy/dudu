<?php

namespace App\Models\Service;

use App\Models\Tour;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    protected $translationForeignKey = 'service_id';

    protected $fillable = ['icon', 'meta_img'];

    protected $appends = ['icon_url'];

    public function getIconUrlAttribute()
    {

        if ($this->icon) {
            return asset('/assets/images/services/'.$this->icon);

        }
    }

    public function service_translations()
    {
        return $this->hasMany(ServiceTranslation::class, 'service_id');
    }

    public static function booted()
    {
        static::deleted(function ($service) {
            $service->service_translations()->delete();

        });
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_services');
    }
    // public static function boot() {
    //     parent::boot();

    //     static::deleting(function($hall) { // before delete() method call this
    //         $hall->tours()->detach();
    //     });
    // }

}
