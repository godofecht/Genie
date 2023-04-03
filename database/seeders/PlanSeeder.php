<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'id'            => 1,
                'title'         => 'Free',
                'description'   => 'Get started with basic features, no credit card required.',
                'price_monthly' => 0,
                'price_yearly'  => 0,
                'pp_monthly_plan' => '',
                'pp_yearly_plan'  => '',
                'stripe_monthly_plan' => '',
                'stripe_yearly_plan'  => '',
                'type'          => 'free',
                'word_limit'    => 1500,
                'image_limit'    => 500,
            ],
            [
                'id'            => 2,
                'title'         => 'Pro',
                'description'   => 'Unlock advanced features and priority support.',
                'price_monthly' => 10,
                'price_yearly'  => 108,
                'pp_monthly_plan' => 'P-91H563139D769654RMPOWJQQ',
                'pp_yearly_plan'  => 'P-37U95393T2635261PMPOWOKQ',
                'stripe_monthly_plan' => 'price_1MlhWTDHRHY021jXfnDq7kx5',
                'stripe_yearly_plan'  => 'price_1MlhWTDHRHY021jX8IUiZJQq',
                'type'          => 'paid',
                'word_limit'    => 5000,
                'image_limit'    => 1000,
            ],
            [
                'id'            => 3,
                'title'         => 'Business',
                'description'   => 'Access premium tools and team collaboration options.',
                'price_monthly' => 20,
                'price_yearly'  => 216,
                'pp_monthly_plan' => 'P-3XC304917S424213CMPOWPGY',
                'pp_yearly_plan'  => 'P-85174520P94563258MPOWPUY',
                'stripe_monthly_plan' => 'price_1MlhWxDHRHY021jXIA0DYdt8',
                'stripe_yearly_plan'  => 'price_1MlhWxDHRHY021jXk0DQHNOY',
                'type'          => 'paid',
                'word_limit'    => 10000,
                'image_limit'    => 2000,
            ],
            [
                'id'            => 4,
                'title'         => 'Enterprise',
                'description'   => 'Customizable solutions for large projects and dedicated support.',
                'price_monthly' => 50,
                'price_yearly'  => 540,
                'pp_monthly_plan' => 'P-90W42065MA850360TMPOWP4Y',
                'pp_yearly_plan'  => 'P-18V52260RW302494HMPOWQDY',
                'stripe_monthly_plan' => 'price_1MlhXLDHRHY021jXISHZJrDt',
                'stripe_yearly_plan'  => 'price_1MlhXLDHRHY021jX4uJ5VoWV',
                'type'          => 'paid',
                'word_limit'    => 500000,
                'image_limit'    => 4000,
            ]
        ];

        Plan::insert($plans);
    }
}
