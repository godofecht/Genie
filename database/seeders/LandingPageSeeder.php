<?php

namespace Database\Seeders;

use App\Models\LandingPage;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $landingPage = new LandingPage([
            'id' => 1,
            'hero_id' => 1,
            'story_id' => 1,
            'pricing_id' => 1,
            'testimonial_id' => 1
        ]);
        $landingPage->save();
        $landingPage->partners()->sync([1, 2, 3, 4, 5]);
    }
}
