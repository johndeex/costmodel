<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::where('status','in_progress')->latest()->paginate(5);
        return view('projects.index',compact('projects'));
    }

    public function show_projects_all(){
        $projects = Project::latest()->paginate(6);
        return view('projects.projects_all',compact('projects'));
    }
     public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:projects,code',
            'status' => 'string',
            'budget' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Project::create($request->only([
            'name',
            'code',
            'status',
            'budget',
            'start_date',
            'end_date',
        ]));

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully');
    }

    public function show_update($id){
        $project = Project::findOrFail($id);
        return view('projects.update',compact('project'));
    }

    public function update(Request $request,$id){
        $valided = $request->validate([
            'name' => 'required|string',
            'code' => 'string| required',
            'status' => 'string|required',
            'start_date' => 'nullable| date',
            'end_date' => 'nullable| date',
            'budget' => 'nullable| numeric'
        ]);

        $project = Project::find($id)->update($valided);
        return redirect()->route('projects.index')->with('success','project updated successfully');
    }
}
