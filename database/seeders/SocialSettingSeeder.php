<?php

namespace Database\Seeders;

use App\Models\Social_setting;
use Illuminate\Database\Seeder;

class SocialSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Social_setting::first();
        if (! $setting) {
            Social_setting::create([
                'facebook' => 'https://www.facebook.com/',

            ]);
        } else {
            $setting->update(['facebook' => 'https://www.facebook.com/']);
        }
    }
}
