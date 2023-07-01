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
                    <div class="card mb-3">
                        <div class="card-header">Thuộc tính - Giá sản phẩm</div>
                        <div class="card-body">
                            <div class="box_check_status">
                                <div class="item_check_status">
                                    <label for="status">Trạng thái:</label>
                                    <select class="form-select" aria-label="Default select example" name="status_product">            
                                        @if($update != NULL) 
                                            @if($update['status'] == 1)
                                                <option value="0">Chọn trạng thái</option>
                                                <option selected value="1">Hiển thị</option>
                                                <option value="2">Không hiển thị</option>
                                            @elseif($update['status'] == 2)
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="1">Hiển thị</option>
                                                <option selected value="2">Không hiển thị</option>
                                            @else
                                                <option selected value="0">Chọn trạng thái</option>
                                                <option value="1">Hiển thị</option>
                                                <option value="2">Không hiển thị</option>
                                            @endif
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="2">Không hiển thị</option>                                    
                                        @endif
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
                                <div class="box_input">
                                    <label for="price_from">Giá thấp nhất</label>
                                    <input type="text" class="form-control" name="price_from_product" id="price_from_product" placeholder="Giá mới" value="{{ ($update != NULL) ? $update['price_from']: ''}}">
                                </div>
                                <div class="box_input">
                                    <label for="price_to">Giá cao nhất</label>
                                    <input type="text" class="form-control" name="price_to_product" id="price_to_product" placeholder="Giá mới" value="{{ ($update != NULL) ? $update['price_to']: ''}}">
                                </div>
                            </div>
                        </div>
                    </div>         
                    <div class="card">
                        <div class="card-header">Thư viện ảnh sản phẩm</div>
                        <div class="card-body">
                            <div class="box_photo_gallery">
                                @if($update != NULL)
                                    @if($photo_gallery != NULL)
                                        @foreach($photo_gallery as $k => $v) 
                                            <div class="img_gallery">
                                                <div class="btn_dlt_gallery" data-id="{{ $v['id'] }}"><ion-icon name="trash-outline"></ion-icon></div>
                                                <img src="{{ asset('upload/products/gallery/'.$v['photo']) }}" alt="">
                                            </div>                               
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                            <div class="btn_input_file">
                                <input type="file" class="form-control" name="photo_gallery[]" id="photo_gallery[]" multiple>
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
                                        <label for="supplier">Danh mục cấp 1</label>
                                        <select class="form-select" name="cate_product" id="{{ ($update != NULL)? 'cate_product_up': 'cate_product_add'}}" aria-label="Default select example">
                                            <option selected value="">Chọn loại sản phẩm</option>
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
                                        @error('cate_product')
                                            <span class="message_red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục cấp 2</label>
                                        <select class="form-select" name="cate_two_product" id="cate_two_product" aria-label="Default select example">
                                            <option selected value="">Chọn loại sản phẩm</option>
                                            @if($update != NULL)
                                                @foreach ($categorys_2 as $k => $v)
                                                    @if ($update != NULL)
                                                        @if ($v['id'] == $update['id_cate_two']) 
                                                            <option selected value="{{ $v['id'] }}">{{ $v['name'] }}</option>  
                                                        @else    
                                                            <option value="{{ $v['id'] }}">{{ $v['name'] }}</option> 
                                                        @endif
                                                    @else
                                                        <option value="{{ $v['id'] }}">{{ $v['name'] }}</option> 
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('cate_product')
                                            <span class="message_red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Hãng sản xuất</label>
                                        <select class="form-select" name="sup_product" aria-label="Default select example">
                                            <option selected value="" >Chọn Hãng</option>
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
                                        @error('sup_product')
                                            <span class="message_red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục màu sắc</label>
                                        <ul class="select_multi">
                                            @if($color_product != NULL)
                                                @foreach ($colors as $k2 => $v2)
                                                    @if(in_array($v2['id'], $color_product))
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_color[]" id="arr_color" type="checkbox" value="{{ $v2['id'] }}" checked>
                                                            <label>{{ $v2['name'] }}</label>
                                                        </li>
                                                    @else 
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_color[]" id="arr_color" type="checkbox" value="{{ $v2['id'] }}">
                                                            <label>{{ $v2['name'] }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($colors as $k2 => $v2)
                                                    <li>
                                                        <input class="sty_checkbox form-check-input" name="arr_color[]" id="arr_color" type="checkbox" value="{{ $v2['id'] }}">
                                                        <label>{{ $v2['name'] }}</label>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục dung lượng</label>
                                        <ul class="select_multi">
                                            @if($size_product != NULL)
                                                @foreach ($sizes as $k3 => $v3)
                                                    @if(in_array($v3['id'], $size_product))
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_size[]" id="arr_size" type="checkbox" value="{{ $v3['id'] }}" checked>
                                                            <label>{{ $v3['name'] }}</label>
                                                        </li>
                                                    @else 
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_size[]" id="arr_size" type="checkbox" value="{{ $v3['id'] }}">
                                                            <label>{{ $v3['name'] }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($sizes as $k3 => $v3)
                                                    <li>
                                                        <input class="sty_checkbox form-check-input" name="arr_size[]" id="arr_size" type="checkbox" value="{{ $v3['id'] }}">
                                                        <label>{{ $v3['name'] }}</label>
                                                    </li>
                                                @endforeach
                                            @endif
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
                                            <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                    @endif
                                </div>
                                <input type="file" class="form-control" name="photo_product" id="photo_product" value="{{ ($update != NULL) ? $update['photo']: ''}}">
                                @error('photo_product')
                                    <span class="message_red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom_form">
                    <div class="card">
                        <div class="card-header">Dung lượng - Màu sắc - Hình ảnh</div>
                        <div class="card-body">
                           <div class="box_table_advanted">
                            <table class="table table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Dung lượng</th>
                                        <th scope="col">Màu sắc</th>
                                        <th scope="col" style="width: 200px;">Hình Ảnh</th>
                                        <th scope="col">Giá bán</th>
                                        <th scope="col">Giá niêm yết</th>
                                        <th scope="col">Còn hàng</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @if ($list_advanted != NULL)
                                        @foreach($list_advanted as $k4 => $v4)
                                            <tr>
                                                <td></td>
                                                <td>{{ $v4['name'] }}</td>
                                                <td>{{ $v4['name_color'] }}</td>
                                                <td>
                                                    @if($v4['photo'] != NULL)
                                                        <div class="box_photo_adv">
                                                            <img src="{{ asset('upload/products/'.$v4['photo']) }}" width="75" height="75" alt="">
                                                        </div>
                                                    @else
                                                        <div class="box_photo_adv">
                                                            <img src="{{ asset('adminate/images/noimg.jpg') }}" width="75" height="75" alt="">
                                                        </div>
                                                    @endif
                                                    <input type="file" class="form-control" name="photo_adv[]" id="photo_adv[]">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="price_regular_adv[ ]" id="price_regular_adv" value="{{ ($v4['price_regular'] != NULL)? $v4['price_regular'] :''; }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="price_sale_adv[ ]" id="price_sale_adv" value="{{ ($v4['price_sale'] != NULL)? $v4['price_sale'] :''; }}">
                                                </td>   
                                                <td>
                                                    <input type="checkbox" class="form-checkbox">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    @endif
                                </tbody>
                            </table>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
