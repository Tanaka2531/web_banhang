<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
                ->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function register()
    {
        return view('client.account.register');
    }

    public function handleRegister(Request $request)
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

        return route('clientIndex');
    }

    public function handleLogout(Request $request): RedirectResponse
    {
        // if (Auth::guard('client')->check()) {
        // dd(Auth::guard('client')->name);
        // dd(Auth::id());
        // dd(Auth::guard('client'));
        // $request
        //     ->session()->invalidate();
        // $request
        //     ->session()->regenerateToken();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Auth::guard('client')->logout();
        // return redirect()->route('clientIndex');
        // }
        return redirect('/');
    }
}