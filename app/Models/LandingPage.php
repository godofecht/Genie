<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    public $table = 'landing_pages';

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hero_id',
        'story_id',
        'pricing_id',
        'testimonial_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hero()
    {
        return $this->belongsTo(Hero::class, 'hero_id');
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }

    public function story()
    {
        return $this->belongsTo(Story::class, 'story_id');
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class, 'pricing_id');
    }

    public function testimonial()
    {
        return $this->belongsTo(Testimonial::class, 'testimonial_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
