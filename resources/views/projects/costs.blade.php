<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Costs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container-fluid py-1">
    @include('layouts.layout')

    <div class="container-fluid mt-4">
            <h2 class="mb-4">{{ ucfirst($project->name) }}</h2>
            <a href="{{ route('show.profit',$project->id) }}" class="btn btn-warning mb-3">
                Project Profit
            </a>
            {{-- <div class="container" id="profit-cont">
                <h2 class="mb-4">{{ ucfirst($project->name) }}</h2>
                <a class="btn btn-sm btn-warning" href="{{ route('show.profit',$project->id) }}" id="profit">Project Profits</a>
            </div> --}}
        <div class="container-fluid">
            <table class="table table-striped border">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Unit_Cost</th>
                        <th>Total_Cost</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($project_costs as $project_cost)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $project_cost->type }}</td>
                        <td>{{ $project_cost->description }}</td>
                        <td>{{ $project_cost->quantity}}</td>
                        <td>{{ $project_cost->unit_cost }}</td>
                        <td>{{ $project_cost->total_cost }}</td>
                        {{-- <td>{{ $project->start_date }} → {{ $project->end_date }}</td> --}}
                        <td><a href="{{ route('edit_cost.show',$project_cost->id) }}" class="btn btn-sm btn-warning">Edit</a></td>
                        {{-- <td>{{ number_format($tota_cost->total_cost, 2) }}</td> --}}
                    </tr>
                    
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-warning">No Costs for this project!</td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="7">
                            <h5 class="mb-3 text-end">
                            Project Cost:
                            <span class="text-success fw-bold">
                                MWK {{ number_format($totalCost, 2) }}
                            </span>
                            </h5>
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <a class="btn btn-sm btn-warning" href="{{ route('projects.index') }}">Back</a>
        </div>
     
    
    
        {{-- <div class="d-flex justify-content-end mt-4">
        {{ $project_costs->links('pagination::bootstrap-5') }}
        </div> --}}
   </div>
</body>
</html>