<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Database\Eloquent\Collection;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::get()->sortBy('id');
        $pageName = 'Quản lý hãng';

        return view('admin.brand.index', compact('brands', 'pageName'));
    }

    public function addBrand()
    {
        $pageName = 'Thêm hãng';
        $update = NULL;

        return view('admin.brand.add', compact('pageName', 'update'));
    }

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
        $add->status = $data->status;
        $add->save();

        return redirect()->route('listBrands');
    }

    public function updateBrand($id)
    {
        $update = Brand::find($id);
        $pageName = 'Chỉnh sửa hãng';

        return view('admin.brand.add', compact('update', 'pageName'));
    }

    public function handleUpdateBrand(UpdateBrandRequest $data, $id)
    {
        $update = Brand::find($id);

        if ($data->photo != NULL) {
            if($update['photo'] != NULL) {
                $removeFile = public_path('upload/brand/'.$update['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->photo;
            $imageName = time() . '.' . $images->extension();
            $images->move(public_path('upload/brand'), $imageName);
            $update->photo = $imageName;
        }
        $update->name = $data->name;
        $update->status = $data->status;
        $update->save();

        return redirect()->route('listBrands');
    }

    public function deleteBrand($id)
    {
        $delete = Brand::find($id);
        if($delete['photo'] != NULL) {
            $removeFile = public_path('upload/brand/'.$delete['photo']);
            if(file_exists($removeFile)) {
                unlink($removeFile);
            }
        }
        $delete->delete();
        return redirect()->route('listBrands')->with('success', 'Xóa dữ liệu thành công');
    }
}
