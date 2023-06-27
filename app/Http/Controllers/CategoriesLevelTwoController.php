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

    public function handleAddCategory(CategoryTwoRequest $data) {

        $add = new Categories_level_two;
        $data->validate(
            [
                'name_cate_two' => 'unique:categories_level_twos,name',
            ],
            [
                'name_cate_two.unique' => 'Tên danh mục bị trùng',
            ]
        );
        if($data->photo_cate_two != NULL) {
            $images = $data->photo_cate_two;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/category'), $imageName);
            $add->photo = $imageName;
        }    
        $add->name = $data->name_cate_two;
        $add->status = $data->status_cate_two;
        $add->id_cate_one = $data->cate_product_one;
        $add->save();
        return redirect()->route('category_two');
    }

    public function loadUpdateCategory($id) {
        $update = Categories_level_two::find($id);
        $cate_one = Category::get()->sortBy('id');
        $pageName = 'Chỉnh sửa danh mục cấp 2';

        if ($update == null) {
            return view('products');
        } else {
            return view('admin.category_two.add', compact('pageName','update','cate_one'));
        }
    }

    public function handleUpdateCategory(CategoryTwoRequest $data, $id) {

        $add = Categories_level_two::find($id);
        if($add->name == $data->name_cate_two) {
            if($data->photo_cate_two != NULL) {
                if($add['photo'] != NULL) {
                    $removeFile = public_path('upload/category/'.$add['photo']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_cate_two;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/category'), $imageName);
                $add->photo = $imageName;
            }    
            $add->name = $data->name_cate_two;
            $add->status = $data->status_cate_two;
            $add->id_cate_one = $data->cate_product_one;
        } else {
            $data->validate(
                [
                    'name_cate_two' => 'unique:categories_level_twos,name',
                ],
                [
                    'name_cate_two.unique' => 'Tên danh mục bị trùng',
                ]
            );
            if($data->photo_cate_two != NULL) {
                $removeFile = public_path('upload/category/'.$add['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
                $images = $data->photo_cate_two;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/category'), $imageName);
                $add->photo = $imageName;
            }    
            $add->name = $data->name_cate_two;
            $add->status = $data->status_cate_two;
            $add->id_cate_one = $data->cate_product_one;
        }
        $add->save();
        return redirect()->route('category_two');
    }

    public function deleteCategory($id) {
        $dlt = Categories_level_two::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('category_two');
        } else {
            if($dlt['photo']) {
                $removeFile = public_path('upload/category/'.$dlt['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('category_two');
        }
    }
}
