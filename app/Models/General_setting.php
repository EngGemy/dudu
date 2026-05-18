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
        if ($value && file_exists(public_path('assets/images/settings/'.$value))) {
            return asset('assets/images/settings/'.$value);
        }

        if ($value && file_exists(public_path('assets/images/'.$value))) {
            return asset('assets/images/'.$value);
        }

        return asset('assets/images/logo.png');
    }

    public function getSitelogofooterAttribute($value)
    {
        if ($value && file_exists(public_path('assets/images/settings/'.$value))) {
            return asset('assets/images/settings/'.$value);
        }

        if ($value && file_exists(public_path('assets/images/'.$value))) {
            return asset('assets/images/'.$value);
        }

        return asset('assets/images/logo-footer.png');
    }

    public function getSitelogoIconAttribute($value)
    {
        if ($value && file_exists(public_path('assets/images/settings/'.$value))) {
            return asset('assets/images/settings/'.$value);
        }

        if ($value && file_exists(public_path('assets/images/'.$value))) {
            return asset('assets/images/'.$value);
        }

        return asset('assets/images/logo-sm.png');
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
