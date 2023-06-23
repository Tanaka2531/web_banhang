<?php

namespace App\Http\Controllers;

use App\Models\Categories_level_two;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AjaxController extends Controller
{
    public function ajax_loadCate(Request $data) {
        $cate_two = Categories_level_two::where('id_cate_one',$data['id_cate'])->get();
        return $cate_two;
    }
}
