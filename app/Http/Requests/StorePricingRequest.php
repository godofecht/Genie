<?php

namespace App\Http\Requests;

use App\Models\Pricing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePricingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pricing_create');
    }

    public function rules()
    {
        return [];
    }
}
