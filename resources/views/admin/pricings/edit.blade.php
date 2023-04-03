@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pricing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pricings.update", [$pricing->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.pricing.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $pricing->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pricing.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.pricing.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $pricing->subtitle) }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pricing.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="promotion">{{ trans('cruds.pricing.fields.promotion') }}</label>
                <input class="form-control {{ $errors->has('promotion') ? 'is-invalid' : '' }}" type="text" name="promotion" id="promotion" value="{{ old('promotion', $pricing->promotion) }}">
                @if($errors->has('promotion'))
                    <span class="text-danger">{{ $errors->first('promotion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pricing.fields.promotion_helper') }}</span>
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
