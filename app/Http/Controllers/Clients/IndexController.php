<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Blog;
use App\Models\Color;
use App\Models\Photo;
use App\Models\Gallery;
use App\Models\Color_Product;
use App\Models\Size_Product;
use App\Models\Size;
use App\Models\Categories_level_two;
use App\Models\Size_Color_Photo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $pageName = 'Trang chủ';
        $slides = Photo::where('type', 'slider')
            ->get()
            ->take(10);
        $banners = Photo::where('type', 'advertisement')
            ->get()
            ->take(3);
        $news = Blog::where('status', '1')
            ->get()
            ->take(20);

        return view('client.index.index', compact('pageName', 'slides', 'banners', 'news'));
    }

    public function categoryListPage($name_list, $id_list)
    {
        $pageName = $name_list;
        $products = Product::where('id_cate', $id_list)
            ->where('status', '1')
            ->get()
            ->sortBy('id');

        if (count($products)) {
            $products = $products;
        } else {
            $products = false;
        }

        return view('client.product.index', compact('pageName', 'products'));
    }

    public function categoryCatPage($name_list, $id_list, $name_cat, $id_cat)
    {
        $pageName = $name_cat;
        $products = Product::where('id_cate', $id_list)
            ->where('id_cate_two', $id_cat)
            ->where('status', '1')
            ->get()
            ->sortBy('id');

        if (count($products)) {
            $products = $products;
        } else {
            $products = false;
        }

        return view('client.product.index', compact('pageName', 'products'));
    }

    public function productDetail($id)
    {
        $clrProduct = Color_Product::where('id_product', $id)->get('id_color');
        $sizeProduct = Size_Product::where('id_product', $id)->get('id_size');

        for ($i = 0; $i < count($clrProduct); $i++) {
            $clrName[] = Color::where('id', $clrProduct[$i]['id_color'])
                ->select('name', 'code_color')
                ->get();
        }

        for ($i = 0; $i < count($sizeProduct); $i++) {
            $sizeName[] = Size::where('id', $sizeProduct[$i]['id_size'])
                ->select('name')
                ->get();
        }

        $productPhotoChild = Gallery::where('id_products', $id)
            ->get();

        $productDetail = Product::where('id', $id)
            ->where('status', '1')
            ->first();

        dd($productPhotoChild);

        if (!empty($productDetail)) {
            $productDetail = $productDetail;
        } else {
            $productDetail = false;
        }

        return view('client.product.detail', compact('productDetail', 'clrName', 'sizeName', 'productPhotoChild'));
    }

    public static function logo()
    {
        $logo = Photo::firstWhere('type', 'logo');

        if (!empty($logo)) {
            return $logo;
        } else {
            return false;
        }
    }

    public static function loadLevel1Cate()
    {
        $categories = Category::skip(0)
            ->take(12)
            ->get()
            ->sortBy('id');

        if (count($categories)) {
            return $categories;
        } else {
            return false;
        }
    }

    public static function loadLevel2Cate($id_list = 0)
    {
        $categories_cat = Categories_level_two::where('id_cate_one', $id_list)
            ->where('status', '1')
            ->skip(0)
            ->take(5)
            ->get()
            ->sortBy('id');

        if (count($categories_cat)) {
            return $categories_cat;
        } else {
            return false;
        }
    }

    public static function loadProductFeatured($id_list = 0)
    {
        $products = Product::where('id_cate', $id_list)
            ->where('status', '1')
            ->skip(0)
            ->take(10)
            ->get()
            ->sortBy('id');

        if (count($products)) {
            return $products;
        } else {
            return false;
        }
    }

    public static function social()
    {
        $socials = Photo::where('type', 'social')
            ->get()
            ->sortBy('id');

        if (count($socials)) {
            return $socials;
        } else {
            return false;
        }
    }
}
