<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\Size_Request;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::get()->sortBy('id');
        return view('admin.sizes.index_size', compact('sizes'));
    }

    public function loadAddSizes()
    {
        $update = NULL;
        return view('admin.sizes.add_size', compact('update'));
    }

    public function handleAddSizes(Size_Request $data)
    {
        $add = new Size;
        $add->name = $data->name_size;
        $add->save();
        return redirect()->route('sizes');
    }

    public function loadUpdateSizes($id) {
        $update = Size::find($id);
        if ($update == null) {
            return view('sizes');
        } else {
            return view('admin.sizes.add_size', compact('update'));
        }
    }

    public function handleUpdateSizes(Size_Request $data, $id)
    {
        $add = Size::find($id);
        $add->name = $data->name_size;
        $add->save();
        return redirect()->route('sizes');
    }

    public function deleteSizes($id)
    {
        $dlt = Size::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('sizes');
        } else {
            $dlt->delete();
            return redirect()->route('sizes');
        }
    }

}
