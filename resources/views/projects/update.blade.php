<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container-fluid py-1">
    @include('layouts.layout')
    <div class="container mt-3">
          <h3>Update Project</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('update',$project->id) }}" class="mt-4">
        @csrf

        <div class="row">
            <div class="col mb-3">
                <label>Project Name</label>
                <input type="text" name="name" value="{{ $project->name }}" class="form-control" required>
            </div>

            <div class="col mb-3">
                <label>Project Code</label>
                <input type="text" name="code" value="{{ $project->code }}" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label>Budget (optional)</label>
                <input type="number" step="0.01" name="budget" value="{{ $project->budget }}" class="form-control">
            </div>

            <div class="col mb-3">
                <label>Start Date</label>
                <input type="date" name="start_date" value="{{ $project->start_date }}" class="form-control">
            </div>
        </div>
       

        <div class="row">
            <div class="col mb-3">
                <label>End Date</label>
                <input type="date" name="end_date" value="{{ $project->end_date }}" class="form-control">
            </div>

            <div class="col mb-3">
                <label>Status</label>
                 <select name="status" class="form-select" required>
                    <option value="{{ $project->status }}">{{ $project->status }}</option>
                    @foreach(['in_progress','completed'] as $status)
                        <option value="{{ $status }}"
                            {{ old('status') == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        

        <button class="btn btn-warning">Update Project</button>

        <a href="{{ route('projects.index') }}" class="btn btn-danger">Back</a>

    </form>
    </div>
   
</body>
</html>