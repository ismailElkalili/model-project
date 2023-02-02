<?php

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