<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MemberController;


Route::get('/', function () {
    return view('admin.index')->with(['pageName' => 'Trang quản trị']);
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/add', [ProductController::class, 'loadAddProducts'])->name('loadaddproducts');
Route::post('/products/add', [ProductController::class, 'handleAddProducts'])->name('handleaddproducts');
Route::get('/products/update/{id}', [ProductController::class, 'loadUpdateProducts'])->name('loadupdateproducts');
Route::post('/products/update/{id}', [ProductController::class, 'handleUpdateProducts'])->name('handleupdateproducts');
Route::get('/products/delete/{id}', [ProductController::class, 'deleteProducts'])->name('deleteproducts');
Route::get('/products/search', [ProductController::class, 'searchProducts'])->name('searchproducts');

Route::get('/sizes', [SizeController::class, 'index'])->name('sizes');
Route::get('/sizes/add', [SizeController::class, 'loadAddSizes'])->name('loadaddsizes');
Route::post('/sizes/add', [SizeController::class, 'handleAddSizes'])->name('handleaddsizes');
Route::get('/sizes/update/{id}', [SizeController::class, 'loadUpdateSizes'])->name('loadupdatesizes');
Route::post('/sizes/update/{id}', [SizeController::class, 'handleUpdateSizes'])->name('handleupdatesizes');
Route::get('/sizes/delete/{id}', [SizeController::class, 'deleteSizes'])->name('deletesizes');

Route::get('/colors', [ColorController::class, 'index'])->name('colors');
Route::get('/colors/add', [ColorController::class, 'loadAddColors'])->name('loadaddcolors');
Route::post('/colors/add', [ColorController::class, 'handleAddColors'])->name('handleaddcolors');
Route::get('/colors/update/{id}', [ColorController::class, 'loadUpdateColors'])->name('loadupdatecolors');
Route::post('/colors/update/{id}', [ColorController::class, 'handleUpdateColors'])->name('handleupdatecolors');
Route::get('/colors/delete/{id}', [ColorController::class, 'deleteColors'])->name('deletecolors');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/add', [BlogController::class, 'loadAddBlogs'])->name('loadaddblogs');
Route::post('/blogs/add', [BlogController::class, 'handleAddBlogs'])->name('handleaddblogs');
Route::get('/blogs/update/{id}', [BlogController::class, 'loadUpdateBlogs'])->name('loadupdateblogs');
Route::post('/blogs/update/{id}', [BlogController::class, 'handleUpdateBlogs'])->name('handleupdateblogs');
Route::get('/blogs/delete/{id}', [BlogController::class, 'deleteBlogs'])->name('deleteblogs');

Route::get('/member_admins', [MemberController::class, 'index'])->name('member_admins');
Route::get('/member_admins/add', [MemberController::class, 'loadAddMember_admins'])->name('loadaddmember_admins');
Route::post('/member_admins/add', [MemberController::class, 'handleAddMember_admins'])->name('handleaddmember_admins');
Route::get('/member_admins/update/{id}', [MemberController::class, 'loadUpdateMember_admins'])->name('loadupdatemember_admins');
Route::post('/member_admins/update/{id}', [MemberController::class, 'handleUpdateMember_admins'])->name('handleupdatemember_admins');
Route::get('/member_admins/delete/{id}', [MemberController::class, 'deleteMember_admins'])->name('deletemember_admins');

// Category
Route::controller(CategoryController::class)->group(function () {
    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('listCategories');
        Route::get('add', [CategoryController::class, 'addCategory'])->name('loadAddCategory');
        Route::post('add', [CategoryController::class, 'handleAddCategory'])->name('handleAddCategory');
        Route::get('update/{id}', [CategoryController::class, 'updateCategory'])->name('loadUpdateCategory');
        Route::patch('update/{id}', [CategoryController::class, 'handleUpdateCategory'])->name('handleUpdateCategory');
        Route::get('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    });
});

// Brand
Route::controller(BrandController::class)->group(function () {
    Route::prefix('/brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('listBrands');
        Route::get('add', [BrandController::class, 'addBrand'])->name('loadAddBrand');
        Route::post('add', [BrandController::class, 'handleAddBrand'])->name('handleAddBrand');
        Route::get('update/{id}', [BrandController::class, 'updateBrand'])->name('loadUpdateBrand');
        Route::patch('update/{id}', [BrandController::class, 'handleUpdateBrand'])->name('handleUpdateBrand');
        Route::get('delete/{id}', [BrandController::class, 'deleteBrand'])->name('deleteBrand');
    });
});
