<?php

namespace App\Models;

use \DateTimeInterface;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    use HasFactory;

    public $table = 'categories';

    protected $cascadeDeletes = ['categoryPrompts'];

    public const STATUS_SELECT = [
        'enabled' => 'Enabled',
        'disabled' => 'Disabled',
    ];

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categoryPrompts()
    {
        return $this->hasMany(Prompt::class, 'category_id', 'id');
    }

    public function scopeEnabled($query)
    {
        return $query->where('status', 'enabled');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
