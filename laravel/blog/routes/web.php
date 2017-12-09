<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/now', function () {
    return ['time'=>date('Y-m-d H:i:s')];
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sse', 'HomeController@sse');
Route::get('/chat', 'HomeController@chat');
Route::post('/recv', 'HomeController@recv');
Route::get('/send', 'HomeController@send');

Route::get('/article/{id}','ArticleController@show');
Route::post('comment','CommentController@store');


//Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
//    Route::get('/', 'HomeController@index');
//    Route::resource('article', 'ArticleController',['except' => [
//        'show',
//    ]]);
//});

//Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
//    Route::get('/homeComment', 'HomeCommentController@index');
//    Route::resource('comment', 'CommentController',['except' => [
//        'show',
//    ]]);
//});

Route::get('/registersms','UsersController@registerSms');
Route::get('/cache','UsersController@cache');

Route::get('/routes/{id}',['middleware' => 'auth', function ($id){
    return \Illuminate\Support\Facades\View::make('welcome');
}])->where('id','[0-9]+');
