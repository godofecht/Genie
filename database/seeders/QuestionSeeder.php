<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'Product/Brand Name',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 2,
                'question' => 'Describe your product',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 3,
                'question' => 'What is your blog title?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 4,
                'question' => 'What is your blog topic?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 5,
                'question' => 'What is the blog about?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 6,
                'question' => 'Describe your blog topic',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 7,
                'question' => 'Blog Topic',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 8,
                'question' => 'What is the main point of the paragraph?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 9,
                'question' => 'What are you looking to create?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 10,
                'question' => 'What are the main points you want to cover?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 11,
                'question' => 'What topic are you posting about?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 12,
                'question' => 'Any specific keywords or phrases you would like to include?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 13,
                'question' => 'Who is your target audience?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 14,
                'question' => 'What\'s your product called?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 15,
                'question' => 'What is your post about?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 16,
                'question' => 'What are you passionate about?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 17,
                'question' => 'What role is this cover letter for?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 18,
                'question' => 'What experience makes you a good candidate?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 19,
                'question' => 'Who is the message for?',
                'type' => 'single_line',
                'is_required' => 'optional',
                'minimum_answer_length' => 0
            ],
            [
                'id' => 20,
                'question' => 'What is the occasion?',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
            [
                'id' => 21,
                'question' => 'Describe your image',
                'type' => 'multi_line',
                'is_required' => 'required',
                'minimum_answer_length' => 40
            ],
        ];

        Question::insert($questions);
    }
}
