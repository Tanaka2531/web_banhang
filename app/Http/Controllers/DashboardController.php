<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $pageName = 'Bảng điều khiển';
        $product = Product::get()->sortBy('id');
        $count_pro = count($product);
        $order = Order::get()->sortBy('id');
        $count_order = count($order);
        $total_order = 0;
        foreach($order as $k => $v) {
            $total_order += $v['total_price'];
        }

        $nam_ht = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $thang1 = Order::whereBetween('created_at',[$nam_ht.'-01-01',$nam_ht.'-01-31'])->get();
        $sum1 = 0;
        foreach($thang1 as $k => $v) {
            $sum1 += $v['total_price'];
        }
        
        $thang2 = Order::whereBetween('created_at',[$nam_ht.'-02-01',$nam_ht.'-02-28'])->get();
        $sum2 = 0;
        foreach($thang2 as $k => $v) {
            $sum2 += $v['total_price'];
        }

        $thang3 = Order::whereBetween('created_at',[$nam_ht.'-03-01',$nam_ht.'-03-31'])->get();
        $sum3 = 0;
        foreach($thang3 as $k => $v) {
            $sum3 += $v['total_price'];
        }

        $thang4 = Order::whereBetween('created_at',[$nam_ht.'-04-01',$nam_ht.'-04-30'])->get();
        $sum4 = 0;
        foreach($thang4 as $k => $v) {
            $sum4 += $v['total_price'];
        }
        $thang5 = Order::whereBetween('created_at',[$nam_ht.'-05-01',$nam_ht.'-05-31'])->get();
        $sum5 = 0;
        foreach($thang5 as $k => $v) {
            $sum5 += $v['total_price'];
        }
        $thang6 = Order::whereBetween('created_at',[$nam_ht.'-06-01',$nam_ht.'-06-30'])->get();
        $sum6 = 0;
        foreach($thang6 as $k => $v) {
            $sum6 += $v['total_price'];
        }
        $thang7 = Order::whereBetween('created_at',[$nam_ht.'-07-01',$nam_ht.'-07-31'])->get();
        $sum7 = 0;
        foreach($thang7 as $k => $v) {
            $sum7 += $v['total_price'];
        }
        $thang8 = Order::whereBetween('created_at',[$nam_ht.'-08-01',$nam_ht.'-08-31'])->get();
        $sum8 = 0;
        foreach($thang8 as $k => $v) {
            $sum8 += $v['total_price'];
        }
        $thang9 = Order::whereBetween('created_at',[$nam_ht.'-09-01',$nam_ht.'-09-30'])->get();
        $sum9 = 0;
        foreach($thang9 as $k => $v) {
            $sum9 += $v['total_price'];
        }
        $thang10 = Order::whereBetween('created_at',[$nam_ht.'-10-01',$nam_ht.'-10-31'])->get();
        $sum10 = 0;
        foreach($thang10 as $k => $v) {
            $sum10 += $v['total_price'];
        }
        $thang11 = Order::whereBetween('created_at',[$nam_ht.'-11-01',$nam_ht.'-11-30'])->get();
        $sum11 = 0;
        foreach($thang11 as $k => $v) {
            $sum11 += $v['total_price'];
        }
        $thang12 = Order::whereBetween('created_at',[$nam_ht.'-12-01',$nam_ht.'-12-31'])->get();
        $sum12 = 0;
        foreach($thang12 as $k => $v) {
            $sum12 += $v['total_price'];
        }
        $data_m_total = [$sum1,$sum2,$sum3,$sum4,$sum5,$sum6,$sum7,$sum8,$sum9,$sum10,$sum11,$sum12];
        $data_month_chart = json_encode($data_m_total);  

        return view('admin.dashboard.index', compact('pageName','count_pro','count_order','total_order','data_month_chart'));
    }
}
