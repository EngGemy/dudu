<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General_setting extends Model
{
    use HasFactory, Translatable;

    protected $table = 'general_settings';

    public $translatedAttributes = ['site_name', 'opening_words', 'Tags', 'address', 'location'];

    protected $translationForeignKey = 'general_setting_id';

    protected $guarded = [];

    public function getSitelogoheaderAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/settings/'.$value) : '';
    }

    public function getSitelogofooterAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/settings/'.$value) : '';
    }

    public function getSitelogoIconAttribute($value)
    {
        return ($value !== null) ? asset('assets/images/settings/'.$value) : '';
    }

    public function general_setting_translations()
    {
        return $this->hasMany(General_settingTranslation::class, 'general_setting_id');
    }

    public static function booted()
    {
        static::deleted(function ($setting) {
            $setting->general_setting_translations()->delete();
        });
    }
}
