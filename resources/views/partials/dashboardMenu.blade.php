<!-- Navbar -->
<nav class="js-nav-scroller navbar navbar-expand-lg navbar-sidebar navbar-vertical navbar-light bg-white border-end"
     data-hs-nav-scroller-options='{
            "type": "vertical",
            "target": ".navbar-nav .active",
            "offset": 80
           }'>
    <!-- Navbar Toggle -->
    <button type="button" class="navbar-toggler btn btn-white d-grid w-100" data-bs-toggle="collapse"
            data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false"
            aria-controls="navbarVerticalNavMenu">
        <span class="d-flex justify-content-between align-items-center">
          <span class="h6 mb-0">Nav menu</span>

          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>

          <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
        </span>
    </button>
    <!-- End Navbar Toggle -->

    <!-- Navbar Collapse -->
    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
        <div class="navbar-brand-wrapper border-end" style="height: auto;">
            <!-- Default Logo -->
            <div class="d-flex align-items-center mb-3">
                <a class="navbar-brand" href="{{ url('/') }}" aria-label="Space">
                    <img class="navbar-brand-logo" src="{{ $brand->logo->url }}" alt="Logo">
                </a>
                <a class="navbar-brand-badge" href="#">
                    <span class="badge bg-soft-primary text-primary ms-2">v{{ $brand->version }}</span>
                </a>
            </div>
            <!-- End Default Logo -->
        </div>

        <div class="pt-10">
            <ul id="navbarSettings" class="navbar-nav nav nav-vertical nav-tabs nav-tabs-borderless nav-sm">
                <li class="nav-item">
                    <span class="nav-subtitle">{{ trans('global.dashboard') }}</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("frontend.home") ? "active" : "" }}"
                       href="{{ route("frontend.home") }}">{{ trans('global.library') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("frontend.contents.index") ? "active" : "" }}"
                       href="{{ route("frontend.contents.index") }}">{{ trans('global.history') }}</a>
                </li>

                <li class="nav-item my-2 my-lg-5"></li>

                <li class="nav-item">
                    <span class="nav-subtitle">{{ trans('global.tools') }}</span>
                </li>

                @foreach($categories as $category)
                    <li class="nav-item ">
                        <a class="nav-link dropdown-toggle" href="#snippetsSidebarNavFeaturesCollapse-{{ $category->id }}" role="button"
                           data-bs-toggle="collapse" aria-expanded="false"
                           aria-controls="snippetsSidebarNavFeaturesCollapse-{{ $category->id }}">{{ $category->title }}</a>

                        <div id="snippetsSidebarNavFeaturesCollapse-{{ $category->id }}" class="nav-collapse collapse {{ request()->routeIs("frontend.contents.create") && request()->get('category') == $category->id ? "show" : "" }}">
                            @foreach($category->categoryPrompts()->enabled()->get() as $prompt)
                                <a class="nav-link text-break {{ request()->routeIs("frontend.contents.create") && request()->get('prompt') == $prompt->id ? "active" : "" }}"
                                   style="white-space: normal;"
                                   href="{{ route('frontend.contents.create', ['category' => $category->id, 'prompt' => $prompt->id]) }}">{{ $prompt->title }}</a>
                            @endforeach
                        </div>
                    </li>
                @endforeach

                <li class="nav-item my-2 my-lg-5"></li>

                <li class="nav-item">
                    <span class="nav-subtitle">{{ trans('global.account') }}</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("frontend.profile.index") ? "active" : "" }}"
                       href="{{ route('frontend.profile.index') }}">{{ trans('global.my_profile') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("frontend.subscription") ? "active" : "" }}"
                       href="{{ route('frontend.subscription') }}">{{ trans('global.subscription') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("frontend.payments") ? "active" : "" }}"
                       href="{{ route('frontend.payments') }}">{{ trans('global.payments.title') }}</a>
                </li>

                @feature('multilingual')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("frontend.settings") ? "active" : "" }}"
                       href="{{ route('frontend.settings') }}">{{ trans('global.settings') }}</a>
                </li>
                @endfeature

                <li class="nav-item">
                    <a class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                       href="#">{{ trans('global.logout') }}</a>
                </li>

            </ul>
        </div>
    </div>
    <!-- End Navbar Collapse -->
</nav>
<!-- End Navbar -->
