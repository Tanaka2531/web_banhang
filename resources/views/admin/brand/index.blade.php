@extends('admin.index')
@section('body')
    <div class="box_btn_search">
        <div class="flex_btn_search">
            <div class="btn_add"><a href="{{ route('loadAddBrand') }}">Thêm mới</a></div>
            <div class="btn_delete_all">Xóa tất cả</div>
            <div class="input_search">
                <input type="text" name="" id="" placeholder="Nhập hãng cần tìm" class="form-control">
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
                    <th>Hình Ảnh</th>
                    <th>Tên hãng</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $k => $v)
                    <tr>
                        <td class="text-center">
                            <input class="sty_checkbox form-check-input" type="checkbox">
                        </td>
                        <td class="text-center">{{ $k + 1 }}</td>
                        <td>
                            <a href="{{ route('loadUpdateBrand', ['id' => $v['id']]) }}">
<<<<<<< Updated upstream
                                @if($v['photo'] != NULL) 
                                    <img class="img_main" src="{{ asset('upload/brand/'.$v['photo']) }}" width="100" height="100" alt="">
                                @else
                                    <img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="100" height="100" alt="">
                                @endif 
=======
                                <img src="{{ $v['photo'] ? asset('upload/brand/' . $v['photo']) : asset('adminate/images/noimg.jpg') }}"
                                    width="100" height="100" alt="{{ $v['name'] }}">
>>>>>>> Stashed changes
                            </a>
                        </td>
                        <td>{{ $v['name'] }}</td>
                        <td class="text-center">{{ $v['status'] }}</td>
                        <td class="text-center">
                            <div class="flex_options">
                                <a href="{{ route('loadUpdateBrand', ['id' => $v['id']]) }}">
                                    <span>
                                        <ion-icon name="create-outline"></ion-icon>
                                    </span>
                                </a>
                                <a href="{{ route('deleteBrand', ['id' => $v['id']]) }}">
                                    <span>
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </span>
                                </a>
                                <a href="">
                                    <span>
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </span>
                                </a>
                            </div>
                        </td>
                    <tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
