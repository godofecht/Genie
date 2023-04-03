<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPromptRequest;
use App\Http\Requests\StorePromptRequest;
use App\Http\Requests\UpdatePromptRequest;
use App\Models\Category;
use App\Models\Prompt;
use App\Models\Question;
use App\Models\Tone;
use Gate;
use App\Models\Engine;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PromptController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prompt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prompts = Prompt::with(['category', 'tone', 'questions', 'engine'])->get();

        return view('admin.prompts.index', compact('prompts'));
    }

    public function create()
    {
        abort_if(Gate::denies('prompt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $tones = Tone::pluck('tone', 'id')->prepend(trans('global.pleaseSelect'), '');
        $engines = Engine::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.prompts.create', compact('categories', 'tones', 'questions', 'engines'));
    }

    public function store(StorePromptRequest $request)
    {
        $prompt = Prompt::create($request->all());

        $selectedQuestions = collect($request->input('questions', []))->filter(function ($questionId) {
            return !is_null($questionId);
        })->values()->all();
        $prompt->questions()->sync($selectedQuestions);

        return redirect()->route('admin.prompts.index');
    }

    public function edit(Prompt $prompt)
    {
        abort_if(Gate::denies('prompt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $tones = Tone::pluck('tone', 'id')->prepend(trans('global.pleaseSelect'), '');
        $engines = Engine::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');
        $questions = Question::pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prompt->load('category', 'tone', 'questions', 'engine');

        return view('admin.prompts.edit', compact('categories', 'engines', 'prompt', 'tones', 'questions'));
    }

    public function update(UpdatePromptRequest $request, Prompt $prompt)
    {
        $prompt->update($request->all());

        $selectedQuestions = collect($request->input('questions', []))->filter(function ($questionId) {
            return !is_null($questionId);
        })->values()->all();
        $prompt->questions()->sync($selectedQuestions);

        return redirect()->route('admin.prompts.index');
    }

    public function show(Prompt $prompt)
    {
        abort_if(Gate::denies('prompt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prompt->load('category', 'tone', 'questions', 'promptContents', 'engine');

        return view('admin.prompts.show', compact('prompt'));
    }

    public function destroy(Prompt $prompt)
    {
        abort_if(Gate::denies('prompt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prompt->delete();

        return back();
    }

    public function massDestroy(MassDestroyPromptRequest $request)
    {
        Prompt::whereIn('id', request('ids'))->each(function ($prompt) {
            $prompt->delete();
        });

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
