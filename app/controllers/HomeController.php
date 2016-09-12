<?php

class HomeController extends BaseController {

    protected $layout = "layouts.flashcards";

    public function index() {
        $this->layout->content = View::make('home');
    }

}
