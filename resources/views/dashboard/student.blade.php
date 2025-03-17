@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Welcome, {{ $user->name }}</h1>
            <p>Your role: {{ $user->role }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Your Tests</h2>
            <ul class="list-group">
                @foreach($tests as $test)
                    <li class="list-group-item">
                        <a href="{{ route('tests.attempt', $test->id) }}">{{ $test->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Your Results</h2>
            <ul class="list-group">
                @foreach($results as $result)
                    <li class="list-group-item">
                        Test: {{ $result->test->title }} - Score: {{ $result->score }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
