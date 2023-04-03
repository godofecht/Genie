@extends('layouts.landing')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Pricing -->
        <div class="overflow-hidden content-space-t-4 content-space-b-4">
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
                                          <svg class="form-switch-promotion-arrow" xmlns="http://www.w3.org/2000/svg"
                                               x="0px" y="0px"
                                               viewBox="0 0 99.3 57" width="48">
                                            <path fill="none" stroke="#bdc5d1" stroke-width="4" stroke-linecap="round"
                                                  stroke-miterlimit="10"
                                                  d="M2,39.5l7.7,14.8c0.4,0.7,1.3,0.9,2,0.4L27.9,42"></path>
                                            <path fill="none" stroke="#bdc5d1" stroke-width="4" stroke-linecap="round"
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
                                            <span class="fs-5 align-top text-dark fw-semibold">{{ $paymentSettings->currency->symbol }}</span>
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
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
