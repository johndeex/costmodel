<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CostItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->controller(HomeController::class)->group(function(){
  Route::get('/home','index')->name('home.show');
});

//cost creation route to add cost to a project
// Route::get('/create-cost/{id}',[CostItemController::class,'create'])
//     ->name('create_cost.show');
//storing cost for a project
// Route::post('/cost_store',[CostItemController::class,'store'])->name('cost.store');

Route::middleware('auth')->controller(AuthController::class)->group(function(){
    Route::post('/logout','logout')->name('logout');
});

//project routes
Route::middleware('auth')->controller(ProjectController::class)->group(function(){
    
   // a resource route for creating,viewing, and storing updating too
   Route::resource('projects', ProjectController::class)->only(['index', 'create', 'store']);
   //project routes
   Route::post('/project_upadte/{id}','update')->name('update');
   Route::get('project_upadte/{id}','show_update')->name('update.page');
   Route::get('/projects_all','show_projects_all')->name('projects.all');
});

Route::middleware('auth')->controller(CostItemController::class)->group(function(){
  Route::get('/projects/{id}', 'create')->name('create_cost.show');
  Route::post('/cost-items',  'store')->name('cost.store');
  //get cost per project rooute
  Route::get('/project_cost/{id}','project_cost')->name('project_cost.show');
  //edit cost route
  Route::get('/edit_cost/{id}','edit')->name('edit_cost.show');
  Route::post('/update_cost/{id}','update')->name('update.cost');
});

// login routes
Route::middleware('guest')->controller(AuthController::class)->group(function(){
    Route::get('/','show_login')->name('login');
    Route::post('login','login')->name('login.route');
});

//cost marign calculation
Route::middleware('auth')->controller(ProfitController::class)->group(function(){
   Route::get('/project_profit/{id}','profits')->name('show.profit');
});

//report routes

Route::middleware('auth')->controller(ReportController::class)->group(function(){
  Route::get('/report_home','index')->name('report.home');
  Route::get('/active_projects','active_proje')->name('active_proje.show');
  Route::get('/completed_projects','completed_proje')->name('completed_proje.show');
});
