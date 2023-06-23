@extends('admin.index')
@section('body')
<div class="box_form">
    <form action="{{ ($update != NULL) ? route('handleupdatecategory_two',['id' => $update['id']]) : route('handleaddcategory_two') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($update != NULL)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="submit" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
        <div class="flex_form">
            <div class="left_form">
                <div class="card">
                    <div class="card-header">Thông tin chung</div>
                    <div class="card-body">
                        <div class="item_box_list">
                            <label for="cate_two">Danh mục cấp 1</label>
                            <select class="form-select" name="cate_product_one" aria-label="Default select example">
                                <option selected value="" >Chọn danh mục cấp 1</option>
                                @foreach ($cate_one as $k1 => $v1)
                                    @if ($update != NULL)
                                        @if ($v1['id'] == $update['id_cate_one']) 
                                            <option selected value="{{ $v1['id'] }}">{{ $v1['name'] }}</option>
                                        @else
                                            <option value="{{ $v1['id'] }}">{{ $v1['name'] }}</option>    
                                        @endif        
                                    @else       
                                        <option value="{{ $v1['id'] }}">{{ $v1['name'] }}</option>    
                                    @endif      
                                @endforeach
                            </select>
                            @error('cate_product_one')
                                <span class="message_red">{{ $message }}</span>
                            @enderror
                            </div>
                        <div class="box_input">
                            <label for="title">Tên danh mục</label>
                            <input type="text" class="form-control" name="name_cate_two" id="name_cate_two" placeholder="Tên danh mục" value="{{ ($update != NULL) ? $update['name'] : '' }}">
                            @error('name_cate_two')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="box_check_status">
                            <div class="item_check_status">
                                <label for="status">Trạng thái:</label>
                                <select class="form-select" aria-label="Default select example" name="status_cate_two">            
                                    @if($update != NULL) 
                                        @if($update['status'] == 1)
                                            <option value="0">Chọn trạng thái</option>
                                            <option selected value="1">Hoạt động</option>
                                            <option value="2">Không hoạt động</option>
                                        @elseif($update['status'] == 2)
                                            <option value="0">Chọn trạng thái</option>
                                            <option value="1">Hoạt động</option>
                                            <option selected value="2">Không hoạt động</option>
                                        @else
                                            <option selected value="0">Chọn trạng thái</option>
                                            <option value="1">Hoạt động</option>
                                            <option value="2">Không hoạt động</option>
                                        @endif
                                    @else
                                        <option selected value="0">Chọn trạng thái</option>
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Không hoạt động</option>                                    
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <div class="right_form">
                <div class="box_list_img">
                    <div class="card">
                        <div class="card-header">Hình ảnh danh mục</div>
                        <div class="card-body">
                            <div class="box_img">         
                                @if($update != NULL)
                                    @if($update['photo'] != NULL)
                                        <img src="{{ asset('upload/category/'.$update['photo']) }}" alt="">
                                    @else
                                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                @endif
                            </div>
                            <input type="file" class="form-control" name="photo_cate_two" id="photo_cate_two">
                            @error('photo_cate_two')
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