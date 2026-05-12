<?php

namespace App\Models\Career;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    public $timestamps = false;
}
