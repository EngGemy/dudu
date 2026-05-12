<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * TODO(i18n): This model uses Translatable trait, but its parent form (TourController) stores
 * field values as a flat JSON array on the main translation row. Per-locale entry for nested
 * sub-resources requires form redesign. Defer to Tier 4.
 *
 * Current admin behavior: sub-resource content is captured in the locale active during the parent
 * edit session; switching the parent's primary translation tab does NOT switch sub-resource content.
 */
class IterationAttribute extends Model
{
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $table = 'iteration_attributes';

    protected $with = ['translations'];

    protected $guarded = [];

    public $translatedAttributes = ['title', 'description'];

    public function getPhotoAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/iteration_attributes/'.$value) : '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function tour_iteration()
    {
        return $this->belongsTo(TourIteration::class, 'tour_iteration_id');
    }

    public function iteration_attributes_translations()
    {
        return $this->hasMany(IterationAttributeTranslation::class, 'iteration_attribute_id');
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
