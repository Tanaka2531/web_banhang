<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $pageName = 'Quản lý đơn hàng';
        $orders = Order::get()->sortBy('id');
        return view('admin.order.index', compact('orders','pageName'));
    }

    public function loadViews()
    {
        $pageName = 'Load views';
        $orders = null;
        return view('admin.order.detail', compact('orders','pageName'));
    }

    public function loadOrder($id) {
        $pageName = 'Xem đơn hàng';
        $detail = Order::find($id);
        return view('admin.order.detail', compact('detail','pageName'));
    }
}
