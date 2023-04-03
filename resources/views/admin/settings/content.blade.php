@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.setting.content_settings') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.settings.update") }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="language_id">{{ trans('cruds.setting.fields.language') }}</label>
                    <select class="form-control select2 {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language_id" id="language_id">
                        @foreach($languages as $id => $entry)
                            <option value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $setting->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('language'))
                        <span class="text-danger">{{ $errors->first('language') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.language_helper') }}</span>
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
