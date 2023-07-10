<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Color;
use App\Models\Color_Product;
use App\Models\Size_Product;
use App\Models\Size_Color_Photo;
use App\Models\Gallery;
use App\Models\Blog;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $clrProduct = Color_Product::where('id_product', $id)->get('id_color');
        $sizeProduct = Size_Product::where('id_product', $id)->get('id_size');

        for ($i = 0; $i < count($clrProduct); $i++) {
            $clrName[$i] = Color::where('id', $clrProduct[$i]['id_color'])
                ->select('id', 'name')
                ->get();
        }
        for ($i = 0; $i < count($sizeProduct); $i++) {
            $sizeName[$i] = Size::where('id', $sizeProduct[$i]['id_size'])
                ->select('id', 'name')
                ->get();
        }

        $productPhotoChild = Gallery::where('id_products', $id)
            ->get();
        $productDetail = Product::where('id', $id)
            ->where('status', '1')
            ->first();
        $productBrand = Brand::where('id', $productDetail['id'])
            ->first();
        $productsRelated = Product::whereNotIn('id', [$id, $id])
            ->where('id_cate', $productDetail['id_cate'])
            ->where('id_cate_two', $productDetail['id_cate_two'])
            ->take(10)
            ->get();

        $criterias = Blog::where('type', 'criterial')
            ->where('status', '1')
            ->take(4)
            ->get();

        if (!empty($productDetail)) {
            $productDetail = $productDetail;
        } else {
            $productDetail = false;
        }

        return view('client.product.detail', compact('productDetail', 'clrName', 'sizeName', 'productPhotoChild', 'productBrand', 'productsRelated', 'criterias'));
    }

    public function loadPrice(Request $data)
    {
        $productPrice = Size_Color_Photo::where('id_products', $data['idPrd'])
            ->where('id_size', $data['idSize'])
            ->where('id_color', $data['idColor'])
            ->select('price_sale', 'price_regular', 'inventory')
            ->get();

        return response()->json(array([
            'priceNew' => $productPrice[0]['price_regular'],
            'priceOld' => $productPrice[0]['price_sale'],
            'inventory' => $productPrice[0]['inventory'],
        ]), 200);
    }
}