@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.thirdParty.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.third-parties.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection