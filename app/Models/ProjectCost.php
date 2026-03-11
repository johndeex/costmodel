<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCost extends Model
{
    protected $fillable = [
        'project_id',
        'type',
        'description',
        'quantity',
        'unit_cost',
        'total_cost',
        'cost_date'
    ];

    protected static function booted()
    {
        static::saving(function ($cost) {
            $cost->total_cost = $cost->quantity * $cost->unit_cost;
        });
    }
}
