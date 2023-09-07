<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles_permissions = Module::create([
            'name' => 'Roles & Permissions',
        ]);

        $roles_and_permissions = [
            'view roles and permission module',
            'view roles module',
            'view assign role module',
        ];

        foreach ($roles_and_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $roles_permissions->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
