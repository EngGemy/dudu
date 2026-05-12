<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * TODO(i18n): This model uses Translatable trait, but InformationController stores fields
 * as flat strings (title/description) via an inline list form. Per-locale entry requires
 * per-row locale-tabs which would require form redesign. Defer to Tier 4.
 *
 * Current admin behavior: sub-resource content is captured in the locale active during the parent
 * edit session; switching the parent's primary translation tab does NOT switch sub-resource content.
 */
class EventInformation extends Model
{
    use Translatable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    protected $table = 'event_informations';

    protected $guarded = [];

    public $translatedAttributes = ['title', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function event_iinformation_translations()
    {
        return $this->hasMany(EventInformationTranslation::class, 'event_information_id');
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
