<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $result_option = Module::create([
            'name' => 'Result Options',
        ]);

        $result_option_permissions = [
            'view result option module',
            'add result option',
            'edit result option',
            'delete result option',
        ];

        foreach ($result_option_permissions as $permission)
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $result_option->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
