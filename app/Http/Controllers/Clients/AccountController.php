<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Clients\AccountRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;
use App\Models\category_member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AccountController extends Controller
{
    public function login()
    {
        return view('client.account.login');
    }

    public function handleLogin(Request $request)
    {
        if (Auth::guard('client')->attempt($request->only(['username', 'password']))) {
            // dd($request);
            // $request->session()->put('client', $remember);
            return redirect()->route('clientIndex');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('status', 'Tên đăng nhập hoặc Mật khẩu không chính xác');
        }
    }

    public function register()
    {
        return view('client.account.register');
    }

    public function handleRegister(AccountRequest $request)
    {
        $account = new Member();
        $account->id_cate_member = 2;
        $account->fullname = $request->username;
        $account->username = $request->username;
        $account->password = Hash::make($request->password);
        $account->phone = $request->phone;
        $account->email = $request->email;
        $account->status = 1;
        $account->role = 2;
        $account->save();

        return redirect()->route('clientLogin');
    }

    public function handleLogout(Request $request): RedirectResponse
    {
        if (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
            return redirect()->route('clientIndex');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function clientInfo()
    {
        $pageName = 'Thông tin cá nhân';
        $id = Auth::guard('client')->id();
        $clientInfo = Member::where('id', $id)->first();
        $nowDate = date('Y-m-d');
        return view('client.account.info', compact('pageName', 'clientInfo', 'nowDate'));
    }

    public function handleUpdate(Request $request)
    {
        $id = Auth::guard('client')->id();

        $account = Member::find($id);
        $account->fullname = $request->fullname;
        if (!$request->username)
            $account->username = $account->username;
        if ($request->password)
            $account->password = Hash::make($request->password);
        else
            $account->password = $account->password;
        $account->phone = $request->phone;
        $account->email = $request->email;
        $account->address = $request->address;
        $account->birthday = $request->birthday;
        $account->save();

        return redirect()->route('clientInfo')->with(session()->flash('success', 'Đã cập nhật thông tin thành công!'));
    }
}
