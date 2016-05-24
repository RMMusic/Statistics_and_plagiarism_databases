<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET, POST, PUT, OPTIONS');
header('Access-Control-Allow-Headers:Origin, Content-Type, Accept, Authorization, X-Requested-With');

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

#auth
Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/authorize', 'Auth\AuthController@handleProviderCallback');
    Route::group(['middleware' => 'auth'], function () {

        #HOME
        Route::get('/', 'HomeController@index');

        #search
        Route::post('/participantSearch', 'SearchController@participantSearch');

        #participant
        Route::post('lists/participant/store', 'ParticipantController@store');
        Route::get('lists/participant', 'ParticipantController@index');
        Route::get('lists/participant/data', 'ParticipantController@data');
        Route::get('lists/participant/create', 'ParticipantController@create');
        Route::get('lists/participant/{participant}/edit', 'ParticipantController@edit');
        Route::put('lists/participant/{participant}/edit', 'ParticipantController@update');

        #statistics
        Route::post('lists/statistics/store', 'WorkController@store');
        Route::get('lists/statistics', 'StatisticsController@index');
        Route::get('lists/statistics/data', 'StatisticsController@data');
        Route::get('lists/statistics/create', 'StatisticsController@create');
        Route::get('lists/statistics/{work}/edit', 'StatisticsController@edit');
        Route::get('lists/statistics/{id}/destroy', 'StatisticsController@destroy');
        Route::put('lists/statistics/{work}/edit', 'StatisticsController@update');

        #plagiarism
        Route::post('lists/plagiarism/store', 'WorkController@store');
        Route::get('lists/plagiarism', 'PlagiarismController@index');
        Route::get('lists/plagiarism/data', 'PlagiarismController@data');
        Route::get('lists/plagiarism/create', 'PlagiarismController@create');
        Route::get('lists/plagiarism/{work}/edit', 'PlagiarismController@edit');
        Route::get('lists/plagiarism/{id}/destroy', 'PlagiarismController@destroy');
        Route::put('lists/plagiarism/{work}/edit', 'PlagiarismController@update');

        #system options
        Route::post('options/save', 'OptionsController@save');
        Route::resource('options/', 'OptionsController');
    });

});