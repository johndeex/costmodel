<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Cost
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container-fluid py-1">
    @include('layouts.layout')
 @if(Session::has('success'))
<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-fixed top-0  p-3">
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
    <div class="container mt-3">    

        <h4 class="mb-4">Add Project Cost</h4>       
        <form method="POST" action="{{ route('cost.store',$project->id) }}">
        @csrf
        <!-- Project -->
        
        <div class="mb-3">
            <label class="form-label">Project Name</label>
            <select name="project_id" class="form-select" required>
                    <option value="{{ $project->id }}">
                        {{ $project->name }}
                    </option>
            </select>
            @error('project_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="row">
            <div class=" col mb-3">
                <label class="form-label">Cost Type</label>
                <select name="type" class="form-select" required>
                    <option value="">-- Select Type --</option>
                    @foreach(['labor','material','equipment','other'] as $type)
                        <option value="{{ $type }}"
                            {{ old('type') == $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
                @error('type') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        
            <!-- Description -->
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description"
                    class="form-control"
                    value="{{ old('description') }}"
                    required>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        

        <div class="row">
            <!-- Quantity -->
            <div class="col mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" step="0.01" min="0.01"
                    name="quantity"
                    class="form-control"
                    value="{{ old('quantity') }}"
                    required>
                @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Unit Cost -->
            <div class="col mb-3">
                <label class="form-label">Unit Cost</label>
                <input type="number" step="0.01" min="0"
                    name="unit_cost"
                    class="form-control"
                    value="{{ old('unit_cost') }}"
                    required>
                @error('unit_cost') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
            <!-- Cost Date -->
        <div class="mb-3">
            <label class="form-label">Cost Date (optional)</label>
            <input type="date"
                name="cost_date"
                class="form-control"
                value="{{ old('cost_date') }}">
            @error('cost_date') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Submit -->
        <div class="d-flex justify-content-end">
            <button class="btn btn-warning">
                Save Cost
            </button>
            <a href="{{ route('projects.index') }}" class="btn btn-sm btn-danger mx-2 text-center">Back</a>
        </div>

        </form>
    </div>
</body>
</html>