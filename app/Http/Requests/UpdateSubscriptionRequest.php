<?php

namespace App\Http\Requests;

use App\Models\Subscription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubscriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subscription_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'plan_id' => [
                'required',
                'integer',
            ],
            'start_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'canceled_at' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
