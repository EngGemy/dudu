<?php

namespace App\Models\TravelService;

use Illuminate\Database\Eloquent\Model;

class TravelServiceTranslation extends Model
{
    public $table = 'travel_services_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description', 'meta_title', 'meta_description'];

    public $timestamps = false;
}
