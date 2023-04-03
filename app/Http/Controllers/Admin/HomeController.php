<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use App\Models\Payment;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;

class HomeController
{
    public function index()
    {
        $fromDate = now()->subMonth();
        $toDate = now();

        // month ago - today
        $dateRange = $fromDate->format('d M') . ' - ' . $toDate->format('d M');

        // count of payments total last month
        $currency = Setting::firstOrFail()->currency->symbol;
        $monthlyEarnings = Payment::where('status', 'success')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->sum('amount');

        // count of active subscriptions last month
        $monthlySubscriptions = Subscription::where('status', 'active')
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->count();

        // list of customers last month, paginate 10
        $users = User::whereHas('roles', function ($query) {
            $query->where('title', 'User');
        })->whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy('created_at', 'desc')
            ->get();

        // count of customers last month
        $monthlyCustomersCount = $users->count();

        // list of payments last month, paginate 10
        $payments = Payment::whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', compact('dateRange', 'monthlyEarnings', 'monthlySubscriptions', 'monthlyCustomersCount', 'users', 'payments', 'currency'));
    }
}
