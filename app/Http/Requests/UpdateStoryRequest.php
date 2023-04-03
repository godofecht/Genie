<?php

namespace App\Http\Requests;

use App\Models\Story;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('story_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'blocks.*' => [
                'integer',
            ],
            'blocks' => [
                'array',
            ],
            'promotion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
