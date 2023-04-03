<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonials = Testimonial::with(['media'])->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function edit(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->update($request->all());

        if ($request->input('avatar', false)) {
            if (!$testimonial->avatar || $request->input('avatar') !== $testimonial->avatar->file_name) {
                if ($testimonial->avatar) {
                    $testimonial->avatar->delete();
                }
                $testimonial->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
            }
        } elseif ($testimonial->avatar) {
            $testimonial->avatar->delete();
        }

        return back();
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('testimonial_create') && Gate::denies('testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Testimonial();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
