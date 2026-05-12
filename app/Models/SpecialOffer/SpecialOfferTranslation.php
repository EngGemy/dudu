<?php

namespace App\Models\SpecialOffer;

use Illuminate\Database\Eloquent\Model;

class SpecialOfferTranslation extends Model
{
    // public $table = 'special_offer_translations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description'];

    public $timestamps = false;
}
