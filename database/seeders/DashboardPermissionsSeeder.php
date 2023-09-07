<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dashboard = Module::create([
            'name' => 'Dashboard',
        ]);

        $dashboard_permissions = [
            'view total patients card',
            'view lab services card',
            'view total tests done card',
            'view total income card',
            'view patient chart',
            'view income chart',
        ];

        foreach ($dashboard_permissions as $permission)
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $dashboard->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
