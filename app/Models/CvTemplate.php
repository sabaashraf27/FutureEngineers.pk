<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvTemplate extends Model
{
    use HasFactory;

  protected $fillable = [
    'title',
    'file_path',
    'thumbnail',
    'downloads_count',
    'details',
];
protected $casts = [
    'details' => 'array',
];
}