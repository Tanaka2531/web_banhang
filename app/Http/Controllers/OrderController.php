<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Blog;

class OrderController extends Controller
{
    public function index()
    {
        $pageName = 'Quản lý đơn hàng';
        $orders = Order::get()->sortBy('id');
        return view('admin.order.index', compact('orders', 'pageName'));
    }

    public function loadOrder($id)
    {
        $orderInfo = Order::find($id);
        $orderDetails = Order_Detail::where('id_order', $id)
            ->get();
        $pageName = 'Xem đơn hàng ' . $orderInfo->code_order;

        return view('admin.order.detail', compact('orderInfo', 'orderDetails', 'pageName'));
    }

    public function updateOrder(Request $data, $id)
    {
        $update = Order::find($id);

        $update->name = $data->name;
        $update->phone = $data->phone;
        $update->address = $data->address;
        $update->email = $data->email;
        $update->note = $data->note;
        $update->status_order = $data->status_order;
        $update->status_payment = $data->status_payment;
        $update->save();
        return redirect()->route('orders');
    }

    public function deleteOrder($id)
    {
        $dlt = Order::find($id);
        $orderDetails = Order_Detail::where('id_order', $id)
            ->get();

        if ($dlt == null || $dlt->deleted_at != NULL) {
            return redirect()->route('orders');
        } else {
            for ($i = 0; $i < count($orderDetails); $i++) {
                $orderDetails[$i]->delete();
            }
            $dlt->delete();
            return redirect()->route('orders');
        }
    }

    public static function orderPayments($id)
    {
        $orderPayment = Blog::where('id', $id)
            ->where('type', 'payments')
            ->first();

        if (!empty($orderPayment)) {
            return $orderPayment;
        } else {
            return false;
        }
    }

    public static function productDetails($id)
    {
        $productDetails = Product::where('id', $id)
            ->first();

        if (!empty($productDetails)) {
            return $productDetails;
        } else {
            return false;
        }
    }
}