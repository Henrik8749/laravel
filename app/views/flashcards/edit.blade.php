@extends('layouts.flashcards')

@section('content')
    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
        <h1>Edit "{{ $flashcard->front }}"</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{
            Form::model($flashcard, array(
                'route' => array('flashcards.update', $flashcard->id),
                'method' => 'PUT',
                'id'    => 'flashcardForm',
                'class' => 'form-horizontal'
            ))
        }}

            <div class="form-group">
                {{ Form::label('front', 'Front') }}
                <div>
                    {{ Form::text('front', null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('back', 'Back') }}
                <div>
                    {{ Form::text('back', null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('category', 'Category') }}
                <div>
                    {{ Form::text('category', null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::checkbox('active', null, null, array('id' => 'active')) }}
                {{ Form::label('active', 'Active/Inactive') }}
            </div>

            <?php
                /*foreach ($answerList as $key => $value) {
                    $answers = explode(',', $flashcard->$key);
                    $i = 0;
                    foreach ($answers as $answer) {
                        $classButton = ($i == 0) ?
                            "btn-primary addButton" : "btn-danger removeButton";
                        $classIcon = ($i == 0) ? "fa-plus" : "fa-minus";
            ?>
                        <div class="form-group">
                            @if ($i == 0)
                                {{ Form::label('', $value) }}
                            @endif
                            <div>
                                <input type="text" class="form-control" name="{{$key}}[]" value="{{ $answer }}"/>
                                <button type="button" class="btn {{ $classButton }}" rel="{{$key}}">
                                    <i class="fa {{ $classIcon }}"></i>
                                </button>
                            </div>
                        </div>
            <?php
                        $i++;
                    }
            ?>
                    <!-- The answer field template containing an answer field and a Remove button -->
                    <div class="form-group hide" id="{{$key}}Template">
                        <div>
                            <input class="form-control" type="text" name="{{$key}}[]" />
                            <button type="button" class="btn btn-danger removeButton"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
            <?php
                }*/
            ?>

            {{ Form::submit('Update Flashcard', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>

    {{ HTML::script('assets/javascript/flashcards/flashcard_form.js') }}
@stop