@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questions.update", [$question->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="question">{{ trans('cruds.question.fields.question') }}</label>
                <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text" name="question" id="question" value="{{ old('question', $question->question) }}" required>
                @if($errors->has('question'))
                    <span class="text-danger">{{ $errors->first('question') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.question.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Question::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $question->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.question.fields.is_required') }}</label>
                <select class="form-control {{ $errors->has('is_required') ? 'is-invalid' : '' }}" name="is_required" id="is_required" required>
                    <option value disabled {{ old('is_required', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Question::IS_REQUIRED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_required', $question->is_required) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_required'))
                    <span class="text-danger">{{ $errors->first('is_required') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.is_required_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="minimum_answer_length">{{ trans('cruds.question.fields.minimum_answer_length') }}</label>
                <input class="form-control {{ $errors->has('minimum_answer_length') ? 'is-invalid' : '' }}" type="number" name="minimum_answer_length" id="minimum_answer_length" value="{{ old('minimum_answer_length', $question->minimum_answer_length) }}" step="1" required>
                @if($errors->has('minimum_answer_length'))
                    <span class="text-danger">{{ $errors->first('minimum_answer_length') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.question.fields.minimum_answer_length_helper') }}</span>
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