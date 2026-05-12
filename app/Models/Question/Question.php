<?php

namespace App\Models\Question;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory,Translatable;

    public $translatedAttributes = ['title', 'description', 'slug'];

    protected $translationForeignKey = 'question_id';

    public function getFormattedDate()
    {
        return Carbon::parse($this->created_at)->format('d F, Y'); // like 28 May, 2024
    }

    public function question_translations()
    {
        return $this->hasMany(QuestionTranslation::class, 'question_id');
    }

    public static function booted()
    {
        static::deleted(function ($blog) {
            $blog->question_translations()->delete();

        });
    }
}
