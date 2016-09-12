@extends('layouts.flashcards')

@section('content')
    <h1>All Flashcards</h1>

    @include('flashcards.import')

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    <div class="table-pagination">
        <div class="button-row">
            <a href="{{ URL::to('flashcards/create') }}" class="btn btn-primary">
                Create New Flashcard
            </a>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                Import CSV
            </a>
            <a href="{{ URL::to('flashcards/view') }}" class="btn btn-primary">
                View Flashcards
            </a>
        </div>
        <?php echo $flashcards->links(); ?>
    </div>

    <table class="table table-striped result sort" id="result_table">
        <thead>
            <tr>
                @foreach ($columns as $column_name => $column_title)
                    <th>
                        <?php
                            $caret = '';
                            $class = ($order == 'desc') ? '' : ' dropup';
                            if ($sortby == $column_name) {
                                $caret = "<span class='order{$class}'><span class='caret'></span></span>";
                            }

                            $new_order =
                                ($sortby == $column_name && $order == 'asc') ?
                                'desc' : 'asc';
                            $params = array(
                                'sortby'    => $column_name,
                                'order'     => $new_order,
                                'page'      => $flashcards->getCurrentPage()
                            );
                            if (isset($page)) {
                                $params['page'] = $page;
                            }

                            echo link_to_action(
                                'FlashcardController@index',
                                $column_title,
                                $params,
                                array('class' => 'sortable')
                            );
                            echo $caret;
                        ?>
                    </th>
                @endforeach
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if ($flashcards->count())
                @foreach($flashcards as $key => $value)
                    <tr>
                        <td>{{ $value->front }}</td>
                        <td>{{ $value->back }}</td>
                        <td>{{ $value->category }}</td>
                        <!-- <td>{{ $value->front_answers }}</td> -->
                        <!-- <td>{{ $value->back_answers }}</td> -->
                        <td>{{ $value->active ? "Active" : "Inactive" }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->updated_at }}</td>

                        <!-- we will also add show, edit, and delete buttons -->
                        <td>
                            <!-- delete the flashcard (uses the destroy method DESTROY /flashcards/{id} -->
                            {{ Form::open(array('url' => 'flashcards/' . $value->id)) }}
                                <!-- show the flashcard (uses the show method found at GET /flashcards/{id} -->
                                <!-- <a class="btn btn-small btn-success" href="{{ URL::to('flashcards/' . $value->id) }}">Show</a> -->

                                <!-- edit this flashcard (uses the edit method found at GET /flashcards/{id}/edit -->
                                <a class="btn btn-small btn-info" href="{{ URL::to('flashcards/' . $value->id . '/edit') }}">Edit</a>

                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="no_result">No Flashcards</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="table-pagination">
        <div class="button-row">
            <a href="{{ URL::to('flashcards/create') }}" class="btn btn-primary">
                Create New Flashcard
            </a>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                Import CSV
            </a>
            <a href="{{ URL::to('flashcards/view') }}" class="btn btn-primary">
                View Flashcards
            </a>
        </div>
        <?php echo $flashcards->links(); ?>
    </div>

    {{ HTML::script('assets/javascript/flashcards/flashcard_index.js') }}
@stop
