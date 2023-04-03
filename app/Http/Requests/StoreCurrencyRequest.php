<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('currency_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'code' => [
                'string',
                'required',
            ],
            'symbol' => [
                'string',
                'required',
            ],
        ];
    }
}
