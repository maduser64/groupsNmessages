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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('post/react/{id}/{reaction_type}', 'ReactionController@reactToPost');
Route::get('comment/react/{id}/{reaction_type}', 'ReactionController@reactToComment');
Route::get('reply/react/{id}/{reaction_type}', 'ReactionController@reactToReply');

Route::resource('group', 'GroupController');