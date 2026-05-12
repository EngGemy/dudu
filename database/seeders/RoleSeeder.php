<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $per = [];
        foreach (config('global_dash.permissions') as $name => $value) {
            foreach ($value as $name => $value) {
                array_push($per, $name);
            }

        }
        $role = new Role();
        $role->name = 'Admin';
        $role->permissions = json_encode($per);
        $role->save();

    }
}
