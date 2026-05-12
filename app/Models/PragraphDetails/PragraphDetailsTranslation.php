<?php

namespace App\Models\PragraphDetails;

use Illuminate\Database\Eloquent\Model;

class PragraphDetailsTranslation extends Model
{
    protected $table = 'pragraph_detail_translations';

    protected $fillable = ['title', 'description', 'pragraph_detail_id'];

    public $timestamps = false;
}
