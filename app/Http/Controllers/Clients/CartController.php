<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Size_Color_Photo;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Order_Detail;

class CartController extends Controller
{
    public function cart()
    {
        $pageName = "Giỏ hàng";
        $code = Str::random(8);
        $payments = Blog::where('type', 'payments')
            ->where('status', '1')
            ->get();
        return view('client.cart.cart', compact('pageName', 'code', 'payments'));
    }

    public function addToCart(Request $request)
    {
        $id = $request['id'] . '-' . $request['idSize'] . '-' . $request['idColor'];
        $product = Product::findOrFail($request['id']);
        $productSizeColorPhoto = Size_Color_Photo::where('id_products', $request['id'])
            ->where('id_size', $request['idSize'])
            ->where('id_color', $request['idColor'])
            ->first();
        $size = Size::where('id', $request['idSize'])->first();
        $color = Color::where('id', $request['idColor'])->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id_product' => $product->id,
                'name' => $product->name,
                'sizeName' => $size->name,
                'colorName' => $color->name,
                'quantity' => $request['quantity'],
                'price_new' => $productSizeColorPhoto->price_regular,
                'price_old' => $productSizeColorPhoto->price_sale,
                'photo' => $product->photo,
                'inventory' => $productSizeColorPhoto->inventory,
            ];
        }

        session()->put('cart', $cart);
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            // session()->flash('success', 'Cập nhật giỏ hàng thành công!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            // session()->flash('success', 'Đã xóa sản phẩm!');
        }
    }

    public function payment(Request $request)
    {
        $orderInfo = new Order;
        $total = 0;

        foreach (session('cart') as $id => $details) {
            $total += $details['price_new'] * $details['quantity'];
        }

        $orderInfo->id_member = Auth::guard('client')->user()->id;
        $orderInfo->code_order = $request->code;
        $orderInfo->name = $request->name;
        $orderInfo->phone = $request->phone;
        $orderInfo->email = $request->email;
        $orderInfo->address = $request->address;
        $orderInfo->note = $request->note;
        $orderInfo->total_price = $total;
        $orderInfo->payments = $request->payment_method;
        $orderInfo->status_order = 'Chờ xác nhận';
        $orderInfo->status_payment = 'Chưa thanh toán';
        $orderInfo->save();

        foreach (session('cart') as $id => $details) {
            $orderDetail = new Order_Detail;
            // $product = Product::find($details['id_product']);
            // $product->inventory -= $details['quantity'];
            // $product->save();

            $orderDetail->id_order = $orderInfo->id;
            $orderDetail->id_product = $details['id_product'];
            $orderDetail->address = '';
            $orderDetail->content = '';
            $orderDetail->temp_price = 0;
            $orderDetail->ship_price = 0;
            $orderDetail->price_regular = $details['price_old'];
            $orderDetail->price_sale = $details['price_new'];
            $orderDetail->photo = $details['photo'];
            $orderDetail->name_size = $details['sizeName'];
            $orderDetail->name_color = $details['colorName'];
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->save();
        }

        session()->forget('cart');

        return redirect()->route('orderInfo', $orderInfo->id);
    }

    public function orderInfo($id)
    {
        $pageName = "Thông tin đơn hàng của bạn";
        $orderInfo = Order::where('id', $id)
            ->first();
        $orderDetail = Order_Detail::where('id_order', $id)
            ->get();
        $payment = Blog::where('type', 'payments')
            ->where('id', $orderInfo->payments)
            ->first();


        return view('client.cart.index', compact('pageName', 'orderInfo', 'orderDetail', 'payment'));
    }
}
