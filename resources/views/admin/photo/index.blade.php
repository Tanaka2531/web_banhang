@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadaddphoto',['type' => $type_man, 'cate' => 'man']) }}">Thêm mới</a></div>
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
                    <th class="text-center">Tên hình ảnh</th>
                    <th class="text-center">Link hình ảnh</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photo as $k => $v) 
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ ($k + 1) }}</td>
                        <td class="text-center">
                            <a href="{{ route('loadupdatphoto',['id' => $v['id'],'type' => $type_man, 'cate' => 'man']) }}">
                                @if($v['photo'] != NULL) 
                                    <img class="img_main" src="{{ asset('upload/photo/'.$v['photo']) }}" width="100" height="100" alt="">
                                @else
                                    <img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="100" height="100" alt="">
                                @endif 
                            </a>
                        </td>
                        <td class="text-center">{{ $v['name'] }}</td>
                        <td class="text-center">{{ $v['link'] }}</td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadupdatphoto',['id' => $v['id'],'type' => $type_man, 'cate' => 'man']) }}"><span><ion-icon name="create-outline"></ion-icon></span></a>
                                <a href="{{ route('deletphoto',['id' => $v['id'],'type' => $type_man, 'cate' => 'man']) }}"><span><ion-icon name="trash-outline"></ion-icon></span></a>
                                <a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>
                            </div>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>  
@endsection