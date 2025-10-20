<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('subjects', SubjectController::class);
Route::resource('groups', GroupController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('classrooms', ClassroomController::class);