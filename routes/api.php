<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

makeResourceRoutes('user');
makeResourceRoutes('group');
makeResourceRoutes('post');
makeResourceRoutes('comment');
makeResourceRoutes('reply');
makeResourceRoutes('message');


// generates resource routes. Example: makeResourceRoutes('user') generates:
// Route::middleware('auth:api')->resource('/user', 'UserController');
function makeResourceRoutes($route)
{
	Route::middleware('auth:api')->resource('/'.$route, ucfirst($route).'Controller');
}