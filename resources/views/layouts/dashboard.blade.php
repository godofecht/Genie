<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $brand->site_title }} | {{ $brand->slogan }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $brand->favicon->original_url }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/hs-mega-menu/dist/hs-mega-menu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/quill/dist/quill.snow.css') }}">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/snippets.min.css') }}">
</head>

<body class="navbar-sidebar-aside-lg">
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand navbar-fixed navbar-end navbar-light navbar-sticky-lg-top bg-white">
    <div class="container-fluid">
        <nav class="navbar-nav-wrap">
            <div class="row flex-grow-1">
                <!-- Default Logo -->
                <div class="docs-navbar-sidebar-container d-flex align-items-center mb-2 mb-lg-0">
                    <a class="navbar-brand" href="{{ url('/') }}" aria-label="Space">
                        <img class="navbar-brand-logo" src="{{ $brand->logo->url }}" alt="Logo">
                    </a>
                    <a href="#">
                        <span class="badge bg-soft-primary text-primary">v{{ $brand->version }}</span>
                    </a>
                </div>
                <!-- End Default Logo -->

                <div class="col-md px-lg-0 pt-2">
                    <div class="d-flex justify-content-between align-items-center px-lg-5 px-xl-10">
                        <div class="d-none d-md-block">
                            <!-- Search Form -->
                            <form id="docsSearch" class="position-relative"
                                  data-hs-list-options='{
                       "searchMenu": true,
                       "keyboard": true,
                       "item": "searchTemplate",
                       "valueNames": ["component", "category", {"name": "link", "attr": "href"}],
                       "empty": "#searchNoResults"
                     }'>
                                <!-- Input Group -->
                                <div class="input-group input-group-merge navbar-input-group">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>

                                    <input name="search-prompts" type="search" class="search form-control form-control-sm" placeholder="{{ trans('global.search_in_tools') }}" aria-label="{{ trans('global.search_in_tools') }}">

                                    <a class="input-group-append input-group-text" href="javascript:;">
                                        <i id="clearSearchResultsIcon" class="bi-x" style="display: none;"></i>
                                    </a>
                                </div>
                                <!-- End Input Group -->

                                <!-- List -->
                                <div class="list dropdown-menu navbar-dropdown-menu-borderless w-100 overflow-auto" style="max-height: 16rem;"></div>
                                <!-- End List -->

                                <!-- Empty -->
                                <div id="searchNoResults" style="display: none;">
                                    <div class="text-center p-4">
                                        <img class="mb-3" src="{{ asset('svg/illustrations/oc-error.svg') }}" alt="Image Description" style="width: 10rem;">
                                        <p class="mb-0">No Results</p>
                                    </div>
                                </div>
                                <!-- End Empty -->
                            </form>
                            <!-- End Search Form -->

                            <!-- List Item Template -->
                            <div class="d-none">
                                <div id="searchTemplate" class="dropdown-item">
                                    <a class="d-block link" href="#">
                                        <span class="category d-block fw-normal text-muted mb-1"></span>
                                        <span class="component text-dark"></span>
                                    </a>
                                </div>
                            </div>
                            <!-- End List Item Template -->
                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    @include('partials.dashboardMenu')
    @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Go To -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;"
   data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": {
           "right": "2rem"
         },
         "show": {
           "bottom": "2rem"
         },
         "hide": {
           "bottom": "-2rem"
         }
       }
     }'>
    <i class="bi-chevron-up"></i>
</a>

<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Global Compulsory  -->
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('vendor/hs-header/dist/hs-header.min.js') }}"></script>
<script src="{{ asset('vendor/hs-mega-menu/dist/hs-mega-menu.min.js') }}"></script>
<script src="{{ asset('vendor/hs-show-animation/dist/hs-show-animation.min.js') }}"></script>
<script src="{{ asset('vendor/hs-go-to/dist/hs-go-to.min.js') }}"></script>
<script src="{{ asset('vendor/aos/dist/aos.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('vendor/hs-nav-scroller/dist/hs-nav-scroller.min.js') }}"></script>
<script src="{{ asset('vendor/hs-toggle-switch/dist/hs-toggle-switch.min.js') }}"></script>
<script src="{{ asset('vendor/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('vendor/list.js/dist/list.min.js') }}"></script>

<!-- JS Front -->
<script src="{{ asset('js/theme.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF HEADER
        // =======================================================
        new HSHeader('#header').init()

        // INITIALIZATION OF QUILLJS EDITOR
        // =======================================================
        HSCore.components.HSQuill.init('.js-quill')

        // INITIALIZATION OF MEGA MENU
        // =======================================================
        new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })


        // INITIALIZATION OF SHOW ANIMATIONS
        // =======================================================
        new HSShowAnimation('.js-animation-link')


        // INITIALIZATION OF BOOTSTRAP VALIDATION
        // =======================================================
        HSBsValidation.init('.js-validate')


        // INITIALIZATION OF GO TO
        // =======================================================
        new HSGoTo('.js-go-to')


        // INITIALIZATION OF AOS
        // =======================================================
        AOS.init({
            duration: 650,
            once: true
        });

        // INITIALIZATION OF TOGGLE SWITCH
        // =======================================================
        new HSToggleSwitch('.js-toggle-switch')

        // INITIALIZATION OF SWIPER
        // =======================================================
        var swiper = new Swiper('.js-swiper-hero-clients',{
            slidesPerView: 2,
            breakpoints: {
                380: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
            },
        });


        // INITIALIZATION OF NAV SCROLLER
        // =======================================================
        new HsNavScroller('.js-nav-scroller')

        // INITIALIZATION OF BOOTSTRAP DROPDOWN
        // =======================================================
        HSBsDropdown.init()

        // INITIALIZATION OF LISTJS COMPONENT
        // =======================================================
        const docsSearch = HSCore.components.HSList.init('#docsSearch')

        fetch('{{ route("frontend.prompts.json") }}')
            .then(response => response.json())
            .then(data => {
                docsSearch.getItem(0).add(data)
            })
    })()
</script>

@yield('scripts')
</body>
</html>
