@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subscription.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subscriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.id') }}
                        </th>
                        <td>
                            {{ $subscription->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.user') }}
                        </th>
                        <td>
                            {{ $subscription->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.plan') }}
                        </th>
                        <td>
                            {{ $subscription->plan->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.start_at') }}
                        </th>
                        <td>
                            {{ $subscription->start_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.end_at') }}
                        </th>
                        <td>
                            {{ $subscription->end_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.canceled_at') }}
                        </th>
                        <td>
                            {{ $subscription->canceled_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Subscription::STATUS_SELECT[$subscription->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscription.fields.payment_frequency') }}
                        </th>
                        <td>
                            {{ App\Models\Subscription::PAYMENT_FREQUENCY_SELECT[$subscription->payment_frequency] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subscriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection