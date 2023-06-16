@extends('admin.index')
@section('body')
<div class="box_btn_search">
    <div class="flex_btn_search">
        <div class="btn_add"><a href="{{ route('loadaddcolors') }}">Thêm mới</a></div>
        <div class="btn_delete_all">Xóa tất cả</div>
        <div class="input_search">
            <input type="text" name="" id="" placeholder="Nhập màu sắc cần tìm" class="form-control">
            <span><ion-icon name="search-outline"></ion-icon></span>
        </div>
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
            <th class="text-center">Hiển thị</th>
            <th class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colors as $k => $v)
                <tr>
                    <th class="text-center">
                        <input class="sty_checkbox form-check-input" type="checkbox">
                    </th>
                    <th class="text-center">{{ ($k + 1) }}</th>
                    <td><div class="board_color" style="background: {{ $v['code_color'] }};"></div></td>
                    <td>{{ $v['name'] }}</td>
                    <td class="text-center"><input class="sty_checkbox form-check-input" type="checkbox"></td>
                    <td class="text-center">
                        <div class="flex_options">
                            <a href="{{ route('loadupdatecolors', ['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                            <a href="{{ route('deletecolors', ['id' => $v['id']]) }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                            <a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection