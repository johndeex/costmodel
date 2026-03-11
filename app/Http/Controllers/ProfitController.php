<?php

namespace App\Http\Controllers;

use App\Models\CostItem;
use App\Models\Project;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function profits($id){
        $project = Project::findOrFail($id);
        $totalCost = CostItem::where('project_id', $id)->sum('total_cost');
        return view('profits.profit',compact('project','totalCost'));
    }
}
