<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});
Route::controller(HotelController::class)->prefix('hotels')->group(function(){
    Route::get('index', 'index');
    Route::post('create', 'store');
    Route::put('update/{hotel}', 'update');
    Route::put('destroy/{hotel}', 'destroy');
});
Route::controller(RoomController::class)->prefix('rooms')->group(function(){
    Route::get('index', 'index');
    Route::post('create', 'store');
    Route::put('update/{room}', 'update');
    Route::put('destroy/{room}', 'destroy');
});
Route::controller(RoomTypeController::class)->prefix('roomtypes')->group(function(){
    Route::get('index', 'index');
    Route::get('show/{roomType}', 'show');
});
Route::controller(DepartmentController::class)->prefix('deptos')->group(function(){
    Route::get('index', 'index');
});
Route::controller(CityController::class)->prefix('ciudades')->group(function(){
    Route::get('index', 'index');
});