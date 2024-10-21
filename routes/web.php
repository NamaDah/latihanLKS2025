<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', CategoryController::class);
// PUT or PATCH request to /category/{id}
// Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
// Route::put('/category/edit/{id}', [CategoryController::class, 'update']);
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');






Route::resource('product', ProductController::class);
