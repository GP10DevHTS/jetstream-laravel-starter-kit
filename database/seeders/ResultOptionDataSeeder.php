<?php

namespace Database\Seeders;

use App\Models\ResultOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultOptionDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $result_options = [
            ['option' => 'Positive', 'code'   => '+ve', 'symbol' => '+'],
            ['option' => 'Negative', 'code'   => '-ve', 'symbol' => '-'],
        ];

        foreach ($result_options as $result_option) {
            ResultOption::create($result_option);
        }
    }
}
