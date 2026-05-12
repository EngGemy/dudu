<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Model;

class WorkTranslation extends Model
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
