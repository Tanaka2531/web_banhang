@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadaddproducts') }}">Thêm mới</a></div>
            <div class="btn_delete_all">Xóa tất cả</div>
            <div class="input_search">
                <input type="text" name="" id="" placeholder="Nhập sản phẩm cần tìm" class="form-control">
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
                    <th>Hình Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th class="text-center">Hiển thị</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td><img src="{{ asset('upload/'.$v['photo']) }}" width="100" height="100" alt=""></td>
                        <td>{{ $v['name'] }}</td>
                        <td class="text-center"><input class="sty_checkbox form-check-input" type="checkbox"></td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdateproducts',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a href="{{ route('deleteproducts',['id' => $v['id']]) }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                <a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    <tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection