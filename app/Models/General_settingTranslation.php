<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General_settingTranslation extends Model
{
    protected $table = 'general_settings_translations';

    protected $fillable = ['site_name', 'opening_words', 'Tags', 'address', 'location', 'general_setting_id'];

    public $timestamps = false;
}
