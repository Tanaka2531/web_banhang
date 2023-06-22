<?php

namespace App\Http\Controllers;

use App\Models\Categories_level_two;
use App\Models\Category;
use App\Http\Requests\StoreCategories_level_twoRequest;
use App\Http\Requests\UpdateCategories_level_twoRequest;
use App\Http\Requests\CategoryTwoRequest;


class CategoriesLevelTwoController extends Controller
{
    public function index()
    {
        $pageName = 'Quản lý Dang mục cấp 2';
        $category_two = Categories_level_two::get()->sortBy('id');
        return view('admin.category_two.index', compact('category_two','pageName'));
    }

    public function loadAddCategory()
    {
        $pageName = 'Thêm danh mục cấp 2';
        $cate_one = Category::get()->sortBy('id');
        $update = NULL;

        return view('admin.category_two.add', compact('pageName', 'update','cate_one'));
    }
}
