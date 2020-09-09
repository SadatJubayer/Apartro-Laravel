<?php

use Illuminate\Support\Facades\Route;


// Index Route
Route::get('/', function () {
    return view('index');
});

// Auth Routes
Route::get('/login', 'AuthController@loginView');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@registerView');
Route::post('/register', 'AuthController@register');


// Admin Routes
Route::get('/admin', 'AdminController@index');


Route::get('/admin/users', 'AdminController@usersIndex');
Route::get('/admin/users/add', 'AdminController@addUser');
Route::post('/admin/users/add', 'AdminController@createUser');
Route::post('/admin/users/activeUser', 'AdminController@activeUser');
Route::post('/admin/users/deActiveUser', 'AdminController@deActiveUser');
Route::post('/admin/users/updateUser', 'AdminController@updateUser');