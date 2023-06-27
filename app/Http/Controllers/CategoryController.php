<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use GuzzleHttp\Psr7\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get()->sortBy('id');
        $pageName = 'Quản lý danh mục';

        return view('admin.category.index', compact('categories', 'pageName'));
    }

    public function addCategory()
    {
        $pageName = 'Thêm danh mục';
        $update = NULL;

        return view('admin.category.add', compact('pageName', 'update'));
    }

    public function handleAddCategory(StoreCategoryRequest $data)
    {
        $add = new Category();

        if ($data->photo != NULL) {
            $images = $data->photo;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/category'), $imageName);
            $add->photo = $imageName;
        }
        $add->name = $data->name;
        $add->status = $data->input('status');
        $add->save();

        return redirect()->route('listCategories');
    }

    public function updateCategory($id)
    {
        $update = Category::find($id);
        $pageName = 'Chỉnh sửa danh mục';

        return view('admin.category.add', compact('update', 'pageName'));
    }

    public function handleUpdateCategory(UpdateCategoryRequest $data, $id)
    {
        $update = Category::find($id);

        if ($data->photo != NULL) {
            if($update['photo'] != NULL) {
                $removeFile = public_path('upload/category/'.$update['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $data->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->photo;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/category'), $imageName);
            $update->photo = $imageName;
        }
        $update->name = $data->name;
        $update->status = $data->status;
        $update->save();

        return redirect()->route('listCategories');
    }

    public function deleteCategory($id)
    {
        $delete = Category::find($id);
        if($delete['photo']) {
            $removeFile = public_path('upload/category/'.$delete['photo']);
            if(file_exists($removeFile)) {
                unlink($removeFile);
            }
        }
        $delete->delete();
        return redirect()->route('listCategories')->with('success', 'Xóa dữ liệu thành công');
    }

    public function deleteAllCategory(UpdateCategoryRequest $data)
    {

        return $data;

        foreach ($data as $id) {
            $delete = Category::find($id);
        }

        $delete->delete();
        return redirect()->route('listCategories')->with('success', 'Xóa dữ liệu thành công');
    }
}
