<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::with(['media'])->get();

        return view('admin.brands.index', compact('brands'));
    }

    public function edit(Brand $brand)
    {
        abort_if(Gate::denies('brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        if ($request->input('logo', false)) {
            if (!$brand->logo || $request->input('logo') !== $brand->logo->file_name) {
                if ($brand->logo) {
                    $brand->logo->delete();
                }
                $brand->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($brand->logo) {
            $brand->logo->delete();
        }

        if ($request->input('favicon', false)) {
            if (!$brand->favicon || $request->input('favicon') !== $brand->favicon->file_name) {
                if ($brand->favicon) {
                    $brand->favicon->delete();
                }
                $brand->addMedia(storage_path('tmp/uploads/' . basename($request->input('favicon'))))->toMediaCollection('favicon');
            }
        } elseif ($brand->favicon) {
            $brand->favicon->delete();
        }

        return back();
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('brand_create') && Gate::denies('brand_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Brand();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
