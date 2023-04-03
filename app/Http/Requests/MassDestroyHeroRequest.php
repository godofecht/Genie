<?php

namespace App\Http\Requests;

use App\Models\Hero;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHeroRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hero_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:heroes,id',
        ];
    }
}
