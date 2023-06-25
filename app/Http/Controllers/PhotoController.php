<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;

class PhotoController extends Controller
{
    public function index($type,$cate) {
        $pageName = 'Quản lý HÌnh Ảnh';
        if($cate == 'man') {
            $photo = Photo::where('type',$type)->get();
            return view('admin.photo.index', compact('photo','pageName'));
        } else {
            $photo = Photo::find($type);
            return view('admin.photo_static.add', compact('photo','pageName'));
        }
    }

    public function loadAddPhoto($type,$cate) {
        $pageName = 'Thêm HÌnh Ảnh';
        $update = null;
        if($cate == 'man') {
            return view('admin.photo.add', compact('pageName','update'));
        }
    }
}
