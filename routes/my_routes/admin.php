<?php

use App\Http\Controllers\Subject\ClassController;
use App\Http\Controllers\Subject\LevelController;
use App\Http\Controllers\Subject\SubjectController;
use App\Http\Controllers\Subscribition\SubscribtionController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;

Route::controller(SubscribtionController::class)->group(function () {
    Route::get('/subscribtion/index', 'index')->name('indexSubscribtion');
    Route::get('/subscribtion/show/{subscribtionID}', 'show');
    Route::get('/subscribtion/create', 'create');
    Route::post('/subscribtion/store', 'store');
    Route::get('/subscribtion/edit/{subscribtionID}', 'edit');
    Route::post('/subscribtion/update/{subscribtionID}', 'update');
});
Route::controller(LevelController::class)->group(function () {
    Route::get('/level/index', 'index')->name('indexLevel');
    Route::get('/level/show/{levelId}', 'show');
    Route::get('/level/create', 'create');
    Route::post('/level/store', 'store');
    Route::get('/level/edit/{levelId}', 'edit');
    Route::post('/level/update/{levelId}', 'update');

});
Route::controller(TeacherController::class)->group(function () {
    Route::get('/teacher/index', 'index')->name('indexTeacher');
    Route::get('/teacher/show/{teacherId}', 'show');
    Route::get('/teacher/create', 'create');
    Route::post('/teacher/store', 'store');
    Route::get('/teacher/edit/{teacherId}', 'edit');
    Route::post('/teacher/update/{id}', 'update');
});


Route::controller(ClassController::class)->group(function () {
    Route::get('/classes/index', 'index')->name('indexClasses');
    Route::get('/classes/show/{classesID}', 'show');
    Route::get('/classes/create', 'create');
    Route::post('/classes/store', 'store');
    Route::get('/classes/edit/{classesID}', 'edit');
    Route::post('/classes/update/{classesID}', 'update');
  
});
Route::controller(SubjectController::class)->group(function () {
    Route::get('/subject/index', 'index')->name('indexSubject');
    Route::get('/subject/show/{classesID}', 'show');
    Route::get('/subject/create', 'create');
    Route::post('/subject/store', 'store');
    Route::get('/subject/edit/{subjectId}', 'edit');
    Route::post('/subject/update/{id}', 'update');
});

