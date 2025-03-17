@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Mock Test</h1>
    <form action="{{ route('tests.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Test Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Test</button>
    </form>
</div>
@endsection
