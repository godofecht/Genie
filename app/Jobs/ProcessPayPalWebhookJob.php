<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Setting;
use App\Models\Subscription;
use \Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class ProcessPayPalWebhookJob extends ProcessWebhookJob
{
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $payload = $this->webhookCall->payload;

        if ($payload['event_type'] === 'PAYMENT.SALE.COMPLETED') {

            $amount = $payload['resource']['amount']['total'];
            $subscriptionId = $payload['resource']['billing_agreement_id'];
            $subscription = Subscription::where('pp_subscription', $subscriptionId)->first();

            // create pending payment record
            Payment::create([
                'user_id' => $subscription->user->id,
                'currency_id' => Setting::firstOrFail()->currency->id,
                'payment_method_id' => PaymentMethod::byTitle('PayPal')->firstOrFail()->id,
                'subscription_id' => $subscription->id,
                'amount' => $amount,
                'status' => 'success'
            ]);
        }

        if ($payload['event_type'] === 'BILLING.SUBSCRIPTION.SUSPENDED') {
            $subscriptionId = $payload['resource']['id'];
            Subscription::where('pp_subscription', $subscriptionId)
                ->update([
                    'status' => 'expired',
                    'end_at' => now()
                ]);
        }
    }
}
