<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hero = new Testimonial([
            'id' => 1,
            'name' => 'Christina',
            'title' => 'Product Manager | Mailchimp',
            'review' => 'Genie has truly been a game-changer for our business. Their advanced technology and seamless integration have made it easier for us to accomplish our daily tasks.',
        ]);
        $hero->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'oc-person-1.png')->toMediaCollection('avatar');
        $hero->save();
    }
}
