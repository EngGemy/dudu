<?php

namespace App\Models\PragraphDetails;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PragraphDetails extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description'];

    protected $translationForeignKey = 'pragraph_detail_id';

    protected $fillable = ['blog_pragraph_id', 'blog_id'];
}
