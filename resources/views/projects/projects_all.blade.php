<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container-fluid py-1">

    @include('layouts.layout')

    <div class="container-fluid mt-4">
        <h2>Projects</h2>

        <a href="{{ route('report.home') }}" class="btn btn-warning mx-3 mb-3">
            View Reports
        </a>

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
     <table class="table table-striped border">
        <thead class="table-secondary">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Code</th>
                <th>Budget</th>
                <th>Dates</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->code }}</td>
                <td>{{ number_format($project->budget ?? 0) }}</td>
                <td>{{ $project->start_date }} → {{ $project->end_date }}</td>
                <td>{{ $project->status }}</td>
                <td><a href="{{ route('update.page',$project->id) }}" 
                class="btn btn-sm btn-info">Update</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No projects yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a class="btn btn-sm btn-warning" href="{{ route('home.show') }}">Back</a>
    <div class="d-flex justify-content-end mt-0">
       {{ $projects->links('pagination::bootstrap-5') }}
    </div>
   </div>
</div>
</body>
</html>