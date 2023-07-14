<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class LoginController extends Controller
{
    public function handleLogin(Request $data)
    {
        if (Auth::guard('user')->attempt($data->only(['username', 'password']))) {
            return redirect()->route('dashboard')->with('noti', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function handleLoout(Request $data): RedirectResponse
    {
        Auth::logout();
        $data->session()->invalidate();
        $data->session()->regenerateToken();
        return redirect()->route('handlelogin');
    }

    public function change_Passwork_Admin() {
        $pageName = 'Đổi mật khẩu';
        return view('admin.member_admins.change_pass',compact('pageName'));
    }

    public function handle_Change_Passwork_Admin(Request $data) {
        
        $update = Member::find(Auth::guard('user')->user()->id);
        if($data->password_new == $data->comfirm_password) {
            $update->password = Hash::make($data->password_new);
            $update->save();
            return redirect()->route('dashboard')->with('noti','Đổi mật khẩu thành công !!!');
        } else {
            return redirect()->route('dashboard')->with('noti','Đổi mật khẩu thất bại !!!');
        }
        
    }

}
