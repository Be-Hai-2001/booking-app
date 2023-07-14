<?php

use App\Http\Controllers\Clients\ChartController;
use App\Http\Controllers\Clients\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('checkSelectAPI',[IndexController::class,'checkSelectAPI'])->name('checkSelectAPI');


Route::get('/getRoomtypeJsonAPI',[IndexController::class,'getRoomtypeJsonAPI'])->name('getRoomtypeJsonAPI');

Route::get('/getSeverceRoomApi',[IndexController::class,'getSeverceRoomApi'])->name('getSeverceRoomApi');

Route::post('/apiPayment',[IndexController::class,'apiPayment'])->name('apiPayment');

Route::get('/getHotelStatisticsApi', [ChartController::class, 'getHotelStatisticsApi']);

Route::put('/admin/update-trang-thai-user/{id}', [IndexController::class, 'updateUser']);

Route::get('/admin/get-user-all', [IndexController::class, 'getUserAll']);





