<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Color_Product;
use App\Models\Size_Product;
use App\Models\Size;
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
        $sizes = Size::get()->sortBy('id');
        $update = NULL;
        $color_product = NULL;
        $size_product = NULL;
        return view('admin.products.add_product', compact('categorys','brands','update','colors','sizes','color_product','size_product'));
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

        if($data->status_product != 0) {
            $add->status = $data->status_product;
        } else {
            $add->status = 0;
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
        $categorys = Category::get()->sortBy('id');
        $brands = Brand::get()->sortBy('id');
        $colors = Color::get()->sortBy('id');
        $sizes = Size::get()->sortBy('id');
        $color_product = Color_Product::where('id_product', $id)->pluck('color_products.id_color')->toArray();
        $size_product = Size_Product::where('id_product', $id)->pluck('size_products.id_size')->toArray();
        $update = Product::find($id);
        
        if ($update == null) {
            return view('products');
        } else {
            return view('admin.products.add_product', compact('update','categorys','brands', 'colors', 'sizes', 'color_product','size_product'));
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

        $dlt_cp = Color_Product::where('id_product', $id);
        $dlt_cp->delete();
        $user= Color_Product::withTrashed()->where('id_product', $id);
        $dlt_cp->forceDelete();
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
        $user= Size_Product::withTrashed()->where('id_product', $id);
        $dlt_sp->forceDelete();
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
        $search = Product::where('name', 'LIKE', '%'.$data->name_search.'%')->get();
        return view('admin.products.search_product', compact('search'));
    }
}
