<?php

namespace App\Models;

use App\Search\SearchableTranslated;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use SearchableTranslated, Translatable;

    protected function searchIndexBase(): string
    {
        return 'cities';
    }

    protected function searchType(): string
    {
        return 'city';
    }

    protected function searchUrl(): string
    {
        return url('/egypt-tours?city='.$this->id);
    }

    protected function searchImage(): ?string
    {
        return $this->image_url ?: null;
    }

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    protected $guarded = [];

    public $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function city_translations()
    {
        return $this->hasMany(CityTranslation::class, 'city_id');
    }

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/cities/'.$this->image);

        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
}
