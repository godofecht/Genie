@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.plan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.id') }}
                        </th>
                        <td>
                            {{ $plan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.title') }}
                        </th>
                        <td>
                            {{ $plan->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.description') }}
                        </th>
                        <td>
                            {{ $plan->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.price_monthly') }}
                        </th>
                        <td>
                            {{ $plan->price_monthly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.price_yearly') }}
                        </th>
                        <td>
                            {{ $plan->price_yearly }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Plan::TYPE_SELECT[$plan->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.word_limit') }}
                        </th>
                        <td>
                            {{ $plan->word_limit }}
                        </td>
                    </tr>
                    @feature('image-prompts')
                    <tr>
                        <th>
                            {{ trans('cruds.plan.fields.image_limit') }}
                        </th>
                        <td>
                            {{ $plan->image_limit }}
                        </td>
                    </tr>
                    @endfeature
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
