<?php

namespace App\Http\Requests;

use App\Models\Hero;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHeroRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hero_edit');
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
            'cta' => [
                'string',
                'nullable',
            ],
            'promotion' => [
                'string',
                'nullable',
            ],
        ];
    }
}
