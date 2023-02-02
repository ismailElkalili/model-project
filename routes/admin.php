<?php

use App\Http\Controllers\Subject\LevelController;
use App\Http\Controllers\Subscribition\SubscribtionController;
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