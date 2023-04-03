<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const IS_REQUIRED_SELECT = [
        'required' => 'Required',
        'optional' => 'Optional',
    ];

    public const TYPE_SELECT = [
        'single_line' => 'Single Line',
        'multi_line'  => 'Multi Line',
    ];

    public $table = 'questions';

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question',
        'type',
        'is_required',
        'minimum_answer_length',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function prompts()
    {
        return $this->belongsToMany(Prompt::class);
    }
}
