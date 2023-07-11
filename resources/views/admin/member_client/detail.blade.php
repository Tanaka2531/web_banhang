@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($update != NULL) ? route('handleupdatemember_admins',['id' => $update['id']]) : route('handleaddmember_admins') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="title">Tên thành viên</label>
                                <input type="text" class="form-control" name="name_member" id="name_member" placeholder="Tên thành viên" value="{{ ($update != NULL) ? $update['fullname']: ''}}">
                                @error('name_member')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập" value="{{ ($update != NULL) ? $update['username']: ''}}">
                                @error('username')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Mật khẩu</label>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Mật khẩu" value="">
                                @error('password')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="item_box_list d-none">
                                <label for="supplier">Loại tài khoản</label>
                                <select class="form-select" name="cate_member" aria-label="Default select example">
                                    <option selected value="2">Chọn loại tài khoản</option>
                                </select>
                            </div>
                            <div class="box_input">
                                <label for="title">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ" value="{{ ($update != NULL) ? $update['address']: ''}}">
                                @error('address')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Số điện thoại</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" value="{{ ($update != NULL) ? $update['phone']: ''}}">
                                @error('phone')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ ($update != NULL) ? $update['email']: ''}}">
                                @error('email')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>         
                            <div class="box_input">
                                <label for="title">Ngày sinh</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="Ngày sinh" value="{{ ($update != NULL) ? $update['birthday']: ''}}">
                                @error('birthday')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>            
                            <div class="box_check_status">
                                <div class="item_check_status">
                                    <label for="status">Trạng thái:</label>
                                    <select class="form-select" aria-label="Default select example" name="status_member">            
                                        @if($update != NULL) 
                                            @if($update['status'] == 1)
                                                <option value="0">Chọn trạng thái</option>
                                                <option selected value="1">Hoạt động</option>
                                                <option value="2">Không hoạt động</option>
                                            @elseif($update['status'] == 2)
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="1">Hoạt động</option>
                                                <option selected value="2">Không hoạt động</option>
                                            @else
                                                <option selected value="0">Chọn trạng thái</option>
                                                <option value="1">Hoạt động</option>
                                                <option value="2">Không hoạt động</option>
                                            @endif
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Hoạt động</option>
                                            <option value="2">Không hoạt động</option>                                    
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
                            <div class="card-header">Avatar</div>
                            <div class="card-body">
                                <div class="box_img">         
                                    @if($update != NULL)
                                        @if($update['photo'] != NULL)
                                            <img src="{{ asset('upload/member_admins/'.$update['photo']) }}" alt="">
                                        @else
                                            <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                    @endif
                                </div>
                            <label for="photo_member" class="photo-label">Chọn hình ảnh....</label>
                            <input type="file" class="form-control btn-choose-file" name="photo_member" id="photo_member" value="{{ ($update != NULL) ? $update['photo']: ''}}">
                                @error('photo_member')
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
