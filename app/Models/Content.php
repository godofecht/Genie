<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'contents';

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'prompt_id',
        'tone_id',
        'engine_id',
        'outputs_count',
        'content',
        'language_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function prompt()
    {
        return $this->belongsTo(Prompt::class, 'prompt_id');
    }

    public function tone()
    {
        return $this->belongsTo(Tone::class, 'tone_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
