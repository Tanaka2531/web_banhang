<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($type)
    {
        if($type == 'policy') {
            $load_name = 'Chính sách';
        } else if($type == 'payments') {
            $load_name = 'Hình thức thanh toán';
        } else if($type == 'criterial') {
            $load_name = 'Tiêu chí';
        } else if($type == 'blogs') {
            $load_name = 'Tin tức';
        } else {
            $load_name = 'Bài viết';
        }

        $pageName = 'Quản lý '.$load_name;
        $type_page = $type;
        $blogs = Blog::where('type',$type)->get()->sortBy('id');
        return view('admin.blogs.index_blog', compact('blogs','pageName','type_page'));
    }

    public function loadAddBlogs($type)
    {
        if($type == 'policy') {
            $load_name = 'Chính sách';
        } else if($type == 'payments') {
            $load_name = 'Hình thức thanh toán';
        } else if($type == 'criterial') {
            $load_name = 'Tiêu chí';
        } else if($type == 'blogs') {
            $load_name = 'Tin tức';
        } else {
            $load_name = 'Bài viết';
        }

        $pageName = 'Thêm '.$load_name;
        $type_page = $type;
        $update = NULL;
        return view('admin.blogs.add_blog', compact('update','pageName','type_page'));
    }

    public function handleAddBlogs(Request $data,$type)
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
        $add->type = $type;
        $add->status = $data->status_blogs;
        $add->save();
        return redirect()->route('blogs',[$type])->with('noti','Thêm bài viết thành công !!!');
    }

    public function loadUpdateBlogs($id,$type) {
        if($type == 'policy') {
            $load_name = 'Chính sách';
        } else if($type == 'payments') {
            $load_name = 'Hình thức thanh toán';
        } else if($type == 'criterial') {
            $load_name = 'Tiêu chí';
        } else if($type == 'blogs') {
            $load_name = 'Tin tức';
        } else {
            $load_name = 'Bài viết';
        }
        $pageName = 'Chỉnh sửa '.$load_name;
        $type_page = $type;
        $update = Blog::find($id);
        if ($update == null) {
            return view('blogs');
        } else {
            return view('admin.blogs.add_blog', compact('update','pageName','type_page'));
        }
    }

    public function handleUpdateBlogs(Request $data, $id, $type)
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
        $add->type = $type;
        $add->status = $data->status_blogs;
        $add->save();
        return redirect()->route('blogs',[$type])->with('noti','Cập nhật bài viết thành công !!!');
    }

    public function deleteBlogs($id, $type)
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
            return redirect()->route('blogs',[$type]);
        }
    }

    public function searchBlogs(Request $data, $type)
    {
        $pageName = 'Tìm kiếm bài viết';
        $type_page = $type;
        $search = Blog::where([
            ['name', 'LIKE', '%'.$data->name_search.'%'],
            ['type',$type]
        ])->get();
        return view('admin.blogs.search_blog', compact('search','pageName','type_page'));
    }

}
