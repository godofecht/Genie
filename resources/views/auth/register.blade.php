@extends('layouts.auth')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Form -->
        <div class="container content-space-3 content-space-t-lg-4 content-space-b-lg-3">
            <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
                <!-- Heading -->
                <div class="text-center mb-5 mb-md-7">
                    <h1 class="h2">{{ trans('global.welcome_to') }} {{ $brand->site_title }}</h1>
                    <p>{{ trans('global.signup_fill_form') }}</p>
                </div>
                <!-- End Heading -->

                <!-- Form -->
                <form method="POST" action="{{ route('register') }}" class="js-validate needs-validation" novalidate>
                    {{ csrf_field() }}

                    <!-- Form -->
                    <div class="mb-3">
                        <label class="form-label" for="signupSimpleSignupName">{{ trans('global.user_name') }}</label>
                        <input type="name" class="form-control form-control-lg" name="name" id="signupSimpleSignupName"
                               placeholder="{{ trans('global.place_holder_name') }}"
                               aria-label="{{ trans('global.place_holder_name') }}" required>
                        <span class="invalid-feedback">{{ trans('global.error_invalid_name') }}</span>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-3">
                        <label class="form-label"
                               for="signupSimpleSignupEmail">{{ trans('global.login_email') }}</label>
                        <input type="email" class="form-control form-control-lg" name="email"
                               id="signupSimpleSignupEmail" placeholder="email@site.com" aria-label="email@site.com"
                               required>
                        <span class="invalid-feedback">{{ trans('global.error_invalid_email') }}</span>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-3">
                        <label class="form-label"
                               for="signupSimpleSignupPassword">{{ trans('global.login_password') }}</label>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <input type="password" class="js-toggle-password form-control form-control-lg"
                                   name="password" id="signupSimpleSignupPassword"
                                   placeholder="{{ trans('global.password_minimum_length') }}"
                                   aria-label="{{ trans('global.password_minimum_length') }}" required minlength="8"
                                   data-hs-toggle-password-options='{
                         "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                         "defaultClass": "bi-eye-slash",
                         "showClass": "bi-eye",
                         "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                       }'>
                            <a class="js-toggle-password-target-1 input-group-append input-group-text"
                               href="javascript:;">
                                <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
                            </a>
                        </div>

                        <span class="invalid-feedback">{{ trans('global.error_invalid_password') }}</span>
                    </div>
                    <!-- End Form -->

                    @if($errors)
                        <div class="mb-3"><small class="text-danger">{{ $errors->first() }}</small></div>
                    @endif

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">{{ trans('global.register') }}</button>
                    </div>

                    <div class="text-center">
                        <p>{{ trans('global.message_has_account') }} <a class="link"
                                                                        href="{{ route('login') }}">{{ trans('global.login_here') }}</a>
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
