<?php

namespace App\Models;

use Cknow\Money\MoneyCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goal_id',
        'name',
        'direction',
        'value',
    ];

    protected $casts = [
        'value' => MoneyCast::class,
    ];
}
