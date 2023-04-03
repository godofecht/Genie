<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyToneRequest;
use App\Http\Requests\StoreToneRequest;
use App\Http\Requests\UpdateToneRequest;
use App\Models\Tone;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ToneController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tone_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tones = Tone::all();

        return view('admin.tones.index', compact('tones'));
    }

    public function create()
    {
        abort_if(Gate::denies('tone_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tones.create');
    }

    public function store(StoreToneRequest $request)
    {
        $tone = Tone::create($request->all());

        return redirect()->route('admin.tones.index');
    }

    public function edit(Tone $tone)
    {
        abort_if(Gate::denies('tone_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tones.edit', compact('tone'));
    }

    public function update(UpdateToneRequest $request, Tone $tone)
    {
        $tone->update($request->all());

        return redirect()->route('admin.tones.index');
    }

    public function show(Tone $tone)
    {
        abort_if(Gate::denies('tone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tone->load('toneContents');

        return view('admin.tones.show', compact('tone'));
    }

    public function destroy(Tone $tone)
    {
        abort_if(Gate::denies('tone_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tone->delete();

        return back();
    }

    public function massDestroy(MassDestroyToneRequest $request)
    {
        Tone::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
