<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hero = new Hero([
            'id' => 1,
            'title' => 'Write Better, Write Faster with Genie',
            'subtitle' => 'Unlock endless creativity and make your writing dreams a reality with our cutting-edge AI technology. Say goodbye to writer\'s block and hello to endless inspiration.',
            'cta' => 'Get started',
            'promotion' => 'Start free trial. * No credit card required.',
        ]);
        $hero->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'oc-relaxing.png')->toMediaCollection('image');
        $hero->save();
    }
}
