<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $setting = DB::table('general_settings')->first();

        if ($setting) {
            foreach (['en', 'zh', 'zh-Hant'] as $locale) {
                DB::table('general_settings_translations')->insert([
                    'general_setting_id' => $setting->id,
                    'locale' => $locale,
                    'site_name' => $setting->site_name,
                    'opening_words' => $setting->opening_words,
                    'Tags' => $setting->Tags,
                    'address' => $setting->address,
                    'location' => $setting->location,
                ]);
            }
        }
    }

    public function down(): void
    {
        DB::table('general_settings_translations')->delete();
    }
};
