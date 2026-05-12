<?php

namespace App\Models\Question;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'slug'];

    public $timestamps = false;
}
