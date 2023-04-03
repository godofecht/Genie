<?php

namespace App\Http\Requests;

use App\Models\Plan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('plan_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'price_monthly' => [
                'required',
            ],
            'price_yearly' => [
                'required',
            ],
            'type' => [
                'required',
            ],
            'word_limit' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
