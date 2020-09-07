<?php

use Illuminate\Support\Facades\Route;


// Index Route
Route::get('/', function () {
    return view('index');
});