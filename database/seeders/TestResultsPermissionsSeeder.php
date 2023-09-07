<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestResultsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test_result = Module::create([
            'name' => 'Test Result',
        ]);

        $test_result_permissions = [
            'add test specimen',
            'edit test specimen',
            'delete test specimen',
            'add results',
            'edit results',
            'view results',
            'print results',
        ];

        foreach ($test_result_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $test_result->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
