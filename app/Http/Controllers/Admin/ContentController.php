<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContentRequest;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Models\Prompt;
use App\Models\Tone;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contents = Content::with(['prompt', 'tone'])->get();

        return view('admin.contents.index', compact('contents'));
    }

    public function create()
    {
        abort_if(Gate::denies('content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prompts = Prompt::pluck('prompt', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tones = Tone::pluck('tone', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.contents.create', compact('prompts', 'tones'));
    }

    public function store(StoreContentRequest $request)
    {
        $content = Content::create($request->all());

        return redirect()->route('admin.contents.index');
    }

    public function edit(Content $content)
    {
        abort_if(Gate::denies('content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prompts = Prompt::pluck('prompt', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tones = Tone::pluck('tone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $content->load('prompt', 'tone');

        return view('admin.contents.edit', compact('content', 'prompts', 'tones'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        $content->update($request->all());

        return redirect()->route('admin.contents.index');
    }

    public function show(Content $content)
    {
        abort_if(Gate::denies('content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $content->load('prompt', 'tone');

        return view('admin.contents.show', compact('content'));
    }

    public function destroy(Content $content)
    {
        abort_if(Gate::denies('content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $content->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentRequest $request)
    {
        Content::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
