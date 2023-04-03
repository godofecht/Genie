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

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/snippets.min.css') }}">
</head>

<body>

@yield('content')

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
<script src="{{ asset('vendor/hs-toggle-password/dist/js/hs-toggle-password.js') }}"></script>

<!-- JS Front -->
<script src="{{ asset('js/theme.min.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
    (function() {

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


        // INITIALIZATION OF TOGGLE PASSWORD
        // =======================================================
        new HSTogglePassword('.js-toggle-password')

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
    })()
</script>
@yield('scripts')
</body>
</html>
