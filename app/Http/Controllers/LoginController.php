<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller {
    public function handleLogin(Request $data) {
        if (Auth::guard('user')->attempt($data->only(['username', 'password']))) {
            return redirect()->route('loadadminindex');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function handleLoout(Request $data): RedirectResponse {
        Auth::logout();
        $data->session()->invalidate();
        $data->session()->regenerateToken();
        return redirect()->route('handlelogin');
    }
}