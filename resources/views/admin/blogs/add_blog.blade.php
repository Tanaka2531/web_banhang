@extends('admin.index')
@section('body')
<div class="box_form">
    <form action="{{ ($update != NULL) ? route('handleupdateblogs',['id' => $update['id'],'type'=> $type_page]) : route('handleaddblogs',['type'=> $type_page]) }}" method="POST" enctype="multipart/form-data">
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
                            @error('name_blog')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="box_input">
                            <label for="title">Mô tả</label>
                            <textarea type="text" class="form-control" name="desc_blog" id="desc_blog" placeholder="Mô tả" >{{ ($update != NULL) ? $update['desc'] : '' }}</textarea>
                        </div>
                        <div class="box_input">
                            <label for="title">Nội dung</label>
                            <textarea type="text" class="form-control form_textarea" name="content_blog" id="content_blog" placeholder="Nội dung" >{{ ($update != NULL) ? $update['content'] : '' }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Thuộc tính</div>
                    <div class="card-body">
                        <div class="box_check_status">
                            <div class="item_check_status">
                                <label for="status">Trạng thái:</label>
                                <select class="form-select" aria-label="Default select example" name="status_blogs">            
                                    @if($update != NULL) 
                                        @if($update['status'] == 1)
                                            <option value="0">Chọn trạng thái</option>
                                            <option selected value="1">Hiển thị</option>
                                            <option value="2">Không hiển thị</option>
                                        @elseif($update['status'] == 2)
                                            <option value="0">Chọn trạng thái</option>
                                            <option value="1">Hiển thị</option>
                                            <option selected value="2">Không hiển thị</option>
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="2">Không hiển thị</option>
                                        @endif
                                    @else
                                        <option selected value="0">Chọn trạng thái</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Không hiển thị</option>                                    
                                    @endif
                                </select>
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
                                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                @endif
                            </div>
                            <label for="photo_blog" class="photo-label">Chọn hình ảnh....</label>
                            <input type="file" class="form-control btn-choose-file" placeholder="Chọn file" name="photo_blog" id="photo_blog">
                            @error('photo_blog')
                                <span class="message_red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection