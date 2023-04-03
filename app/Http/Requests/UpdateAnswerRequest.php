<?php

namespace App\Http\Requests;

use App\Models\Answer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAnswerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('answer_edit');
    }

    public function rules()
    {
        return [
            'question_id' => [
                'required',
                'integer',
            ],
            'content_id' => [
                'required',
                'integer',
            ],
            'answer' => [
                'string',
                'required',
            ],
        ];
    }
}
