@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.block.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.block.fields.id') }}
                        </th>
                        <td>
                            {{ $block->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.block.fields.icon') }}
                        </th>
                        <td>
                            @if($block->icon)
                                <a href="{{ $block->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $block->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.block.fields.title') }}
                        </th>
                        <td>
                            {{ $block->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.block.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $block->subtitle }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection