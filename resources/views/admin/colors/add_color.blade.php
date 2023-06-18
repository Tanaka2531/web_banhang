@extends('admin.index')
@section('body')
<div class="box_form">
    <form action="{{ ($update != NULL) ? route('handleupdatecolors',['id' => $update['id']]) : route('handleaddcolors') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box_btn_main">
                @if($update != NULL)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="submit" class="btn btn-secondary gradient-buttons" value="Nhập lại">
            </div>
        <div class="flex_form_color">
            <div class="card">
                <div class="card-header">Thông tin chung</div>
                <div class="card-body">
                    <div class="box_input">
                        <label for="title">Mã màu tương ứng</label>
                        <input type="color" class="form-control sty_code_color" name="name_code" id="name_code" value="{{ ($update != NULL) ? $update['code_color'] : '' }}">
                        @error('name_code')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="box_input">
                        <label for="title">Tên màu sắc</label>
                        <input type="text" class="form-control" name="name_color" id="name_color" placeholder="Tên màu sắc" value="{{ ($update != NULL) ? $update['name'] : '' }}">
                        @error('name_color')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="item_check_status">
                        <label for="status">Hiển thị:</label>
                        <input class="sty_checkbox form-check-input" type="checkbox">
                    </div>
                </div>
            </div>   
        </div>
    </form>
</div>
@endsection