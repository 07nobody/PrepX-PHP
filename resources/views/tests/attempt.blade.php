@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attempt Mock Test</h1>
    <form action="{{ route('tests.submit', $test->id) }}" method="POST">
        @csrf
        @foreach($test->questions as $question)
            <div class="mb-3">
                <label class="form-label">{{ $question->question_text }}</label>
                @if($question->question_type == 'MCQ')
                    @foreach(json_decode($question->options) as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" required>
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                @elseif($question->question_type == 'True/False')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="True" required>
                        <label class="form-check-label">True</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="False" required>
                        <label class="form-check-label">False</label>
                    </div>
                @elseif($question->question_type == 'Numerical')
                    <input type="number" class="form-control" name="answers[{{ $question->id }}]" required>
                @elseif($question->question_type == 'Logical Reasoning' || $question->question_type == 'Data Interpretation' || $question->question_type == 'General Awareness')
                    <textarea class="form-control" name="answers[{{ $question->id }}]" rows="3" required></textarea>
                @endif
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit Test</button>
    </form>
</div>
@endsection
