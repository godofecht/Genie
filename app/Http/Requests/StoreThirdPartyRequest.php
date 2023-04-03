<?php

namespace App\Http\Requests;

use App\Models\ThirdParty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreThirdPartyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('third_party_create');
    }

    public function rules()
    {
        return [];
    }
}
