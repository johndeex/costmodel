@extends('layouts.main')
@section('page_title','Reports')
@section('content')

     <div class="container-fluid mt-5">
        <h2 class="mx-3">Completed Projects</h2>

        <a href="{{ route('completed_proje.show') }}" class="btn btn-warning mx-3 mb-3 mt-3">
            Completed Projects
        </a>
        <a href="{{ route('active_proje.show') }}" class="btn btn-warning mx-3 mb-3 mt-3">
            Active projects
        </a>
        <button class="btn btn-success mx-3 mb-3 mt-3" onclick="downloadPdf()">
           <i class="bi bi-download"></i> Download-Pdf
        </button>

        @if(Session::has('success'))
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-fixed top-0 p-3">
                <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        @endif
   <div class="container-fluid">
     <table class="table table-striped border" id="completed_projects">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Dates</th>
                <th>status</th>
                <th>Budget</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->code }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($project->start_date)->format('Y-m-d') }}
                    -
                    {{ \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') }}
                </td>
                <td>{{ $project->status }}</td>
                <td>R {{ number_format($project->budget, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No completed project available yet!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
   </div>
</div>

@endsection
