<?php

use App\Http\Controllers\Subject\LevelController;
use App\Http\Controllers\Subscribition\SubscribtionController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(SubscribtionController::class)->group(function () {
    Route::get('/subscribtion/index', 'index');
    Route::get('/subscribtion/show/{subscribtionID}', 'show');
    Route::get('/subscribtion/create', 'create');
    Route::post('/subscribtion/store', 'store');
    Route::get('/subscribtion/edit/{subscribtionID}', 'edit');
    Route::post('/subscribtion/update/{subscribtionID}', 'update');
    Route::post('/subscribtion/destroy/{subscribtionID}', 'destroy');
    Route::post('/subscribtion/archive/{subscribtionID}', 'archive');
});
Route::controller(LevelController::class)->group(function () {
    Route::get('/level/index', 'index');
    Route::get('/level/show/{levelId}', 'show');
    Route::get('/level/create', 'create');
    Route::post('/level/store', 'store');
    Route::get('/level/edit/{levelId}', 'edit');
    Route::post('/level/update/{levelId}', 'update');
    Route::post('/level/destroy/{levelId}', 'destroy');
    Route::post('/level/archive/{levelId}', 'archive');
});
Route::controller(TeacherController::class)->group(function () {
    Route::get('/teacher/index', 'index');
    Route::get('/teacher/show/{teacherId}', 'show');
    Route::get('/teacher/create', 'create');
    Route::post('/teacher/store', 'store');
    Route::get('/teacher/edit/{teacherId}', 'edit');
    Route::post('/teacher/update/{id}', 'update');
    Route::post('/teacher/destroy/{id}', 'destroy');
    Route::post('/teacher/archive/{id}', 'archive');
});
Route::controller(TeacherProfileController::class)->group(function () {
    Route::get('/teacherprofile/{teacherId}', 'getProfileData');
});