@extends('admin.index')
@section('body')
    <div class="box_form">
        <form
            action="{{ ($update) ? route('handleUpdateBrand', ['id' => $update['id']]) : route('handleAddBrand') }}"
            method="POST" enctype="multipart/form-data">
            <div class="box_btn_main">
                @if ($update)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
                @csrf
                @if ($update)
                    @method('PATCH')
                @endif
            </div>
            <div class="flex_form">
                <div class="left_form">
                    <div class="card mb-3">
                        <div class="card-header">Thông tin chung</div>
                        <div class="card-body">
                            <div class="box_input">
                                <label for="title">Tên hãng</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Tên hãng" value="{{ $update ? $update['name'] : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right_form">
                    <div class="card">
                        <div class="card-header">Hình ảnh hãng</div>
                        <div class="card-body">
                            <div class="box_img">         
                                @if($update)
                                    @if($update['photo'])
                                        <img src="{{ asset('upload/brand/'.$update['photo']) }}" alt="">
                                    @else
                                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />    
                                @endif
                            </div>
                            <input type="file" class="form-control" name="photo" id="photo">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
