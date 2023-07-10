<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CategoryMemberController;
use App\Http\Controllers\CategoriesLevelTwoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\Clients\IndexController;

Route::prefix('/')->group(function () {
    Route::controller(IndexController::class)->group(function () {
        Route::get('/', 'index')->name('clientIndex');
        Route::get('danh-muc/{name_list}/{id_list}', 'categoryListPage')->name('categoriesList');
        Route::get('danh-muc/{name_list}/{id_list}/{name_cat}/{id_cat}', 'categoryCatPage')->name('categoriesCat');
        Route::get('san-pham/{id}', 'productDetail')->name('productDetailPage');
    });
    Route::get('/login', function () {
        return view('client.account.login');
    })->name('clientLogin');
    Route::get('/register', function () {
        return view('client.account.register');
    })->name('clientRegister');
});

// Auth::routes();

Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::post('/admin/login', [LoginController::class, 'handleLogin'])->name('handlelogin');

Route::prefix('/admin')->group(function () {
    Route::group(['middleware' => ['checkauth:admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/admin/logout', [LoginController::class, 'handleLoout'])->name('handlelogout');

        Route::get('ajax_loadcate', [AjaxController::class, 'ajax_loadCate'])->name('ajax_loadcate');
        Route::get('ajax_loadproduct', [AjaxController::class, 'ajax_loadProduct'])->name('ajax_loadproduct');
        Route::get('ajax_loadproduct_brand', [AjaxController::class, 'ajax_loadProduct_Brand'])->name('ajax_loadproduct_brand');
        Route::get('ajax_deletegallery', [AjaxController::class, 'ajax_deleteGallery'])->name('ajax_deletegallery');
        Route::get('ajax_loadstatus', [AjaxController::class, 'ajax_loadStatus'])->name('ajax_loadstatus');
        Route::get('ajax_loadstatushot', [AjaxController::class, 'ajax_loadStatusHot'])->name('ajax_loadstatushot');
        Route::get('ajax_loadstatuscate', [AjaxController::class, 'ajax_loadStatusCate'])->name('ajax_loadstatuscate');
        Route::get('ajax_loadstatusblog', [AjaxController::class, 'ajax_loadStatusBlog'])->name('ajax_loadstatusblog');
        Route::get('ajax_loadstatusbrand', [AjaxController::class, 'ajax_loadStatusBrand'])->name('ajax_loadstatusbrand');
        Route::get('ajax_loadstatuscateone', [AjaxController::class, 'ajax_loadStatusCateOne'])->name('ajax_loadstatuscateone');
        Route::get('ajax_loadstatuscatemember', [AjaxController::class, 'ajax_loadStatusCateMember'])->name('ajax_loadstatuscatemember');

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

        Route::controller(OrderController::class)->group(function () {
            Route::prefix('/orders')->group(function () {
                Route::get('/', 'index')->name('orders');
                Route::get('load_views', 'loadViews')->name('loadviews');
                Route::get('detail/{id}', 'loadOrder')->name('loadorder');
                Route::get('detail/{id}', 'handleOrder')->name('handleorder');
                Route::get('delete/{id}', 'deleteOrder')->name('deleteorder');
                Route::get('search', 'searchOrder')->name('searchorder');              
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
                Route::get('search', 'searchSize')->name('searchsize');
            });
        });

        Route::controller(StatisticalController::class)->group(function () {
            Route::prefix('/statistical')->group(function () {
                Route::get('/', 'index')->name('statistical');
                Route::get('details/{type}', 'loadStatistical')->name('loadstatistical');
                Route::get('details_cate/{type}', 'loadStatisticalCate')->name('loadstatisticalcate');
                Route::post('details_cate/{type}', 'handleStatisticalCate')->name('handlestatisticalcate');
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
                Route::get('search', 'searchColor')->name('searchcolor');
            });
        });

        Route::controller(BlogController::class)->group(function () {
            Route::prefix('/blogs')->group(function () {
                Route::get('/{type}', 'index')->name('blogs');
                Route::get('add/{type}', 'loadAddBlogs')->name('loadaddblogs');
                Route::post('add/{type}', 'handleAddBlogs')->name('handleaddblogs');
                Route::get('update/{id}/{type}', 'loadUpdateBlogs')->name('loadupdateblogs');
                Route::post('update/{id}/{type}', 'handleUpdateBlogs')->name('handleupdateblogs');
                Route::get('delete/{id}/{type}', 'deleteBlogs')->name('deleteblogs');
                Route::get('search/{type}', 'searchBlogs')->name('searchblogs');
            });
        });

        Route::controller(MemberController::class)->group(function () {
            Route::prefix('/member_admins')->group(function () {
                Route::get('/', 'index')->name('member_admins');
                Route::get('add', 'loadAddMember_admins')->name('loadaddmember_admins');
                Route::post('add', 'handleAddMember_admins')->name('handleaddmember_admins');
                Route::get('update/{id}', 'loadUpdateMember_admins')->name('loadupdatemember_admins');
                Route::post('update/{id}', 'handleUpdateMember_admins')->name('handleupdatemember_admins');
                Route::get('delete/{id}', 'deleteMember_admins')->name('deletemember_admins');
            });
        });

        Route::controller(CategoryMemberController::class)->group(function () {
            Route::prefix('/cate_members')->group(function () {
                Route::get('/', 'index')->name('cate_members');
                Route::get('add', 'loadAddCate_Member')->name('loadaddcate_member');
                Route::post('add', 'handleAddCate_Member')->name('handleaddcate_member');
                Route::get('update/{id}', 'loadUpdateCate_Member')->name('loadupdatecate_member');
                Route::post('update/{id}', 'handleUpdateCate_Member')->name('handleupdatecate_member');
                Route::get('delete/{id}', 'deleteCate_Member')->name('deletecate_member');
            });
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::prefix('/categories')->group(function () {
                Route::get('/', 'index')->name('listCategories');
                Route::get('add', 'addCategory')->name('loadAddCategory');
                Route::post('add', 'handleAddCategory')->name('handleAddCategory');
                Route::get('update/{id}', 'updateCategory')->name('loadUpdateCategory');
                Route::patch('update/{id}', 'handleUpdateCategory')->name('handleUpdateCategory');
                Route::get('delete/{id}', 'deleteCategory')->name('deleteCategory');
                Route::get('search', 'searchCate')->name('searchcate');
            });
        });

        Route::controller(CategoriesLevelTwoController::class)->group(function () {
            Route::prefix('/category_two')->group(function () {
                Route::get('/', 'index')->name('category_two');
                Route::get('add', 'loadAddCategory')->name('loadaddcategory_two');
                Route::post('add', 'handleAddCategory')->name('handleaddcategory_two');
                Route::get('update/{id}', 'loadUpdateCategory')->name('loadupdatecategory_two');
                Route::post('update/{id}', 'handleUpdateCategory')->name('handleupdatecategory_two');
                Route::get('delete/{id}', 'deleteCategory')->name('deletecategory_two');
                Route::get('search', 'searchCatetwo')->name('searchcatetwo');
            });
        });

        Route::controller(BrandController::class)->group(function () {
            Route::prefix('/brand')->group(function () {
                Route::get('/', 'index')->name('listBrands');
                Route::get('add', 'addBrand')->name('loadAddBrand');
                Route::post('add', 'handleAddBrand')->name('handleAddBrand');
                Route::get('update/{id}', 'updateBrand')->name('loadUpdateBrand');
                Route::patch('update/{id}', 'handleUpdateBrand')->name('handleUpdateBrand');
                Route::get('delete/{id}', 'deleteBrand')->name('deleteBrand');
                Route::get('search', 'searchBrand')->name('searchbrand');
            });
        });

        Route::controller(PhotoController::class)->group(function () {
            Route::prefix('/photo')->group(function () {
                Route::get('/{type}/{cate}', 'index')->name('photo');
                Route::get('add/{type}/{cate}', 'loadAddPhoto')->name('loadaddphoto');
                Route::post('add/{type}/{cate}', 'handleAddPhoto')->name('handleaddphoto');
                Route::get('update/{id}/{type}/{cate}', 'loadUpdatPhoto')->name('loadupdatphoto');
                Route::post('update/{id}/{type}/{cate}', 'handleUpdatPhoto')->name('handleupdatphoto');
                Route::get('delete/{id}/{type}/{cate}', 'deletPhoto')->name('deletphoto');
            });
        });
    });
});
