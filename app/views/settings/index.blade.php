@extends('layouts.flashcards')

@section('content')
    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
        <h1>Settings</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($settings) }}

            <div class="form-group">
                {{ Form::label('flashcard_count', 'Flashcard Count') }}
                {{ Form::text('flashcard_count', Input::old('flashcard_count'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('answer_ability_count', 'Answer Ability') }}
                {{ Form::text('answer_ability_count', Input::old('answer_ability_count'), array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Save Settings', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@stop