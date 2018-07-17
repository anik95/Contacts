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
Route::post('/contacts/create', 'ContactsController@apiCreate');
Route::post('/contacts/edit/{id}', 'ContactsController@apiEdit');
Route::get('/contacts/show/{id}', 'ContactsController@apiShowById');
Route::get('/contacts/show', 'ContactsController@apiShow');
Route::delete('/contacts/delete/{id}', 'ContactsController@apiDelete');
//Route::post('/contacts', 'ContactsController@apiEdit');
//Route::get('/contacts', 'ContactsController@apiEdit');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
