<?php

namespace App\Http\Requests;

use App\Models\Story;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('story_create');
    }

    public function rules()
    {
        return [];
    }
}
