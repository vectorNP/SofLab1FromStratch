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

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/usersregister', 'UsersRegisterController@submit');

Route::get('/login', function () {
    return view('auth.login');
});


Route::post('/userslogin', 'UsersLoginController@submit');

Route::view('/users_home','auth.users_home');


