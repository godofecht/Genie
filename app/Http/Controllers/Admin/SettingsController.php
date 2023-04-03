<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    public function payment()
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currencies = Currency::pluck('title', 'id');

        $setting = Setting::firstOrFail()->load('currency');

        return view('admin.settings.payment', compact('currencies', 'setting'));
    }

    public function content()
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $languages = Language::pluck('language', 'id');

        $setting = Setting::firstOrFail()->load('language');

        return view('admin.settings.content', compact('languages', 'setting'));
    }

    public function update(Request $request)
    {
        Setting::firstOrFail()->update($request->all());

        return back();
    }
}
