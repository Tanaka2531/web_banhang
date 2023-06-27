<?php

namespace App\Http\Controllers;

use App\Models\Categories_level_two;
use App\Models\Product;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AjaxController extends Controller
{
    public function ajax_loadCate(Request $data) {
        $cate_two = Categories_level_two::where('id_cate_one',$data['id_cate'])->get();
        return $cate_two;
    }

    public function ajax_loadProduct(Request $data) {
        $product = Product::where('id_cate',$data['id_cate'])->get();
        return $product;
    }

    public function ajax_loadProduct_Brand(Request $data) {
        $product = Product::where('id_brand',$data['id_brand'])->get();
        return $product;
    }

    public function ajax_deleteGallery(Request $data) {
        $product = Gallery::find($data['id_photo']);
        $abc = public_path('upload/products/gallery/'.$product['photo']);
        if(file_exists($abc)) {
            unlink($abc);
        }
        $product->delete();
        return $product;
    }
    
}
