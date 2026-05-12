<?php

namespace App\Models\GeneralComment;

use Illuminate\Database\Eloquent\Model;

class GeneralCommentTranslation extends Model
{
    protected $table = 'general_comment_translations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'username', 'general_comment_id'];

    public $timestamps = false;
}
