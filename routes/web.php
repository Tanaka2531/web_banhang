<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/add', [ProductController::class, 'loadAddProducts'])->name('loadaddproducts');
Route::post('/products/add', [ProductController::class, 'handleAddProducts'])->name('handleaddproducts');
Route::get('/products/update/{id}', [ProductController::class, 'loadUpdateProducts'])->name('loadupdateproducts');
Route::post('/products/update/{id}', [ProductController::class, 'handleUpdateProducts'])->name('handleupdateproducts');
Route::get('/products/delete/{id}', [ProductController::class, 'deleteProducts'])->name('deleteproducts');
