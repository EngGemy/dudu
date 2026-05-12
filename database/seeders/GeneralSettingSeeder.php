<?php

namespace Database\Seeders;

use App\Models\General_setting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = General_setting::first();
        if (! $setting) {
            General_setting::create([
                'site_logo_header' => 'logo.png',

            ]);
        } else {
            $setting->update(['site_logo_header' => 'logo.png']);
        }
    }
}
