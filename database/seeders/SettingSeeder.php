<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'id' => 1,
                'currency_id' => 1,
                'yearly_plan' => 'enabled'
            ]
        ];

        Setting::insert($settings);
    }
}
