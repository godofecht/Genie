@extends('layouts.dashboard')
@section('content')
    <div class="navbar-sidebar-aside-content content-space-t-3 content-space-b-2 px-lg-5 px-xl-10">
        <div class="container">
            <!-- Card -->
            <div class="card">
                <!-- Header -->
                <div class="card-header">
                    <h5 class="card-header-title">{{ trans('global.payment_history') }}</h5>
                </div>
                <!-- End Header -->

                <div class="card-body p-4">
                    <!-- Table -->
                    <div class="table-responsive pl-3">
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>{{ trans('global.date') }}</th>
                                <th>{{ trans('global.payment_method') }}</th>
                                <th>{{ trans('global.amount') }}</th>
                                <th>{{ trans('global.status') }}</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <th scope="row">{{ $payment->id }}</th>
                                    <td>{{ $payment->created_at->format('d F Y - h:i A') }}</td>
                                    <td>{{ $payment->payment_method->title }}</td>
                                    <td>{{ $payment->currency->symbol }}{{ $payment->amount }}</td>
                                    <td><span
                                            class="badge {{ $payment->status == 'success' ? 'bg-soft-success text-success' : 'bg-soft-warning text-warning'}}  ">{{ App\Models\Payment::STATUS_SELECT[$payment->status] ?? '' }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
