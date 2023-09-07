<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboratoryPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laboratory = Module::create([
            'name' => 'Laboratory',
        ]);

        $laboratory_permissions = [
            'view laboratory module',
            'view test order',
            'view test result',
        ];

        foreach ($laboratory_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $laboratory->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
