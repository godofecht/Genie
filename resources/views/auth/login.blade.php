@extends('layouts.auth')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Form -->
        <div class="container content-space-3 content-space-t-lg-4 content-space-b-lg-3">
            <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                <!-- Heading -->
                <div class="text-center mb-5 mb-md-7">
                    <h1 class="h2">{{ trans('global.welcome_back') }}</h1>
                    <p>{{ trans('global.login_message') }}</p>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form action="{{ route('login') }}" method="POST" class="js-validate needs-validation" novalidate>
                    @csrf
                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupSimpleLoginEmail">{{ trans('global.login_email') }}</label>
                        <input type="email" class="form-control form-control-lg" name="email"
                               id="signupSimpleLoginEmail" placeholder="email@site.com" aria-label="email@site.com"
                               required>
                        <span class="invalid-feedback">{{ trans('global.error_invalid_email') }}</span>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label"
                                   for="signupSimpleLoginPassword">{{ trans('global.login_password') }}</label>

                            <a class="form-label-link"
                               href="{{ route('password.request') }}">{{ trans('global.forgot_password') }}</a>
                        </div>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <input type="password" class="js-toggle-password form-control form-control-lg"
                                   name="password" id="signupSimpleLoginPassword"
                                   placeholder="{{ trans('global.password_minimum_length') }}"
                                   aria-label="{{ trans('global.password_minimum_length') }}" required minlength="8"
                                   data-hs-toggle-password-options='{
                     "target": "#changePassTarget",
                     "defaultClass": "bi-eye-slash",
                     "showClass": "bi-eye",
                     "classChangeTarget": "#changePassIcon"
                   }'>
                            <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                                <i id="changePassIcon" class="bi-eye"></i>
                            </a>
                        </div>

                        <span class="invalid-feedback">{{ trans('global.error_invalid_password') }}</span>
                    </div>
                    <!-- End Form -->

                    @if($errors)
                        <div class="mb-3"><small class="text-danger">{{ $errors->first() }}</small></div>
                    @endif

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">{{ trans('global.login') }}</button>
                    </div>

                    <div class="text-center">
                        <p>{{ trans('global.message_no_account') }} <a class="link"
                                                                       href="{{ route('register') }}">{{ trans('global.signup_here') }}</a>
                        </p>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Form -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
