<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\Color_Request;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $pageName = 'Quản lý màu sắc';
        $colors = Color::get()->sortBy('id');
        return view('admin.colors.index_color', compact('colors','pageName'));
    }

    public function loadAddColors()
    {
        $pageName = 'Thêm màu sắc';
        $update = NULL;
        return view('admin.colors.add_color', compact('update','pageName'));
    }

    public function handleAddColors(Color_Request $data)
    {
        $add = new Color;
        $add->name = $data->name_color;
        $add->code_color = $data->name_code;
        $add->save();
        return redirect()->route('colors')->with('noti','Thêm màu sắc thành công !!!');
    }

    public function loadUpdateColors($id)
    {
        $pageName = 'Chỉnh sửa tin tức';
        $update = Color::find($id);
        if ($update == null) {
            return view('colors');
        } else {
            return view('admin.colors.add_color', compact('update','pageName'));
        }
    }

    public function handleUpdateColors(Color_Request $data,$id)
    {
        $add = Color::find($id);
        $add->name = $data->name_color;
        $add->code_color = $data->name_code;
        // $add->status = $data->name_size;
        $add->save();
        return redirect()->route('colors')->with('noti','Cập nhật màu sắc thành công !!!');
    }

    public function deletecolors($id) {
        $dlt = Color::find($id);
        if($dlt == NULL && $dlt->deleted_at != NULL) {
            return view('colors');
        } else {
            $dlt->delete();
            return redirect()->route('colors');
        }
    }

    public function searchColor(Request $data)
    {
        $pageName = 'Tìm kiếm màu sắc';
        $search = Color::where('name', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.colors.search_color', compact('search','pageName'));
    }
}
