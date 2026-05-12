<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * TODO(i18n): This model uses Translatable trait, but its parent form (EventController) stores
 * field values as a flat JSON array on the main translation row. Per-locale entry for nested
 * sub-resources requires form redesign. Defer to Tier 4.
 *
 * Current admin behavior: sub-resource content is captured in the locale active during the parent
 * edit session; switching the parent's primary translation tab does NOT switch sub-resource content.
 */
class EventOverview extends Model
{
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $table = 'event_overviews';

    protected $with = ['translations'];

    protected $guarded = [];

    public $translatedAttributes = ['values'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function event_overviews_translations()
    {
        return $this->hasMany(EventOverviewTranslation::class, 'event_overview_id');
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
