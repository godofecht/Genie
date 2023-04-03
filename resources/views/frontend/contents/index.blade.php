@extends('layouts.dashboard')
@section('content')
    <div class="navbar-sidebar-aside-content content-space-t-3 content-space-b-2 px-lg-5 px-xl-10">
        <div class="container">
            @foreach($contents as $content)
                <!-- Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-header-title mb-1">{{ $content->prompt->title }}</h3>
                        <small class="text-muted">{{ $content->created_at->format('Y-m-d') ?? '' }}</small>

                        <span class="card-pinned-top-end">
                        <a href="{{ route('frontend.contents.show', $content->id) }}"
                           class="btn btn-primary mt-3">{{ trans('global.create_more_content') }}</a>
                    </span>
                    </div>
                    <div class="card-body text-left">
                        @foreach($content->answers as $answer)
                            <p class="h6 mb-1">{{ $answer->question->question }}</p>
                            <p class="text-secondary mb-4"><small>{{ $answer->answer }}</small></p>
                        @endforeach

                        @if($content->prompt->isText)
                        <p class="h6 mb-1">{{ trans('global.tone') }}</p>
                        <p class="text-secondary mb-4"><small>{{ $content->tone->tone }}</small></p>

                        @feature('multilingual')
                        @if($content->language)
                            <p class="h6 mb-1">{{ trans('global.language') }}</p>
                            <p class="text-secondary mb-4"><small>{{ $content->language->language }}</small></p>
                        @endif
                        @endfeature
                        @endif

                        <p class="h6 mb-1">{{ trans('global.content') }}</p>
                        <p class="text-secondary mb-0"
                           style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                            <small>{{ $content->prompt->isText ? strip_tags($content->content) : 'Click to preview image' }}</small></p>
                    </div>

                    <a class="stretched-link" href="{{ route('frontend.contents.show', $content->id) }}"></a>
                </div>
                <!-- End Card -->
            @endforeach
        </div>
    </div>
@endsection
