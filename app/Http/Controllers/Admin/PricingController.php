<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePricingRequest;
use App\Models\Pricing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PricingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pricing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pricings = Pricing::all();

        return view('admin.pricings.index', compact('pricings'));
    }

    public function edit(Pricing $pricing)
    {
        abort_if(Gate::denies('pricing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pricings.edit', compact('pricing'));
    }

    public function update(UpdatePricingRequest $request, Pricing $pricing)
    {
        $pricing->update($request->all());

        return back();
    }
}
