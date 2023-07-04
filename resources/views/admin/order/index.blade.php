@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadviews') }}">Load views</a></div>
            <div class="btn_delete_all">Xóa tất cả</div>
            <form action="{{ route('searchorder') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="input_search">
                    <input type="text" name="name_search" id="name_search" placeholder="Nhập sản phẩm cần tìm" class="form-control">
                    <button type="submit" class=""><ion-icon name="search-outline"></ion-icon></button>
                </div>
                @error('name_search')
                    <span class="message_red">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </div>
    <div class="box_table_list_product">
        <table class="table table_list_product align-middle">
            <thead>
                <tr class="sty_head_table">
                    <th style="width: 75px;"></th>
                    <th style="width: 30px;" class="text-center">STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th style="width: 200px;">Hình thức thanh toán</th>
                    <th style="width: 175px;" class="text-center">Trạng thái</th>
                    <th style="width: 175px;" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="load_search">
                @foreach($orders as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td style="width: 30px;" class="text-center">{{ ($k + 1) }}</td>
                        <td></td>
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
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdateorder',['id' => $v['id']]) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a class="delete_main" data-id="{{ $v['id'] }}" data-type="orders"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                <a class="alert_123"><span><ion-icon name="eye-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection