<?php

use App\Http\Controllers\Exam\ExamController;
use Illuminate\Support\Facades\Route;

Route::controller(ExamController::class)->group(function () {

    Route::get('/exam/create', 'create');
    Route::post('/exam/store', 'store');
});


Route::get('/file-import', [
    ExamController::class,
    'importView'
])->name('import-view');
Route::post('/import', [
    ExamController::class,
    'import'
])->name('import');