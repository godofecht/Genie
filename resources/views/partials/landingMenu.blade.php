<!-- ========== HEADER ========== -->
<header id="header"
        class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-light navbar-show-hide pt-2 pb-2"
        data-hs-header-options='{
            "fixMoment": 1000,
            "fixEffect": "slide"
          }'>

    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="{{ url('/') }}" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ $brand->logo->url }}" alt="Logo">
            </a>
            <!-- End Default Logo -->

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
                <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
            </button>
            <!-- End Toggler -->

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="navbar-absolute-top-scroller">
                    <ul class="navbar-nav">

                        <!-- Home -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}"
                               href="{{ url('/') }}">{{ trans('global.home') }}</a>
                        </li>
                        <!-- End Home -->

                        <!-- Tools -->
                        <li class="hs-has-mega-menu nav-item">
                            <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle"
                               aria-current="page" href="#" role="button"
                               aria-expanded="false">{{ trans('global.tools') }}</a>

                            <!-- Mega Menu -->
                            <div class="hs-mega-menu dropdown-menu w-100" aria-labelledby="landingsMegaMenu"
                                 style="min-width: 30rem;">
                                <div class="row">
                                    <div class="navbar-dropdown-menu-inner">
                                        <div class="row">
                                            @foreach($categories->take(4) as $category)
                                                <div class="col-sm mb-3 mb-sm-0">
                                                    <span class="dropdown-header">{{ $category->title }}</span>
                                                    @foreach($category->categoryPrompts->take(4) as $prompt)
                                                        <a class="dropdown-item"
                                                           href="{{ route('frontend.contents.create', ['category' => $category->id, 'prompt' => $prompt->id]) }}">{{ $prompt->title }}</a>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- End Row -->
                            </div>
                            <!-- End Mega Menu -->
                        </li>
                        <!-- End Tools -->

                        <!-- Pricing -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('pricing')) ? 'active' : '' }}"
                               href="{{ url('/pricing') }}">{{ trans('global.pricing') }}</a>
                        </li>
                        <!-- End Pricing -->

                        <!-- Use Cases -->
                        <li class="hs-has-sub-menu nav-item">
                            <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#"
                               role="button" aria-expanded="false">{{ trans('global.use_cases') }}</a>

                            <!-- Mega Menu -->
                            <div class="hs-sub-menu dropdown-menu" aria-labelledby="pagesMegaMenu"
                                 style="min-width: 14rem;">
                                @foreach($categories as $category)
                                    <a class="dropdown-item "
                                       href="{{ route("frontend.home") }}">{{ $category->title }}</a>
                                @endforeach
                            </div>
                            <!-- End Mega Menu -->
                        </li>
                        <!-- End Use Cases -->

                        <!-- Button -->
                        <li class="nav-item">
                            <a class="btn btn-primary btn-transition"
                               href="{{ route('register') }}">{{ trans('global.get_started') }}</a>
                        </li>
                        <!-- End Button -->

                        <!-- SingIn -->
                        <li class="nav-item">
                            <a class="btn btn-white" href="{{ route('login') }}">{{ trans('global.sign_in') }}</a>
                        </li>
                        <!-- End SingIn -->
                    </ul>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->
