<?php

use App\Http\Controllers\Student\StudentAnswerController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentClassController;


Route::controller(StudentController::class)->group(function () {
    Route::get('/student/index', 'index')->name('indexStudents');
    Route::get('/student/create', 'create');
    Route::post('/student/store', 'store');
    Route::get('/student/edit/{studentID}', 'edit');
    Route::post('/student/update/{studentID}', 'update');
    
});
Route::controller(StudentClassController::class)->group(function () {
    Route::get('/stdClass/profile/{studentID}', 'profile')->name('studentClassProfile');
    Route::get('/stdClass/create', 'create');
    Route::post('/stdClass/store', 'store');
    Route::get('/stdClass/edit/{studentID}', 'edit');
    Route::post('/stdClass/update/{studentID}', 'update');
    Route::post('/student/joinClass/{classID}/{studentID}', 'joinClass');
  
});

Route::controller(StudentAnswerController::class)->group(function(){
    Route::post('/exam/class/answersStoer', 'stoerAnswersExam');
});