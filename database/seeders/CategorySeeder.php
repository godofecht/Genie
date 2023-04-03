<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id'    => 1,
                'title' => 'Blog tools',
            ],
            [
                'id'    => 2,
                'title' => 'E-Commerce',
            ],
            [
                'id'    => 3,
                'title' => 'Social media tools',
            ],
            [
                'id'    => 4,
                'title' => 'Digital Ad copy',
            ],
            [
                'id'    => 5,
                'title' => 'Brainstorming tools',
            ],
            [
                'id'    => 6,
                'title' => 'Personal tools',
            ],
            [
                'id'    => 7,
                'title' => 'Images',
            ],
        ];

        Category::insert($categories);
    }
}
