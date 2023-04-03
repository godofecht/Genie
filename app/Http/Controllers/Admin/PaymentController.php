<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Currency;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Subscription;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payments = Payment::with(['user', 'currency', 'payment_method', 'subscription'])->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriptions = Subscription::pluck('start_at', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payments.create', compact('currencies', 'payment_methods', 'subscriptions', 'users'));
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $currencies = Currency::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subscriptions = Subscription::pluck('start_at', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('user', 'currency', 'payment_method', 'subscription');

        return view('admin.payments.edit', compact('currencies', 'payment', 'payment_methods', 'subscriptions', 'users'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('admin.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('user', 'currency', 'payment_method', 'subscription');

        return view('admin.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
