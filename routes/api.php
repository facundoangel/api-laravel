<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\noteController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\saleController;
use App\Http\Controllers\authController;

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


Route::middleware('auth:sanctum')->resource('/sales',saleController::class);



Route::post('/login', [authController::class, 'login']); // Action to log in
Route::get('/login', function () {
    return response()->json(['status' => 'error', 'message' => 'No autorizado'], 401);
})->name('login'); // Redirection target for unauthenticated users


Route::post('/register',[authController::class,'createUser'])->name('register');
Route::middleware('auth:sanctum')->post('/logout',[authController::class,'logout'])->name('logout');