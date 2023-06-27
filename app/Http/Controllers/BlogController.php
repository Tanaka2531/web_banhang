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
        $pageName = 'Quản lý tin tức';
        $blogs = Blog::get()->sortBy('id');
        return view('admin.blogs.index_blog', compact('blogs','pageName'));
    }

    public function loadAddBlogs()
    {
        $pageName = 'Thêm tin tức';
        $update = NULL;
        return view('admin.blogs.add_blog', compact('update','pageName'));
    }

    public function handleAddBlogs(Request $data)
    {
        $add = new Blog;
        $data->validate(
            [
                'name_blog' => 'required',
                'photo_blog' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name_blog.required' => 'Tên bài viết không được trống',
                'photo_blog.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_blog.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            ]
        );
        if($data->photo_blog != NULL) {
            $images = $data->photo_blog;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/blogs'), $imageName);
            $add->photo = $imageName;
        }
        $add->name = $data->name_blog;
        $add->desc = $data->desc_blog;
        $add->content = $data->content_blog;
        $add->status = $data->status_blogs;
        $add->save();
        return redirect()->route('blogs');
    }

    public function loadUpdateBlogs($id) {
        $pageName = 'Chỉnh sửa tin tức';
        $update = Blog::find($id);
        if ($update == null) {
            return view('blogs');
        } else {
            return view('admin.blogs.add_blog', compact('update','pageName'));
        }
    }

    public function handleUpdateBlogs(Request $data, $id)
    {
        $add = Blog::find($id);
        $data->validate(
            [
                'name_blog' => 'required',
                'photo_blog' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'name_blog.required' => 'Tên bài viết không được trống',
                'photo_blog.mimes' => 'Ảnh phải là những định dạng jpeg, png, jpg, gif, svg',
                'photo_blog.max' => 'Ảnh chỉ nhập ảnh có kích thước bé hơn 2MB',
            ]
        );
        if($data->photo_blog != NULL) {
            if($add['photo'] != NULL) {
                $removeFile = public_path('upload/blogs/'.$add['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $images = $data->photo_blog;      
            $imageName = time().'.'.$images->extension();  
            $images->move(public_path('upload/blogs'), $imageName);
            $add->photo = $imageName;
        }
        $add->name = $data->name_blog;
        $add->desc = $data->desc_blog;
        $add->content = $data->content_blog;
        $add->status = $data->status_blogs;
        $add->save();
        return redirect()->route('blogs');
    }

    public function deleteBlogs($id)
    {
        $dlt = Blog::find($id);
        if ($dlt == null || $dlt->deleted_at != NULL) {
            return view('blogs');
        } else {
            if($dlt['photo']) {
                $removeFile = public_path('upload/blogs/'.$dlt['photo']);
                if(file_exists($removeFile)) {
                    unlink($removeFile);
                }
            }
            $dlt->delete();
            return redirect()->route('blogs');
        }
    }
}
