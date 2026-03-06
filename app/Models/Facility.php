<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'show_on_page',
    ];

    protected $casts = [
        'show_on_page' => 'boolean',
    ];
}
