<?php

namespace App\Http\Requests;

use App\Models\Content;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_edit');
    }

    public function rules()
    {
        return [
            'prompt_id' => [
                'required',
                'integer',
            ],
            'tone_id' => [
                'required',
                'integer',
            ],
            'outputs_count' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'content' => [
                'string',
                'required',
            ],
        ];
    }
}
