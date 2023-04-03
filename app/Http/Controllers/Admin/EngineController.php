<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEngineRequest;
use App\Http\Requests\StoreEngineRequest;
use App\Http\Requests\UpdateEngineRequest;
use App\Models\Engine;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class EngineController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('engine_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $engines = Engine::all();

        return view('admin.engines.index', compact('engines'));
    }

    public function create()
    {
        abort_if(Gate::denies('engine_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.engines.create');
    }

    public function store(StoreEngineRequest $request)
    {
        $engine = Engine::create($request->all());

        return redirect()->route('admin.engines.index');
    }

    public function edit(Engine $engine)
    {
        abort_if(Gate::denies('engine_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.engines.edit', compact('engine'));
    }

    public function update(UpdateEngineRequest $request, Engine $engine)
    {
        $engine->update($request->all());

        return redirect()->route('admin.engines.index');
    }

    public function show(Engine $engine)
    {
        abort_if(Gate::denies('engine_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.engines.show', compact('engine'));
    }

    public function destroy(Engine $engine)
    {
        abort_if(Gate::denies('engine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $engine->delete();

        return back();
    }

    public function massDestroy(MassDestroyEngineRequest $request)
    {
        $engines = Engine::find(request('ids'));

        foreach ($engines as $engine) {
            $engine->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
