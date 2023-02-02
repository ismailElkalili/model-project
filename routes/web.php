<?php

use App\Http\Controllers\Subscribition\SubscribtionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dash', function () {
    return view('dashboard');
});
Route::get('/', function () {
    return view('main');
});
require __DIR__ . '/teacher_route.php';
require __DIR__ . '/student_route.php';
require __DIR__ . '/admin.php';



