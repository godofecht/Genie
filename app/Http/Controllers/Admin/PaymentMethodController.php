<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentMethodRequest;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Models\PaymentMethod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentMethodController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_method_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentMethods = PaymentMethod::all();

        return view('admin.paymentMethods.index', compact('paymentMethods'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_method_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentMethods.create');
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $requestData = $request->all();
        $requestData['is_enabled'] = (bool)request('is_enabled');

        PaymentMethod::create($requestData);

        return redirect()->route('admin.payment-methods.index');
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        abort_if(Gate::denies('payment_method_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentMethods.edit', compact('paymentMethod'));
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod)
    {
        $requestData = $request->all();
        $requestData['is_enabled'] = (bool)request('is_enabled');

        $paymentMethod->update($requestData);

        return redirect()->route('admin.payment-methods.index');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        abort_if(Gate::denies('payment_method_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentMethods.show', compact('paymentMethod'));
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        abort_if(Gate::denies('payment_method_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentMethod->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentMethodRequest $request)
    {
        PaymentMethod::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
