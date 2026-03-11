<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'code', 'start_date', 'end_date', 'budget','status'
    ];

    public function costs()
    {
        return $this->hasMany(ProjectCost::class);
    }
    public function costItems()
    {
        return $this->hasMany(CostItem::class);
    }

    public function totalCost()
    {
        return $this->costs()->sum('total_cost');
    }

    public function laborCost()
    {
        return $this->costs()->where('type', 'labor')->sum('total_cost');
    }

    public function materialCost()
    {
        return $this->costs()->where('type', 'material')->sum('total_cost');
    }
}
