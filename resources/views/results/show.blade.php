@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Test Results</h1>
            <p>Test: {{ $result->test->title }}</p>
            <p>Student: {{ $result->user->name }}</p>
            <p>Score: {{ $result->score }}</p>
            <p>Completed At: {{ $result->completed_at }}</p>
        </div>
    </div>
</div>
@endsection
