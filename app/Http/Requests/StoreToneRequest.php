<?php

namespace App\Http\Requests;

use App\Models\Tone;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreToneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tone_create');
    }

    public function rules()
    {
        return [
            'tone' => [
                'string',
                'required',
            ],
        ];
    }
}
