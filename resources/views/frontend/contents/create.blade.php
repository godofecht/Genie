@extends('layouts.dashboard')
@section('content')
    <div class="navbar-sidebar-aside-content content-space-t-3 content-space-b-2 px-lg-5 px-xl-10">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-header-title">{{ $prompt->title }}</h4>
                    </div>

                    <div class="card-body">
                        <form id="content-form" method="POST" action="{{ route("frontend.contents.store") }}"
                              enctype="multipart/form-data" class="js-validate needs-validation" novalidate>
                            @method('POST')
                            @csrf
                            <input type="hidden" name="prompt_id" value="{{ $prompt->id }}">

                            @foreach($prompt->questions as $question)
                                <div class="mb-3">
                                    <label class="form-label"
                                           for="{{ "question_$question->id" }}">{{ $question->question }} <span
                                            class="form-label-secondary">{{ $question->is_required == 'required' ? '' : '(Optional)' }}</span></label>
                                    @if($question->type == 'single_line')
                                        <input name="{{ "question_$question->id" }}"
                                               minlength="{{ $question->minimum_answer_length }}" type="text"
                                               class="form-control {{ $errors->has($question->id) ? 'is-invalid' : '' }}"
                                               id="{{ "question_$question->id" }}" placeholder=""
                                               value="{{ old($question->id, '') }}" {{ $question->is_required == 'required' ? "required" : "" }}>
                                    @elseif($question->type == 'multi_line')
                                        <textarea name="{{ "question_$question->id" }}"
                                                  minlength="{{ $question->minimum_answer_length }}"
                                                  style="overflow:auto;resize:none" rows="3"
                                                  class="form-control {{ $errors->has($question->id) ? 'is-invalid' : '' }}"
                                                  placeholder=""
                                                  id="{{ "question_$question->id" }}" {{ $question->is_required == 'required' ? "required" : "" }}>{{ old($question->id, '') }}</textarea>
                                    @endif
                                    <span class="invalid-feedback">{{ $errors->first($question->id) }}</span>
                                </div>
                            @endforeach

                            @if($prompt->isText)
                            <label class="form-label" for="tone_id">{{ trans('cruds.content.fields.tone') }}</label>
                            <select class="form-select" name="tone_id" id="tone_id" required>
                                @foreach($tones as $id => $entry)
                                    <option
                                        value="{{ $id }}" {{ (old('tone_id') ? old('tone_id') : $prompt->tone->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>

                            @feature('multilingual')
                            <label class="form-label mt-3" for="language_id">{{ trans('cruds.content.fields.language') }}</label>
                            <select class="form-select" name="language_id" id="language_id" required>
                                @foreach($languages as $id => $entry)
                                    <option
                                        value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $user->language->id ?? $contentSettings->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @endfeature
                            @endif

                            <div class="d-grid mb-2 mt-4">
                                <button id="submit-button" type="submit"
                                        class="btn btn-primary btn-lg">{{ trans('global.create_content') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if($prompt->isText)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="border-bottom: none;">
                        <h4 class="card-header-title">Play ground</h4>

                        @feature('copy-download-content')
                            <span class="card-pinned-top-end mt-2">
                                <button id="btn-copy" type="button" class="btn btn-white btn-sm"><i
                                        class="bi bi-clipboard-fill ms-1"></i> Copy</button>
                                <button id="btn-download" type="button" class="btn btn-white btn-sm"><i
                                        class="bi-file-earmark-arrow-down-fill ms-1"></i> Download</button>
                            </span>
                        @endfeature
                    </div>

                    <div class="card-body p-0">
                        <!-- Quill -->
                        <div class="quill-custom">
                            <div id="editor" style="min-height: 20rem;">
                            </div>
                        </div>
                        <!-- End Quill -->
                    </div>
                </div>
            </div>
            @endif

            @if($prompt->isImage)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="border-bottom: none;">
                        <h4 class="card-header-title">Play ground</h4>
                        <p class="text-dark"><small>To download the image, write click on it and click "Save image as..."</small></p>
                    </div>

                    <div class="card-body p-0">
                        <img id="output-image" class="img-fluid" alt="output-image" style="visibility: hidden;">
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Limit Reached Modal -->
    <div id="limitReachedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="limitReachedModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="limitReachedModalTitle">{{ trans('global.limit_reached_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ trans('global.limit_reached_subtitle') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">{{ trans('global.close') }}</button>
                    <a type="button" class="btn btn-primary" href="{{ route('frontend.subscription') }}">{{ trans('global.upgrade_now') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Limit Reached Modal -->

    <!-- Image Limit Reached Modal -->
    <div id="imageLimitReachedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="limitReachedModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="limitReachedModalTitle">{{ trans('global.image_limit_reached_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ trans('global.image_limit_reached_subtitle') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">{{ trans('global.close') }}</button>
                    <a type="button" class="btn btn-primary" href="{{ route('frontend.subscription') }}">{{ trans('global.upgrade_now') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Limit Reached Modal -->

    <!-- Plan Expired Modal -->
    <div id="planExpiredModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="planExpiredModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="planExpiredModalTitle">{{ trans('global.plan_expired_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ trans('global.plan_expired_subtitle') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">{{ trans('global.close') }}</button>
                    <a type="button" class="btn btn-primary" href="{{ route('frontend.subscription') }}">{{ trans('global.upgrade_now') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Plan Expired Modal -->
@endsection

@section('scripts')
    @parent
    <script>
        function downloadImage(url) {
            fetch(url, {
                mode : 'no-cors',
            })
                .then(response => response.blob())
                .then(blob => {
                    let blobUrl = window.URL.createObjectURL(blob);
                    let a = document.createElement('a');
                    a.download = url.replace(/^.*[\\\/]/, '');
                    a.href = blobUrl;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                })
        }

        $(function () {
            @if($prompt->isText)
            var quill = new Quill('#editor', {
                theme: 'snow',
                placeholder: '{{ trans('global.editor_placeholder') }}'
            });
            @endif

            @if(\Laravel\Pennant\Feature::active('copy-download-content'))
            $("#btn-copy").click(function (e) {
                const content = quill.getText();
                const item = new ClipboardItem({"text/plain": new Blob([content], {type: "text/plain"})});

                navigator.clipboard.write([item]).then(function () {
                    document.getElementById('btn-copy').innerHTML = "<i class='bi bi-clipboard-check-fill ms-1'></i> Copied";
                }, function () {
                    console.error("Failed to copy text to clipboard");
                });
            });

            $("#btn-download").click(function (e) {
                let text = quill.getText();
                const today = new Date();
                const filename = '{{ $prompt->title }}'.toLowerCase().replace(/\s/g, "_") + '_' + today.toLocaleString().replace(/\W/g, '_') + '.txt';

                let element = document.createElement('a');
                element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                element.setAttribute('download', filename);

                element.style.display = 'none';
                document.body.appendChild(element);

                element.click();

                document.body.removeChild(element);
            });
            @endif

            $("#btn-download-image").click(function (e) {
                const url = document.getElementById('output-image').src;
                if (url) {
                    downloadImage(url)
                }
            });

            $("#submit-button").click(function (e) {
                e.preventDefault();

                if ({{ (($prompt->isText ? 1 : 0) && ($subscription->hasReachedLimit ? 1 : 0)) ? 1 : 0 }}) {
                    $('#limitReachedModal').modal('show')
                    return
                }

                if ({{ (($prompt->isImage ? 1 : 0) && ($subscription->hasReachedImageLimit ? 1 : 0)) ? 1 : 0 }}) {
                    $('#imageLimitReachedModal').modal('show')
                    return
                }

                if ({{ $subscription->isExpired ? 1 : 0 }}) {
                    $('#planExpiredModal').modal('show')
                    return
                }

                const validator = $("#content-form").validate({
                    validClass: "is-valid",
                    errorClass: "is-invalid text-danger",
                    errorElement: "small",
                });
                if (!validator.form()) return false;

                $(this).text("{{ trans('global.loading') }}");
                $(this).prop("disabled", true);
                $("#empty-state-text").text("{{ trans('global.writing') }}");
                $("#empty-state").show();
                $("#content-state").hide();
                var formData = $('form').serialize();
                $.ajax({
                    type: "POST",
                    url: "/contents",
                    data: formData,
                    success: function (response) {
                        $("#empty-state").hide();
                        $("#content-state").show();

                        @if($prompt->isText)
                        quill.clipboard.dangerouslyPasteHTML(response.message.replace(/\n/g, '<br>'));
                        @endif

                        @if($prompt->isImage)
                        document.getElementById("output-image").style.visibility = "visible";
                        document.getElementById("output-image").src=response.message;
                        @endif

                        $("#submit-button")
                            .text("{{ trans('global.create_content') }}")
                            .prop("disabled", false);
                    },
                    error: function (xhr, status, error) {
                        $("#empty-state-text")
                            .text("{{ trans('global.general_error') }}");

                        $("#submit-button")
                            .text("{{ trans('global.create_content') }}")
                            .prop("disabled", false);
                    }
                });
            });
        })
    </script>
@endsection
