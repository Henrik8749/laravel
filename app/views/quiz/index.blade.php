@extends('layouts.flashcards')

@section('content')
    <h1>Quiz</h1>
    @if ($reverse)
        <h3>Spanish to English</h3>
    @else
        <h3>English to Spanish</h3>
    @endif

    <div class="quiz_container">
        <div class="question"></div>
        <div class="category"></div>
        <div class="">
            <input type="text" id="txtAnswer"/>
        </div>
        <button class="btn btn-primary btn-answer">Next</button>
    </div>

    <script>
        var reverse = {{$reverse}};
    </script>

    {{ HTML::script('assets/javascript/quiz/quiz.js') }}
@stop