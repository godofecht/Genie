<?php

namespace App\Http\Requests;

use App\Models\LandingPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLandingPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('landing_page_edit');
    }

    public function rules()
    {
        return [
            'partners.*' => [
                'integer',
            ],
            'partners' => [
                'array',
            ],
        ];
    }
}
