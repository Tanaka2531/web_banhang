<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Size_Product;
use App\Models\Color_Product;
use App\Models\Size_Color_Photo;
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
        $orderDetails = Order_Detail::where('id_order', $id)->get();
        $return = false;

        if ($data->status_payment == 'Đã thanh toán' || $update->status_payment == 'Đã thanh toán') {
            if ($data->status_order == 'Đã hủy') {
                for ($i = 0; $i < count($orderDetails); $i++) {
                    $product = Product::where('id', $orderDetails[$i]['id_product'])->select('id')->first();
                    $idColor = Color::where('name', $orderDetails[$i]['name_color'])->select('id')->first();
                    $idSize = Size::where('name', $orderDetails[$i]['name_size'])->select('id')->first();
                    $inventory = Size_Color_Photo::where('id_products', $product->id)
                        ->where('id_size', $idSize->id)->where('id_color', $idColor->id)->first();
                    (int)$inventory->inventory = $inventory->inventory + $orderDetails[$i]['quantity'];
                    $inventory->save();
                }
                $return = true;
            }
            for ($i = 0; $i < count($orderDetails); $i++) {
                if ($return == true) break;
                $product = Product::where('id', $orderDetails[$i]['id_product'])->select('id')->first();
                $idColor = Color::where('name', $orderDetails[$i]['name_color'])->select('id')->first();
                $idSize = Size::where('name', $orderDetails[$i]['name_size'])->select('id')->first();
                $inventory = Size_Color_Photo::where('id_products', $product->id)
                    ->where('id_size', $idSize->id)->where('id_color', $idColor->id)->first();
                (int)$inventory->inventory = $inventory->inventory - $orderDetails[$i]['quantity'];
                $inventory->save();
            }
        }

        $update->name = $data->name;
        $update->phone = $data->phone;
        $update->address = $data->address;
        $update->email = $data->email;
        $update->note = $data->note;
        if ($update->status_order != 'Đã hủy') {
            $update->status_order = $data->status_order;
        }
        if ($update->status_payment != 'Đã thanh toán') {
            $update->status_payment = $data->status_payment;
        }
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

    public static function searchOrder(Request $data)
    {
        $pageName = 'Tìm kiếm đơn hàng';
        $price_info = '';
        if ($data->price_search == 1) {
            $price_info = 'nhỏ hơn 1 triệu.';
        } else if ($data->price_search == 2) {
            $price_info = 'nhỏ hơn 10 triệu.';
        } else if ($data->price_search == 3) {
            $price_info = 'nhỏ hơn 50 triệu.';
        } else if ($data->price_search == 4) {
            $price_info = 'nhỏ hơn 100 triệu.';
        } else if ($data->price_search == 5) {
            $price_info = 'nhỏ hơn 200 triệu.';
        }

        if ($data->select_status_order == NULL) {
            $status_info = 'Không';
        } else {
            $status_info = $data->select_status_order;
        }

        if ($data->select_status_payments == NULL) {
            $status_info_pay = 'Không';
        } else {
            $status_info_pay = $data->select_status_payments;
        }

        $name_search = 'Trạng thái đơn hàng: ' . $status_info . ', Trạng thài thanh toán: ' . $status_info_pay . ', Giá trị: ' . $price_info;
        if ($data->select_status_order != NULL && $data->select_status_payments == NULL && $data->price_search == 3) {
            $search = Order::where('status_order', $data->select_status_order)->get();
        } else if ($data->select_status_order == NULL && $data->select_status_payments != NULL && $data->price_search == 3) {
            $search = Order::where('status_payment', $data->select_status_payments)->get();
        } else if ($data->select_status_order == NULL && $data->select_status_payments == NULL && $data->price_search == 3) {
            $search = Order::where([
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order != NULL && $data->select_status_payments != NULL && $data->price_search == 3) {
            $search = Order::where([
                ['status_order', $data->select_status_order],
                ['status_payment', $data->select_status_payments],
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order == NULL && $data->select_status_payments != NULL && $data->price_search == 3) {
            $search = Order::where([
                ['status_payment', $data->select_status_payments],
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order != NULL && $data->select_status_payments == NULL && $data->price_search == 3) {
            $search = Order::where([
                ['status_order', $data->select_status_order],
                ['total_price', '>=', '1000000'],
                ['total_price', '<=', '50000000']
            ])->get();
        } else if ($data->select_status_order != NULL && $data->select_status_payments != NULL && $data->price_search != NULL && $data->price_search != 3) {
            if ($data['price_search'] == 1) {
                $search = Order::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '<=', '1000000']
                ])->get();
            } else if ($data['price_search'] == 2) {
                $search = Order::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '10000000']
                ])->get();
            } else if ($data['price_search'] == 3) {
                $search = Order::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '50000000']
                ])->get();
            } else if ($data['price_search'] == 4) {
                $search = Order::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '100000000']
                ])->get();
            } else if ($data['price_search'] == 5) {
                $search = Order::where([
                    ['status_order', $data->select_status_order],
                    ['status_payment', $data->select_status_payments],
                    ['total_price', '>=', '1000000'],
                    ['total_price', '<=', '200000000']
                ])->get();
            }
        }
        return view('admin.order.search', compact('search', 'pageName', 'name_search'));
    }
}
