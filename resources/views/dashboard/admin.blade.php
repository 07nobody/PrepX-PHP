@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Admin Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h2>Users</h2>
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item">
                        {{ $user->name }} ({{ $user->role }})
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <h2>Tests</h2>
            <ul class="list-group">
                @foreach($tests as $test)
                    <li class="list-group-item">
                        {{ $test->title }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <h2>Results</h2>
            <ul class="list-group">
                @foreach($results as $result)
                    <li class="list-group-item">
                        User: {{ $result->user->name }} - Test: {{ $result->test->title }} - Score: {{ $result->score }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
