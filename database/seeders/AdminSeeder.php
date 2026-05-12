<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::where('email', 'admin@gmail.com')->where('username', 'admin')->first();
        if (! $admin) {
            $admins = \App\models\Admin::create([
                'username' => 'admin',
                'role_id' => Role::first()->id,
                'password' => bcrypt('password'),
                'email' => 'admin@gmail.com',
            ]);
        }
    }
}
