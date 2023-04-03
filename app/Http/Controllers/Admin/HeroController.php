<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateHeroRequest;
use App\Models\Hero;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HeroController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hero_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroes = Hero::with(['media'])->get();

        return view('admin.heroes.index', compact('heroes'));
    }

    public function edit(Hero $hero)
    {
        abort_if(Gate::denies('hero_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.heroes.edit', compact('hero'));
    }

    public function update(UpdateHeroRequest $request, Hero $hero)
    {
        $hero->update($request->all());

        if ($request->input('image', false)) {
            if (!$hero->image || $request->input('image') !== $hero->image->file_name) {
                if ($hero->image) {
                    $hero->image->delete();
                }
                $hero->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($hero->image) {
            $hero->image->delete();
        }

        return back();
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hero_create') && Gate::denies('hero_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Hero();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
