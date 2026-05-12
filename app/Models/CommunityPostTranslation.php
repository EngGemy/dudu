<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityPostTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'caption'];

    public $timestamps = true;
}
