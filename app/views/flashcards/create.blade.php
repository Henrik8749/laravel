@extends('layouts.flashcards')

@section('content')
    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
        <h1>Create a Flashcard</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{
            Form::open(array(
                'url' => 'flashcards',
                'id'    => 'flashcardForm',
                'class' => 'form-horizontal'
            ))
        }}

            <div class="form-group">
                {{ Form::label('front', 'Front') }}
                <div>
                    {{ Form::text('front', Input::old('front'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('back', 'Back') }}
                <div>
                    {{ Form::text('back', Input::old('back'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('category', 'Category') }}
                <div>
                    {{ Form::text('category', Input::old('category'), array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="form-group">
                {{ Form::checkbox('active', Input::old('active'), false, array('id' => 'active')) }}
                {{ Form::label('active', 'Active/Inactive') }}
            </div>


            <?php
                /* foreach ($answerList as $key => $value) {
            ?>
                    <div class="form-group">
                        {{ Form::label('', $value) }}
                        <div>
                            <input type="text" class="form-control" name="{{$key}}[]" />
                            <button type="button" class="btn btn-primary addButton" rel="{{$key}}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

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
            {{ Form::submit('Create the Flashcard', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>

    {{ HTML::script('assets/javascript/flashcards/flashcard_form.js') }}
@stop