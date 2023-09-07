<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            SuperAdminLoginSeeder::class,
            DashboardPermissionsSeeder::class,
            ResultOptionSeeder::class,
            RoleAndPermissionsSeeder::class,
            RolesSeeder::class,
            UserRolePermissionSeeder::class,
            ResultOptionDataSeeder::class,
        ]);
    }
}
