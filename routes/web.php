<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('subjects', SubjectController::class);
Route::resource('groups', GroupController::class);