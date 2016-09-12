<?php

class FlashcardController extends BaseController {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $rules = array(
        'front'     =>  'required',
        'back'      =>  'required',
        'category'  =>  'required',
    );

    public function index()
    {
        // get all the flashcards
        $sortby = Input::get('sortby');
        $order = Input::get('order');

        if ($sortby && $order) {
            $flashcards = Flashcard::orderBy($sortby, $order)->paginate(10);
        } else {
            $flashcards = Flashcard::paginate(10);
        }

        $flashcards->appends( Input::only('sortby', 'order') );

        $columns = array(
            'front'         =>  'Front',
            'back'          =>  'Back',
            'category'      =>  'Category',
            // 'front_answers' =>  'Front Answers',
            // 'back_answers'  =>  'Back Answers',
            'active'        =>  'Status',
            'created_at'    =>  'Created At',
            'updated_at'    =>  'Updated At',
        );

        // load the view and pass the flashcards
        return View::make('flashcards.index')
            ->with('flashcards', $flashcards)
            ->with('columns', $columns)
            ->with('sortby', $sortby)
            ->with('order', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/flashcards/create.blade.php)
        $answerList = array(
            // 'front_answers' =>  'Front Answers',
            // 'back_answers'  =>  'Back Answers',
        );

        return View::make('flashcards.create')
            ->with('answerList', $answerList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make(Input::all(), $this->rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('flashcards/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $flashcard = new Flashcard;
            $flashcard->front       = Input::get('front');
            $flashcard->back        = Input::get('back');
            $flashcard->category    = Input::get('category');
            $flashcard->active      = (Input::get('active') == NULL)?0:1;
            // $flashcard->front_answers     = implode(',', array_filter(Input::get('front_answers')));
            // $flashcard->back_answers     = implode(',', array_filter(Input::get('back_answers')));
            $flashcard->save();

            // redirect
            Session::flash('message', 'Successfully created flashcard!');
            return Redirect::to('flashcards');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the flashcard
        $flashcard = Flashcard::find($id);

        if ($flashcard == null) {
            return Redirect::to('flashcards');
        }

        // show the view and pass the flashcard to it
        return View::make('flashcards.show')
            ->with('flashcard', $flashcard);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get the flashcard
        $flashcard = Flashcard::find($id);

        $answerList = array(
            // 'front_answers' =>  'Front Answers',
            // 'back_answers'  =>  'Back Answers',
        );

        // show the edit form and pass the flashcard
        return View::make('flashcards.edit')
            ->with('flashcard', $flashcard)
            ->with('answerList', $answerList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make(Input::all(), $this->rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('flashcards/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $flashcard = Flashcard::find($id);
            $flashcard->front       = Input::get('front');
            $flashcard->back        = Input::get('back');
            $flashcard->category    = Input::get('category');
            $flashcard->active      = (Input::get('active') == NULL)?0:1;
            // $flashcard->front_answers     = implode(',', array_filter(Input::get('front_answers')));
            // $flashcard->back_answers     = implode(',', array_filter(Input::get('back_answers')));
            $flashcard->save();

            // redirect
            Session::flash('message', 'Successfully updated flashcard!');
            return Redirect::to('flashcards');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $flashcard = Flashcard::find($id);
        $flashcard->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the flashcard!');
        return Redirect::to('flashcards');
    }

    /**
     * Import CSV file and seed flashcards
     */
    public function import() {
        if (Input::file('csv_file')) {
            $file = Input::file('csv_file');
            if ($file->getClientMimeType() != "text/csv") {
                Session::flash('error', 'Please upload the CSV file');
                return Redirect::to('flashcards');
            }

            $handle = fopen($file, 'r');
            $content = file_get_contents($file);
            $arrLines = explode("\n", str_replace("\r", "\n", str_replace("\r\n", "\n", $content)));
            $i = 0;

            foreach ($arrLines as $line)
            {
                $arrWords = explode(',', $line);
                $i++;
                if ($i == 1) continue;
                $flashcard = new Flashcard;
                $flashcard->front = isset($arrWords[0]) ? $arrWords[0] : '';
                $flashcard->back = isset($arrWords[1]) ? $arrWords[1] : '';
                $flashcard->category = isset($arrWords[2]) ? $arrWords[2] : '';
                $flashcard->active =
                    (isset($arrWords[3]) && strtolower($arrWords[3]) == "active") ? 1 : 0;
                // $flashcard->front_answers = isset($line[3]) ? $line[3] : '';
                // $flashcard->back_answers = isset($line[4]) ? $line[4] : '';
                $flashcard->save();
            }

            Session::flash('message', 'Flashcards Imported Successfully!');
            return Redirect::to('flashcards');
        } else {
            Session::flash('error', 'Please upload the CSV file');
            return Redirect::to('flashcards');
        }
    }

    /**
     * View all flashcards with flashcard style
     */
    public function view() {
        // show the view and pass the flashcard to it
        return View::make('flashcards.view');
    }

    public function flashcards() {
        if (!Request::ajax()) {
            return Redirect::to('flashcards');
        }

        $flashcards = Flashcard::all();
        $result = [];
        foreach ($flashcards as $flashcard) {
            $result[] = array(
                'front' =>  $flashcard->front,
                'back' =>  $flashcard->back,
            );
        }

        echo json_encode($result);
    }
}
