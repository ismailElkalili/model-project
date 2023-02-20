<?php

use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use Illuminate\Support\Facades\Route;

//must be devided into 4 controller (Som3a)
Route::controller(ExamController::class)->group(function () {
    Route::get('/exam/show/{exam_id}', 'show');
    Route::get('/exam/create', 'create');
    Route::post('/exam/store', 'store');
    Route::get('/exam/show/{classID}/{studentID}', 'showExamsForStudnet');
    Route::get('/exam/class/examIndex/{classID}/{examID}', 'showExamDetails')->name('examDetails');
    Route::get('/exam/class/{classID}/{examID}', 'showExamQuestions');
    
    Route::get('/exam/class/OldExam/{classID}/{examID}', 'showAnswersForStudent');
});


Route::get('/file-import/{examcode}', [
    ExamController::class,
    'importView',
])->name('import-view');
Route::post('/import', [
    ExamController::class,
    'import',
])->name('import');
Route::controller(TeacherProfileController::class)->group(function () {
    Route::get('/teacherprofile/{teacherId}', 'getProfileData');
    Route::get('/requestSubjcteStudent/{teacherID}/{classID}/{subjectID}', 'getSubjcteForTeacher');
    Route::post('/acceptStudent/{stdClassID}', 'acceptStudent');
    Route::post('/rejectStudent/{stdClassID}', 'rejectStudent');

});
