<?php

namespace App\Http\Requests;

use App\Models\Pricing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPricingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pricing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pricings,id',
        ];
    }
}
