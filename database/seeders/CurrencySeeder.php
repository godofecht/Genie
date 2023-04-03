<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'id'     => 1,
                'title'  => 'US Dollar',
                'code'   => 'USD',
                'symbol' => '$'
            ]
        ];

        Currency::insert($currencies);
    }
}
