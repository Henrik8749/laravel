<?php

class QuizController extends BaseController {
    /**
     * Take the quiz
     *
     * @return Response
     */

    public function index($reverse = 0)
    {
        // load the view and pass the flashcards
        return View::make('quiz.index')
            ->with('reverse', $reverse);
    }

    /**
     * Get the quiz list
     *
     * @return Response
     */

    public function quiz_list()
    {
        $flashcards = Flashcard::orderByRaw("RAND()")->get()->random(10);

        $result = [];
        foreach ($flashcards as $flashcard) {
            $result[] = array(
                'id' =>  $flashcard->id,
                'front'         =>  $flashcard->front,
                'back'          =>  $flashcard->back,
                'category'      =>  $flashcard->category,
                'front_answers' =>  $flashcard->front_answers,
                'back_answers'  =>  $flashcard->back_answers,
            );
        }

        echo json_encode($result);
    }
}
