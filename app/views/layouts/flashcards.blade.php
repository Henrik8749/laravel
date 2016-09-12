<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flashcard Application</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{ HTML::style('assets/stylesheets/flashcards.css') }}
    {{ HTML::script('assets/javascript/vendor.js') }}
</head>
<body>
    <div class="header">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid container">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#NavbarCollapse1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('') }}">Flashcard Application</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="NavbarCollapse1">
                    <ul class="nav navbar-nav">
                        <li class="{{ (Request::segment(1) == '') ? 'active' : ''}}">
                            <a href="{{ URL::to('') }}">Home</a>
                        </li>
                        <li  class="{{ (Request::segment(1) == 'quiz') ? 'active' : ''}}">
                            <a href="{{ URL::to('quiz') }}">Quiz</a>
                        </li>
                        <li  class="{{ (Request::segment(1) == 'flashcards') ? 'active' : ''}}">
                            <a href="{{ URL::to('flashcards') }}">Flashcards</a>
                        </li>
                        <li  class="{{ (Request::segment(1) == 'settings') ? 'active' : ''}}">
                            <a href="{{ URL::to('settings') }}">Settings</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>

    <div class="container content-container">
        @yield('content')
    </div>
    <div class="footer container">
        Copyright 2014 &copy; Front Office Media LLC
    </div>
</body>
</html>
