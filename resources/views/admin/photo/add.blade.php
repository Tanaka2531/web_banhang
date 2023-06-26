@extends('admin.index')
@section('body')
<div class="box_form">
        <form action="{{ ($update != NULL) ? route('handleupdatphoto',['id' => $update['id'],'type' => $type_man, 'cate' => 'man']) : route('handleaddphoto',['type' => $type_man, 'cate' => 'man']) }}" method="POST" enctype="multipart/form-data">
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
                <div class="left_form full_form">
                    <div class="box_list_img">
                        <div class="card">
                            <div class="card-header">Thông tin chung</div>
                            <div class="card-body">
                                <div class="box_photo_man mb-3">
                                    <div class="box_img">         
                                        @if($update != NULL)
                                            @if($update['photo'] != NULL)
                                                <img src="{{ asset('upload/photo/'.$update['photo']) }}" alt="">
                                            @else
                                                <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                            @endif
                                        @else
                                            <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" name="photo_man" id="photo_man" value="{{ ($update != NULL) ? $update['photo']: ''}}">
                                    @error('photo_man')
                                        <span class="message_red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="box_input">
                                    <label for="title">Tên hình ảnh</label>
                                    <input type="text" class="form-control" name="photo_name" id="photo_name" placeholder="Tên hình ảnh" value="{{ ($update != NULL) ? $update['name']: ''}}">
                                </div>
                                <div class="box_input">
                                    <label for="title">Link hình ảnh</label>
                                    <input type="text" class="form-control" name="photo_link" id="photo_link" placeholder="Link hình ảnh" value="{{ ($update != NULL) ? $update['link']: ''}}">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection