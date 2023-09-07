<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabServiceResultOptionDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lab_service_result_options = [
            ['result_option_id' => 1, 'lab_service_id' => 1],
            ['result_option_id' => 2, 'lab_service_id' => 1],
            ['result_option_id' => 1, 'lab_service_id' => 2],
            ['result_option_id' => 2, 'lab_service_id' => 2],
            ['result_option_id' => 3, 'lab_service_id' => 3],
            ['result_option_id' => 4, 'lab_service_id' => 3],
            ['result_option_id' => 1, 'lab_service_id' => 4],
            ['result_option_id' => 2, 'lab_service_id' => 4],
            ['result_option_id' => 1, 'lab_service_id' => 5],
            ['result_option_id' => 2, 'lab_service_id' => 5],
            ['result_option_id' => 1, 'lab_service_id' => 6],
            ['result_option_id' => 2, 'lab_service_id' => 6],
            ['result_option_id' => 1, 'lab_service_id' => 7],
            ['result_option_id' => 2, 'lab_service_id' => 7],
            ['result_option_id' => 1, 'lab_service_id' => 8],
            ['result_option_id' => 2, 'lab_service_id' => 8],
            ['result_option_id' => 1, 'lab_service_id' => 9],
            ['result_option_id' => 2, 'lab_service_id' => 9],
            ['result_option_id' => 1, 'lab_service_id' => 10],
            ['result_option_id' => 2, 'lab_service_id' => 10],
            ['result_option_id' => 22, 'lab_service_id' => 11],
            ['result_option_id' => 23, 'lab_service_id' => 11],
            ['result_option_id' => 24, 'lab_service_id' => 11],
            ['result_option_id' => 25, 'lab_service_id' => 11],
            ['result_option_id' => 1, 'lab_service_id' => 12],
            ['result_option_id' => 2, 'lab_service_id' => 12],
            ['result_option_id' => 1, 'lab_service_id' => 13],
            ['result_option_id' => 2, 'lab_service_id' => 13],
            ['result_option_id' => 3, 'lab_service_id' => 14],
            ['result_option_id' => 4, 'lab_service_id' => 14],
            ['result_option_id' => 1, 'lab_service_id' => 15],
            ['result_option_id' => 2, 'lab_service_id' => 15],
            ['result_option_id' => 1, 'lab_service_id' => 16],
            ['result_option_id' => 2, 'lab_service_id' => 16],
            ['result_option_id' => 18, 'lab_service_id' => 17],
            ['result_option_id' => 19, 'lab_service_id' => 17],
            ['result_option_id' => 20, 'lab_service_id' => 17],
            ['result_option_id' => 21, 'lab_service_id' => 17],
            ['result_option_id' => 4, 'lab_service_id' => 18],
            ['result_option_id' => 15, 'lab_service_id' => 18],
            ['result_option_id' => 16, 'lab_service_id' => 18],
            ['result_option_id' => 17, 'lab_service_id' => 18],
            ['result_option_id' => 7, 'lab_service_id' => 19],
            ['result_option_id' => 8, 'lab_service_id' => 19],
            ['result_option_id' => 9, 'lab_service_id' => 19],
            ['result_option_id' => 10, 'lab_service_id' => 19],
            ['result_option_id' => 11, 'lab_service_id' => 19],
            ['result_option_id' => 12, 'lab_service_id' => 19],
            ['result_option_id' => 13, 'lab_service_id' => 19],
            ['result_option_id' => 14, 'lab_service_id' => 19],
            ['result_option_id' => 1, 'lab_service_id' => 20],
            ['result_option_id' => 2, 'lab_service_id' => 20],
            ['result_option_id' => 1, 'lab_service_id' => 21],
            ['result_option_id' => 2, 'lab_service_id' => 21],
            ['result_option_id' => 1, 'lab_service_id' => 22],
            ['result_option_id' => 2, 'lab_service_id' => 23],
            ['result_option_id' => 1, 'lab_service_id' => 23],
            ['result_option_id' => 2, 'lab_service_id' => 24],
            ['result_option_id' => 1, 'lab_service_id' => 24],
            ['result_option_id' => 2, 'lab_service_id' => 25],
            ['result_option_id' => 1, 'lab_service_id' => 25],
            ['result_option_id' => 2, 'lab_service_id' => 26],
            ['result_option_id' => 1, 'lab_service_id' => 26],
            ['result_option_id' => 2, 'lab_service_id' => 27],
            ['result_option_id' => 1, 'lab_service_id' => 27],
            ['result_option_id' => 2, 'lab_service_id' => 28],
            ['result_option_id' => 1, 'lab_service_id' => 28],
            ['result_option_id' => 3, 'lab_service_id' => 29],
            ['result_option_id' => 4, 'lab_service_id' => 29],
            ['result_option_id' => 5, 'lab_service_id' => 30],
            ['result_option_id' => 5, 'lab_service_id' => 30],
            ['result_option_id' => 1, 'lab_service_id' => 31],
            ['result_option_id' => 2, 'lab_service_id' => 31],
        ];

        DB::table('lab_service_result_option')->insert($lab_service_result_options);
    }
}
