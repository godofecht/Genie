<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContentRequest;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Answer;
use App\Models\Content;
use App\Models\Language;
use App\Models\Prompt;
use App\Models\Tone;
use App\Traits\ToolsTrait;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    use ToolsTrait;

    public function index()
    {
        abort_if(Gate::denies('content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        $contents = $user->contents()->orderBy('created_at', 'desc')->get();

        return view('frontend.contents.index', compact('contents'));
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        $prompt = Prompt::where('id', $request->get('prompt'))->firstOrFail();
        $questions = $prompt->questions;
        $tones = Tone::pluck('tone', 'id');
        $languages = Language::pluck('language', 'id');
        $subscription = auth()->user()->userSubscription;

        return view('frontend.contents.create', compact('user', 'prompt', 'questions', 'tones', 'languages', 'subscription'));
    }

    public function store(StoreContentRequest $request)
    {
        $prompt = Prompt::where('id', $request->get('prompt_id'))->firstOrFail();
        $user = auth()->user();

        // check if user reached plan limit
        if($user->userSubscription->isExpired || $user->userSubscription->hasReachedLimit || $user->userSubscription->hasReachedImageLimit) {
            return response()->json([
                'success' => false,
                'message' => trans('global.plan_limit_reached_or_expired')
            ]);
        }

        // save output
        $content = Content::create(
            [
                'user_id' => $user->id,
                'prompt_id' => $request->get('prompt_id'),
                'tone_id' => $request->get('tone_id') ?? null,
                'engine_id' => $prompt->engine->id ?? null,
                'language_id' => $request->get('langxuage_id') ?? null,
                'outputs_count' => $request->get('outputs_count') ?? 1,
                'content' => $this->generate($request),
            ]
        );

        // Save answers
        foreach ($prompt->questions as $question) {
            Answer::create(
                [
                    'answer' => $request->get('question_' . $question->id) ?? "",
                    'question_id' => $question->id,
                    'content_id' => $content->id
                ]
            );
        }

        // Update subscription usage
        if ($prompt->isText) {
            $user->userSubscription->update([
                'usage' => $user->userSubscription->usage + str_word_count(strip_tags($content->content))
            ]);
        } elseif ($prompt->isImage) {
            $user->userSubscription->update([
                'image_usage' => $user->userSubscription->image_usage + 1
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => $content->content
        ]);
    }

    public function edit(Content $content)
    {
        abort_if(Gate::denies('content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prompts = Prompt::pluck('prompt', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tones = Tone::pluck('tone', 'id')->prepend(trans('global.pleaseSelect'), '');

        $content->load('prompt', 'tone');

        return view('frontend.contents.edit', compact('content', 'prompts', 'tones'));
    }

    public function update(UpdateContentRequest $request, Content $content)
    {
        $content->update($request->all());

        return redirect()->route('frontend.contents.index');
    }

    public function show(Content $content)
    {
        abort_if(Gate::denies('content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tones = Tone::pluck('tone', 'id');
        $languages = Language::pluck('language', 'id');
        $content->load('prompt', 'tone', 'answers');
        $subscription = auth()->user()->userSubscription;

        return view('frontend.contents.show', compact('content', 'tones', 'languages', 'subscription'));
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
