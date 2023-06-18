<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get()->sortBy('id');
        $pageName = 'Quản lý hãng';

        return view('admin.brand.index', compact('brands', 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addBrand()
    {
        $pageName = 'Thêm hãng';
        $update = NULL;

        return view('admin.brand.add', compact('pageName', 'update'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function handleAddBrand(StoreBrandRequest $data)
    {
        $add = new Brand();

        if ($data->photo != NULL) {
            $data->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->photo;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/brand'), $imageName);
            $add->photo = $imageName;
        }
        $add->name = $data->name;
        $add->save();
        return redirect()->route('listBrands');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateBrand($id)
    {
        $update = Brand::find($id);
        $pageName = 'Chỉnh sửa hãng';

        return view('admin.brand.add', compact('update', 'pageName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function handleUpdateBrand(UpdateBrandRequest $data, $id)
    {
        $update = Brand::find($id);

        if ($data->photo != NULL) {
            $data->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->photo;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/brand'), $imageName);
            $update->photo = $imageName;
        }
        $update->name = $data->name;
        $update->save();
        return redirect()->route('listBrands');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteBrand($id)
    {
        $delete = Brand::find($id);

        $delete->delete();
        return redirect()->route('listBrands')->with('success', 'Xóa dữ liệu thành công');
    }
}
