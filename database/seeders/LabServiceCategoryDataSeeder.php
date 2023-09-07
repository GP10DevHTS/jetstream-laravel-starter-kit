<?php

namespace Database\Seeders;

use App\Models\LabServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabServiceCategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lab_service_categories = [
            ['category_name' => 'Heamatology'],
            ['category_name' => 'Serology'],
            ['category_name' => 'HIV Testing'],
            ['category_name' => 'Hepatits Viruses'],
            ['category_name' => 'HCG'],
            ['category_name' => 'Microbiology'],
            ['category_name' => 'Hepatits B'],
            ['category_name' => 'Syphilis Test'],
            ['category_name' => 'Brucella test'],
            ['category_name' => 'Typhoid Test'],
            ['category_name' => 'Other Lab Services'],
            ['category_name' => 'Heamatology'],
        ];

        foreach ($lab_service_categories as $lab_service_category) {
            LabServiceCategory::create($lab_service_category);
        }
    }
}
