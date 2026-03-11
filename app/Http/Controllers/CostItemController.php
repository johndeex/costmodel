<?php

namespace App\Http\Controllers;

use App\Models\CostItem;
use App\Models\Project;
use Illuminate\Http\Request;

class CostItemController extends Controller
{ 
   public function create($id)
    {
        $project = Project::findOrFail($id);
        return view('costitems.create', compact('project'));
    }

    public function store(Request $request)
        {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'type' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|numeric|min:0.01',
            'unit_cost' => 'required|numeric|min:0',
            'cost_date' => 'nullable|date',
        ]);

        CostItem::create([
            'project_id' => $validated['project_id'],  
            'type' => $validated['type'],
            'description' => $validated['description'],
            'quantity' => $validated['quantity'],
            'unit_cost' => $validated['unit_cost'],
            'total_cost' => $validated['quantity'] * $validated['unit_cost'],
            'cost_date' => $validated['cost_date'],
        ]);

        return back()->with('success', 'Cost item added');
    }

    public function project_cost($id){
        $project = Project::findOrFail($id);
        $project_costs = CostItem::where('project_id',$id)->get();
        $totalCost = CostItem::where('project_id', $id)->sum('total_cost');
        return view('projects.costs',compact('project_costs','project',
        'totalCost'));
    }

    public function edit($id){
        $costitem = CostItem::findOrFail($id);
        return view('costitems.edit',compact('costitem'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'type' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|numeric|min:0.01',
            'unit_cost' => 'required|numeric|min:0',
            'cost_date' => 'nullable|date',
        ]);
        $validated['total_cost'] = $validated['unit_cost'] * $validated['quantity'];
        $Cost = CostItem::findOrFail($id)->update($validated);
        return redirect()->route('projects.index')->with('success','costiten updated successfully');
    }

    
}
