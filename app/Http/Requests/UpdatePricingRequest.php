<?php

namespace App\Http\Requests;

use App\Models\Pricing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePricingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pricing_edit');
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
        ];
    }
}
