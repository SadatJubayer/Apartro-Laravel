<?php

use Illuminate\Support\Facades\Route;
use arryvdh\DomPDF\Facade;

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


Route::middleware(['tanentAccess'])->group(function () {


    //Tenant Profile
    Route::get('/tenant', 'TenantController@index');
    Route::get('/tenant/users', 'TenantController@usersIndex');
    Route::get('/tenant/notice', 'TenantController@notice');
    Route::get('/tenant/bills', 'TenantController@bills');

    //Tenant vistor
    Route::get('/tenant/visitors', 'TenantController@visitors');


    //Tenant  Expenses
    Route::get('/tenant/expenses', 'TenantController@expenses');

    //Tenant complain
    Route::get('/tenant/complains', 'TenantController@complainsIndex');
    // Route::post('/tenant/addComplain', 'TenantController@addComplain');
    Route::post('/tenant/complainsadd', 'TenantController@addComplain');


    //Tenant Profile
    Route::get('/tenant/profile', 'TenantController@profile');
    Route::post('/tenant/profile', 'TenantController@updateProfile');

    //Tenant Bill Report
    Route::get('/invoice', 'TenantController@billReport')->name('getReport');
});





// Admin Routes
Route::middleware(['adminAccess'])->group(function () {

    // Admin Profile
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/profile', 'AdminController@profile');
    Route::post('/admin/profile', 'AdminController@updateProfile')->middleware('validateUser');

    // Users
    Route::get('/admin/users', 'AdminController@usersIndex');
    Route::get('/admin/users/add', 'AdminController@addUser');
    Route::post('/admin/users/add', 'AdminController@createUser');
    Route::post('/admin/users/activeUser', 'AdminController@activeUser');
    Route::post('/admin/users/deActiveUser', 'AdminController@deActiveUser');
    Route::post('/admin/users/updateUser', 'AdminController@updateUser');
    Route::post('/admin/users/destroyUser', 'AdminController@destroyUser');
    Route::post('/admin/users/getUserDetials', 'AdminController@getUserDetials');

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
    Route::post('/admin/addExpense', 'AdminController@addExpense');

    // Complains
    Route::get('/admin/complains', 'AdminController@complainsIndex');
    Route::post('/admin/complains/resolve', 'AdminController@resolveComplain');

    // Visitors
    Route::get('/admin/visitors', 'AdminController@visitors');

    // Get PDF
    Route::get('/admin/getPDF', 'AdminController@getUnitReport');
    Route::get('/admin/getComplainsPDF', 'AdminController@getComplainsReport');
});

Route::middleware(['ownerAccess'])->group(function () {
    Route::group(['prefix' => 'owner'], function () {
        Route::get('/', 'ownerController@index')->name('ownerDashboard');
        Route::post('/{complain:id}', 'ownerController@update')->name('complainUpdate');
        Route::get('/units', 'Owner\unitController@index')->name('getUnits');
        Route::get('/units/{unit:id}', 'Owner\unitController@edit')->name('editUnits');
        Route::post('/units/{unit:id}', 'Owner\unitController@update')->name('updateUnits');
        Route::get('/Managetanent', 'Owner\TanentController@index')->name('manageTanent');
        Route::get('/tanent', 'Owner\TanentController@create')->name('createTanent');
        Route::post('/tanent', 'Owner\TanentController@store')->name('storeTanents');
        Route::get('/edit/{tanent:id}', 'Owner\TanentController@edit')->name('editTanents');
        Route::post('/edit/{tanent:id}', 'Owner\TanentController@update')->name('updateTanents');
        Route::post('/delete/{tanent:id}', 'Owner\TanentController@destroy')->name('deleteTanents');


        Route::get('/tanentUser', 'TanentUserController@create')->name('createTanentsusers');
        Route::post('/tanentUser', 'TanentUserController@store')->name('storeTanentsusers');
        Route::get('/visitors', 'TanentUserController@index')->name('visitors');


        Route::group(['prefix' => 'Bills'], function () {
            Route::get('/manage', 'Backend\Tanent@index')->name('manageBills');
        });

        Route::group(['prefix' => 'expenses'], function () {
            Route::get('/manage', 'Backend\Tanent@expense')->name('manageExpense');
        });

        Route::group(['prefix' => 'notices'], function () {
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
    // report
    Route::get('/invoice', 'employeeController@billReport')->name('getReport');
});
