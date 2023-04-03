@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.plan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.plans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.plan.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.plan.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_monthly">{{ trans('cruds.plan.fields.price_monthly') }}</label>
                <input class="form-control {{ $errors->has('price_monthly') ? 'is-invalid' : '' }}" type="number" name="price_monthly" id="price_monthly" value="{{ old('price_monthly', '') }}" step="0.01" required>
                @if($errors->has('price_monthly'))
                    <span class="text-danger">{{ $errors->first('price_monthly') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.price_monthly_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_yearly">{{ trans('cruds.plan.fields.price_yearly') }}</label>
                <input class="form-control {{ $errors->has('price_yearly') ? 'is-invalid' : '' }}" type="number" name="price_yearly" id="price_yearly" value="{{ old('price_yearly', '') }}" step="0.01" required>
                @if($errors->has('price_yearly'))
                    <span class="text-danger">{{ $errors->first('price_yearly') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.price_yearly_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.plan.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Plan::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', 'paid') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="word_limit">{{ trans('cruds.plan.fields.word_limit') }}</label>
                <input class="form-control {{ $errors->has('word_limit') ? 'is-invalid' : '' }}" type="number" name="word_limit" id="word_limit" value="{{ old('word_limit', '') }}" step="1" required>
                @if($errors->has('word_limit'))
                    <span class="text-danger">{{ $errors->first('word_limit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.word_limit_helper') }}</span>
            </div>
            @feature('image-prompts')
            <div class="form-group">
                <label class="required" for="image_limit">{{ trans('cruds.plan.fields.image_limit') }}</label>
                <input class="form-control {{ $errors->has('image_limit') ? 'is-invalid' : '' }}" type="number" name="image_limit" id="image_limit" value="{{ old('image_limit', '') }}" step="1" required>
                @if($errors->has('image_limit'))
                    <span class="text-danger">{{ $errors->first('image_limit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.image_limit_helper') }}</span>
            </div>
            @endfeature
            <div class="form-group">
                <label for="pp_monthly_plan">{{ trans('cruds.plan.fields.pp_monthly_plan') }}</label>
                <input class="form-control {{ $errors->has('pp_monthly_plan') ? 'is-invalid' : '' }}" type="text" name="pp_monthly_plan" id="pp_monthly_plan" value="{{ old('pp_monthly_plan', '') }}">
                @if($errors->has('pp_monthly_plan'))
                    <span class="text-danger">{{ $errors->first('pp_monthly_plan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.pp_monthly_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pp_yearly_plan">{{ trans('cruds.plan.fields.pp_yearly_plan') }}</label>
                <input class="form-control {{ $errors->has('pp_yearly_plan') ? 'is-invalid' : '' }}" type="text" name="pp_yearly_plan" id="pp_yearly_plan" value="{{ old('pp_yearly_plan', '') }}">
                @if($errors->has('pp_yearly_plan'))
                    <span class="text-danger">{{ $errors->first('pp_yearly_plan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.pp_yearly_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stripe_monthly_plan">{{ trans('cruds.plan.fields.stripe_monthly_plan') }}</label>
                <input class="form-control {{ $errors->has('stripe_monthly_plan') ? 'is-invalid' : '' }}" type="text" name="stripe_monthly_plan" id="stripe_monthly_plan" value="{{ old('stripe_monthly_plan', '') }}">
                @if($errors->has('stripe_monthly_plan'))
                    <span class="text-danger">{{ $errors->first('stripe_monthly_plan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.stripe_monthly_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stripe_yearly_plan">{{ trans('cruds.plan.fields.stripe_yearly_plan') }}</label>
                <input class="form-control {{ $errors->has('stripe_yearly_plan') ? 'is-invalid' : '' }}" type="text" name="stripe_yearly_plan" id="stripe_yearly_plan" value="{{ old('stripe_yearly_plan', '') }}">
                @if($errors->has('stripe_yearly_plan'))
                    <span class="text-danger">{{ $errors->first('stripe_yearly_plan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plan.fields.stripe_yearly_plan_helper') }}</span>
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
