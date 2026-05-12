<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    public $timestamps = false;
}
