@extends('layouts.flashcards')

@section('content')
    <h1>View Flashcards</h1>
    <div class="description">
        <span class="card_index"></span> of <span class="card_count"></span> Flashcards : <span class="side">Front</span>
    </div>
    <div class="flashcard-viewer">
        <div id="flashcard">
            <div class="front">
                <div class="text"></div>
                <a href="#" class="btn btn-primary prev">&lt;</a>
                <a href="#" class="btn btn-primary next">&gt;</a>
                <a href="#" class="btn btn-primary flip">Flip</a>
            </div>
            <div class="back">
                <div class="text"></div>
                 <a href="#" class="btn btn-primary prev">&lt;</a>
                <a href="#" class="btn btn-primary next">&gt;</a>
                <a href="#" class="btn btn-primary flip">Flip</a>
            </div>
        </div>
    </div>

    {{ HTML::script('assets/javascript/flashcards/flashcard_view.js') }}
@stop