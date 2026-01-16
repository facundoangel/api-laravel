<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoController;

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

Route::get('/', function () {
    return view('inicio');
});

Route::get('/about', function () {
    return view('nosotros');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/producto',[productoController::class,'showProducts'])->name('producto');

Route::get('api/producto',[productoController::class,'showProductsApi'])->name('producto.api');

Route::post('/form', [productoController::class, 'index']);