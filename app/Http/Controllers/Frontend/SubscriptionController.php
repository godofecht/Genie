<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\ThirdParty;
use App\Traits\CancelSubscriptionTrait;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Testing\Exceptions\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{
    use CancelSubscriptionTrait;

    public function show()
    {
        $user = auth()->user();
        $subscription = $user->userSubscription;

        $startAtDate = Carbon::parse($subscription->start_at);
        $startAt = $startAtDate->format('F Y');
        $endAtDate = Carbon::parse($subscription->end_at);
        $endAt = $endAtDate->format('d F Y');

        $usedWordsCount = min($subscription->usage, $subscription->plan->word_limit);
        $usedWordsPercentage = ($usedWordsCount / $subscription->plan->word_limit) * 100;

        $usedImagesCount = min($subscription->image_usage, $subscription->plan->image_limit);
        $usedImagesPercentage = $subscription->plan->image_limit == 0 ? 0 : ($usedImagesCount / $subscription->plan->image_limit) * 100;

        $paymentMethods = PaymentMethod::all();

        return view('frontend.subscription', compact('subscription', 'startAt', 'endAt', 'usedWordsCount', 'usedWordsPercentage', 'usedImagesCount', 'usedImagesPercentage', 'paymentMethods'));
    }

    public function stripeCheckout(Request $request, $planId, $paymentFrequency)
    {
        $plan = Plan::find($planId);
        $stripePlanId = $paymentFrequency == 'monthly' ? $plan->stripe_monthly_plan : $plan->stripe_yearly_plan;

        return $request->user()
            ->newSubscription($plan->title, $stripePlanId)
            ->checkout([
                'success_url' => route('frontend.subscription') . '?success=true&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('frontend.subscription') . '?success=false',
            ]);
    }

    public function activateStripeSubscription(Request $request): Response
    {
        $stripeSessionId = $request->get('session_id');
        $checkoutSession = $request->user()->stripe()->checkout->sessions->retrieve($stripeSessionId);

        if ($checkoutSession->payment_status != "paid" ?? true) {
            return \response(['message' => 'Subscription is not approved yet'], 400);
        }

        sleep(2);
        return \response(['message' => 'Subscription activated'], Response::HTTP_OK);
    }

    public function createPayPalSubscription(Request $request): Response
    {
        $plan = Plan::find($request->get('plan_id'));
        $paymentFrequency = $request->get('payment_frequency');
        $paypalPlanId = $paymentFrequency == 'monthly' ? $plan->pp_monthly_plan : $plan->pp_yearly_plan;

        $response = Http::paypal()
            ->post('/v1/billing/subscriptions', [
                "plan_id" => $paypalPlanId,
                "application_context" => [
                    "return_url" => route('frontend.subscription') . '?success=true',
                    "cancel_url" => route('frontend.subscription') . '?success=false'
                ]
            ]);

        if ($response->failed()) {
            return \response(['message' => 'Failed to create PayPal subscription'], $response->status);
        }

        $links = collect($response->json('links'));
        $approveLink = $links->filter(function ($link) {
            return $link['rel'] == 'approve';
        })
            ->pluck('href')
            ->firstOrFail();

        // return approve link
        return \response(['approval_link' => $approveLink], Response::HTTP_CREATED);
    }

    public function activatePayPalSubscription(Request $request): Response
    {
        $paypalSubscriptionId = $request->get('pp_subscription_id');

        // fetch paypal subscription details
        $response = Http::paypal()->get('/v1/billing/subscriptions/' . $paypalSubscriptionId);
        if ($response->failed()) {
            return \response(['message' => 'Failed to activate PayPal subscription'], $response->status);
        }

        // make sure that subscription is approved by user and paid by paypal
        $subscriptionStatus = $response->json('status');
        if ($subscriptionStatus != "ACTIVE") {
            return \response(['message' => 'Subscription is not approved yet'], 400);
        }

        $user = auth()->user();
        $staleSubscription = $user->userSubscription; // to be canceled after creating new one
        $paypalPlanId = $response->json('plan_id');
        $plan = Plan::where('pp_monthly_plan', $paypalPlanId)
            ->orWhere('pp_yearly_plan', $paypalPlanId)
            ->firstOrFail();
        $paymentFrequency = match ($paypalPlanId) {
            $plan->pp_monthly_plan => 'monthly',
            $plan->pp_yearly_plan => 'yearly',
            default => throw new InvalidArgumentException('Invalid interval'),
        };

        // create subscription object with pp-subscription id
        Subscription::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'status' => 'active',
            'start_at' => now(),
            'payment_frequency' => $paymentFrequency,
            'pp_subscription' => $paypalSubscriptionId
        ]);

        $this->cancelStaleSubscription($staleSubscription);

        sleep(2);

        return \response(['message' => 'Subscription activated'], Response::HTTP_OK);
    }

    public function cancelSubscription(Request $request): Response
    {
        $user = auth()->user();
        $subscription = Subscription::find($request->get('subscription_id'));
        $paymentMethod = $subscription->payments()->latest()->first()->payment_method->title;

        switch ($paymentMethod) {
            case 'Stripe':
                $stripeSubscription = $user->subscription($subscription->plan->title)->cancel();
                if (!$stripeSubscription) {
                    return \response(['message' => 'Failed to cancel Stripe subscription'], Response::HTTP_BAD_REQUEST);
                }
                break;
            case 'PayPal':
                $response = Http::paypal()
                    ->post('/v1/billing/subscriptions/' . $subscription->pp_subscription . '/cancel', [
                        "reason" => "Not satisfied with the service"
                    ]);

                if ($response->failed()) {
                    return \response(['message' => 'Failed to cancel PayPal subscription'], $response->status);
                }
                break;
            default:
                throw new InvalidArgumentException('Payment method not supported');
        }

        $subscriptionStartAt = Carbon::parse($subscription->start_at);
        $subscription->update([
            'status' => 'canceled',
            'canceled_at' => now(),
            'end_at' => $subscription->isMonthly ? $subscriptionStartAt->addMonth() : $subscriptionStartAt->addYear(),
        ]);

        return \response(['message' => 'Subscription canceled'], Response::HTTP_OK);
    }
}
