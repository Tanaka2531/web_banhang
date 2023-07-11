<?php

namespace App\Http\Controllers;

use App\Models\Categories_level_two;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\category_member;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AjaxController extends Controller
{
    public function ajax_loadCate(Request $data)
    {
        $cate_two = Categories_level_two::where('id_cate_one', $data['id_cate'])->get();
        return $cate_two;
    }

    public function ajax_loadProduct(Request $data)
    {
        $product = Product::where('id_cate', $data['id_cate'])->get();
        return $product;
    }

    public function ajax_loadProduct_Brand(Request $data)
    {
        $product = Product::where('id_brand', $data['id_brand'])->get();
        return $product;
    }

    public function ajax_deleteGallery(Request $data)
    {
        $product = Gallery::find($data['id_photo']);
        $abc = public_path('upload/products/gallery/' . $product['photo']);
        if (file_exists($abc)) {
            unlink($abc);
        }
        $product->delete();
        return $product;
    }

    public function ajax_loadStatus(Request $data)
    {
        $product = Product::find($data['id_prod']);
        $product->status = $data['id_status'];
        $product->save();
        return $product;
    }

    public function ajax_loadStatusHot(Request $data) {
        $product = Product::find($data['id_prod']);
        $product->status_hot = $data['id_status'];
        $product->save();
        return $product;
    }
    
    public function ajax_loadStatusCate(Request $data) {
        $product = Categories_level_two::find($data['id_prod']);
        $product->status = $data['id_status'];
        $product->save();
        return $product;
    }

    public function ajax_loadStatusBlog(Request $data)
    {
        $product = Blog::find($data['id_blog']);
        $product->status = $data['id_status'];
        $product->save();
        return $product;
    }
    
    public function ajax_loadStatusBrand(Request $data) {
        $product = Brand::find($data['id_prod']);
        $product->status = $data['id_status'];
        $product->save();
        return $product;
    }

    public function ajax_loadStatusCateOne(Request $data) {
        $product = Category::find($data['id_cate1']);
        $product->status = $data['id_status'];
        $product->save();
        return $product;
    }

    public function ajax_loadStatusCateMember(Request $data) {
        $product = category_member::find($data['id_cate_m']);
        $product->status = $data['id_status'];
        $product->save();
        return $product;
    }

    public function ajax_SearchOrder(Request $data) {
        $order = Order::where('status_order',$data['id_status_order'])
        ->join('blogs','orders.payments','=','blogs.id')
        ->select('orders.*', 'blogs.name as name_payments')
        ->get();
        return $order;
    }

    public function ajax_SearchOrder_2(Request $data) {
        $order = Order::where('status_payment',$data['id_status_payments'])
        ->join('blogs','orders.payments','=','blogs.id')
        ->select('orders.*', 'blogs.name as name_payments')
        ->get();
        return $order;
    }

    public function ajax_SearchOrder_Price(Request $data) {

        if($data['khoang_gia'] == 1) {
            $order = Order::where('total_price','<=','1000000')
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 2) {
            $order = Order::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','10000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 3) {
            $order = Order::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','50000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 4) {
            $order = Order::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','100000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } else if($data['khoang_gia'] == 5) {
            $order = Order::where([
                ['total_price','>=','1000000'],
                ['total_price','<=','200000000']
            ])
            ->join('blogs','orders.payments','=','blogs.id')
            ->select('orders.*', 'blogs.name as name_payments')
            ->get();
        } 
        return $order;
    }

    
}
