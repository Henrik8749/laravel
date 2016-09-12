@extends('layouts.flashcards')

@section('content')
    <div class="jumbotron text-center">
        <p>
            <strong>Front :</strong> {{ $flashcard->front }}<br/>
            <strong>Back :</strong> {{ $flashcard->back }}<br/>
            <strong>Category :</strong> {{ $flashcard->category }}<br/>
            <strong>Status :</strong> {{ $flashcard->active ? "Active" : "Inactive" }}<br/>
            <strong>Created At :</strong> {{ $flashcard->created_at }}<br/>
            <strong>Updated At :</strong> {{ $flashcard->updated_at }}<br/>
        </p>
    </div>
@stop