<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\category_member;

class MemberClientController extends Controller
{
    public function index()
    {
        $member_client = Member::where([
            ['role','!=','0'],
            ['role','!=','1']
        ])->get();
        $pageName = 'Quản lý tài khoản người dùng';
        return view('admin.member_client.index', compact('member_client', 'pageName'));
    }

    public function loadUpdateMember_client($id){
        $update = Member::find($id);
        $cate_mem = category_member::where('status_role', '!=', '1')->get();
        $cate_mem_up = category_member::where('id',$update['id_cate_member'])->firstOrFail();
        $pageName = 'Chỉnh sửa tài khoản người dùng';

        return view('admin.member_client.detail', compact('update', 'pageName','cate_mem','cate_mem_up'));
    }

    public function handleUpdateMember_client(Request $data, $id){
        $add = Member::find($id);
        //
        if($add->username == $data->username) {

            $data->validate(
                [
                    'username' => 'required',
                    'cate_member' => 'required'
                ],
                [
                    'username.required' => 'Tên đăng nhập không được trống',
                    'cate_member.required' => 'Danh mục thành viên không được trống không được trống'
                ]
            );
            // dd($add);
            $add->fullname = $data->name_member;
            if($data->cate_member != NULL) {
                $add->id_cate_member = $data->cate_member;
            } else {
                $add->id_cate_member = '2';
            }
            
            $add->username = $data->username;
            if($data->password != NULL) {
                $add->password = Hash::make($data->password);
            }
            $add->address = $data->address;
            $add->phone = $data->phone;
            $add->email = $data->email;
            $add->birthday = $data->birthday;
            if($data->photo_member != NULL) {
                if($add['photo'] != NULL) {
                    $removeFile = public_path('upload/member_client/'.$add['photo']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_client'), $imageName);
                $add->photo = $imageName;
            }    
            $add->status = $data->status_member;
            $add->role = '2';
        } else {
            $data->validate(
                [
                    'username' => 'required|unique:members,username',
                    'cate_member' => 'required',
                ],
                [
                    'username.required' => 'Tên đăng nhập không được trống',
                    'username.unique' => 'Tên đăng nhập bị trùng',
                    'cate_member.required' => 'Danh mục thành viên không được trống không được trống',
                ]
            );
            $add->fullname = $data->name_member;
            if($data->cate_member != NULL) {
                $add->id_cate_member = $data->cate_member;
            } else {
                $add->id_cate_member = '2';
            }
            $add->username = $data->username;
            if($data->password != NULL) {
                $add->password = Hash::make($data->password);
            }
            $add->address = $data->address;
            $add->phone = $data->phone;
            $add->email = $data->email;
            $add->birthday = $data->birthday;
            if($data->photo_member != NULL) {
                if($add['photo'] != NULL) {
                    $removeFile = public_path('upload/member_client/'.$add['photo']);
                    if(file_exists($removeFile)) {
                        unlink($removeFile);
                    }
                }
                $images = $data->photo_member;      
                $imageName = time().'.'.$images->extension();  
                $images->move(public_path('upload/member_client'), $imageName);
                $add->photo = $imageName;
            }    
            $add->status = $data->status_member;
            $add->role = '2';
        } 
        $add->save();
        return redirect()->route('member_client')->with('noti','cập nhật tài khoản thành công !!!');
    }

    public function deleteMember_client($id)
    {
        $dlt = Member::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            $pageName = 'Quản lý tài khoản người dùng';
            $member_client = Member::where([
                ['role','!=','0'],
                ['role','!=','1']
            ])->get();
            return view('admin.member_client.index',compact('member_client','pageName'));
        } else {
            if($dlt['photo'] != NULL) {
                $removeFile = public_path('upload/member_client/'.$dlt['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('member_client');
        }
    }
}
