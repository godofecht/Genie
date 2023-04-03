<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLandingPageRequest;
use App\Models\Hero;
use App\Models\LandingPage;
use App\Models\Partner;
use App\Models\Pricing;
use App\Models\Story;
use App\Models\Testimonial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LandingPageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('landing_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $landingPages = LandingPage::with(['hero', 'partners', 'story', 'pricing', 'testimonial'])->get();

        return view('admin.landingPages.index', compact('landingPages'));
    }

    public function edit(LandingPage $landingPage)
    {
        abort_if(Gate::denies('landing_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $heroes = Hero::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = Partner::pluck('title', 'id');

        $stories = Story::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pricings = Pricing::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $testimonials = Testimonial::pluck('review', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landingPage->load('hero', 'partners', 'story', 'pricing', 'testimonial');

        return view('admin.landingPages.edit', compact('heroes', 'landingPage', 'partners', 'pricings', 'stories', 'testimonials'));
    }

    public function update(UpdateLandingPageRequest $request, LandingPage $landingPage)
    {
        $landingPage->update($request->all());
        $landingPage->partners()->sync($request->input('partners', []));

        return back();
    }
}
