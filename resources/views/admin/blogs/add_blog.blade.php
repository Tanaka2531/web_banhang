@extends('admin.index')
@section('body')
<div class="box_form">
    <form action="{{ ($update != NULL) ? route('handleupdateblogs',['id' => $update['id']]) : route('handleaddblogs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($update != NULL)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
        <div class="flex_form">
            <div class="left_form">
                <div class="card mb-3">
                    <div class="card-header">Thông tin chung</div>
                    <div class="card-body">
                        <div class="box_input">
                            <label for="title">Tên tin tức</label>
                            <input type="text" class="form-control" name="name_blog" id="name_blog" placeholder="Tên bài viết" value="{{ ($update != NULL) ? $update['name'] : '' }}">
                        </div>
                        <div class="box_input">
                            <label for="title">Mô tả</label>
                            <textarea type="text" class="form-control" name="desc_blog" id="desc_blog" placeholder="Mô tả" >{{ ($update != NULL) ? $update['desc'] : '' }}</textarea>
                        </div>
                        <div class="box_input">
                            <label for="title">Nội dung</label>
                            <textarea type="text" class="form-control" name="content_blog" id="content_blog" placeholder="Nội dung" >{{ ($update != NULL) ? $update['content'] : '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Thuộc tính</div>
                    <div class="card-body">
                        <div class="box_check_status">
                            <div class="item_check_status">
                                <label for="status">Hiển thị:</label>
                                <input class="sty_checkbox form-check-input" type="checkbox">
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
            <div class="right_form">
                <div class="box_list_img">
                    <div class="card">
                        <div class="card-header">Hình ảnh tin tức</div>
                        <div class="card-body">
                            <div class="box_img">         
                                @if($update != NULL)
                                    @if($update['photo'] != NULL)
                                        <img src="{{ asset('upload/blogs/'.$update['photo']) }}" alt="">
                                    @else
                                        <img src="{{ asset('admin/images/noimg.jpg') }}" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('admin/images/noimg.jpg') }}" alt="" />
                                @endif
                            </div>
                            <input type="file" class="form-control" name="photo_blog" id="photo_blog">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection