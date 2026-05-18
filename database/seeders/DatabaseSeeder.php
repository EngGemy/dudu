<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            GeneralSettingSeeder::class,
            SocialSettingSeeder::class,

            // i18n sample content — dependency order: taxonomy first, then products
            CategorySeeder::class,
            TourTypeSeeder::class,
            TourGroupSeeder::class,
            CitySeeder::class,
            InclusionSeeder::class,
            ExclusionSeeder::class,
            TipSeeder::class,
            HotelSeeder::class,
            TravelServiceSeeder::class,

            // Depends on all taxonomy above
            TourSeeder::class,
            EventSeeder::class,
            BlogSeeder::class,

            // Pages section
            AboutUsSeeder::class,
            QuestionSeeder::class,
            CareerSeeder::class,
            SliderSeeder::class,
            DoudouPartnerSeeder::class,
            PopularVideoSeeder::class,
            DoudouFrontendPageSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
