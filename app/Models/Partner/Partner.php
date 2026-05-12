<?php

namespace App\Models\Partner;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    protected $translationForeignKey = 'partner_id';

    protected $fillable = ['image', 'status', 'meta_img'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/partner/'.$this->image);

        }
    }

    public function getStatus($type)
    {
        $data = match ($type) {
            '0' => 'Header',
            '1' => 'Body',

            default => null,

        };

        return $data;
    }
}
