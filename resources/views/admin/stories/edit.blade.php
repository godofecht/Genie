@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.story.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stories.update", [$story->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.story.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $story->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.story.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.story.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $story->subtitle) }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.story.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="blocks">{{ trans('cruds.story.fields.block') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('blocks') ? 'is-invalid' : '' }}" name="blocks[]" id="blocks" multiple>
                    @foreach($blocks as $id => $block)
                        <option value="{{ $id }}" {{ (in_array($id, old('blocks', [])) || $story->blocks->contains($id)) ? 'selected' : '' }}>{{ $block }}</option>
                    @endforeach
                </select>
                @if($errors->has('blocks'))
                    <span class="text-danger">{{ $errors->first('blocks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.story.fields.block_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="promotion">{{ trans('cruds.story.fields.promotion') }}</label>
                <input class="form-control {{ $errors->has('promotion') ? 'is-invalid' : '' }}" type="text" name="promotion" id="promotion" value="{{ old('promotion', $story->promotion) }}">
                @if($errors->has('promotion'))
                    <span class="text-danger">{{ $errors->first('promotion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.story.fields.promotion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="browser_image">{{ trans('cruds.story.fields.browser_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('browser_image') ? 'is-invalid' : '' }}" id="browser_image-dropzone">
                </div>
                @if($errors->has('browser_image'))
                    <span class="text-danger">{{ $errors->first('browser_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.story.fields.browser_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_image">{{ trans('cruds.story.fields.phone_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('phone_image') ? 'is-invalid' : '' }}" id="phone_image-dropzone">
                </div>
                @if($errors->has('phone_image'))
                    <span class="text-danger">{{ $errors->first('phone_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.story.fields.phone_image_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.browserImageDropzone = {
    url: '{{ route('admin.stories.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="browser_image"]').remove()
      $('form').append('<input type="hidden" name="browser_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="browser_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($story) && $story->browser_image)
      var file = {!! json_encode($story->browser_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="browser_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.phoneImageDropzone = {
    url: '{{ route('admin.stories.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="phone_image"]').remove()
      $('form').append('<input type="hidden" name="phone_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="phone_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($story) && $story->phone_image)
      var file = {!! json_encode($story->phone_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="phone_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection