<?php

return [
    'configs' => [
        [
            'name' => 'paypal',
            'signing_secret' => env('PAYPAL_WEBHOOK_ID'),
            'signature_header_name' => 'Signature',
            'signature_validator' => \App\SignatureValidator\PayPalSignatureValidator::class,
            'webhook_profile' => \Spatie\WebhookClient\WebhookProfile\ProcessEverythingWebhookProfile::class,
            'webhook_response' => \Spatie\WebhookClient\WebhookResponse\DefaultRespondsTo::class,
            'webhook_model' => \Spatie\WebhookClient\Models\WebhookCall::class,
            'store_headers' => ['*'],
            'process_webhook_job' => \App\Jobs\ProcessPayPalWebhookJob::class,
        ],
    ],

    /*
     * The integer amount of days after which models should be deleted.
     *
     * 7 deletes all records after 1 week. Set to null if no models should be deleted.
     */
    'delete_after_days' => 30,
];
