<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = 'settings';

    public const YEARLY_PLAN_SELECT = [
        'enabled' => 'Enabled',
        'disabled' => 'Disabled',
    ];

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'currency_id',
        'yearly_plan',
        'language_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
