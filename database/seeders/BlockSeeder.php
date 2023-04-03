<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $block1 = new Block([
            'id' => 1,
            'title' => 'Intelligent Content Generation',
            'subtitle' => 'Automatically generate high-quality blog posts, articles, and more with AI.'
        ]);
        $block1->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'abs028.png')->toMediaCollection('icon');
        $block1->save();

        $block2 = new Block([
            'id' => 2,
            'title' => 'Customizable Output',
            'subtitle' => 'Fine-tune the tone, style, and format of your content to suit your brand\'s needs.'
        ]);
        $block2->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'fil024.png')->toMediaCollection('icon');
        $block2->save();

        $block3 = new Block([
            'id' => 3,
            'title' => 'In-Depth Analytics',
            'subtitle' => 'Track performance of your content and see topics resonating with your audience.'
        ]);
        $block3->addMediaFromUrl(DatabaseSeeder::STORAGE_BASE_URL . 'abs050.png')->toMediaCollection('icon');
        $block3->save();
    }
}
