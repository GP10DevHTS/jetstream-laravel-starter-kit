<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentsPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment = Module::create([
            'name' => 'Payments',
        ]);

        $payment_permissions = [
            'add payments',
            'edit payments',
            'print receipt',
        ];

        foreach ($payment_permissions as $permission) {
            DB::table('permissions')->insert([
                'name'       => $permission,
                'guard_name' => 'web',
                'module_id'  => $payment->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
