<?php

namespace App\Observers;

use App\Models\ThirdParty;
use Illuminate\Support\Facades\Config;

class ThirdPartyObserver
{
    public function created(ThirdParty $model)
    {
        $this->updateStripeConfigs($model);
    }

    public function updated(ThirdParty $model)
    {
        $this->updateStripeConfigs($model);
    }

    private function updateStripeConfigs(ThirdParty $model)
    {
        Config::set('cashier.key', $model->stripe_key);
        Config::set('cashier.secret', $model->stripe_secret);
        Config::set('cashier.webhook.secret', $model->stripe_webhook_secret);
    }
}
