<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateThirdPartyRequest;
use App\Models\Engine;
use App\Models\ThirdParty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThirdPartyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('third_party_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdParties = ThirdParty::all();

        return view('admin.thirdParties.index', compact('thirdParties'));
    }

    public function edit(ThirdParty $thirdParty)
    {
        abort_if(Gate::denies('third_party_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $engines = Engine::pluck('title', 'id');

        return view('admin.thirdParties.edit', compact('thirdParty', 'engines'));
    }

    public function update(UpdateThirdPartyRequest $request, ThirdParty $thirdParty)
    {
        $thirdParty->update($request->all());

        return back();
    }
}
