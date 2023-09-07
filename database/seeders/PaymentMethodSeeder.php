<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_methods = [
            ['method' => 'Cash'],
            ['method' => 'Cheque'],
            ['method' => 'Mobile Money'],
            ['method' => 'Bank'],
        ];

        foreach ($payment_methods as $payment_method) {
            PaymentMethod::create($payment_method);
        }
    }
}
