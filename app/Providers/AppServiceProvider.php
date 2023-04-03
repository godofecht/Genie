<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\LandingPage;
use App\Models\Plan;
use App\Models\Prompt;
use App\Models\Setting;
use App\Models\StripeSubscription;
use App\Models\ThirdParty;
use App\Observers\ThirdPartyObserver;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\SubscriptionItem;
use Laravel\Pennant\Feature;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Because we customized Cashier migrations, search for _stripe in migrations
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Features
        Feature::define('copy-download-content', false);
        Feature::define('dynamic-prompts', false);
        Feature::define('image-prompts', false);
        Feature::define('multilingual', false);

        // Cashier
        Cashier::useSubscriptionModel(StripeSubscription::class);
        Cashier::useSubscriptionItemModel(SubscriptionItem::class);

        // Observers
        ThirdParty::observe(ThirdPartyObserver::class);

        // PayPal Client
        Http::macro('paypal', function () {
            $paypalSettings = ThirdParty::firstOrFail();
            $clientId = $paypalSettings->pp_client;
            $secret = $paypalSettings->pp_secret;
            $baseUrl = ThirdParty::PAYPAL_BASE_URL[$paypalSettings->pp_env];

            return Http::withHeaders([
                'Content-Type' => ' application/json'
            ])
                ->withBasicAuth($clientId, $secret)
                ->baseUrl($baseUrl);
        });

        // Assets
        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        // Shared data
        if (!app()->runningInConsole()) {
            // Default configs
            $thirdPartySettings = ThirdParty::firstOrFail();
            Config::set('cashier.key', $thirdPartySettings->stripe_key);
            Config::set('cashier.secret', $thirdPartySettings->stripe_secret);
            Config::set('cashier.webhook.secret', $thirdPartySettings->stripe_webhook_secret);

            $categories = Category::enabled()->get();
            $prompts = Prompt::enabled()->get();
            $plans = Plan::paid()->get();
            $brand = Brand::firstOrFail();
            $landingPage = LandingPage::firstOrFail();
            $settings = Setting::firstOrFail();

            View::share('categories', $categories);
            View::share('prompts', $prompts);
            View::share('plans', $plans);
            View::share('brand', $brand);
            View::share('landingPage', $landingPage);
            View::share('paymentSettings', $settings);
            View::share('contentSettings', $settings);
        }
    }
}
