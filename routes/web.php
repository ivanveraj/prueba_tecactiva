<?php

use App\Http\Controllers\ProductsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('products/list_products');
    })->name('dashboard')->middleware('validacion');
    Route::get('/policy', function () {
        return view('dashboard');
    })->middleware('validacion');
    Route::middleware(['validacion'])->group(function () {
        Route::get('admin/productos', [ProductsController::class, 'index'])->name('list_products');
    });
});
