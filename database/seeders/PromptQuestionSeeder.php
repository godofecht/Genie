<?php

namespace Database\Seeders;

use App\Models\Prompt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromptQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'Blog ideas'
        // Product/Brand Name
        // Describe your product
        Prompt::find(1)->questions()->sync([1,2]);

        // 'Blog intro'
        // What is your blog title?
        // What is the blog about?
        Prompt::find(2)->questions()->sync([3,5]);

        // 'Keyword generator'
        // What topic are you posting about?
        Prompt::find(3)->questions()->sync([11]);

        // 'Product description'
        // What's your product called?
        // Describe your product
        Prompt::find(4)->questions()->sync([14,2]);

        // 'Short text hook'
        // Describe your product
        Prompt::find(5)->questions()->sync([2]);

        // 'YouTube video ideas'
        // Describe your product
        Prompt::find(6)->questions()->sync([2]);

        // 'Instagram captions'
        // What is your post about?
        Prompt::find(7)->questions()->sync([15]);

        // 'Hashtag generator'
        // What is your post about?
        Prompt::find(8)->questions()->sync([15]);

        // 'Ad copy variants'
        // Product/Brand Name
        // Describe your product
        Prompt::find(9)->questions()->sync([1,2]);

        // 'General Ad copy'
        // Product/Brand Name
        // Describe your product
        Prompt::find(10)->questions()->sync([1,2]);

        // 'Name generator'
        // Describe your product
        Prompt::find(11)->questions()->sync([2]);

        // 'Startup ideas'
        // What are you passionate about?
        Prompt::find(12)->questions()->sync([16]);

        // 'Love letter'
        // Who is the message for?
        // What is the occasion?
        Prompt::find(13)->questions()->sync([19,20]);

        // 'Cover letter'
        // What role is this cover letter for?
        // What experience makes you a good candidate?
        Prompt::find(14)->questions()->sync([17,18]);

        // 'Oil painting'
        // Describe your image
        Prompt::find(15)->questions()->sync([21]);

        // 'Watercolor'
        // Describe your image
        Prompt::find(16)->questions()->sync([21]);

        // 'Sketch'
        // Describe your image
        Prompt::find(17)->questions()->sync([21]);

        // 'Pop art'
        // Describe your image
        Prompt::find(18)->questions()->sync([21]);
    }
}
