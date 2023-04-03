@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hero.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.heroes.update", [$hero->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.hero.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $hero->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hero.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.hero.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $hero->subtitle) }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hero.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.hero.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hero.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cta">{{ trans('cruds.hero.fields.cta') }}</label>
                <input class="form-control {{ $errors->has('cta') ? 'is-invalid' : '' }}" type="text" name="cta" id="cta" value="{{ old('cta', $hero->cta) }}">
                @if($errors->has('cta'))
                    <span class="text-danger">{{ $errors->first('cta') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hero.fields.cta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="promotion">{{ trans('cruds.hero.fields.promotion') }}</label>
                <input class="form-control {{ $errors->has('promotion') ? 'is-invalid' : '' }}" type="text" name="promotion" id="promotion" value="{{ old('promotion', $hero->promotion) }}">
                @if($errors->has('promotion'))
                    <span class="text-danger">{{ $errors->first('promotion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hero.fields.promotion_helper') }}</span>
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
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.heroes.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($hero) && $hero->image)
      var file = {!! json_encode($hero->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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