@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.landingPage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.landing-pages.update", [$landingPage->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="hero_id">{{ trans('cruds.landingPage.fields.hero') }}</label>
                <select class="form-control select2 {{ $errors->has('hero') ? 'is-invalid' : '' }}" name="hero_id" id="hero_id">
                    @foreach($heroes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('hero_id') ? old('hero_id') : $landingPage->hero->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('hero'))
                    <span class="text-danger">{{ $errors->first('hero') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.hero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="partners">{{ trans('cruds.landingPage.fields.partners') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('partners') ? 'is-invalid' : '' }}" name="partners[]" id="partners" multiple>
                    @foreach($partners as $id => $partner)
                        <option value="{{ $id }}" {{ (in_array($id, old('partners', [])) || $landingPage->partners->contains($id)) ? 'selected' : '' }}>{{ $partner }}</option>
                    @endforeach
                </select>
                @if($errors->has('partners'))
                    <span class="text-danger">{{ $errors->first('partners') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.partners_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="story_id">{{ trans('cruds.landingPage.fields.story') }}</label>
                <select class="form-control select2 {{ $errors->has('story') ? 'is-invalid' : '' }}" name="story_id" id="story_id">
                    @foreach($stories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('story_id') ? old('story_id') : $landingPage->story->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('story'))
                    <span class="text-danger">{{ $errors->first('story') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.story_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pricing_id">{{ trans('cruds.landingPage.fields.pricing') }}</label>
                <select class="form-control select2 {{ $errors->has('pricing') ? 'is-invalid' : '' }}" name="pricing_id" id="pricing_id">
                    @foreach($pricings as $id => $entry)
                        <option value="{{ $id }}" {{ (old('pricing_id') ? old('pricing_id') : $landingPage->pricing->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('pricing'))
                    <span class="text-danger">{{ $errors->first('pricing') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.pricing_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="testimonial_id">{{ trans('cruds.landingPage.fields.testimonial') }}</label>
                <select class="form-control select2 {{ $errors->has('testimonial') ? 'is-invalid' : '' }}" name="testimonial_id" id="testimonial_id">
                    @foreach($testimonials as $id => $entry)
                        <option value="{{ $id }}" {{ (old('testimonial_id') ? old('testimonial_id') : $landingPage->testimonial->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('testimonial'))
                    <span class="text-danger">{{ $errors->first('testimonial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.landingPage.fields.testimonial_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection