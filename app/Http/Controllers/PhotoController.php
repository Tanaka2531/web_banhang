<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class PhotoController extends Controller
{
    public function index($type,$cate) {
        $pageName = 'Quản lý Hình Ảnh';
        if($cate == 'man') {
            $photo = Photo::where('type',$type)->get();
            $type_man = $type;
            return view('admin.photo.index', compact('photo','pageName','type_man'));
        } else if($cate == 'static') {
            $type_man = $type;            
            $photo = Photo::where('type',$type)->get()->toArray();
            if($photo != null) {
                $convert_photo = Photo::where('type',$type)->firstOrFail();
            } else {
                $convert_photo = NULL;
            }
            return view('admin.photo_static.add', compact('convert_photo','pageName','type_man'));  
        } else {
            $pageName = 'Bảng điều kiển';
            return  view('admin.index', compact('pageName'));  
        }
    }

    public function loadAddPhoto($type,$cate) {
        $pageName = 'Thêm Hình Ảnh';
        $type_man = $type;
        $update = null;
        if($cate == 'man') {
            return view('admin.photo.add', compact('pageName','update','type_man'));
        }
    }

    public function handleAddPhoto(Request $data, $type, $cate) {
        $add = new Photo;
        $data->validate(
            [
                'photo_man' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'photo_man.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_man.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            ]
        );
        if($data->photo_man != NULL) {
            $images = $data->photo_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/photo'), $imageName);
            $add->photo = $imageName;
        }
        $add->type = $type;
        $add->name = $data->photo_name;
        $add->link = $data->photo_link;
        if($cate == 'man') {
            $add->save();
            return redirect()->route('photo',[$type,$cate])->with('noti','Thêm hình ảnh thành công !!!');
        } else {
            $add->save();
            return redirect()->route('photo',[$type,$cate])->with('noti','Thêm hình ảnh thành công !!!');
        }
    }

    public function loadUpdatPhoto($id, $type, $cate)
    {
        $pageName = 'Chỉnh sửa hình ảnh';
        $update = Photo::find($id);
        $type_man = $type;

        if ($update == null) {
            return view('photo');
        } else {
            return view('admin.photo.add', compact('pageName','update','type_man'));
        }
    }

    public function handleUpdatPhoto(Request $data, $id, $type, $cate) {
        $add = Photo::find($id);
        $data->validate(
            [
                'photo_man' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'photo_man.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_man.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            ]
        );

        if($data->photo_man != NULL) {
            if($add['photo'] != NULL) {
                $removeFile = public_path('upload/photo/'.$add['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->photo_man;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/photo/'), $imageName);
            $add->photo = $imageName;
        }
        $add->type = $type;
        $add->name = $data->photo_name;
        $add->link = $data->photo_link;
        if($cate == 'man') {
            $add->save();
            return redirect()->route('photo',[$type,$cate])->with('noti','Cập nhật dung lượng thành công !!!');
        } else {
            $add->save();
            return redirect()->route('photo',[$type,$cate])->with('noti','Cập nhật dung lượng thành công !!!');
        }
    }

    public function deletPhoto($id, $type, $cate)
    {
        $dlt = Photo::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('photo');
        } else {
            if($dlt['photo'] != NULL) {
                $removeFile = public_path('upload/photo/'.$dlt['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('photo',[$type,$cate]);
        }
    }
}
