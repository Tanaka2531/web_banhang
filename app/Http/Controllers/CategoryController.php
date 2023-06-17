<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $categories = Category::get()->sortBy('id');
        $pageName = 'Quản lý danh mục';

        return view('admin.category.index', compact('categories', 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addCategory()
    {
        $pageName = 'Thêm danh mục';
        $update = NULL;

        return view('admin.category.add', compact('pageName', 'update'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function handleAddCategory(StoreCategoryRequest $data)
    {
        $add = new Category();

        if ($data->photo != NULL) {
            $data->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->photo;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/category'), $imageName);
            $add->photo = $imageName;
        }
        $add->name = $data->name;
        $add->save();
        return redirect()->route('listCategories', 'validated');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateCategory($id)
    {
        $update = Category::find($id);
        $pageName = 'Chỉnh sửa danh mục';

        return view('admin.category.add', compact('update', 'pageName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function handleUpdateCategory(UpdateCategoryRequest $data, $id)
    {
        $update = Category::find($id);

        if ($data->photo != NULL) {
            $data->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->photo;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/category'), $imageName);
            $update->photo = $imageName;
        }
        $update->name = $data->name;
        $update->save();
        return redirect()->route('listCategories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCategory($id)
    {
        $delete = Category::find($id);

        $delete->delete();
        return redirect()->route('listCategories')->with('success', 'Xóa dữ liệu thành công');
    }
}
