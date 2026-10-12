<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
    'title',
    'slug',
    'description',
    'category_id',
    'type',
    'company_name',
    'location',
    'deadline',
    'apply_link',
    'thumbnail',
    'status',
    'details',
];


    protected $casts = [
    'deadline' => 'datetime',
    'details' => 'array',
];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}