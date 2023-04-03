@extends('layouts.auth')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Form -->
        <div class="container content-space-3 content-space-t-lg-4 content-space-b-lg-3">
            <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                <!-- Heading -->
                <div class="text-center mb-5 mb-md-7">
                    <h1 class="h2">{{ trans('global.forgot_password') }}</h1>
                    <p>{{ trans('global.forgot_password_message') }}</p>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}" class="js-validate needs-validation"
                      novalidate>
                    @csrf

                    <!-- Form -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label" for="signupSimpleResetPasswordEmail"
                                   tabindex="0">{{ trans('global.login_email') }}</label>

                            <a class="form-label-link" href="{{ route('login') }}">
                                <i class="bi-chevron-left small ms-1"></i> {{ trans('global.back_to_login') }}
                            </a>
                        </div>

                        <input type="email" class="form-control form-control-lg" name="email"
                               id="signupSimpleResetPasswordEmail" tabindex="1"
                               placeholder="{{ trans('global.enter_email') }}"
                               aria-label="{{ trans('global.enter_email') }}" required>
                        <span class="invalid-feedback">{{ trans('global.error_invalid_email') }}</span>
                    </div>
                    <!-- End Form -->

                    @if($errors)
                        <div class="mb-3"><small class="text-danger">{{ $errors->first() }}</small></div>
                    @endif

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">{{ trans('global.submit') }}</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Form -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
