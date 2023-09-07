<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestOrderPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test_order = Module::create([
            'name' => 'Test Order',
        ]);

        DB::table('permissions')->insert([
            'name'       => 'receive order',
            'guard_name' => 'web',
            'module_id'  => $test_order->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
