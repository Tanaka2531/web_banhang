<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
        $update = NULL;
        return view('admin.products.add_product', compact('categorys','brands','update'));
    }

    public function handleaddproducts(Request $data)
    {
        $add = new Product;
        $add->name = $data->name_product;
        $add->desc = $data->desc_product;
        $add->content = $data->content_product;
        $add->code = $data->code_product;
        $add->price_regular = $data->price_regular_product;
        $add->price_sale = $data->price_sale_product;
        $add->status = 'hienthi';
        $add->id_cate = $data->cate_products;
        $add->id_brand = $data->sup_products;
        $add->photo = $data->photo_product;
        $add->save();
        return redirect()->route('products');
    }

    public function loadUpdateProducts($id) {
        $categorys = Category::get()->sortBy('id');
        $brands = Brand::get()->sortBy('id');
        $update = Product::find($id);
        
        if ($update == null) {
            return view('products');
        } else {
            return view('admin.products.add_product', compact('update','categorys','brands'));
        }
    }

    public function handleupdateproducts(Request $data, $id)
    {
        $add = Product::find($id);
        $add->name = $data->name_product;
        $add->desc = $data->desc_product;
        $add->content = $data->content_product;
        $add->code = $data->code_product;
        $add->price_regular = $data->price_regular_product;
        $add->price_sale = $data->price_sale_product;
        $add->status = 'hienthi';
        $add->id_cate = $data->cate_products;
        $add->id_brand = $data->sup_products;
        $add->photo = 'abc.png';
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
