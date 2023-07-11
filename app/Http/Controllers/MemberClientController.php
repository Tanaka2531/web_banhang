<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member_client = Member::where([
            ['role','!=','0'],
            ['role','!=','1']
        ])->get();
        $pageName = 'Quản lý tài khoản người dùng';
        return view('admin.member_client.index', compact('member_client', 'pageName'));
    }

}
