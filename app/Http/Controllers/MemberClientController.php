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
        $member_client = Member::where('role', '!=', 0)
            ->where('role', '!=', 1)
            ->get();

        $pageName = 'Quản lý tài khoản người dùng';
        return view('admin.member_client.index_member', compact('member_client', 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
