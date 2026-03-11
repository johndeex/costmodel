<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostItem extends Model
{
    protected $fillable = [
    'project_id',
    'type',
    'description',
    'quantity',
    'unit_cost',
    'total_cost',
    'cost_date',
    ];


    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
