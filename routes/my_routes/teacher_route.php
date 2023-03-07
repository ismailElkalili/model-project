<?php

use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\Exam\StudentExamController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use Illuminate\Support\Facades\Route;

//must be devided into 4 controller (Som3a)
Route::controller(ExamController::class)->group(function () {
    //teacher(see the details of exam)
    Route::get('/exam/show/{exam_id}', 'show');
    //teacher create exam
    Route::get('/exam/create', 'create');
    Route::post('/exam/store', 'store');
    //student(show his exam in that subject)
    Route::get('/exam/show/{classID}/{studentID}', 'showExamsForStudnet');

});
//remove to student route file
Route::controller(StudentExamController::class)->group(function () {
    //student(show his exam in that subject)
    Route::get('/std/exam/show/{classID}/{studentID}', 'showExamsForStudnet');
    //student(view the remaining time to start exam)
    Route::get('/std/exam/class/examIndex/{classID}/{examID}', 'showExamDetails')->name('examDetails');
    //student(attend the exam)
    Route::get('/std/exam/class/{classID}/{examID}', 'showExamQuestions');
//student (see the result)
    Route::get('/std/exam/class/OldExam/{classID}/{examID}', 'showAnswersForStudent');
});

//deal with questions file(excel file)
Route::get('/file-import/{examcode}', [ExamController::class, 'importView'])->name('import-view');
Route::post('/import', [ExamController::class, 'import'])->name('import');

Route::controller(TeacherProfileController::class)->group(function () {
    Route::get('/teacherprofile/{teacherId}', 'getProfileData');
    Route::get('/requestSubjcteStudent/{teacherID}/{classID}/{subjectID}', 'getSubjcteForTeacher');
    Route::post('/acceptStudent/{stdClassID}', 'acceptStudent');
    Route::post('/rejectStudent/{stdClassID}', 'rejectStudent');

});
Route::controller(TeacherProfileController::class)->group(function () {
    Route::get('/teacher_profile/{teacherId}', 'getdata')->name('teacher_panel');
});
