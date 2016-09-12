<?php

class SettingsController extends BaseController {
    /**
     * Display and change the settings
     *
     * @return Response
     */

    protected $rules = array(
        'flashcard_count'       =>  'required|numeric',
        'answer_ability_count'  =>  'required|numeric',
    );

    public function index()
    {
        $settings = Setting::find(1);

        if ($settings == null) {
            return Redirect::route('home');
        }

        if (Input::all()) {
            $validator = Validator::make(Input::all(), $this->rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('settings')
                    ->withErrors($validator)
                    ->withInput(Input::all());
            } else {
                // store
                $settings->flashcard_count      = Input::get('flashcard_count');
                $settings->answer_ability_count = Input::get('answer_ability_count');
                $settings->save();

                // redirect
                Session::flash('message', 'Successfully created flashcard!');
                return Redirect::to('settings');
            }
        }

        // load the view and pass the flashcards
        return View::make('settings.index')
            ->with('settings', $settings);
    }
}
