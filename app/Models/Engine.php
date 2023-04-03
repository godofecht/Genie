<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Engine extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'engines';

    public const TYPE_SELECT = [
        'text' => 'Text completion',
        'chat' => 'Chat completion',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'type',
        'title',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsChatAttribute() {
        return $this->type == 'chat';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
