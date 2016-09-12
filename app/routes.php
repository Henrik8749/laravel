<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', 'HomeController');
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/quiz', array('as' => 'quiz.index', 'uses' => 'QuizController@index'));
Route::get('/quiz/{reverse}', array('as' => 'quiz.index.reverse', 'uses' => 'QuizController@index'));
Route::post('/quiz/list', array('as' => 'quiz.list', 'uses' => 'QuizController@quiz_list'));

Route::post('/flashcards/import', array('as' => 'flashcard.import', 'uses' => 'FlashcardController@import'));
Route::get('/flashcards/view', array('as' => 'flashcard.view', 'uses' => 'FlashcardController@view'));
Route::post('/flashcards/flashcards', array('as' => 'flashcard.flashcards', 'uses' => 'FlashcardController@flashcards'));
Route::resource('flashcards', 'FlashcardController');

Route::get('/settings', array('as' => 'settings', 'uses' => 'SettingsController@index'));
Route::post('/settings', array('as' => 'settings', 'uses' => 'SettingsController@index'));

