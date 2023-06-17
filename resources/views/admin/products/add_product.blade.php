@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($update != NULL) ? route('handleupdateproducts',['id' => $update['id']]) : route('handleaddproducts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($update != NULL)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
            <div class="flex_form">
                <div class="left_form">
                    <div class="card mb-3">
                        <div class="card-header">Thông tin chung</div>
                        <div class="card-body">
                            <div class="box_input">
                                <label for="title">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name_product" id="name_product" placeholder="Tên sản phẩm" value="{{ ($update != NULL) ? $update['name']: ''}}">
                                @error('name_product')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Mô tả</label>
                                <textarea type="text" class="form-control" name="desc_product" id="desc_product" placeholder="Mô tả">{{ ($update != NULL) ? $update['desc']: ''}}</textarea>
                            </div>
                            <div class="box_input">
                                <label for="title">Nội dung</label>
                                <textarea type="text" class="form-control" name="content_product" id="content_product" placeholder="Nội dung">{{ ($update != NULL) ? $update['content']: ''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Thuộc tính - Giá sản phẩm</div>
                        <div class="card-body">
                            <div class="box_check_status">
                                <div class="item_check_status">
                                    <label for="status">Trạng thái:</label>
                                    <select class="form-select" aria-label="Default select example" name="status_product">
                                        <option selected>Chọn trạng thái</option>
                                        <option value="1">Hiển thị</option>
                                        <option value="2">Không hiển thị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex_price">
                                <div class="box_input">
                                    <label for="code">Mã sản phẩm</label>
                                    <input type="text" class="form-control" name="code_product" id="code_product" placeholder="Mã sản phẩm" value="{{ ($update != NULL) ? $update['code']: ''}}">
                                </div>
                                <div class="box_input">
                                    <label for="price_sale">Giá mới</label>
                                    <input type="text" class="form-control" name="price_sale_product" id="price_sale_product" placeholder="Giá mới" value="{{ ($update != NULL) ? $update['price_sale']: ''}}">
                                </div>
                                <div class="box_input">
                                    <label for="price_regular">Giá cũ</label>
                                    <input type="text" class="form-control" name="price_regular_product" id="price_regular_product" placeholder="Giá cũ" value="{{ ($update != NULL) ? $update['price_regular']: ''}}">
                                </div>
                            </div>
                        </div>
                    </div>         
                </div>
                <div class="right_form">
                    <div class="box_list_img">
                        <div class="card mb-3">
                            <div class="card-header">Phân loại sản phẩm</div>
                            <div class="card-body">
                                <div class="box_list">
                                    <div class="item_box_list">
                                        <label for="supplier">Loại sản phẩm</label>
                                        <select class="form-select" name="cate_product" aria-label="Default select example">
                                            <option selected value="0">Chọn loại sản phẩm</option>
                                            @foreach ($categorys as $k => $v)
                                                @if ($update != NULL)
                                                    @if ($v['id'] == $update['id_cate']) 
                                                        <option selected value="{{ $v['id'] }}">{{ $v['name'] }}</option>  
                                                    @else    
                                                        <option value="{{ $v['id'] }}">{{ $v['name'] }}</option> 
                                                    @endif
                                                @else
                                                    <option value="{{ $v['id'] }}">{{ $v['name'] }}</option> 
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Hãng sản xuất</label>
                                        <select class="form-select" name="sup_product" aria-label="Default select example">
                                            <option selected value="0" >Chọn Hãng</option>
                                            @foreach ($brands as $k1 => $v1)
                                                @if ($update != NULL)
                                                    @if ($v1['id'] == $update['id_brand']) 
                                                        <option selected value="{{ $v1['id'] }}">{{ $v1['name'] }}</option>
                                                    @else
                                                        <option value="{{ $v1['id'] }}">{{ $v1['name'] }}</option>    
                                                    @endif        
                                                @else       
                                                    <option value="{{ $v1['id'] }}">{{ $v1['name'] }}</option>    
                                                @endif      
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục màu sắc</label>
                                        <div class="acb">
                                            
                                        </div>
                                        <ul class="select_multi">
                                            @foreach ($colors as $k2 => $v2)
                                                <li>
                                                    <input class="sty_checkbox form-check-input" name="arr_color[]" id="arr_color" type="checkbox" value="{{ $v2['id'] }}">
                                                    <label>{{ $v2['name'] }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Hình ảnh sản phẩm</div>
                            <div class="card-body">
                                <div class="box_img">         
                                    @if($update != NULL)
                                        @if($update['photo'] != NULL)
                                            <img src="{{ asset('upload/products/'.$update['photo']) }}" alt="">
                                        @else
                                            <img src="{{ asset('admin/images/noimg.jpg') }}" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('admin/images/noimg.jpg') }}" alt="" />
                                    @endif
                                </div>
                                <input type="file" class="form-control" name="photo_product" id="photo_product">
                                @error('photo_product')
                                    <span class="message_red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
