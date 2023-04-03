<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $story = new Story([
            'id' => 1,
            'title' => 'What we do?',
            'subtitle' => 'AI-powered productivity tool for all your creative needs.',
            'promotion' => 'It is fast and easy. Generate your first and ongoing content with Genie.',
        ]);
        $story->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'dashboard-desktop.png')->toMediaCollection('browser_image');
        $story->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'dashboard-mobile.png')->toMediaCollection('phone_image');
        $story->save();
        $story->blocks()->sync([1, 2, 3]);
    }
}
