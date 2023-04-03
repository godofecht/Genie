<?php

namespace App\Http\Requests;

use App\Models\ThirdParty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateThirdPartyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('third_party_edit');
    }

    public function rules()
    {
        return [
            'openai_api_key' => [
                'string',
                'nullable',
            ],
            'pp_client' => [
                'string',
                'nullable',
            ],
            'pp_secret' => [
                'string',
                'nullable',
            ],
        ];
    }
}
