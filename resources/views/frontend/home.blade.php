@extends('layouts.dashboard')
@section('content')
    <!-- Content -->
    <div class="navbar-sidebar-aside-content content-space-t-3 content-space-b-2 px-lg-5 px-xl-10">
        <div class="container">
            <div class="row justify-content-md-between align-items-md-center mb-10">
                <div class="col-md-6 col-xl-5">
                    <div class="mb-4">
                        <h1 class="display-5 mb-3">Explore <span
                                class="text-primary text-highlight-warning">your possibilities</span>
                            with powerful dashboard.</h1>
                        <p class="lead">Unlock the full potential of your projects with our comprehensive suite of tools designed for seamless collaboration and easy navigation.</p>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-md-6 col-xl-6">
                    <img class="img-fluid" src="{{ asset('svg/illustrations/oc-building-apps.svg') }}"
                         alt="Image Description">
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <div class="row justify-content-center">
                @foreach($prompts as $prompt)
                    <!-- Card -->
                    <div class="card col-lg-3 col-md-4 col-sm-6 m-3">
                        <div class="card-body">
                            <span class="card-subtitle">{{ $prompt->category->title }}</span>
                            <h3 class="card-title">{{ $prompt->title }}</h3>
                            <p class="card-text">{{ $prompt->description }}</p>
                            <a class="card-link" href="#">Try now</a>

                            <a class="stretched-link"
                               href="{{ route('frontend.contents.create', ['category' => $prompt->category->id, 'prompt' => $prompt->id]) }}"></a>
                        </div>
                    </div>
                    <!-- End Card -->
                @endforeach
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Content -->
@endsection
