<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Subscription as CashierSubscription;

class StripeSubscription extends CashierSubscription
{
    use HasFactory;

    public $table = 'stripe_subscriptions';
}
