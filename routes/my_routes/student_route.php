<?php

use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentClassController;


Route::controller(StudentController::class)->group(function () {
    Route::get('/student/index', 'index');
    Route::get('/student/create', 'create');
    Route::post('/student/store', 'store');
    Route::get('/student/edit/{studentID}', 'edit');
    Route::post('/student/update/{studentID}', 'update');
    Route::post('/student/destroy/{studentID}', 'destroy');
    Route::post('/student/archive/{studentID}', 'archive');
    
});
Route::controller(StudentClassController::class)->group(function () {
    Route::get('/stdClass/profile/{studentID}', 'profile');
    Route::get('/stdClass/show/{classID}/{studentID}', 'show');
    Route::get('/stdClass/create', 'create');
    Route::post('/stdClass/store', 'store');
    Route::get('/stdClass/edit/{studentID}', 'edit');
    Route::post('/stdClass/update/{studentID}', 'update');
    Route::post('/stdClass/destroy/{studentID}', 'destroy');
    Route::post('/stdClass/archive/{studentID}', 'archive');
    Route::post('/student/joinClass/{classID}/{studentID}', 'joinClass');
    Route::get('/student/class/examIndex/{classID}/{examID}', 'showExamIndex');
    Route::get('/student/class/exam/{classID}/{examID}', 'showExam');
   
});