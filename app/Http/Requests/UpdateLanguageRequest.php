<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('language_edit');
    }

    public function rules()
    {
        return [
            'language' => [
                'string',
                'required',
            ],
        ];
    }
}
