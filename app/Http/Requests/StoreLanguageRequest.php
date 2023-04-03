<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('language_create');
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
