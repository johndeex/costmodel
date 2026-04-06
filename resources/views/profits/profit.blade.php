@extends('layouts.main')
@section('page_title','Project-Profits')

@section('content')
   <div class="container py-4 mt-5">
    <div class="row g-4">

        <!-- PROFIT MARGIN COLUMN -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white">
                    Profit Margin (%)
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Total Project Cost</label>
                        <input type="number"  value="{{ $project->budget }}" class="form-control" id="profit_marin1">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"></label>
                        <input type="number" value="{{ $totalCost }}" class="form-control" id="profit margin2">
                    </div>

                    <button class="btn btn-warning w-100" id="margin_btn">
                        Calculate Margin
                    </button>

                    <hr>

                    <h5 class="text-center">
                        Margin: % <span class="text-success" id="margin_value"></span>
                    </h5>
                </div>
            </div>
        </div>

        <!-- ACTUAL PROFIT COLUMN -->
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white">
                    Actual Profit
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Project Budget</label>
                        <input type="number" value="{{ $project->budget }}" class="form-control" id="budget" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Project Cost</label>
                        <input type="number" value="{{ $totalCost }}" class="form-control" id="current_cost">
                    </div>

                    <button class="btn btn-warning w-100" id="profit_button">
                        Calculate Profit
                    </button>

                    <hr>

                    <h5 class="text-center" >
                        Profit: R <span class="text-success" id="profit_value"></span>
                    </h5>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
