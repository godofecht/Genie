<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PAYMENT_FREQUENCY_SELECT = [
        'monthly' => 'Monthly',
        'yearly'  => 'Yearly',
    ];

    public const STATUS_SELECT = [
        'pending'  => 'Pending',
        'active'   => 'Active',
        'expired'  => 'Expired',
        'canceled' => 'Canceled',
    ];

    public $table = 'subscriptions';

    protected $casts = [
        'start_at',
        'end_at',
        'canceled_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'plan_id',
        'start_at',
        'end_at',
        'canceled_at',
        'status',
        'payment_frequency',
        'pp_subscription',
        'stripe_subscription',
        'usage',
        'image_usage',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'subscription_id', 'id');
    }

    public function getIsMonthlyAttribute()
    {
        return $this->payment_frequency == 'monthly';
    }

    public function getIsActiveAttribute()
    {
        return $this->status == 'active';
    }

    public function getIsExpiredAttribute()
    {
        return $this->status == 'expired';
    }

    public function getIsCanceledAttribute()
    {
        return $this->status == 'canceled';
    }

    public function getHasReachedLimitAttribute()
    {
        return $this->usage >= $this->plan->word_limit;
    }

    public function getHasReachedImageLimitAttribute()
    {
        return $this->image_usage >= $this->plan->image_limit;
    }

    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setEndAtAttribute($value)
    {
        $this->attributes['end_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setCanceledAtAttribute($value)
    {
        $this->attributes['canceled_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getTotalAmountAttribute()
    {
        if ($this->isMonthly) {
            return $this->plan->price_monthly;
        } else {
            return $this->plan->price_yearly;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
