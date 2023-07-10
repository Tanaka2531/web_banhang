@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadaddproducts') }}">Thêm mới</a></div>
            <div class="btn_delete_all">Xóa tất cả</div>
            <form action="{{ route('searchproducts') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="input_search">
                    <input type="text" name="name_search" id="name_search" placeholder="Nhập sản phẩm cần tìm" class="form-control">
                    <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
                </div>          
            </form>
            <a href="{{ route('products') }}" class="btn_redirect"><ion-icon name="reload-circle-outline"></ion-icon></a>
        </div>
        <div class="alert_ajax"><span>Không có sản phẩm bạn đang cần tìm</span><span class="btn_reload_alert"><ion-icon name="close-outline"></ion-icon></span></div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th></th>
                    <th class="text-center">STT</th>
                    <th class="text-center">Hình Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th style="width: 175px;" class="text-center">Hiển thị</th>
                    <th style="width: 175px;" class="text-center">Nổi bật</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($search as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td class="text-center"><img class="img_main" src="{{ asset('upload/products/'.$v['photo']) }}" width="100" height="100" alt=""></td>
                        <td>{{ $v['name'] }}</td>
                        <td class="text-center" style="width: 175px;">
                            <select class="form-select" aria-label="Default select example" name="status_product_ajax" id="status_product_ajax" data-id="{{ $v['id'] }}"> 
                                @if($v['status'] == 1)
                                    <option value="0">Chọn trạng thái</option>
                                    <option selected value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                @elseif($v['status'] == 2)
                                    <option value="0">Chọn trạng thái</option>
                                    <option value="1">Hiển thị</option>
                                    <option selected value="2">Không hiển thị</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center" style="width: 175px;">
                            <select class="form-select" aria-label="Default select example" name="status_product_ajax_1" id="status_product_ajax_1" data-id="{{ $v['id'] }}"> 
                                @if($v['status_hot'] == 1)
                                    <option value="0">Chọn trạng thái</option>
                                    <option selected value="1">Nổi bật</option>
                                    <option value="2">Không nổi bật</option>
                                @elseif($v['status_hot'] == 2)
                                    <option value="0">Chọn trạng thái</option>
                                    <option value="1">Nổi bật</option>
                                    <option selected value="2">Không nổi bật</option>
                                @else
                                    <option selected value="0">Chọn trạng thái</option>
                                    <option value="1">Nổi bật</option>
                                    <option value="2">Không nổi bật</option>
                                @endif
                            </select>
                        </td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdateproducts',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a href="{{ route('deleteproducts',['id' => $v['id']]) }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                <a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection