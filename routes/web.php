<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/for-all-beings', function () {
    return view('for-all-beings');
});
