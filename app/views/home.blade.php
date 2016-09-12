@extends('layouts.flashcards')

@section('content')
    <h1>Flashcard Application</h1>
    <div>
        <a href="{{ URL::to('quiz') }}" class="btn btn-primary">
            English to Spanish
        </a>
        <a href="{{ URL::to('quiz', array('reverse'=>1)) }}" class="btn btn-primary">
            Spanish to English
        </a>
    </div>
    <br/>
    <p>
        Lorem ipsum Non dolore est ex sunt aliqua sunt ut pariatur fugiat esse dolore aute ad Duis aute ullamco voluptate non in aliqua aliqua laboris nisi eu exercitation pariatur reprehenderit sunt laborum culpa do aliquip incididunt enim pariatur non velit officia incididunt nostrud eiusmod minim tempor et velit officia qui nostrud sit commodo nisi fugiat ex velit irure id non aute culpa sed sit deserunt consectetur esse aute ex aute commodo nulla fugiat dolore irure Duis cupidatat officia id minim aute aute consequat aliquip in elit elit nulla culpa ex incididunt ut commodo in elit officia commodo dolore nostrud labore et ut pariatur incididunt non consectetur cillum aliquip nulla officia proident sint enim amet cupidatat mollit esse deserunt quis veniam dolor culpa laborum mollit in ea voluptate minim incididunt Duis id in in dolore Duis in enim exercitation in nostrud nulla veniam enim quis laborum dolor sit amet cupidatat id veniam ex laborum sit labore esse aliqua nostrud esse reprehenderit quis anim nostrud labore non exercitation tempor culpa quis anim ad enim occaecat commodo ut consectetur exercitation incididunt esse in sit enim quis amet aliqua veniam laborum occaecat aliqua amet est dolore enim qui aute deserunt incididunt aute et mollit in sunt reprehenderit commodo est dolore cupidatat anim adipisicing ea ullamco est pariatur cupidatat officia officia culpa culpa sit consequat in mollit ea aliqua in pariatur amet commodo Duis amet proident et in cillum proident.
    </p>
@stop