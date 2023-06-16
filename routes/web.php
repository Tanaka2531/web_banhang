<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/add', [ProductController::class, 'loadAddProducts'])->name('loadaddproducts');
Route::post('/products/add', [ProductController::class, 'handleAddProducts'])->name('handleaddproducts');
Route::get('/products/update/{id}', [ProductController::class, 'loadUpdateProducts'])->name('loadupdateproducts');
Route::post('/products/update/{id}', [ProductController::class, 'handleUpdateProducts'])->name('handleupdateproducts');
Route::get('/products/delete/{id}', [ProductController::class, 'deleteProducts'])->name('deleteproducts');

Route::get('/sizes', [SizeController::class, 'index'])->name('sizes');
Route::get('/sizes/add', [SizeController::class, 'loadAddSizes'])->name('loadaddsizes');
Route::post('/sizes/add', [SizeController::class, 'handleAddSizes'])->name('handleaddsizes');
Route::get('/sizes/update/{id}', [SizeController::class, 'loadUpdateSizes'])->name('loadupdatesizes');
Route::post('/sizes/update/{id}', [SizeController::class, 'handleUpdateSizes'])->name('handleupdatesizes');
Route::get('/sizes/delete/{id}', [SizeController::class, 'deleteSizes'])->name('deletesizes');