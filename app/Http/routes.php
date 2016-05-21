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

//Route::get('/', function () {
//    return view('welcome');
//});

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

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/authorize', 'Auth\AuthController@handleProviderCallback');
    Route::group(['middleware' => 'auth'], function () {

        #HOME
        Route::get('/', 'HomeController@index');
        
        #participant
        Route::post('/', 'SearchController@index');
        Route::post('/search', 'ParticipantController@search');
        Route::post('lists/participant/store', 'ParticipantController@store');
        Route::get('lists/participant', 'ParticipantController@index');
        Route::get('lists/participant/data', 'ParticipantController@data');
        Route::get('lists/participant/create', 'ParticipantController@create');

        #statistics
        Route::get('lists/statistics', 'StatisticsController@index');
        Route::get('lists/statistics/data', 'StatisticsController@data');
        Route::get('lists/statistics/create', 'StatisticsController@create');

        #plagiarism
        Route::get('lists/plagiarism', 'PlagiarismController@index');
        Route::get('lists/plagiarism/data', 'PlagiarismController@data');

        #system options
        Route::post('options/save', 'OptionsController@save');
        Route::resource('options/', 'OptionsController');
    });

});