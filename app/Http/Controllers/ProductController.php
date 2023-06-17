<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Color_Product;
// use App\Models\Size;
use App\Http\Requests\Product_Request;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get()->sortBy('id');
        return view('admin.products.index_product', compact('products'));
    }

    public function loadAddProducts()
    {
        $categorys = Category::get()->sortBy('id');
        $brands = Brand::get()->sortBy('id');
        $colors = Color::get()->sortBy('id');
        $update = NULL;
        return view('admin.products.add_product', compact('categorys','brands','update','colors'));
    }

    public function handleAddProducts(Product_Request $data)
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
        if($add->status != NULL) {
            $add->status = $data->status_product;
        } else {
            $add->status = 1;
        }  
        if($data->cate_product != 0) {
            $add->id_cate = $data->cate_product;
        } else {
            $add->id_cate = null;
        }
        if($data->sup_product != 0) {
            $add->id_brand = $data->sup_product;
        } else {
            $add->id_brand = null;
        }
        $add->save();
        if($data->arr_color != NULL) {
            $arr = $data->arr_color;
            $abc = count($data->arr_color);
            for($i = 0;$i < $abc;$i++) {
                $add_SCP = new Color_Product;
                $add_SCP->id_product = $add->id;
                $add_SCP->id_color = $arr[$i];
                $add_SCP->save();
            }      
        }  
        return redirect()->route('products');
    }

    public function loadUpdateProducts($id) {
        $categorys = Category::get()->sortBy('id');
        $brands = Brand::get()->sortBy('id');
        $colors = Color::get()->sortBy('id');
        // $color_product = Color_Product::where('id_product',$id);
        // dd($color_product);
        $update = Product::find($id);
        
        if ($update == null) {
            return view('products');
        } else {
            return view('admin.products.add_product', compact('update','categorys','brands', 'colors','color_product'));
        }
    }

    public function handleUpdateProducts(Product_Request $data, $id)
    {
        $add = Product::find($id);
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
        if($add->status != NULL) {
            $add->status = $data->status_product;
        } else {
            $add->status = 1;
        } 
        $add->id_cate = $data->cate_product;
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
}
