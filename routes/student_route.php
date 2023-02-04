<?php

use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;


Route::controller(StudentController::class)->group(function () {
    Route::get('/student/index', 'index');
    Route::get('/student/profile/{studentID}', 'profile');
    Route::get('/student/create', 'create');
    Route::post('/student/store', 'store');
    Route::get('/student/edit/{studentID}', 'edit');
    Route::post('/student/update/{studentID}', 'update');
    Route::post('/student/destroy/{studentID}', 'destroy');
    Route::post('/student/archive/{studentID}', 'archive');
});