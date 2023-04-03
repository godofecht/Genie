@extends('layouts.dashboard')
@section('content')
    <div class="navbar-sidebar-aside-content content-space-t-3 content-space-b-2 px-lg-5 px-xl-10">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-header-title">{{ trans('global.settings') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route("frontend.user.update") }}" class="js-validate needs-validation" novalidate>
                                @csrf
                                <label class="form-label" for="language_id">{{ trans('cruds.user.fields.language') }}</label>
                                <select class="form-select" name="language_id" id="language_id" required>
                                    @foreach($languages as $id => $entry)
                                        <option
                                            value="{{ $id }}" {{ (old('language_id') ? old('language_id') : $user->language->id ?? $contentSettings->language->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group mt-3">
                                    <button class="btn btn-primary" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
