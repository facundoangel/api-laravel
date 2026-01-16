<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\saleController;
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



Route::resource('/note', noteController::class);

Route::get('/customer',[customerController::class,'index']);
Route::post('/customer',[customerController::class,'store']);


Route::resource('/sales',saleController::class);