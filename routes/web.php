<?php

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

Route::get('/', [\App\Http\Controllers\RoomsController::class, 'index']);
Route::get('/room/create', [\App\Http\Controllers\RoomsController::class, 'create']);
Route::post('/room', [\App\Http\Controllers\RoomsController::class, 'store']);
Route::get('/room/{room}', [\App\Http\Controllers\RoomsController::class, 'show']);

Route::post('room/toggleVideoPlayer', [\App\Http\Controllers\RoomsController::class, 'toggleVideoPlayer']);
Route::get('room/toggleVideoPlayer', [\App\Http\Controllers\RoomsController::class, 'getStatus']);
