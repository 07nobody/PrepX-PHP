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
        <div class="col-md-12">
            <h2>Your Created Tests</h2>
            <ul class="list-group">
                @foreach($tests as $test)
                    <li class="list-group-item">
                        <a href="{{ route('tests.edit', $test->id) }}">{{ $test->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
