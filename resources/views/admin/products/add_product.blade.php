@extends('admin.index')
@section('body')
    <div class="box_form">
        <form
            action="{{ $update != null ? route('handleupdateproducts', ['id' => $update['id']]) : route('handleaddproducts') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if ($update != null)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
            <div class="flex_form flex_form_product">
                <div class="right_form">
                    <div class="box_list_img">
                        <div class="card mb-3">
                            <div class="card-header">Phân loại sản phẩm</div>
                            <div class="card-body">
                                <div class="box_list">
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục cấp 1</label>
                                        <select class="form-select" name="cate_product"
                                            id="{{ $update != null ? 'cate_product_up' : 'cate_product_add' }}"
                                            aria-label="Default select example">
                                            <option selected value="">Chọn loại sản phẩm</option>
                                            @foreach ($categorys as $k => $v)
                                                @if ($update != null)
                                                    @if ($v['id'] == $update['id_cate'])
                                                        <option selected value="{{ $v['id'] }}">{{ $v['name'] }}
                                                        </option>
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
                                        <select class="form-select" name="cate_two_product" id="cate_two_product"
                                            aria-label="Default select example">
                                            <option selected value="">Chọn loại sản phẩm</option>
                                            @if ($update != null)
                                                @foreach ($categorys_2 as $k => $v)
                                                    @if ($update != null)
                                                        @if ($v['id'] == $update['id_cate_two'])
                                                            <option selected value="{{ $v['id'] }}">
                                                                {{ $v['name'] }}</option>
                                                        @else
                                                            <option value="{{ $v['id'] }}">{{ $v['name'] }}
                                                            </option>
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
                                            <option selected value="">Chọn Hãng</option>
                                            @foreach ($brands as $k1 => $v1)
                                                @if ($update != null)
                                                    @if ($v1['id'] == $update['id_brand'])
                                                        <option selected value="{{ $v1['id'] }}">{{ $v1['name'] }}
                                                        </option>
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
                                            @if ($color_product != null)
                                                @foreach ($colors as $k2 => $v2)
                                                    @if (in_array($v2['id'], $color_product))
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_color[]"
                                                                id="arr_color" type="checkbox" value="{{ $v2['id'] }}"
                                                                checked>
                                                            <label>{{ $v2['name'] }}</label>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_color[]"
                                                                id="arr_color" type="checkbox" value="{{ $v2['id'] }}">
                                                            <label>{{ $v2['name'] }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($colors as $k2 => $v2)
                                                    <li>
                                                        <input class="sty_checkbox form-check-input" name="arr_color[]"
                                                            id="arr_color" type="checkbox" value="{{ $v2['id'] }}">
                                                        <label>{{ $v2['name'] }}</label>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="item_box_list">
                                        <label for="supplier">Danh mục dung lượng</label>
                                        <ul class="select_multi">
                                            @if ($size_product != null)
                                                @foreach ($sizes as $k3 => $v3)
                                                    @if (in_array($v3['id'], $size_product))
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_size[]"
                                                                id="arr_size" type="checkbox" value="{{ $v3['id'] }}"
                                                                checked>
                                                            <label>{{ $v3['name'] }}</label>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <input class="sty_checkbox form-check-input" name="arr_size[]"
                                                                id="arr_size" type="checkbox" value="{{ $v3['id'] }}">
                                                            <label>{{ $v3['name'] }}</label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($sizes as $k3 => $v3)
                                                    <li>
                                                        <input class="sty_checkbox form-check-input" name="arr_size[]"
                                                            id="arr_size" type="checkbox" value="{{ $v3['id'] }}">
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
                                    @if ($update != null)
                                        @if ($update['photo'] != null)
                                            <img width="385" height="385"
                                                src="{{ asset('upload/products/' . $update['photo']) }}" alt="">
                                        @else
                                            <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                        @endif
                                    @else
                                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                    @endif
                                </div>
                                <label for="photo_product" class="photo-label">Chọn hình ảnh....</label>
                                <input type="file" class="form-control btn-choose-file" name="photo_product"
                                    id="photo_product" value="{{ $update != null ? $update['photo'] : '' }}">
                                @error('photo_product')
                                    <span class="message_red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left_form">
                    <div class="card mb-3">
                        <div class="card-header">Thông tin chung</div>
                        <div class="card-body">
                            <div class="box_input">
                                <label for="title">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="name_product" id="name_product"
                                    placeholder="Tên sản phẩm" value="{{ $update != null ? $update['name'] : '' }}">
                                @error('name_product')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="box_input">
                                <label for="title">Mô tả</label>
                                <textarea type="text" class="form-control" name="desc_product" id="desc_product" placeholder="Mô tả">{{ $update != null ? $update['desc'] : '' }}</textarea>
                            </div>
                            <div class="box_input">
                                <label for="title">Nội dung</label>
                                <textarea type="text" class="form-control form_textarea" name="content_product" id="content_product"
                                    placeholder="Nội dung">{{ $update != null ? $update['content'] : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">Thuộc tính - Giá sản phẩm</div>
                        <div class="card-body">
                            <div class="box_check_status">
                                <div class="item_check_status">
                                    <label for="status">Hiển thị:</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="status_product">
                                        @if ($update != null)
                                            @if ($update['status'] == 1)
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
                                <div class="item_check_status">
                                    <label for="status">Nổi bật:</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="status_product_hot">
                                        @if ($update != null)
                                            @if ($update['status'] == 1)
                                                <option value="0">Chọn trạng thái</option>
                                                <option selected value="1">Nổi bật</option>
                                                <option value="2">Không nổi bật</option>
                                            @elseif($update['status'] == 2)
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="1">Nổi bật</option>
                                                <option selected value="2">Không nổi bật</option>
                                            @else
                                                <option selected value="0">Chọn trạng thái</option>
                                                <option value="1">Nổi bật</option>
                                                <option value="2">Không nổi bật</option>
                                            @endif
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Nổi bật</option>
                                            <option value="2">Không nổi bật</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="flex_price">
                                <div class="box_input">
                                    <label for="code">Mã sản phẩm</label>
                                    <input type="text" class="form-control" name="code_product" id="code_product"
                                        placeholder="Mã sản phẩm" value="{{ $update != null ? $update['code'] : '' }}">
                                </div>
                                {{-- <div class="box_input">
                                    <label for="inventory">Số lượng tồn kho</label>
                                    <input type="text" class="form-control" name="inventory_product"
                                        id="inventory_product" placeholder="Số lượng tồn kho"
                                        value="{{ $update != null ? $update['inventory'] : '' }}">
                                </div> --}}
                                <div class="box_input">
                                    <label for="price_sale">Giá mới</label>
                                    <input type="text" class="form-control" name="price_sale_product"
                                        id="price_sale_product" placeholder="Giá mới"
                                        value="{{ $update != null ? $update['price_sale'] : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="price_regular">Giá cũ</label>
                                    <input type="text" class="form-control" name="price_regular_product"
                                        id="price_regular_product" placeholder="Giá cũ"
                                        value="{{ $update != null ? $update['price_regular'] : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="price_from">Giá tối thiểu</label>
                                    <input type="text" class="form-control" name="price_from_product"
                                        id="price_from_product" placeholder="Giá tối thiểu"
                                        value="{{ $update != null ? $update['price_from'] : '' }}">
                                </div>
                                <div class="box_input">
                                    <label for="price_to">Giá tối đa</label>
                                    <input type="text" class="form-control" name="price_to_product"
                                        id="price_to_product" placeholder="Giá tối đa"
                                        value="{{ $update != null ? $update['price_to'] : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Thư viện ảnh sản phẩm</div>
                        <div class="card-body">
                            <div class="box_photo_gallery">
                                @if ($update != null)
                                    @if ($photo_gallery != null)
                                        @foreach ($photo_gallery as $k => $v)
                                            <div class="img_gallery">
                                                <div class="btn_dlt_gallery" data-id="{{ $v['id'] }}">
                                                    <ion-icon name="trash-outline"></ion-icon>
                                                </div>
                                                <img src="{{ asset('upload/products/gallery/' . $v['photo']) }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                            <div class="btn_input_file">
                                <label for="photo_gallery[]" class="photo-label">Chọn hình ảnh....</label>
                                <input type="file" class="form-control btn-choose-file" name="photo_gallery[]"
                                    id="photo_gallery[]" multiple>
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
                                            <th scope="col">Tồn kho</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @if ($list_advanted != null)
                                            @foreach ($list_advanted as $k4 => $v4)
                                                <tr>
                                                    <td><input type="hidden" name="id_adv[]"
                                                            value="{{ $v4['id'] }}"></td>
                                                    <td>{{ $v4['name'] }}</td>
                                                    <td>{{ $v4['name_color'] }}</td>
                                                    <td>
                                                        @if ($v4['photo'] != null)
                                                            <div class="box_photo_adv">
                                                                <img src="{{ asset('upload/products/advanted/' . $v4['photo']) }}"
                                                                    width="75" height="75" alt="">
                                                            </div>
                                                        @else
                                                            <div class="box_photo_adv">
                                                                <img src="{{ asset('adminate/images/noimg.jpg') }}"
                                                                    width="75" height="75" alt="">
                                                            </div>
                                                        @endif
                                                        <label for="photo_adv[]" class="photo-label">Chọn hình
                                                            ảnh....</label>
                                                        <input type="file" class="form-control btn-choose-file"
                                                            name="photo_adv[]" id="photo_adv[]"
                                                            value="{{ $v4['photo'] != null ? $v4['photo'] : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="price_regular_adv[]" id="price_regular_adv"
                                                            value="{{ $v4['price_regular'] != null ? $v4['price_regular'] : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control"
                                                            name="price_sale_adv[]" id="price_sale_adv"
                                                            value="{{ $v4['price_sale'] != null ? $v4['price_sale'] : '' }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" name="inventory[]"
                                                            id="inventory"
                                                            value="{{ $v4['inventory'] != null ? $v4['inventory'] : '' }}">
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
