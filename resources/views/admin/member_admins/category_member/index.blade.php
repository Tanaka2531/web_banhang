@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadaddcate_member') }}">Thêm mới</a></div>
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
                    <th>Tên danh mục</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cate_member as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td>{{ $v['name_role'] }}</td>
                        <td class="text-center">
                            @if($v['status'] == 1)
                                <span class="green_status"><ion-icon name="checkmark-circle-outline"></ion-icon></span>
                            @else
                                <span class="red_status"><ion-icon name="close-circle-outline"></ion-icon></span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdatecate_member',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="cate_members"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                <a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection