@extends('layouts.auth')
@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Form -->
        <div class="container content-space-3 content-space-t-lg-4 content-space-b-lg-3">
            <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                <!-- Heading -->
                <div class="text-center mb-5 mb-md-7">
                    <h1 class="h2">{{ trans('global.reset_password') }}</h1>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form method="POST" action="{{ route('password.request') }}">
                    @csrf

                    <input name="token" value="{{ $token }}" type="hidden">

                    <div>
                        <div class="form-group mb-4">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                   placeholder="{{ trans('global.login_email') }}">

                            @if($errors->has('email'))
                                <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required placeholder="{{ trans('global.login_password') }}">

                            @if($errors->has('password'))
                                <span class="text-danger">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required
                                   placeholder="{{ trans('global.login_password_confirmation') }}">
                        </div>
                    </div>
                    <div class="d-grid">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-flat btn-block">
                                {{ trans('global.reset_password') }}
                            </button>
                        </div>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Form -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection
