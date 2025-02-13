<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'paddle_product_id',
        'title',
        'tagline',
        'description',
        'image_name',
        'learnings',
        'slug',
        'released_at',
    ];

    protected $casts = [
        'learnings' => 'array',
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function scopeReleased(Builder $query): Builder
    {
        return $query->whereNotNull('released_at');
    }
}
