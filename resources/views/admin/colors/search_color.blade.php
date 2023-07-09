@extends('admin.index')
@section('body')
<div class="box_btn_search">
    <div class="flex_btn_search">
        <div class="btn_add"><a href="{{ route('loadaddcolors') }}">Thêm mới</a></div>
        <div class="btn_delete_all">Xóa tất cả</div>
        <form action="{{ route('searchcolor') }}" method="GET" enctype="multipart/form-data">
            @csrf
            <div class="input_search">
                <input type="text" name="name_search" id="name_search" placeholder="Nhập sản phẩm cần tìm" class="form-control">
                <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
            </div>          
        </form>
        <a href="{{ route('colors') }}" class="btn_redirect"><ion-icon name="reload-circle-outline"></ion-icon></a>
    </div>
</div>
<div class="box_table_list_product">
    <table class="table table_list_product align-middle">
        <thead>
            <tr class="sty_head_table">
            <th></th>
            <th class="text-center">STT</th>
            <th>Màu</th>
            <th>Tên màu</th>
            <th class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($search as $k => $v)
                <tr>
                    <th class="text-center">
                        <input class="sty_checkbox form-check-input" type="checkbox">
                    </th>
                    <th class="text-center">{{ ($k + 1) }}</th>
                    <td><div class="board_color" style="background: {{ $v['code_color'] }};"></div></td>
                    <td>{{ $v['name'] }}</td>
                    <td class="text-center">
                        <div class="flex_options">
                            <a href="{{ route('loadupdatecolors', ['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                            <a class="delete_main" data-id="{{ $v['id'] }}" data-type="colors"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                            <a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection