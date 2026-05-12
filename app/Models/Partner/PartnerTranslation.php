<?php

namespace App\Models\Partner;

use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
    // public $table = 'special_offer_translations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description', 'meta_title', 'meta_description'];

    public $timestamps = false;
}
