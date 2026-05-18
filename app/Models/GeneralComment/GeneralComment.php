<?php

namespace App\Models\GeneralComment;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralComment extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['comment', 'username'];

    protected $translationForeignKey = 'general_comment_id';

    protected $fillable = ['photo', 'date', 'rate'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->photo && file_exists(public_path('assets/images/general-comments/'.$this->photo))) {
            return asset('/assets/images/general-comments/'.$this->photo);

        }

        return asset('/assets/images/avatar.jpeg');
    }

    public function getFormattedDate()
    {
        return Carbon::parse($this->date)->format('d F Y'); // like 28 May, 2024
    }
}
