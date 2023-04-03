<?php

namespace App\Models;

use \DateTimeInterface;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prompt extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    use HasFactory;

    public const TYPE_SELECT = [
        'text' => 'Text',
        'image' => 'Image',
    ];

    public const STATUS_SELECT = [
        'enabled' => 'Enabled',
        'disabled' => 'Disabled',
    ];

    public $table = 'prompts';

    protected $cascadeDeletes = ['promptContents'];

    protected $casts = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'prompt',
        'description',
        'max_tokens',
        'category_id',
        'tone_id',
        'engine_id',
        'type',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function promptContents()
    {
        return $this->hasMany(Content::class, 'prompt_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tone()
    {
        return $this->belongsTo(Tone::class, 'tone_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function getIsImageAttribute() {
        return $this->type == 'image';
    }

    public function getIsTextAttribute() {
        return $this->type == 'text';
    }

    public function scopeEnabled($query)
    {
        return $query->where('status', 'enabled');
    }

    public function engine()
    {
        return $this->belongsTo(Engine::class, 'engine_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
