<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Prompt;
use Gate;

class PromptController extends Controller
{
    public function indexAsJson()
    {
        $prompts = Prompt::all();

        $results = $prompts->map(function($prompt) {
            return [
                'component' => $prompt->title,
                'category' => $prompt->category->title,
                'link' => route('frontend.contents.create', ['category' => $prompt->category->id, 'prompt' => $prompt->id])
            ];
        });

        return response()->json($results);
    }
}
