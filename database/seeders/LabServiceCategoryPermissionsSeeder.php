<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabServiceCategoryPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lab_service_category = Module::create([
            'name' => 'Lab Service Category',
        ]);

        $lab_service_category_permissions = [
            'view lab service category module',
            'add service category',
            'edit service category',
            'delete service category',
        ];

        foreach ($lab_service_category_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $lab_service_category->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
