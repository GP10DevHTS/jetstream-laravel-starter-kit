<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpacemenPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spacemen = Module::create([
            'name' => 'Specimen',
        ]);

        $spacemen_permissions = [
            'view specimen module',
            'add specimen',
            'edit specimen',
            'delete specimen',
        ];

        foreach ($spacemen_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $spacemen->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
