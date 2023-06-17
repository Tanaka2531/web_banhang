<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get()->sortBy('id');
        return view('admin.blogs.index_blog', compact('blogs'));
    }

    public function loadAddBlogs()
    {
        $update = NULL;
        return view('admin.blogs.add_blog', compact('update'));
    }

    public function handleAddBlogs(Request $data)
    {
        $add = new Blog;
        if($data->photo_blog != NULL) {
            $data->validate([
                'photo_blog' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->photo_blog;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/blogs'), $imageName);
            $add->photo = $imageName;
        }
        $add->name = $data->name_blog;
        $add->desc = $data->desc_blog;
        $add->content = $data->content_blog;
        $add->status = 'hienthi';
        $add->save();
        return redirect()->route('blogs');
    }

    public function loadUpdateBlogs($id) {
        $update = Blog::find($id);
        if ($update == null) {
            return view('blogs');
        } else {
            return view('admin.blogs.add_blog', compact('update'));
        }
    }

    public function handleUpdateBlogs(Request $data, $id)
    {
        $add = Blog::find($id);
        if($data->photo_blog != NULL) {
            $data->validate([
                'photo_blog' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $images = $data->photo_blog;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/blogs'), $imageName);
            $add->photo = $imageName;
        }
        $add->name = $data->name_blog;
        $add->desc = $data->desc_blog;
        $add->content = $data->content_blog;
        $add->status = 'hienthi';
        $add->save();
        return redirect()->route('blogs');
    }

    public function deleteBlogs($id)
    {
        $dlt = Blog::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('blogs');
        } else {
            $dlt->delete();
            return redirect()->route('blogs');
        }
    }
}
