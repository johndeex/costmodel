<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{
            background: rgba(128, 128, 128, 0.055);
        }
    </style>
</head>
<body class="container-fluid py-4">

    @include('layouts.layout')
    <div class="container-fluid">
        <h3 class="mt-3">Create New Project</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('projects.store') }}" class="mt-4">
        @csrf

        <div class="row">
            <div class="col mb-3">
                <label>Project Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col mb-3">
                <label>Project Code</label>
                <input type="text" name="code" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label>Budget (optional)</label>
                <input type="number" step="0.01" name="budget" class="form-control">
            </div>

            <div class="col mb-3">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control">
            </div>
        </div>
       

        
        <div class="mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        <button class="btn btn-warning">Create Project</button>

        <a href="{{ route('home.show') }}" class="btn btn-danger">Back</a>
    </form>
    </div>
    
</body>
</html>