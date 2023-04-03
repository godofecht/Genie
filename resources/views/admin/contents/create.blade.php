@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.content.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="prompt_id">{{ trans('cruds.content.fields.prompt') }}</label>
                <select class="form-control select2 {{ $errors->has('prompt') ? 'is-invalid' : '' }}" name="prompt_id" id="prompt_id" required>
                    @foreach($prompts as $id => $entry)
                        <option value="{{ $id }}" {{ old('prompt_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('prompt'))
                    <span class="text-danger">{{ $errors->first('prompt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.content.fields.prompt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tone_id">{{ trans('cruds.content.fields.tone') }}</label>
                <select class="form-control select2 {{ $errors->has('tone') ? 'is-invalid' : '' }}" name="tone_id" id="tone_id" required>
                    @foreach($tones as $id => $entry)
                        <option value="{{ $id }}" {{ old('tone_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tone'))
                    <span class="text-danger">{{ $errors->first('tone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.content.fields.tone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="outputs_count">{{ trans('cruds.content.fields.outputs_count') }}</label>
                <input class="form-control {{ $errors->has('outputs_count') ? 'is-invalid' : '' }}" type="number" name="outputs_count" id="outputs_count" value="{{ old('outputs_count', '2') }}" step="1">
                @if($errors->has('outputs_count'))
                    <span class="text-danger">{{ $errors->first('outputs_count') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.content.fields.outputs_count_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.content.fields.content') }}</label>
                <input class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" type="text" name="content" id="content" value="{{ old('content', '') }}" required>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.content.fields.content_helper') }}</span>
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