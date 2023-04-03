<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'free' => 'Free',
        'paid' => 'Paid',
    ];

    public $table = 'plans';

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'price_monthly',
        'price_yearly',
        'pp_monthly_plan',
        'pp_yearly_plan',
        'stripe_monthly_plan',
        'stripe_yearly_plan',
        'type',
        'word_limit',
        'image_limit',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsPaidAttribute() {
        return $this->type == 'paid';
    }

    public function getIsfreeAttribute() {
        return $this->type == 'free';
    }

    public function scopePaid($query)
    {
        return $query->where('type', 'paid');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
