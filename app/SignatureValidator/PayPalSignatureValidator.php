<?php

namespace App\SignatureValidator;

use Illuminate\Http\Request;
use \Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class PayPalSignatureValidator implements SignatureValidator
{

    public function isValid(Request $request, WebhookConfig $config): bool
    {
        // todo add paypal signature verification logic
        return true;
    }
}
