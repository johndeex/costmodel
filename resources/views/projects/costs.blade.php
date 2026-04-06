@extends('layouts.main')
@section('page_title','Project-Costs')
@section('content')
     <div class="container-fluid mt-5">
            <h2 class="mb-4">{{ ucfirst($project->name) }}</h2>
            <a href="{{ route('show.profit',$project->id) }}" class="btn btn-warning mb-3">
                Project Profit
            </a>
            {{-- <div class="container" id="profit-cont">
                <h2 class="mb-4">{{ ucfirst($project->name) }}</h2>
                <a class="btn btn-sm btn-warning" href="{{ route('show.profit',$project->id) }}" id="profit">Project Profits</a>
            </div> --}}
        <div class="container-fluid">
            <table class="table table-striped ">
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
        </div>
     
    
    
        {{-- <div class="d-flex justify-content-end mt-4">
        {{ $project_costs->links('pagination::bootstrap-5') }}
        </div> --}}
   </div>
@endsection