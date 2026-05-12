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
class TourOverview extends Model
{
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $table = 'tour_overviews';

    protected $with = ['translations'];

    protected $guarded = [];

    public $translatedAttributes = ['values'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id');
    }

    public function tour_overviews_translations()
    {
        return $this->hasMany(TourOverviewTranslation::class, 'tour_overview_id');
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
