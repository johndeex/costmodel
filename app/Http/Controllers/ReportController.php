<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $projects = Project::latest()->get();
        return view('reports.report_home',compact('projects'));
    }

    //getting all active projects
    public function active_proje(){
        $projects = Project::where('status', 'in_progress')->latest()->get();
        return view('reports.active_projects',compact('projects'));
    }

    public function completed_proje(){
        $projects = Project::where('status', 'completed')->latest()->get();
        return view('reports.completed_projects',compact('projects'));
    }
}
