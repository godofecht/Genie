@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.setting.currency_settings') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.settings.update") }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="currency_id">{{ trans('cruds.setting.fields.currency') }}</label>
                    <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id">
                        @foreach($currencies as $id => $entry)
                            <option value="{{ $id }}" {{ (old('currency_id') ? old('currency_id') : $setting->currency->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('currency'))
                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.currency_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.setting.subscriptions_settings') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.settings.update") }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>{{ trans('cruds.setting.fields.yearly_plan') }}</label>
                    <select class="form-control {{ $errors->has('yearly_plan') ? 'is-invalid' : '' }}" name="yearly_plan" id="yearly_plan" required>
                        @foreach(App\Models\Setting::YEARLY_PLAN_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('yearly_plan', $setting->yearly_plan) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('yearly_plan'))
                        <span class="text-danger">{{ $errors->first('yearly_plan') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.yearly_plan_helper') }}</span>
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
