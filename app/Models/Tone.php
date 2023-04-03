<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tone extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tones';

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function toneContents()
    {
        return $this->hasMany(Content::class, 'tone_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
