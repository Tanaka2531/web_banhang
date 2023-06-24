<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Color_Product;
use App\Models\Size_Product;
use App\Models\Size;
use App\Models\Categories_level_two;
use App\Http\Requests\Product_Request;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageName = 'Quản lý Sản Phẩm';
        $products = Product::get()->sortBy('id');
        $categorys = Category::get()->sortBy('id');
        $brands = Brand::get()->sortBy('id');
        return view('admin.products.index_product', compact('products','pageName','categorys','brands'));
    }

    public function loadAddProducts()
    {
        $pageName = 'Thêm sản phẩm';
        $categorys = Category::get()->sortBy('id');
        // $categorys_two = Categories_level_two::get()->sortBy('id');
        $brands = Brand::get()->sortBy('id');
        $colors = Color::get()->sortBy('id');
        $sizes = Size::get()->sortBy('id');
        $update = NULL;
        $color_product = NULL;
        $size_product = NULL;
        // 'categorys_two',
        return view('admin.products.add_product', compact('pageName','categorys','brands','update','colors','sizes','color_product','size_product'));
    }

    public function handleAddProducts(Request $data)
    {
        $add = new Product;
        if($data->photo_product != NULL) {
            $images = $data->photo_product;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/products'), $imageName);
            $add->photo = $imageName;
        }    
        $add->name = $data->name_product;
        $add->desc = $data->desc_product;
        $add->content = $data->content_product;
        $add->code = $data->code_product;
        $add->price_regular = $data->price_regular_product;
        $add->price_sale = $data->price_sale_product;
        if($data->status_product != 0) {
            $add->status = $data->status_product;
        } else {
            $add->status = 0;
        }
        $add->id_cate = $data->cate_product;
        $add->id_cate_two = $data->cate_two_product;
        $add->id_brand = $data->sup_product;
     
        $add->save();
        if($data->arr_color != NULL) {
            $arr_color = $data->arr_color;
            $count_color = count($data->arr_color);
            for($i = 0;$i < $count_color;$i++) {
                $add_CP = new Color_Product;
                $add_CP->id_product = $add->id;
                $add_CP->id_color = $arr_color[$i];
                $add_CP->save();
            }      
        }  
        if($data->arr_size != NULL) {
            $arr_size = $data->arr_size;
            $count_size = count($data->arr_size);
            for($i = 0;$i < $count_size;$i++) {
                $add_SP = new Size_Product;
                $add_SP->id_product = $add->id;
                $add_SP->id_size = $arr_size[$i];
                $add_SP->save();
            }      
        }  
        return redirect()->route('products');
    }

    public function loadUpdateProducts($id) {
        $pageName = 'Chỉnh sửa sản phẩm';
        $categorys = Category::get()->sortBy('id');
        $categorys_two = Categories_level_two::get()->sortBy('id_cate');
        $brands = Brand::get()->sortBy('id');
        $colors = Color::get()->sortBy('id');
        $sizes = Size::get()->sortBy('id');
        $color_product = Color_Product::where('id_product', $id)->pluck('color_products.id_color')->toArray();
        $size_product = Size_Product::where('id_product', $id)->pluck('size_products.id_size')->toArray();
        $update = Product::find($id);
        $categorys_1 = Category::where('id', $update['id_cate'])->get()->toArray();
        $categorys_2 = Categories_level_two::where('id_cate_one', $categorys_1[0]['id'])->get();
      
        if ($update == null) {
            return view('products');
        } else {
            return view('admin.products.add_product', compact('pageName','update','categorys_2','categorys_two','categorys','brands', 'colors', 'sizes', 'color_product','size_product'));
        }
    }

    public function handleUpdateProducts(Request $data, $id)
    {
        $add = Product::find($id);
        if($data->photo_product != NULL) {
            $images = $data->photo_product;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/products'), $imageName);
            $add->photo = $imageName;
        }
        $dlt_cp = Color_Product::where('id_product', $id);
        $dlt_cp->delete();
        $dlt_tras = Color_Product::withTrashed()->where('id_product', $id);
        $dlt_tras->forceDelete();
        if($data->arr_color != NULL) {
            $arr_color = $data->arr_color;
            $count_color = count($data->arr_color);
            for($i = 0;$i < $count_color;$i++) {
                $add_CP = new Color_Product;
                $add_CP->id_product = $id;
                $add_CP->id_color = $arr_color[$i];
                $add_CP->save();
            }      
        }  
        $dlt_sp = Size_Product::where('id_product', $id);
        $dlt_sp->delete();
        $dlt_tras = Size_Product::withTrashed()->where('id_product', $id);
        $dlt_tras->forceDelete();
        if($data->arr_size != NULL) {
            $arr_size = $data->arr_size;
            $count_size = count($data->arr_size);
            for($i = 0;$i < $count_size;$i++) {
                $add_SP = new Size_Product;
                $add_SP->id_product = $id;
                $add_SP->id_size = $arr_size[$i];
                $add_SP->save();
            }      
        } 
        $add->name = $data->name_product;
        $add->desc = $data->desc_product;
        $add->content = $data->content_product;
        $add->code = $data->code_product;
        $add->price_regular = $data->price_regular_product;
        $add->price_sale = $data->price_sale_product;
        if($data->status_product != 0) {
            $add->status = $data->status_product;
        } else {
            $add->status = 0;
        } 
        $add->id_cate = $data->cate_product;
        $add->id_cate_two = $data->cate_two_product;
        $add->id_brand = $data->sup_product;
        $add->save();
        return redirect()->route('products');
    }
   
    public function deleteProducts($id)
    {
        $dlt = Product::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('products');
        } else {
            $dlt->delete();
            return redirect()->route('products');
        }
    }

    public function searchProducts(Request $data)
    {
        $pageName = 'Tìm kiếm Sản Phẩm';
        $search = Product::where('name', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.products.search_product', compact('search','pageName'));
    }

    
}
