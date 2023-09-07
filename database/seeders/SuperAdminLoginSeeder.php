<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Allan Muntu',
            'email' => 'muntuallan@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $admin = Role::create(['name' => 'Admin']);
        $user->assignRole($admin);
    }
}
