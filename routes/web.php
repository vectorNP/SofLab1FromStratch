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

// Route::get('/register', function () {
//     return view('auth.register');
// });


Route::group(['middleware' => 'checkusermiddleware'],function(){

    Route::get('/users_home','UsersLoginController@show_home');

    //Route::post('/userslogin', 'UsersLoginController@submit');

    Route::get('/users_edit','UsersLoginController@show_edit');

    Route::post('/users_edit_submit', 'UsersEditController@submit');

});

Route::post('/usersregister', 'UsersRegisterController@submit');

Route::get('/login', 'UsersLoginController@login');

Route::get('/register','UsersRegisterController@register');

// Route::get('/users_home','UsersLoginController@show_home');

Route::post('/userslogin', 'UsersLoginController@submit');


Route::get('/logout','UsersLoginController@logout');


// Route::get('/users_edit','UsersLoginController@show_edit');

// Route::post('/users_edit_submit', 'UsersEditController@submit');



