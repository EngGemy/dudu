<?php

namespace App\Models\Work;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug', 'meta_title', 'meta_description'];

    protected $translationForeignKey = 'work_id';

    protected $fillable = ['image', 'status', 'meta_img'];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {

        if ($this->image) {
            return asset('/assets/images/work/'.$this->image);

        }
    }

    public function getStatus($type)
    {
        $data = match ($type) {
            '0' => 'A',
            '1' => 'B',
            '2' => 'C',
            '3' => 'D',
            '4' => 'E',
            '5' => 'F',
            '6' => 'G',

            default => null,

        };

        return $data;
    }
}
