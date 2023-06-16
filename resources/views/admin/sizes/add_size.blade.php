@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ ($update != NULL) ? route('handleupdatesizes',['id' => $update['id']]) : route('handleaddsizes') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="title">Tên dung lượng</label>
                            <input type="text" class="form-control" name="name_size" id="name_size" placeholder="Tên dung lượng" value="{{ ($update != NULL) ? $update['name'] : '' }}">
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