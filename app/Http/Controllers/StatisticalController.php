<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Exports\ProductCateExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Category;
use App\Models\category_member;

class StatisticalController extends Controller
{
    public function index() {
        $pageName = 'Quản lý xuất file';
        return view('admin.statistical.index', compact('pageName'));
    }

    public function loadStatistical($type) {
        $pageName = 'Quản lý xuất file';
        if($type == 'products') {
            $filename = rand(111111, 999999);
            return Excel::download(new ProductExport, 'products_'.$filename.'.xlsx');
        } else {
            return view('admin.statistical.index', compact('pageName'));
        }  
    }

    public function loadStatisticalCate($type) {
        $pageName = 'Quản lý xuất file';
        if($type == 'products') {
            $type_page = $type;
            $categoty = Category::get()->sortBy('id');
            return view('admin.statistical.details', compact('pageName','categoty','type_page'));
        } else if($type == 'members') {
            $type_page = $type;
            $categoty = category_member::where(
                [
                    ['status_role','!=',1],
                    ['status_role','!=',2],
                ]
            )->get();
            return view('admin.statistical.details', compact('pageName','categoty','type_page'));
        }
    }

    public function handleStatisticalCate(Request $data, $type) {
        if($type == 'products') {
            $filename = rand(111111, 999999);
            return (new ProductCateExport($data->cate_export))->download('products_cate_'.$filename.'.xlsx');
        } else if($type == 'members') {
            $filename = rand(111111, 999999);
            return (new ProductCateExport($data->cate_export))->download('members_cate_'.$filename.'.xlsx');
        }
    }
}
