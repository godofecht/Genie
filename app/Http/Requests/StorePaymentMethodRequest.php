<?php

namespace App\Http\Requests;

use App\Models\PaymentMethod;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_method_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'is_enabled' => [
                'bool',
            ],
        ];
    }
}
