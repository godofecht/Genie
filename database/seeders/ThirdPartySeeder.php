<?php

namespace Database\Seeders;

use App\Models\ThirdParty;
use Illuminate\Database\Seeder;

class ThirdPartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thirdParty = [
            [
                'id' => 1,
                'openai_api_key' => '',
                'default_max_tokens' => 3000,
                'pp_client' => '',
                'pp_secret' => '',
                'pp_env' => 'sandbox',
                'stripe_key' => '',
                'stripe_secret' => '',
                'stripe_webhook_secret' => '',
            ]
        ];

        ThirdParty::insert($thirdParty);
    }
}
