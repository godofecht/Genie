@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.prompt.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.prompts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.prompt.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    @foreach(App\Models\Prompt::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $prompt->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.status_helper') }}</span>
            </div>
            <div class="form-group" style="display: {{ \Laravel\Pennant\Feature::active('image-prompts') ? '' : 'none' }}">
                <label class="required">{{ trans('cruds.prompt.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    @foreach(App\Models\Prompt::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', 'text') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.prompt.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.prompt.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prompt">{{ trans('cruds.prompt.fields.prompt') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('prompt') ? 'is-invalid' : '' }}" name="prompt" id="prompt" required>{!! old('prompt') !!}</textarea>
                @if($errors->has('prompt'))
                    <span class="text-danger">{{ $errors->first('prompt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.prompt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="engine_id">{{ trans('cruds.prompt.fields.engine') }}</label>
                <select class="form-control select2 {{ $errors->has('engine') ? 'is-invalid' : '' }}" name="engine_id" id="engine_id">
                    @foreach($engines as $id => $entry)
                        <option value="{{ $id }}" {{ old('engine_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('engine'))
                    <span class="text-danger">{{ $errors->first('engine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.engine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="max_tokens">{{ trans('cruds.prompt.fields.max_tokens') }}</label>
                <input class="form-control {{ $errors->has('max_tokens') ? 'is-invalid' : '' }}" type="number" name="max_tokens" id="max_tokens" value="{{ old('max_tokens', '') }}" step="1">
                @if($errors->has('max_tokens'))
                    <span class="text-danger">{{ $errors->first('max_tokens') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.max_tokens_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.prompt.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tone_id">{{ trans('cruds.prompt.fields.tone') }}</label>
                <select class="form-control select2 {{ $errors->has('tone') ? 'is-invalid' : '' }}" name="tone_id" id="tone_id">
                    @foreach($tones as $id => $entry)
                        <option value="{{ $id }}" {{ old('tone_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tone'))
                    <span class="text-danger">{{ $errors->first('tone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.prompt.fields.tone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="questions">Questions</label>

                <div class="col-md-6">
                    <div id="question-container">
                        <div class="row question-row mb-3">
                            <div class="col-xs-10">
                                <select class="form-control question-select" name="questions[]">
                                    @foreach($questions as $id => $question)
                                        <option value="{{ $id }}">{{ $question }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-2 ml-3">
                                <button type="button" class="btn btn-danger remove-question">Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-xs-12">
                            <button type="button" class="btn btn-primary" id="add-question">Add Question</button>
                        </div>
                    </div>
                </div>
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

@section('scripts')
    @parent
    <script src="{{ asset('js/prompts.js') }}"></script>
@endsection
