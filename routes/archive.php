<?php

use App\Http\Controllers\Archive\ClassArchiveController;
use App\Http\Controllers\Archive\ExamArchiveController;
use App\Http\Controllers\Archive\LevelArchiveController;
use App\Http\Controllers\Archive\StdSubsArchiveController;
use App\Http\Controllers\Archive\StudentArchiveController;
use App\Http\Controllers\Archive\SubjectArchiveController;
use App\Http\Controllers\Archive\SubscribitionArchiveController;
use App\Http\Controllers\Archive\TeacherArchiveController;
use Illuminate\Support\Facades\Route;

Route::controller(ClassArchiveController::class)->group(function () {
    Route::get('/archive/class_archive', 'indexClassArchive');
    Route::post('/class_archive/destroy/{classesID}', 'destroy');
    Route::post('/class_archive/archive/{classesID}', 'archive');
    Route::post('/class_archive/restore/{classesID}', 'restore');
});

Route::controller(ExamArchiveController::class)->group(function () {
    Route::get('/archive/exam_archive', 'indexExamArchive');
    Route::post('/exam_archive/destroy/{examID}', 'destroy');
    Route::post('/exam_archive/archive/{examID}', 'archive');
    Route::post('/exam_archive/restore/{examID}', 'restore');
});

Route::controller(LevelArchiveController::class)->group(function () {
    Route::get('/archive/level_archive', 'indexTeacherArchive');
    Route::post('/level_archive/destroy/{levelID}', 'destroy');
    Route::post('/level_archive/archive/{levelID}', 'archive');
    Route::post('/level_archive/restore/{levelID}', 'restore');
});

Route::controller(StdSubsArchiveController::class)->group(function () {
    Route::get('/archive/std_subs_archive', 'indexStdSubsArchive');
    Route::post('/std_subs_archive/destroy/{stdSubsID}', 'destroy');
    Route::post('/std_subs_archive/archive/{stdSubsID}', 'archive');
    Route::post('/std_subs_archive/restore/{stdSubsID}', 'restore');
});

Route::controller(StudentArchiveController::class)->group(function () {
    Route::get('/archive/student_archive', 'indexStudentArchive');
    Route::post('/student_archive/destroy/{studentID}', 'destroy');
    Route::post('/student_archive/archive/{studentID}', 'archive');
    Route::post('/student_archive/restore/{studentID}', 'restore');
});

Route::controller(SubjectArchiveController::class)->group(function () {
    Route::get('/archive/subject_archive', 'indexSubjectArchive');
    Route::post('/subject_archive/destroy/{subjectID}', 'destroy');
    Route::post('/subject_archive/archive/{subjectID}', 'archive');
    Route::post('/subject_archive/restore/{subjectID}', 'restore');
});

Route::controller(SubscribitionArchiveController::class)->group(function () {
    Route::get('/archive/subscribition_archive', 'indexSubscribionArchive');
    Route::post('/subscribition_archive/destroy/{subscribitionID}', 'destroy');
    Route::post('/subscribition_archive/archive/{subscribitionID}', 'archive');
    Route::post('/subscribition_archive/restore/{subscribitionID}', 'restore');
});

Route::controller(TeacherArchiveController::class)->group(function () {
    Route::get('/archive/teacher_archive', 'indexTeacherArchive');
    Route::post('/teacher_archive/destroy/{teacherID}', 'destroy');
    Route::post('/teacher_archive/archive/{teacherID}', 'archive');
    Route::post('/teacher_archive/restore/{teacherID}', 'restore');
});
