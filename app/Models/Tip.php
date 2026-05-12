<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    protected $guarded = [];

    protected $appends = ['image_url'];

    public $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function tip_translations()
    {
        return $this->hasMany(TipTranslation::class, 'tip_id');
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
    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/tips/'.$this->image);

        }
    }
}
