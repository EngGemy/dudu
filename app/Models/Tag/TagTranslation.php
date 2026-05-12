<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public $timestamps = false;
}
