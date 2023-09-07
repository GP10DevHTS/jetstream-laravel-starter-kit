<?php

namespace Database\Seeders;

use App\Models\PaymentServiceProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_service_providers = [
            ['provider_name' => 'MTN', 'payment_method_id' => 3],
            ['provider_name' => 'Airtel', 'payment_method_id' => 3],
            ['provider_name' => 'DFCU Bank', 'payment_method_id' => 4],
            ['provider_name' => 'Equity Bank', 'payment_method_id' => 4],
            ['provider_name' => 'StanBic Bank', 'payment_method_id' => 4],
            ['provider_name' => 'Centenary Bank', 'payment_method_id' => 4],
            ['provider_name' => 'ABSA Bank', 'payment_method_id' => 4],
        ];

        foreach ($payment_service_providers as $payment_service_provider) {
            PaymentServiceProvider::create($payment_service_provider);
        }
    }
}
