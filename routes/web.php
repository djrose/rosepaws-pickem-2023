<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/livefeed', 'LiveFeedController@index');   // shows choices of seasons
Route::post('/livefeed/store', 'LiveFeedController@store')->name('livefeed.store');

Route::group([
    'middleware' => 'auth:api'
    ], function () {
        Route::get('/welcome', 'WelcomeController@welcome');

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/games/editScores', 'GameController@editScores');
        
        Route::resource('clubs', 'ClubController');
        Route::resource('calculations', 'CalculationController');
        Route::resource('conferences', 'ConferenceController');
        Route::resource('divisions', 'DivisionController');
        Route::resource('games', 'GameController');
        Route::resource('picks', 'PickController');
        Route::resource('rankings', 'RankingController');
        Route::resource('seasons', 'SeasonController');
        Route::resource('sports', 'SportController');
        Route::resource('weeks', 'WeekController');


      }
);
