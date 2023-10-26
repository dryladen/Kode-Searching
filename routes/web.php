<?php

use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('guest');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login',[UserController::class,'index']);

Route::controller(TemplatesController::class)->group(function () {
    Route::get('/templates', 'index');
    Route::post('/templates/create', 'store');
    Route::post('/templates/update/{id}', 'update');
    Route::post('/templates/delete/{id}', 'destroy');
    Route::get('/templates/search/', 'show');
});
