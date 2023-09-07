<?php

namespace Database\Seeders;

use App\Models\LabService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabServiceDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lab_services = [
            ['lab_service_category_id' => 1, 'service_name' => 'Coombs Test Direct', 'price' => 184500],
            ['lab_service_category_id' => 1, 'service_name' => 'Coombs Test Indirect', 'price' => 186000],
            ['lab_service_category_id' => 2, 'service_name' => 'Rheumatoid Factor (RF)', 'price' => 177500],
            ['lab_service_category_id' => 3, 'service_name' => 'HIV DNA PCR', 'price' => 176000],
            ['lab_service_category_id' => 4, 'service_name' => 'Hep A Ab (IgM)', 'price' => 175000],
            ['lab_service_category_id' => 2, 'service_name' => 'Fecal Occult Blood', 'price' => 174000],
            ['lab_service_category_id' => 2, 'service_name' => 'Salmonella typhi Ag', 'price' => 165000],
            ['lab_service_category_id' => 4, 'service_name' => 'Hepatitis C Virus Ab', 'price' => 159000],
            ['lab_service_category_id' => 4, 'service_name' => 'Hep BsAg', 'price' => 155000],
            ['lab_service_category_id' => 5, 'service_name' => 'SERUM HCG', 'price' => 153000],
            ['lab_service_category_id' => 1, 'service_name' => 'Sickle cell Test (Sickle Scan)', 'price' => 151000],
            ['lab_service_category_id' => 2, 'service_name' => 'H.Pylori Ag', 'price' => 143000],
            ['lab_service_category_id' => 2, 'service_name' => 'H.Pylori Ab', 'price' => 143000],
            ['lab_service_category_id' => 2, 'service_name' => 'CRP', 'price' => 139000],
            ['lab_service_category_id' => 2, 'service_name' => 'Gonorrhea Ag Test', 'price' => 100000],
            ['lab_service_category_id' => 2, 'service_name' => 'Chlamydia Ag', 'price' => 100000],
            ['lab_service_category_id' => 1, 'service_name' => 'BS for mps', 'price' => 95000],
            ['lab_service_category_id' => 2, 'service_name' => 'Brucella Agglutination Test', 'price' => 90000],
            ['lab_service_category_id' => 1, 'service_name' => 'Blood Group', 'price' => 84000],
            ['lab_service_category_id' => 2, 'service_name' => 'Urine HCG', 'price' => 70000],
            ['lab_service_category_id' => 2, 'service_name' => 'Syphilis Ab Test', 'price' => 64000],
            ['lab_service_category_id' => 2, 'service_name' => 'Serum CRAG', 'price' => 84000],
            ['lab_service_category_id' => 6, 'service_name' => 'SARS-CoV-2 Ag (Homo collection)', 'price' => 62000],
            ['lab_service_category_id' => 2, 'service_name' => 'ROTA VIRUS Ag', 'price' => 59000],
            ['lab_service_category_id' => 1, 'service_name' => 'Malaria RDT', 'price' => 42000],
            ['lab_service_category_id' => 7, 'service_name' => 'HBsAg (Hepatitis B surface Antigens)', 'price' => 42000],
            ['lab_service_category_id' => 7, 'service_name' => 'HBsAb (Hepatits B Surface Anti body)', 'price' => 14000],
            ['lab_service_category_id' => 5, 'service_name' => 'HCG', 'price' => 12000],
            ['lab_service_category_id' => 8, 'service_name' => 'VDRL', 'price' => 11000],
            ['lab_service_category_id' => 3, 'service_name' => 'RCT', 'price' => 11000],
            ['lab_service_category_id' => 9, 'service_name' => 'BAT', 'price' => 90000],
            ['lab_service_category_id' => 10, 'service_name' => 'TST', 'price' => 86000],
            ['lab_service_category_id' => 10, 'service_name' => 'Widal test', 'price' => 7000],
            ['lab_service_category_id' => 11, 'service_name' => 'SARS-CoV-2 Ag', 'price' => 6000],
            ['lab_service_category_id' => 11, 'service_name' => 'HIV 1/2', 'price' => 6000],
        ];

        foreach ($lab_services as $lab_service) {
            LabService::create($lab_service);
        }
    }
}
