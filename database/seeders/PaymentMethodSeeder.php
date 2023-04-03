<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_methods = [
            [
                'id'          => 1,
                'title'       => 'Stripe',
                'is_enabled'  => true
            ],
            [
                'id'          => 2,
                'title'       => 'PayPal',
                'is_enabled'  => true
            ]
        ];

        PaymentMethod::insert($payment_methods);
    }
}
