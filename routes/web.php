<?php

use Illuminate\Support\Facades\Route;
use arryvdh\DomPDF\Facade;


// Index Route
Route::get('/', function () {
    return view('index');
});
// Route::get('/','SearchController@index');

// Route::get('/search','SearchController@search');

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
Route::middleware(['ownerAccess'])->group(function () {
    Route::get('/create', 'TanentUserController@create')->name('createTanentsusers');
    Route::post('/create', 'TanentUserController@storetanent')->name('storeTanentsusers');
    Route::get('/tanent', 'Owner\TanentController@create')->name('createTanent');
    Route::post('/tanent', 'Owner\TanentController@store')->name('storeTanents');
Route::group(['prefix' => 'owner'], function(){
    Route::get('/', 'ownerController@index')->name('ownerDashboard');
    Route::post('/{complain:id}', 'ownerController@update')->name('complainUpdate');
    Route::get('/units', 'Owner\unitController@index')->name('getUnits');
    Route::get('/units/{unit:id}', 'Owner\unitController@edit')->name('editUnits');
    Route::post('/units/{unit:id}', 'Owner\unitController@update')->name('updateUnits');
    Route::get('/Managetanent', 'Owner\TanentController@index')->name('manageTanent');
    
    Route::get('/edit/{tanent:id}', 'Owner\TanentController@edit')->name('editTanents');
    Route::post('/edit/{tanent:id}', 'Owner\TanentController@update')->name('updateTanents');
    Route::post('/delete/{tanent:id}', 'Owner\TanentController@destroy')->name('deleteTanents');
    
    
    
    Route::get('/visitors', 'TanentUserController@index')->name('visitors');

   
    Route::group(['prefix' => 'Bills'], function(){
        Route::get('/manage', 'Backend\Tanent@index')->name('manageBills');
       
    });
    

    Route::group(['prefix' => 'expenses'], function(){
        Route::get('/manage', 'Backend\Tanent@expense')->name('manageExpense');
       
    });

    Route::group(['prefix' => 'notices'], function(){
        Route::get('/manage', 'Backend\NoticeController@index')->name('manageNotice');
        Route::get('/create/{apartment:id}', 'Backend\NoticeController@create')->name('createNotice');
        Route::post('/create/{apartment:id}', 'Backend\NoticeController@store')->name('storeNotice');
       
    });

     // Admin Profile
     
     Route::get('/admin/profile', 'AdminController@profile')->name('adminProfile');
     Route::post('/admin/profile', 'AdminController@updateProfile')->name('updateProfile');

     Route::get('/invoice', 'Owner\unitController@create')->name('getReport');


    });

    

});