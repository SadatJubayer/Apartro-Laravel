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
Route::middleware(['adminAccess'])->group(function () {

    // Admin Profile
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/profile', 'AdminController@profile');
    Route::post('/admin/profile', 'AdminController@updateProfile');

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
    Route::post('/admin/floors/new', 'AdminController@createFloor');
    Route::post('/admin/floors/update', 'AdminController@updateFloor');
    Route::post('/admin/floors/delete', 'AdminController@destroyFloor');

    // Units
    Route::get('/admin/units', 'AdminController@unitIndex');
    Route::post('/admin/units/new', 'AdminController@createUnit');
    Route::post('/admin/units/update', 'AdminController@updateUnit');
    Route::post('/admin/units/delete', 'AdminController@destroyUnit');

    // Expenses
    Route::get('/admin/expenses', 'AdminController@expenses');

    // Complains
    Route::get('/admin/complains', 'AdminController@complainsIndex');
    Route::post('/admin/complains/resolve', 'AdminController@resolveComplain');

    // Visitors
    Route::get('/admin/visitors', 'AdminController@visitors');
});

// emp
Route::middleware(['employeeAccess'])->group(function () {
    Route::get('/employee', 'employeeController@index');
    // Visitors
    Route::get('/employee/visitors', 'employeeController@visitors');
    Route::post('/employee/visitors/new', 'employeeController@addVisitors');
    // Expenses
    Route::get('/employee/expenses', 'employeeController@expenses');
    Route::post('/employee/expenses/new', 'employeeController@addExpenses');
    // Bills
    Route::get('/employee/bills', 'employeeController@bills');
    Route::post('/employee/bills/new', 'employeeController@addBills');
    // emp Profile
    Route::get('/employee/profile', 'employeeController@profile');
    Route::post('/employee/profile', 'employeeController@updateProfile');
    // Complains
    Route::get('/employee/complains', 'employeeController@complainsIndex');
    Route::post('/employee/complains/resolve', 'employeeController@resolveComplain');
    // users list
    Route::get('/employee/users', 'employeeController@users');
    // notices
    Route::get('/employee/notices', 'employeeController@notices');
    Route::post('/employee/notices/new', 'employeeController@addNotices');

});


