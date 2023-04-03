<!-- ========== FOOTER ========== -->
<footer class="bg-light">
    <div class="container pb-1 pb-lg-7">
        <div class="row content-space-t-2">
            <div class="col-12 col-lg-3 mb-7 mb-lg-0">
                <!-- Logo -->
                <div class="mb-5">
                    <a class="navbar-brand" href="{{ url('/') }}" aria-label="Space">
                        <img class="navbar-brand-logo" src="{{ $brand->logo->url }}" alt="Image Description">
                    </a>
                </div>
                <!-- End Logo -->

                <!-- List -->
                <ul class="list-unstyled list-py-1">
                    <li><a class="link-sm link-secondary"><i class="bi-geo-alt-fill me-1"></i> {{ $brand->address }}</a>
                    </li>
                    <li><a class="link-sm link-secondary" href="tel:{{ $brand->phone }}"><i
                                class="bi-telephone-inbound-fill me-1"></i> {{ $brand->phone }}</a></li>
                    <li><a class="link-sm link-secondary" href="mailto:{{ $brand->email }}"><i
                                class="bi-envelope-fill me-1"></i> {{ $brand->email }}</a></li>
                </ul>
                <!-- End List -->

            </div>
            <!-- End Col -->

            <div class="col-6 col-sm mb-7 mb-sm-0">
                <h5 class="mb-3">{{ trans('global.features') }}</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    <li><a class="link-sm link-secondary"
                           href="{{ route('frontend.home') }}">{{ trans('global.dashboard') }}</a></li>
                    <li><a class="link-sm link-secondary" href="{{ url('/pricing') }}">{{ trans('global.pricing') }}</a>
                    </li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-6 col-sm mb-7 mb-sm-0">
                <h5 class="mb-3">{{ trans('global.use_cases') }}</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    @foreach($categories as $category)
                        <li><a class="link-sm link-secondary"
                               href="{{ route("frontend.home") }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-6 col-sm mb-7 mb-sm-0">
                <h5 class="mb-3">Tools</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-0">
                    @foreach($prompts->take(4) as $prompt)
                        <li><a class="link-sm link-secondary"
                               href="{{ route("frontend.home") }}">{{ $prompt->title }}</a></li>
                    @endforeach
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->

            <div class="col-6 col-sm">
                <h5 class="mb-3">{{ trans('global.resources') }}</h5>

                <!-- List -->
                <ul class="list-unstyled list-py-1 mb-5">
                    <li><a class="link-sm link-secondary"
                           href="{{ route("frontend.home") }}">{{ trans('global.your_account') }}</a></li>
                    <li><a class="link-sm link-secondary"
                           href="{{ route("frontend.home") }}">{{ trans('global.genie_editor') }}</a></li>
                    <li><a class="link-sm link-secondary"
                           href="{{ route("frontend.home") }}">{{ trans('global.get_started') }}</a></li>
                    <li><a class="link-sm link-secondary"
                           href="{{ route("frontend.home") }}">{{ trans('global.sign_in') }}</a></li>
                </ul>
                <!-- End List -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="border-top my-3"></div>

        <div class="row mb-7">
            <div class="col-sm-auto">
                <!-- Socials -->
                <ul class="list-inline mb-0">
                    @if($brand->facebook)
                        <li class="list-inline-item">
                            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $brand->facebook }}"
                               target="_blank">
                                <i class="bi-facebook"></i>
                            </a>
                        </li>
                    @endif

                    @if($brand->instagram)
                        <li class="list-inline-item">
                            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $brand->instagram }}"
                               target="_blank">
                                <i class="bi-instagram"></i>
                            </a>
                        </li>
                    @endif

                    @if($brand->twitter)
                        <li class="list-inline-item">
                            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $brand->twitter }}"
                               target="_blank">
                                <i class="bi-twitter"></i>
                            </a>
                        </li>
                    @endif

                    @if($brand->google)
                        <li class="list-inline-item">
                            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $brand->google }}"
                               target="_blank">
                                <i class="bi-google"></i>
                            </a>
                        </li>
                    @endif

                    @if($brand->youtube)
                        <li class="list-inline-item">
                            <a class="btn btn-soft-secondary btn-xs btn-icon" href="{{ $brand->youtube }}"
                               target="_blank">
                                <i class="bi-youtube"></i>
                            </a>
                        </li>
                    @endif
                </ul>
                <!-- End Socials -->
            </div>
        </div>

        <!-- Copyright -->
        <div class="w-md-85 text-lg-center mx-lg-auto">
            <p class="text-muted small">© {{ $brand->site_title }} 2023. All rights reserved.</p>
            <p class="text-muted small">When you visit or interact with our sites, services or tools, we or our
                authorised service providers may use cookies for storing information to help provide you with a better,
                faster and safer experience and for marketing purposes.</p>
        </div>
        <!-- End Copyright -->
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
