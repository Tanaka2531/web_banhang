<?php

namespace App\Http\Controllers;

use App\Models\category_member;
use App\Http\Requests\Storecategory_memberRequest;
use App\Http\Requests\Updatecategory_memberRequest;
use Illuminate\Http\Request;

class CategoryMemberController extends Controller
{
    public function index() {
        $pageName = 'Quản lý Danh Mục Tài khoản';
        $cate_member = category_member::where(
            [
                ['status_role','!=',1],
                ['status_role','!=',2],
            ]
        )->get();
        return view('admin.member_admins.category_member.index', compact('cate_member','pageName'));
    }

    public function loadAddCate_Member() {
        $pageName = 'Thêm Danh mục tài khoản';
        $update = NULL;
        return view('admin.member_admins.category_member.add', compact('pageName','update'));
    }

    public function handleAddCate_Member(Request $data) {
        $add = new category_member;
        $data->validate(
            [
                'name_role' => 'required|unique:category_members,name_role',
            ],
            [
                'name_role.required' => 'Tên danh mục không được trống',
                'name_role.unique' => 'Tên danh mục bị trùng',
            ]
        );
        $add->name_role = $data->name_role;
        $add->status_role = 3;
        $add->status = $data->status_cate_member;
        $add->save();
        return redirect()->route('cate_members');
    }

    public function loadUpdateCate_Member($id) {
        $pageName = 'Chỉnh sửa Danh mục tài khoản';
        $update = category_member::find($id);
        if ($update == null) {
            return view('member_admins.category_member');
        } else {
            return view('admin.member_admins.category_member.add', compact('pageName','update'));
        }
    }

    public function handleUpdateCate_Member(Request $data, $id) {
        $add = category_member::find($id);
        if($add->name_role == $data->name_role) {
            $add->name_role = $data->name_role;
            $add->status_role = 3;
            $add->status = $data->status_cate_member;
        } else {
            $data->validate(
                [
                    'name_role' => 'required|unique:category_members,name_role',
                ],
                [
                    'name_role.required' => 'Tên danh mục không được trống',
                    'name_role.unique' => 'Tên danh mục bị trùng',
                ]
            );
            $add->name_role = $data->name_role;
            $add->status_role = 3;
            $add->status = $data->status_cate_member;
        }  
        $add->save();
        return redirect()->route('cate_members');
    }

    public function deleteCate_Member($id) {
        $dlt = category_member::find($id);
        if($dlt == NULL && $dlt->deleted_at != NULL) {
            return view('colors');
        } else {
            $dlt->delete();
            return redirect()->route('cate_members');
        }
    }
}
