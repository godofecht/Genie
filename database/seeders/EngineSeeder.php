<?php

namespace Database\Seeders;

use App\Models\Engine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engines = [
            [
                'id'    => 1,
                'type'  => 'chat',
                'title' => 'GPT-4',
                'value' => 'gpt-4',
            ],
            [
                'id'    => 2,
                'type'  => 'chat',
                'title' => 'GPT-3.5 Turbo',
                'value' => 'gpt-3.5-turbo',
            ],
            [
                'id'    => 3,
                'type'  => 'text',
                'title' => 'GPT-3 / text-davinci-003',
                'value' => 'text-davinci-003',
            ],
            [
                'id'    => 4,
                'type'  => 'text',
                'title' => 'GPT-3 / text-curie-001',
                'value' => 'text-curie-001',
            ],
            [
                'id'    => 5,
                'type'  => 'text',
                'title' => 'GPT-3 / text-babbage-001',
                'value' => 'text-babbage-001',
            ],
            [
                'id'    => 6,
                'type'  => 'text',
                'title' => 'GPT-3 / text-ada-001',
                'value' => 'text-ada-001',
            ],
            [
                'id'    => 7,
                'type'  => 'text',
                'title' => 'GPT-3 / code-cushman-001',
                'value' => 'code-cushman-001',
            ],
            [
                'id'    => 8,
                'type'  => 'text',
                'title' => 'Codex / code-davinci-002',
                'value' => 'code-davinci-002',
            ],
        ];

        Engine::insert($engines);

        // update all prompts to use the default engine
        \App\Models\Prompt::query()->update(['engine_id' => 1]);

        // update openAI default engine
        \App\Models\ThirdParty::firstOrFail()->update(['engine_id' => 1]);
    }
}
