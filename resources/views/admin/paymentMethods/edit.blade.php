@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paymentMethod.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payment-methods.update", [$paymentMethod->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.paymentMethod.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $paymentMethod->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_enabled') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_enabled" id="is_enabled" value="1" {{ $paymentMethod->is_enabled || old('is_enabled', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_enabled">{{ trans('cruds.paymentMethod.fields.is_enabled') }}</label>
                </div>
                @if($errors->has('is_enabled'))
                    <span class="text-danger">{{ $errors->first('is_enabled') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paymentMethod.fields.is_enabled_helper') }}</span>
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
