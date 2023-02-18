<?php

use App\Http\Controllers\Exam\ExamController;
use Illuminate\Support\Facades\Route;

Route::controller(ExamController::class)->group(function () {
    Route::get('/exam/show/{exam_id}', action: 'show');

    Route::get('/exam/create', action: 'create');
    Route::post('/exam/store', action: 'store');
});


Route::get('/file-import/{examcode}', [
    ExamController::class,
    'importView'
])->name('import-view');
Route::post('/import', [
    ExamController::class,
    'import'
])->name('import');