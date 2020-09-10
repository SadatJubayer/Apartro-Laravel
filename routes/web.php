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
Route::get('/logout', 'AuthController@logout');


// Admin Routes
Route::get('/admin', 'AdminController@index');


// Users
Route::get('/admin/users', 'AdminController@usersIndex');
Route::get('/admin/users/add', 'AdminController@addUser');
Route::post('/admin/users/add', 'AdminController@createUser');
Route::post('/admin/users/activeUser', 'AdminController@activeUser');
Route::post('/admin/users/deActiveUser', 'AdminController@deActiveUser');
Route::post('/admin/users/updateUser', 'AdminController@updateUser');
Route::post('/admin/users/destroyUser', 'AdminController@destroyUser');

// Apartment
Route::post('/admin/addApartment', 'AdminController@createApartment');
Route::get('/admin/editApartment', 'AdminController@editApartment');
Route::post('/admin/editApartment', 'AdminController@updateApartment');

// Floors
Route::get('/admin/floors', 'AdminController@floorIndex');
Route::post('/admin/floors', 'AdminController@createFloor');