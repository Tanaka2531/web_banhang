<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pageName = 'Bảng điều khiển';
        return view('admin.dashboard.index', compact('pageName'));
    }
}
