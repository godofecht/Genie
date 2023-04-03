@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <h1 class="m-0">{{trans('global.dashboard')}}</h1>
            </div>
            <div class="row mb-2">
                <p class="text-secondary">{{ $dateRange  }}</p>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $currency . $monthlyEarnings }}</h3>
                            <p>{{ trans('global.monthly_earnings')  }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <a href="{{ route('admin.payments.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $monthlySubscriptions }}</h3>
                            <p>{{ trans('global.monthly_subscriptions')  }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <a href="{{ route('admin.subscriptions.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light">
                        <div class="inner">
                            <h3>{{ $monthlyCustomersCount }}</h3>

                            <p>{{ trans('global.new_customers')  }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row mt-3">
                <!-- region reviews -->
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header no-border">
                            <h3 class="card-title">{{trans('global.customers')}}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.users.index') }}" class="btn btn-tool btn-sm"><i
                                        class="fas fa-bars"></i> </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>{{ trans('cruds.user.fields.name') }}</th>
                                    <th>{{ trans('cruds.user.fields.email') }}</th>
                                    <th>{{ trans('cruds.user.fields.created_at') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('d F - h:i A') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- endregion reviews -->

                <!-- region payments -->
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header no-border">
                            <h3 class="card-title">{{trans('cruds.payment.title')}}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.payments.index') }}" class="btn btn-tool btn-sm"><i
                                        class="fas fa-bars"></i> </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('cruds.payment.fields.payment_method') }}</th>
                                    <th>{{ trans('cruds.payment.fields.amount') }}</th>
                                    <th>{{ trans('cruds.payment.fields.status') }}</th>
                                    <th>{{ trans('cruds.payment.fields.created_at') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->payment_method->title }}</td>
                                        <td>{{ $currency . $payment->amount }}</td>
                                        <td>{{ ucfirst($payment->status) }}</td>
                                        <td>{{ $payment->created_at->format('d F - h:i A') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- endregion payments -->
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection
