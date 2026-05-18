<?php

namespace Database\Seeders;

use App\Models\DoudouPartner;
use Illuminate\Database\Seeder;

class DoudouPartnerSeeder extends Seeder
{
    public function run(): void
    {
        $dir = public_path('assets/images/doudou_partner');
        $images = is_dir($dir)
            ? array_map('basename', glob($dir.'/*.{jpg,jpeg,png,webp}', GLOB_BRACE) ?: [])
            : [];

        foreach (array_slice($images, 0, 10) as $image) {
            DoudouPartner::firstOrCreate(['image' => $image]);
        }
    }
}
