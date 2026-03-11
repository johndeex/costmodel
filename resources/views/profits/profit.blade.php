<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profit Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light container-fluid px-3 py-2">
  @include('layouts.layout')
<div class="container py-4">

    <h3 class="mb-4">Project-Profits</h3>

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
    <a class="btn btn-sm btn-warning mt-2" href="{{ route('projects.index',$project->id) }}">Back</a>
</div>

</body>
</html>