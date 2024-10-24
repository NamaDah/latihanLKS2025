<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::get('login', [AuthController::class, 'authenticate']);

Route::resource('category', CategoryController::class);
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/images/{filename}', [ProductController::class, 'show'])->name('image.show');




Route::resource('product', ProductController::class);
Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
