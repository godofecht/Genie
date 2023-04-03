@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.brand.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.brands.update", [$brand->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="site_title">{{ trans('cruds.brand.fields.site_title') }}</label>
                <input class="form-control {{ $errors->has('site_title') ? 'is-invalid' : '' }}" type="text" name="site_title" id="site_title" value="{{ old('site_title', $brand->site_title) }}">
                @if($errors->has('site_title'))
                    <span class="text-danger">{{ $errors->first('site_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.site_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slogan">{{ trans('cruds.brand.fields.slogan') }}</label>
                <input class="form-control {{ $errors->has('slogan') ? 'is-invalid' : '' }}" type="text" name="slogan" id="slogan" value="{{ old('slogan', $brand->slogan) }}">
                @if($errors->has('slogan'))
                    <span class="text-danger">{{ $errors->first('slogan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.slogan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.brand.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="favicon">{{ trans('cruds.brand.fields.favicon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('favicon') ? 'is-invalid' : '' }}" id="favicon-dropzone">
                </div>
                @if($errors->has('favicon'))
                    <span class="text-danger">{{ $errors->first('favicon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.favicon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.brand.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $brand->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.brand.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $brand->address) }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.brand.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $brand->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="version">{{ trans('cruds.brand.fields.version') }}</label>
                <input class="form-control {{ $errors->has('version') ? 'is-invalid' : '' }}" type="text" name="version" id="version" value="{{ old('version', $brand->version) }}">
                @if($errors->has('version'))
                    <span class="text-danger">{{ $errors->first('version') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.version_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.brand.social_media_links') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.brands.update", [$brand->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.brand.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $brand->facebook) }}">
                @if($errors->has('facebook'))
                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.brand.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $brand->instagram) }}">
                @if($errors->has('instagram'))
                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.brand.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $brand->twitter) }}">
                @if($errors->has('twitter'))
                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="youtube">{{ trans('cruds.brand.fields.youtube') }}</label>
                <input class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" type="text" name="youtube" id="youtube" value="{{ old('youtube', $brand->youtube) }}">
                @if($errors->has('youtube'))
                    <span class="text-danger">{{ $errors->first('youtube') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.youtube_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="google">{{ trans('cruds.brand.fields.google') }}</label>
                <input class="form-control {{ $errors->has('google') ? 'is-invalid' : '' }}" type="text" name="google" id="google" value="{{ old('google', $brand->google) }}">
                @if($errors->has('google'))
                    <span class="text-danger">{{ $errors->first('google') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.brand.fields.google_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.brands.storeMedia') }}',
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
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($brand) && $brand->logo)
      var file = {!! json_encode($brand->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
    Dropzone.options.faviconDropzone = {
    url: '{{ route('admin.brands.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="favicon"]').remove()
      $('form').append('<input type="hidden" name="favicon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="favicon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($brand) && $brand->favicon)
      var file = {!! json_encode($brand->favicon) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="favicon" value="' + file.file_name + '">')
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
