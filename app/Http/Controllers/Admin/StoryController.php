<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Block;
use App\Models\Story;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('story_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stories = Story::with(['blocks', 'media'])->get();

        return view('admin.stories.index', compact('stories'));
    }

    public function edit(Story $story)
    {
        abort_if(Gate::denies('story_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blocks = Block::pluck('title', 'id');

        $story->load('blocks');

        return view('admin.stories.edit', compact('blocks', 'story'));
    }

    public function update(UpdateStoryRequest $request, Story $story)
    {
        $story->update($request->all());
        $story->blocks()->sync($request->input('blocks', []));
        if ($request->input('browser_image', false)) {
            if (!$story->browser_image || $request->input('browser_image') !== $story->browser_image->file_name) {
                if ($story->browser_image) {
                    $story->browser_image->delete();
                }
                $story->addMedia(storage_path('tmp/uploads/' . basename($request->input('browser_image'))))->toMediaCollection('browser_image');
            }
        } elseif ($story->browser_image) {
            $story->browser_image->delete();
        }

        if ($request->input('phone_image', false)) {
            if (!$story->phone_image || $request->input('phone_image') !== $story->phone_image->file_name) {
                if ($story->phone_image) {
                    $story->phone_image->delete();
                }
                $story->addMedia(storage_path('tmp/uploads/' . basename($request->input('phone_image'))))->toMediaCollection('phone_image');
            }
        } elseif ($story->phone_image) {
            $story->phone_image->delete();
        }

        return back();
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('story_create') && Gate::denies('story_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Story();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
