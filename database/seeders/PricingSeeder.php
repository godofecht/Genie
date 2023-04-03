<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pricing = [
            [
                'id' => 1,
                'title' => 'Flexible and transparent pricing',
                'subtitle' => 'Whatever your status, our offers evolve according to your needs.',
                'promotion' => 'Save up to 10%'
            ]
        ];

        Pricing::insert($pricing);
    }
}
