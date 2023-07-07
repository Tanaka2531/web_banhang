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
                @error('name_search')
                    <span class="message_red">{{ $message }}</span>
                @enderror
            </form>
            <div class="search_cate_one">
                <select class="form-select" id="search_cate">
                    <option selected value="0">Chọn danh mục cấp 1</option>
                    @foreach($categorys as $k => $v)
                        <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_cate_one">
                <select class="form-select" id="search_brand">
                    <option selected value="0">Chọn Hãng</option>
                    @foreach($brands as $k => $v)
                        <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <a class="reload_search" href="{{ route('products') }}"><ion-icon name="reload-circle-outline"></ion-icon></a>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th style="width: 75px;"></th>
                    <th style="width: 30px;" class="text-center">STT</th>
                    <th style="width: 200px;" class="text-center">Hình Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th style="width: 175px;" class="text-center">Hiển thị</th>
                    <th style="width: 175px;" class="text-center">Nổi bật</th>
                    <th style="width: 175px;" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="load_search">
                @foreach($products as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td style="width: 30px;" class="text-center">{{ ($k + 1) }}</td>
                        <td style="width: 200px;" class="text-center">
                            <a href="{{ route('loadupdateproducts',['id' => $v['id']]) }}">
                                @if($v['photo'] != NULL) 
                                    <img class="img_main" src="{{ asset('upload/products/'.$v['photo']) }}" width="100" height="100" alt="">
                                @else
                                    <img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="100" height="100" alt="">
                                @endif 
                            </a>
                        </td>
                        <td>
                            {{ $v['name'] }}
                        </td>
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
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="products"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                <a class="alert_123"><span><ion-icon name="eye-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection