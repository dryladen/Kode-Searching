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
Route::get('/login',[UserController::class,'index']);
Route::post('/login',[UserController::class,'login']);
Route::get('/templates/search/', [TemplatesController::class,'show']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard',[UserController::class,'dashboard']);
    Route::controller(TemplatesController::class)->group(function () {
        Route::get('/templates', 'index');
        Route::post('/templates/create', 'store');
        Route::post('/templates/update/{id}', 'update');
        Route::post('/templates/delete/{id}', 'destroy');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'data');
        Route::post('/users/create', 'store');
        Route::post('/users/update/{id}', 'update');
        Route::post('/users/delete/{id}', 'destroy');
    });
    Route::get('/logout',[UserController::class,'logout']);
});
