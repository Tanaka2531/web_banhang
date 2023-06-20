<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MemberController;


// Route::get('/', function () {
//     return view('admin.index')->with(['pageName' => 'Trang quản trị']);
// });

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', function () {
        return 'Đăng nhập';
    });
});

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index')->with(['pageName' => 'Trang quản trị']);
    });

    Route::controller(ProductController::class)->group(function () {
        Route::prefix('/products')->group(function () {
            Route::get('/', 'index')->name('products');
            Route::get('add', 'loadAddProducts')->name('loadaddproducts');
            Route::post('add', 'handleAddProducts')->name('handleaddproducts');
            Route::get('update/{id}', 'loadUpdateProducts')->name('loadupdateproducts');
            Route::post('update/{id}', 'handleUpdateProducts')->name('handleupdateproducts');
            Route::get('delete/{id}', 'deleteProducts')->name('deleteproducts');
            Route::get('search', 'searchProducts')->name('searchproducts');
        });
    });

    Route::controller(SizeController::class)->group(function () {
        Route::prefix('/sizes')->group(function () {
            Route::get('/', 'index')->name('sizes');
            Route::get('add', 'loadAddSizes')->name('loadaddsizes');
            Route::post('add', 'handleAddSizes')->name('handleaddsizes');
            Route::get('update/{id}', 'loadUpdateSizes')->name('loadupdatesizes');
            Route::post('update/{id}', 'handleUpdateSizes')->name('handleupdatesizes');
            Route::get('delete/{id}', 'deleteSizes')->name('deletesizes');
        });
    });

    Route::controller(ColorController::class)->group(function () {
        Route::prefix('/colors')->group(function () {
            Route::get('/', 'index')->name('colors');
            Route::get('add', 'loadAddColors')->name('loadaddcolors');
            Route::post('add', 'handleAddColors')->name('handleaddcolors');
            Route::get('update/{id}', 'loadUpdateColors')->name('loadupdatecolors');
            Route::post('update/{id}', 'handleUpdateColors')->name('handleupdatecolors');
            Route::get('delete/{id}', 'deleteColors')->name('deletecolors');
        });
    });

    Route::controller(BlogController::class)->group(function () {
        Route::prefix('/blogs')->group(function () {
            Route::get('/', 'index')->name('blogs');
            Route::get('add', 'loadAddBlogs')->name('loadaddblogs');
            Route::post('add', 'handleAddBlogs')->name('handleaddblogs');
            Route::get('update/{id}', 'loadUpdateBlogs')->name('loadupdateblogs');
            Route::post('update/{id}', 'handleUpdateBlogs')->name('handleupdateblogs');
            Route::get('delete/{id}', 'deleteBlogs')->name('deleteblogs');
        });
    });

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
            Route::get('/', 'index')->name('listBrands');
            Route::get('add', 'addBrand')->name('loadAddBrand');
            Route::post('add', 'handleAddBrand')->name('handleAddBrand');
            Route::get('update/{id}', 'updateBrand')->name('loadUpdateBrand');
            Route::patch('update/{id}', 'handleUpdateBrand')->name('handleUpdateBrand');
            Route::get('delete/{id}', 'deleteBrand')->name('deleteBrand');
        });
    });
});
