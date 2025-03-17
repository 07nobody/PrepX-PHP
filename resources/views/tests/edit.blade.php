@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mock Test</h1>
    <form action="{{ route('tests.update', $test->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Test Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $test->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $test->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration (minutes)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ $test->duration }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Test</button>
    </form>
</div>
@endsection
