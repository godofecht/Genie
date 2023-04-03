<?php

namespace App\Http\Requests;

use App\Models\Prompt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePromptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('prompt_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'prompt' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'questions' => [
                'array',
            ],
        ];
    }
}
