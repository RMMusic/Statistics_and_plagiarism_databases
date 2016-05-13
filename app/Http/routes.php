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

//    Route::get('/changeChapters/{id}', 'Controller@setChapter');
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', 'HomeController@index');
        Route::post('/', 'SearchController@index');

        #statistics
        Route::get('lists/statistics', 'StatisticsController@index');
        Route::get('lists/statistics/data', 'StatisticsController@data');
        Route::get('lists/statistics/create', 'StatisticsController@create');

        #plagiarism
        Route::get('lists/plagiarism', 'PlagiarismController@index');
        Route::get('lists/plagiarism/data', 'PlagiarismController@data');

        #System options
        Route::post('options/save', 'OptionsController@save');
        Route::resource('options/', 'OptionsController');
    });

});

Route::group(['middleware' => ['api'],'prefix' => 'api'], function () {
    Route::post('login', 'APIController@login');
    Route::group(['middleware' => 'jwt-auth'], function () {
        Route::post('get_user_details', 'APIController@get_user_details');
    });
});