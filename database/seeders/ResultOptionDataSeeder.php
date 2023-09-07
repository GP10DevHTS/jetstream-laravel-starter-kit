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
            ['option' => 'Reactive', 'code'   => '+', 'symbol' => '+'],
            ['option' => 'Non reactive', 'code'   => '-', 'symbol' => '-'],
            ['option' => 'Negative TR', 'code'   => '-', 'symbol' => '-'],
            ['option' => 'Positive TRR', 'code'   => '+', 'symbol' => '+'],
            ['option' => 'Blood Group A RhD positive', 'code'   => '+', 'symbol' => '+'],
            ['option' => 'Blood Group A RhD negative', 'code'   => '-', 'symbol' => '-'],
            ['option' => 'Blood Group B RhD positive', 'code'   => '+', 'symbol' => '+'],
            ['option' => 'Blood Group B RhD negative', 'code'   => '-', 'symbol' => '-'],
            ['option' => 'Blood Group AB RhD positive', 'code'   => '+', 'symbol' => '+'],
            ['option' => 'Blood Group AB RhD negative', 'code'   => '-', 'symbol' => '-'],
            ['option' => 'Blood Group O RhD positive', 'code'   => '+', 'symbol' => '+'],
            ['option' => 'Blood Group O RhD negative', 'code'   => '-', 'symbol' => '-'],
            ['option' => 'REACTIVE 1:80', 'code'   => '', 'symbol' => ''],
            ['option' => 'REACTIVE 1:160', 'code'   => '', 'symbol' => ''],
            ['option' => 'REACTIVE 1:320', 'code'   => '', 'symbol' => ''],
            ['option' => 'MALARIA PARASITES SEEN (+)', 'code' => '+', 'symbol' => '+'],
            ['option' => 'MALARIA PARASITES SEEN (++)', 'code' => '++', 'symbol' => '++'],
            ['option' => 'MALARIA PARASITES SEEN (+++)', 'code' => '+++', 'symbol' => '+++'],
            ['option' => 'NO MALARIA PARASITES SEEN', 'code' => '', 'symbol' => ''],
            ['option' => 'HBAS (Carrier)', 'code' => '', 'symbol' => ''],
            ['option' => 'HBSS (Sicklecell)', 'code' => '', 'symbol' => ''],
            ['option' => 'HBSC', 'code' => '', 'symbol' => ''],
            ['option' => 'HBAC', 'code' => '', 'symbol' => ''],
        ];

        foreach ($result_options as $result_option) {
            ResultOption::create($result_option);
        }
    }
}
