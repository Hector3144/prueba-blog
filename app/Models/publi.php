<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'date',
    ];

    protected $casts = [
        'date' => 'date:Y-m-d',
    ];
}
