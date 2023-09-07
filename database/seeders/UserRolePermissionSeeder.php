<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_role = Module::create([
            'name' => 'Role',
        ]);

        $user_role_permissions = [
            'add role',
            'add permission to a role',
            'edit role',
            'edit permissions',
        ];

        foreach ($user_role_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $user_role->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
