@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.thirdParty.openai_settings') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.third-parties.update", [$thirdParty->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="openai_api_key">{{ trans('cruds.thirdParty.fields.openai_api_key') }}</label>
                <input class="form-control {{ $errors->has('openai_api_key') ? 'is-invalid' : '' }}" type="text" name="openai_api_key" id="openai_api_key" value="{{ old('openai_api_key', $thirdParty->openai_api_key) }}">
                @if($errors->has('openai_api_key'))
                    <span class="text-danger">{{ $errors->first('openai_api_key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.openai_api_key_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="engine_id">{{ trans('cruds.thirdParty.fields.engine') }}</label>
                <select class="form-control select2 {{ $errors->has('engine') ? 'is-invalid' : '' }}" name="engine_id" id="engine_id">
                    @foreach($engines as $id => $entry)
                        <option value="{{ $id }}" {{ (old('engine_id') ? old('engine_id') : $thirdParty->engine->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('engine'))
                    <span class="text-danger">{{ $errors->first('engine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.engine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="default_max_tokens">{{ trans('cruds.thirdParty.fields.default_max_tokens') }}</label>
                <input class="form-control {{ $errors->has('default_max_tokens') ? 'is-invalid' : '' }}" type="number" name="default_max_tokens" id="default_max_tokens" value="{{ old('default_max_tokens', $thirdParty->default_max_tokens) }}" step="1">
                @if($errors->has('default_max_tokens'))
                    <span class="text-danger">{{ $errors->first('default_max_tokens') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.default_max_tokens_helper') }}</span>
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
        {{ trans('cruds.thirdParty.paypal_settings') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.third-parties.update", [$thirdParty->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="pp_client">{{ trans('cruds.thirdParty.fields.pp_client') }}</label>
                <input class="form-control {{ $errors->has('pp_client') ? 'is-invalid' : '' }}" type="text" name="pp_client" id="pp_client" value="{{ old('pp_client', $thirdParty->pp_client) }}">
                @if($errors->has('pp_client'))
                    <span class="text-danger">{{ $errors->first('pp_client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.pp_client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pp_secret">{{ trans('cruds.thirdParty.fields.pp_secret') }}</label>
                <input class="form-control {{ $errors->has('pp_secret') ? 'is-invalid' : '' }}" type="text" name="pp_secret" id="pp_secret" value="{{ old('pp_secret', $thirdParty->pp_secret) }}">
                @if($errors->has('pp_secret'))
                    <span class="text-danger">{{ $errors->first('pp_secret') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.pp_secret_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.thirdParty.fields.pp_env') }}</label>
                <select class="form-control {{ $errors->has('pp_env') ? 'is-invalid' : '' }}" name="pp_env" id="pp_env">
                    <option value disabled {{ old('pp_env', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ThirdParty::PP_ENV_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('pp_env', $thirdParty->pp_env) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('pp_env'))
                    <span class="text-danger">{{ $errors->first('pp_env') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.pp_env_helper') }}</span>
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
        {{ trans('cruds.thirdParty.stripe_settings') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.third-parties.update", [$thirdParty->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="stripe_key">{{ trans('cruds.thirdParty.fields.stripe_key') }}</label>
                <input class="form-control {{ $errors->has('stripe_key') ? 'is-invalid' : '' }}" type="text" name="stripe_key" id="stripe_key" value="{{ old('stripe_key', $thirdParty->stripe_key) }}">
                @if($errors->has('stripe_key'))
                    <span class="text-danger">{{ $errors->first('stripe_key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.stripe_key_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stripe_secret">{{ trans('cruds.thirdParty.fields.stripe_secret') }}</label>
                <input class="form-control {{ $errors->has('stripe_secret') ? 'is-invalid' : '' }}" type="text" name="stripe_secret" id="stripe_secret" value="{{ old('stripe_secret', $thirdParty->stripe_secret) }}">
                @if($errors->has('stripe_secret'))
                    <span class="text-danger">{{ $errors->first('stripe_secret') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.stripe_secret_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stripe_webhook_secret">{{ trans('cruds.thirdParty.fields.stripe_webhook_secret') }}</label>
                <input class="form-control {{ $errors->has('stripe_webhook_secret') ? 'is-invalid' : '' }}" type="text" name="stripe_webhook_secret" id="stripe_webhook_secret" value="{{ old('stripe_webhook_secret', $thirdParty->stripe_webhook_secret) }}">
                @if($errors->has('stripe_webhook_secret'))
                    <span class="text-danger">{{ $errors->first('stripe_webhook_secret') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.thirdParty.fields.stripe_webhook_secret_helper') }}</span>
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
