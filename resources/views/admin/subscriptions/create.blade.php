@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.subscription.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.subscriptions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.subscription.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="plan_id">{{ trans('cruds.subscription.fields.plan') }}</label>
                <select class="form-control select2 {{ $errors->has('plan') ? 'is-invalid' : '' }}" name="plan_id" id="plan_id" required>
                    @foreach($plans as $id => $entry)
                        <option value="{{ $id }}" {{ old('plan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('plan'))
                    <span class="text-danger">{{ $errors->first('plan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_at">{{ trans('cruds.subscription.fields.start_at') }}</label>
                <input class="form-control datetime {{ $errors->has('start_at') ? 'is-invalid' : '' }}" type="text" name="start_at" id="start_at" value="{{ old('start_at') }}">
                @if($errors->has('start_at'))
                    <span class="text-danger">{{ $errors->first('start_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.start_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_at">{{ trans('cruds.subscription.fields.end_at') }}</label>
                <input class="form-control datetime {{ $errors->has('end_at') ? 'is-invalid' : '' }}" type="text" name="end_at" id="end_at" value="{{ old('end_at') }}">
                @if($errors->has('end_at'))
                    <span class="text-danger">{{ $errors->first('end_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.end_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="canceled_at">{{ trans('cruds.subscription.fields.canceled_at') }}</label>
                <input class="form-control datetime {{ $errors->has('canceled_at') ? 'is-invalid' : '' }}" type="text" name="canceled_at" id="canceled_at" value="{{ old('canceled_at') }}">
                @if($errors->has('canceled_at'))
                    <span class="text-danger">{{ $errors->first('canceled_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.canceled_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.subscription.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Subscription::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.subscription.fields.payment_frequency') }}</label>
                <select class="form-control {{ $errors->has('payment_frequency') ? 'is-invalid' : '' }}" name="payment_frequency" id="payment_frequency">
                    <option value disabled {{ old('payment_frequency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Subscription::PAYMENT_FREQUENCY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_frequency', 'monthly') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_frequency'))
                    <span class="text-danger">{{ $errors->first('payment_frequency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.subscription.fields.payment_frequency_helper') }}</span>
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
