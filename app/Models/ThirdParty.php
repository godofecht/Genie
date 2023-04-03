<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdParty extends Model
{
    use HasFactory;

    public const PP_ENV_SELECT = [
        'sandbox'    => 'Sandbox',
        'production' => 'Production',
    ];

    public const PAYPAL_BASE_URL = [
        'sandbox' => 'https://api-m.sandbox.paypal.com',
        'production'  => 'https://api-m.paypal.com',
    ];

    public $table = 'third_parties';

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'openai_api_key',
        'default_max_tokens',
        'engine_id',
        'pp_client',
        'pp_secret',
        'pp_env',
        'stripe_key',
        'stripe_secret',
        'stripe_webhook_secret',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function engine()
    {
        return $this->belongsTo(Engine::class, 'engine_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
