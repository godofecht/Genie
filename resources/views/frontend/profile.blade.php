@extends('layouts.dashboard')
@section('content')
    <div class="navbar-sidebar-aside-content content-space-t-3 content-space-b-2 px-lg-5 px-xl-10">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">{{ trans('global.my_profile') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route("frontend.profile.update") }}" class="js-validate needs-validation" novalidate>
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="required form-label" for="name">{{ trans('cruds.user.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                           type="text" name="name" id="name"
                                           value="{{ old('name', auth()->user()->name) }}" required>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="required form-label" for="title">{{ trans('cruds.user.fields.email') }}</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                           type="email" name="email" id="email"
                                           value="{{ old('email', auth()->user()->email) }}" required>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">{{ trans('global.change_password') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route("frontend.profile.password") }}">
                                @csrf
                                <div class="form-group mb-3 {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="required form-label"
                                           for="password">New {{ trans('cruds.user.fields.password') }}</label>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                    @if($errors->has('password'))
                                        <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label class="required form-label" for="password_confirmation">Repeat
                                        New {{ trans('cruds.user.fields.password') }}</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                           id="password_confirmation" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">{{ trans('global.delete_account') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route("frontend.profile.destroy") }}"
                                  onsubmit="return prompt('{{ __('global.delete_account_warning') }}') == '{{ auth()->user()->email }}'">
                                @csrf
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">
                                        {{ trans('global.delete') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
