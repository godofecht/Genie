<?php

namespace App\Traits;

use App\Models\Engine;
use App\Models\Language;
use App\Models\Prompt;
use App\Models\ThirdParty;
use App\Models\Tone;
use Illuminate\Http\Request;
use OpenAI;

trait ToolsTrait
{
    public function generate(Request $request): string
    {
        $prompt = Prompt::find($request->get('prompt_id'));

        // get prompt questions ids [1, 2]
        $questionIds = $prompt->questions->pluck('id');

        // loop on questions and map it to answers
        $answers = $questionIds->mapWithKeys(function ($id, $index) use ($request) {
            $answer = $request->get('question_' . $id) ?? "";
            return ['answer_' . $index + 1 => $answer];
        });

        // get tone
        $tone = Tone::find($request->get('tone_id'))->tone ?? '';

        // get language
        $language = Language::find($request->get('language_id'))->language ?? Language::first()->language ?? "";

        // replace {{answer_0}} {{answer_1}} with answers[0] , answer [1] and {{tone}} with tone
        $modifiedPrompt = preg_replace_callback('/\{\{(\w+)\}\}/', function ($match) use ($answers, $tone, $language) {
            $key = $match[1];
            if ($key === 'tone') {
                return $tone;
            }
            if ($key === 'language') {
                return $language;
            }
            return $answers[$key] ?? '';
        }, $prompt->prompt) . '. In ' . $language;

        if($prompt->isText) {
            return $this->makeRequest($modifiedPrompt, $prompt->max_tokens, $prompt->engine);
        } elseif ($prompt->isImage) {
            return $this->makeImageRequest($modifiedPrompt);
        } else {
            throw new \InvalidArgumentException('Invalid prompt: ' . $prompt->id);
        }
    }

    private function makeRequest(string $prompt, ?int $promptMaxTokens, ?Engine $promptEngine): string
    {
        $thirdPartySettings = ThirdParty::firstOrFail();
        $apiKey = $thirdPartySettings->openai_api_key;
        $maxTokens = $promptMaxTokens ?: $thirdPartySettings->default_max_tokens ?: 500;
        $engine = $promptEngine ?: $thirdPartySettings->engine ?: Engine::firstOrFail();

        $client = OpenAI::client($apiKey);

        if ($engine->is_chat) {
            $result = $client->chat()->create([
                'model' => $engine->value,
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            return trim($result->choices[0]->message->content);
        }

        $result = $client->completions()->create([
            'model' => $engine->value,
            'prompt' => $prompt,
            "max_tokens" => $maxTokens
        ]);

        return trim($result->choices[0]->text);
    }

    private function makeImageRequest(string $prompt): string
    {
        $thirdPartySettings = ThirdParty::firstOrFail();
        $apiKey = $thirdPartySettings->openai_api_key;

        $client = OpenAI::client($apiKey);

        $result = $client->images()->create([
            'prompt' => $prompt,
            'n' => 1,
            "size" => "1024x1024"
        ]);

        return $result['data'][0]['url'];
    }
}
