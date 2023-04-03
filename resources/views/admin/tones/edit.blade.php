@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tone.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tones.update", [$tone->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="tone">{{ trans('cruds.tone.fields.tone') }}</label>
                <input class="form-control {{ $errors->has('tone') ? 'is-invalid' : '' }}" type="text" name="tone" id="tone" value="{{ old('tone', $tone->tone) }}" required>
                @if($errors->has('tone'))
                    <span class="text-danger">{{ $errors->first('tone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tone.fields.tone_helper') }}</span>
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