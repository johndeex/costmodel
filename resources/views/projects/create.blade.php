@extends('layouts.main')
@section('page_title','Projects')
@section('content')

  <div class="container-fluid mt-5">
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
    </form>
    </div>

@endsection