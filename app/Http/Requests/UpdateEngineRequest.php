<?php

namespace App\Http\Requests;

use App\Models\Engine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEngineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('engine_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'value' => [
                'string',
                'required',
                'unique:engines,value,' . request()->route('engine')->id,
            ],
        ];
    }
}
