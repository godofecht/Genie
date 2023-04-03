@extends('layouts.landing')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        @if($landingPage->hero)
            <!-- Hero -->
            <div class="container content-space-t-4 content-space-t-lg-5 content-space-b-2 content-space-b-lg-3">
                <div class="row justify-content-lg-between align-items-lg-center mb-10">
                    <div class="col-md-6 col-lg-5">
                        <!-- Heading -->
                        <div class="mb-5">
                            <h1>{{ $landingPage->hero->title }}</h1>
                            <p>{{ $landingPage->hero->subtitle }}</p>
                        </div>
                        <!-- End Title & Description -->

                        <div class="d-grid d-sm-flex gap-3">
                            <a class="btn btn-primary btn-transition"
                               href="{{ route('register') }}">{{ $landingPage->hero->cta }}</a>
                        </div>

                        <p class="form-text small">{{ $landingPage->hero->promotion }}</p>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-7 col-md-6 d-none d-md-block">
                        <img class="img-fluid" src="{{ $landingPage->hero->image->url }}"
                             alt="Image Description">
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <!-- Swiper Slider -->
                <div class="js-swiper-hero-clients swiper text-center">
                    <div class="swiper-wrapper">
                        @foreach($landingPage->partners as $partner)
                            <div class="swiper-slide">
                                <img class="avatar avatar-lg avatar-4x3" src="{{ $partner->logo->url }}"
                                     alt="Logo">
                            </div>
                            <!-- End Slide -->
                        @endforeach
                    </div>
                </div>
                <!-- End Swiper Slider -->
            </div>
            <!-- End Hero -->
        @endif

        @if($landingPage->story)
            <!-- Icon Blocks -->
            <div id="aboutSection" class="container content-space-t-1 content-space-t-lg-2">
                <!-- Heading -->
                <div class="w-lg-75 text-center mx-auto mb-5 mb-sm-9">
                    <h2 class="h1">{{ $landingPage->story->title }}</h2>
                    <p>{{ $landingPage->story->subtitle }}</p>
                </div>
                <!-- End Heading -->

                <div class="row">
                    @foreach($landingPage->story->blocks as $block)
                        <div class="col-md-4 mb-7">
                            <!-- Icon Blocks -->
                            <div class="text-center px-lg-3">
                                <span class="svg-icon svg-icon-lg text-primary mb-3">
                                  <img src="{{ $block->icon->url }}" alt="Icon">
                                </span>

                                <h3>{{ $block->title }}</h3>
                                <p>{{ $block->subtitle }}</p>
                            </div>
                            <!-- End Icon Blocks -->
                        </div>
                        <!-- End Col -->
                    @endforeach
                </div>
                <!-- End Row -->
            </div>
            <!-- End Icon Blocks -->

            <!-- Devices -->
            <div class="container">
                <div class="w-75 mx-auto mb-7">
                    <img class="img-fluid" src="{{ asset('svg/components/three-pointers.svg') }}" alt="SVG Arrow">
                </div>

                <!-- Heading -->
                <div class="w-md-60 w-lg-50 text-center mx-auto mb-7">
                    <p><span
                            class="text-dark fw-semibold">{{ explode('.', $landingPage->story->promotion)[0] }}.</span> {{ explode('.', $landingPage->story->promotion)[1] }}
                    </p>
                </div>
                <!-- End Heading -->

                <!-- Devices -->
                <div class="devices">
                    <!-- Mobile Device -->
                    <figure class="device-mobile rotated-3d-right">
                        <div class="device-mobile-frame">
                            <img class="device-mobile-img" src="{{ $landingPage->story->phone_image->url }}"
                                 alt="Image Description">
                        </div>
                    </figure>
                    <!-- End Mobile Device -->

                    <!-- Browser Device -->
                    <figure class="device-browser">
                        <div class="device-browser-header">
                            <div class="device-browser-header-btn-list">
                                <span class="device-browser-header-btn-list-btn"></span>
                                <span class="device-browser-header-btn-list-btn"></span>
                                <span class="device-browser-header-btn-list-btn"></span>
                            </div>
                            <div class="device-browser-header-browser-bar">{{ request()->url() }}</div>
                        </div>

                        <div class="device-browser-frame">
                            <img class="device-browser-img" src="{{ $landingPage->story->browser_image->url }}"
                                 alt="Image Description">
                        </div>
                    </figure>
                    <!-- End Browser Device -->
                </div>
                <!-- End Devices -->
            </div>
            <!-- End Devices -->
        @endif

        @if($landingPage->pricing)
            <!-- Pricing -->
            <div class="overflow-hidden content-space-t-4">
                <div class="container">
                    <!-- Heading -->
                    <div class="w-md-75 text-center mx-md-auto mb-9">
                        <h2 class="h1">{{ $landingPage->pricing->title }}</h2>
                        <p>{{ $landingPage->pricing->subtitle }}</p>
                    </div>
                    <!-- End Heading -->

                    @if($paymentSettings->yearly_plan == 'enabled')
                        <!-- Form Switch -->
                        <div class="d-flex justify-content-center mb-5">
                            <div class="form-check form-switch form-switch-between">
                                <label class="form-check-label">{{ trans('global.monthly') }}</label>
                                <input class="js-toggle-switch form-check-input" id="paymentFrequencySwitch"
                                       type="checkbox"
                                       data-hs-toggle-switch-options='{"targetSelector": "#pricingCount"}'>
                                <label class="form-check-label form-switch-promotion">
                                    {{ trans('global.yearly') }}
                                    <span class="form-switch-promotion-container">
                                            <span class="form-switch-promotion-body">
                                              <svg class="form-switch-promotion-arrow"
                                                   xmlns="http://www.w3.org/2000/svg"
                                                   x="0px" y="0px"
                                                   viewBox="0 0 99.3 57" width="48">
                                                <path fill="none" stroke="#bdc5d1" stroke-width="4"
                                                      stroke-linecap="round"
                                                      stroke-miterlimit="10"
                                                      d="M2,39.5l7.7,14.8c0.4,0.7,1.3,0.9,2,0.4L27.9,42"></path>
                                                <path fill="none" stroke="#bdc5d1" stroke-width="4"
                                                      stroke-linecap="round"
                                                      stroke-miterlimit="10"
                                                      d="M11,54.3c0,0,10.3-65.2,86.3-50"></path>
                                              </svg>
                                              <span class="form-switch-promotion-text">
                                                <span
                                                    class="badge bg-primary rounded-pill ms-1">{{ $landingPage->pricing->promotion }}</span>
                                              </span>
                                            </span>
                                          </span>
                                </label>
                            </div>
                        </div>
                        <!-- End Form Switch -->
                    @endif

                    <div class="row mb-7">
                        @foreach($plans as $plan)
                            <div class="col-md mb-3 mb-md-0 d-flex align-items-stretch">
                                <div class="position-relative">
                                    <!-- Card -->
                                    <div class="card h-100 zi-1">
                                        <div class="card-header text-center">
                                            <div class="mb-2">
                                                <span
                                                    class="fs-5 align-top text-dark fw-semibold">{{ $paymentSettings->currency->symbol }}</span>
                                                <span id="pricingCount" class="fs-1 text-dark fw-semibold"
                                                      data-hs-toggle-switch-item-options='{
                             "min": {{ number_format($plan->price_monthly, 0, '.', '') }},
                             "max": {{ number_format($plan->price_yearly/12, 0, '.', '') }}
                           }'>{{ number_format($plan->price_monthly, 0, '.', '') }}</span>
                                                <span>/mo</span>
                                            </div>

                                            <h3 class="card-title">{{ $plan->title }}</h3>
                                            <p class="card-text">{{ $plan->description }}</p>
                                        </div>

                                        <div class="card-body d-flex justify-content-center py-0">
                                            <!-- List Checked -->
                                            <ul class="list-checked list-checked-soft-bg-primary">
                                                <li class="list-checked-item">{{ $plan->word_limit }} {{ trans('global.monthly_words') }}</li>
                                                <li class="list-checked-item">{{ trans('global.access_to_tools') }}</li>
                                                <li class="list-checked-item">{{ trans('global.genie_editor_tool') }}</li>
                                                <li class="list-checked-item">{{ trans('global.product_support') }}</li>
                                            </ul>
                                            <!-- End List Checked -->
                                        </div>

                                        <div class="card-footer text-center">
                                            <div class="d-grid mb-2">
                                                <a type="button" href="{{ route('register') }}"
                                                   class="btn btn-primary">{{ trans('global.get_started') }}</a>
                                            </div>
                                            <p class="card-text text-muted small">{{ trans('global.cancel_anytime') }}</p>
                                        </div>
                                    </div>
                                    <!-- End Card -->
                                </div>
                            </div>
                            <!-- End Col -->
                        @endforeach
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Pricing -->
        @endif

        @if($landingPage->testimonial)
            <!-- Testimonials -->
            <div class="container content-space-2 content-space-lg-3">
                <div class="text-center mb-5">
                    <img class="avatar avatar-lg avatar-4x3" src="{{ $landingPage->testimonial->avatar->url }}"
                         alt="Illustration">
                </div>

                <!-- Blockquote -->
                <figure class="w-md-75 text-center mx-md-auto">
                    <blockquote class="blockquote">“ {{ $landingPage->testimonial->review }} ”
                    </blockquote>

                    <figcaption class="blockquote-footer text-center">
                        {{ $landingPage->testimonial->name }}
                        <span class="blockquote-footer-source">{{ $landingPage->testimonial->title }}</span>
                    </figcaption>
                </figure>
                <!-- End Blockquote -->
            </div>
            <!-- End Testimonials -->
        @endif
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
