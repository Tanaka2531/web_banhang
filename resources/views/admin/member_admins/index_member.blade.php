@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadaddmember_admins') }}">Thêm mới</a></div>
            <div class="btn_delete_all">Xóa tất cả</div>
            <div class="input_search">
                <input type="text" name="name_search" id="name_search" placeholder="Nhập sản phẩm cần tìm" class="form-control">
                <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
            </div>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th class="text-center">Hình Ảnh</th>
                    <th>Tên thành viên</th>
                    <th class="text-center">Quyền</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($member_admins as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td class="text-center">
                            <a href="{{ route('loadupdatemember_admins',['id' => $v['id']]) }}">
                                @if($v['photo'] != NULL) 
                                    <img class="img_main" src="{{ asset('upload/member_admins/'.$v['photo']) }}" width="100" height="100" alt="">
                                @else
                                    <img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="100" height="100" alt="">
                                @endif 
                            </a>
                        </td>
                        <td>{{ $v['fullname'] }}</td>
                        <td class="text-center txt_green">{{ ($v['role'] == 1)? 'admin':'' }}</td>
                        <td class="text-center" style="width: 200px;">
                            <select class="form-select" aria-label="Default select example" name="status_member" id="status_member" data-id="{{ $v['id'] }}">            
                                @if($v['status'] == 1)
                                    <option value="0">Chọn trạng thái</option>
                                    <option selected value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                @elseif($v['status'] == 2)
                                    <option value="0">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option selected value="2">Không hoạt động</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Hoạt động</option>
                                    <option value="2">Không hoạt động</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdatemember_admins',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="member_admins"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection