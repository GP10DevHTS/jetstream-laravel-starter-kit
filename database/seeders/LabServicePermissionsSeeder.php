<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabServicePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lab_service = Module::create([
            'name' => 'Lab Service',
        ]);

        $lab_service_permissions = [
            'view lab service module',
            'add lab service',
            'edit lab service',
            'delete lab service',
        ];

        foreach ($lab_service_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $lab_service->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
