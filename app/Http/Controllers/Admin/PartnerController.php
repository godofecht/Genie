<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPartnerRequest;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PartnerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = Partner::with(['media'])->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        abort_if(Gate::denies('partner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partners.create');
    }

    public function store(StorePartnerRequest $request)
    {
        $partner = Partner::create($request->all());

        if ($request->input('logo', false)) {
            $partner->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $partner->id]);
        }

        return redirect()->route('admin.partners.index');
    }

    public function edit(Partner $partner)
    {
        abort_if(Gate::denies('partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partners.edit', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $partner->update($request->all());

        if ($request->input('logo', false)) {
            if (!$partner->logo || $request->input('logo') !== $partner->logo->file_name) {
                if ($partner->logo) {
                    $partner->logo->delete();
                }
                $partner->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($partner->logo) {
            $partner->logo->delete();
        }

        return redirect()->route('admin.partners.index');
    }

    public function destroy(Partner $partner)
    {
        abort_if(Gate::denies('partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partner->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartnerRequest $request)
    {
        Partner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('partner_create') && Gate::denies('partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Partner();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
