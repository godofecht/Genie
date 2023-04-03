@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.engine.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.engines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.engine.fields.id') }}
                        </th>
                        <td>
                            {{ $engine->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.engine.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Engine::TYPE_SELECT[$engine->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.engine.fields.title') }}
                        </th>
                        <td>
                            {{ $engine->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.engine.fields.value') }}
                        </th>
                        <td>
                            {{ $engine->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.engines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
