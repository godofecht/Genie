<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        $payments = $user->userPayments()->orderBy('created_at', 'desc')->get();

        return view('frontend.payments', compact('payments'));
    }
}
