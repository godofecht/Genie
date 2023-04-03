<?php

namespace App\Http\Requests;

use App\Models\LandingPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLandingPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('landing_page_create');
    }

    public function rules()
    {
        return [];
    }
}
