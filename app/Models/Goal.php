<?php

namespace App\Models;

use Cknow\Money\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'color',
        'icon',
        'direction',
        'value',
    ];

    protected $casts = [
        'value' => MoneyCast::class,
    ];
}
