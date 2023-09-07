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
            LabServiceCategoryPermissionsSeeder::class,
            LabServicePermissionsSeeder::class,
            SpacemenPermissionsSeeder::class,
            PatientPermissionsSeeder::class,
            LaboratoryPermissionsSeeder::class,
            TestOrderPermissionsSeeder::class,
            TestResultsPermissionsSeeder::class,
            AccountPermissionsSeeder::class,
            PaymentsPermissionsSeeder::class,
            RoleAndPermissionsSeeder::class,
            RolesSeeder::class,
            UserRolePermissionSeeder::class,

            PaymentMethodSeeder::class,
            PaymentServiceProviderSeeder::class,

            ResultOptionDataSeeder::class,
            LabServiceCategoryDataSeeder::class,
            LabServiceDataSeeder::class,
            LabServiceResultOptionDataSeeder::class,
            SpecimenDataSeeder::class,
        ]);
    }
}
