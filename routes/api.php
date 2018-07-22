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
Auth::routes();


//------------------for passport-----------------------------------



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('login', 'AuthController@login');
//     Route::post('signup', 'AuthController@signup');
  
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'AuthController@logout');
//         Route::get('user', 'AuthController@user');
//     });
// });

// Route::middleware(['auth:api'])->group(function () {
   
//     Route::post('/contacts/create', 'ContactsController@apiCreate');
//     Route::post('/contacts/edit/{id}', 'ContactsController@apiEdit');
//     Route::get('/contacts/show', 'ContactsController@apiShow');
//     Route::get('/contacts/show/{id}', 'ContactsController@apiShowById');
//     Route::delete('/contacts/delete/{id}', 'ContactsController@apiDelete');

    
// });


//---------------------------------------------X--------------------------------------------

//------for jwt authentication---------

// Route::post('user/register', 'APIController@register');
// Route::post('user/login', 'APIController@login');


// Route::middleware('jwt.auth')->get('user', function(Request $request) {
//     return auth()->user();
// });

// // Route::group(['middleware' => 'jwt.auth'], function(){
// //     Route::post('auth/logout', 'APILogoutController@logout');
// // });

// //Route::get('/contacts/show', 'ContactsController@apiShow')->middleware('jwt.auth');
// Route::middleware(['jwt.auth'])->group(function () {

//     Route::post('/contacts/create', 'ContactsController@apiCreate');
//     Route::post('/contacts/edit/{id}', 'ContactsController@apiEdit');
//     Route::get('/contacts/show', 'ContactsController@apiShow');
//     Route::get('/contacts/show/{id}', 'ContactsController@apiShowById');
//     Route::delete('/contacts/delete/{id}', 'ContactsController@apiDelete');    
// });
//---------------------------------------------------------


Route::post('/contacts/create', 'ContactsController@apiCreate');
Route::post('/contacts/edit/{id}', 'ContactsController@apiEdit');
Route::get('/contacts/show', 'ContactsController@apiShow');
Route::get('/contacts/show/{id}', 'ContactsController@apiShowById');
Route::delete('/contacts/delete/{id}', 'ContactsController@apiDelete');   

//----------- trying jwt again----------------
Route::group([
 
    //'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::post('me', 'JWTAuthController@me');

    Route::group([
        'middleware'=>'validtoken',

    ], function(){

        Route::post('/contacts/create', 'ContactsController@apiCreate');
        Route::post('/contacts/edit/{id}', 'ContactsController@apiEdit');
        Route::get('/contacts/show', 'ContactsController@apiShow');
        Route::get('/contacts/show/{id}', 'ContactsController@apiShowById');
        Route::delete('/contacts/delete/{id}', 'ContactsController@apiDelete'); 
    });


});
