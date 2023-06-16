<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::get()->sortBy('id');
        return view('admin.colors.index_color', compact('colors'));
    }

    public function loadAddColors()
    {
        $update = NULL;
        return view('admin.colors.add_color', compact('update'));
    }

    public function handleAddColors(Request $data)
    {
        $add = new Color;
        $add->name = $data->name_color;
        $add->code_color = $data->name_code;
        // $add->status = $data->name_size;
        $add->save();
        return redirect()->route('colors');
    }

    public function loadUpdateColors($id)
    {
        $update = Color::find($id);
        if ($update == null) {
            return view('colors');
        } else {
            return view('admin.colors.add_color', compact('update'));
        }
    }

    public function handleUpdateColors(Request $data,$id)
    {
        $add = Color::find($id);
        $add->name = $data->name_color;
        $add->code_color = $data->name_code;
        // $add->status = $data->name_size;
        $add->save();
        return redirect()->route('colors');
    }

    public function deletecolors($id) {
        $dlt = Color::find($id);
        if($dlt == NULL && $dlt->deleted_at != NULL) {
            return view('colors');
        } else {
            $dlt->delete();
            return redirect()->route('colors');
        }
    }
}
