<?php

namespace Database\Seeders;

use App\Models\Spacemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecimenDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specimens = [
            ['spacemen' => 'blood'],
            ['spacemen' => 'urine'],
        ];

        foreach ($specimens as $specimen) {
            Spacemen::create($specimen);
        }
    }
}
