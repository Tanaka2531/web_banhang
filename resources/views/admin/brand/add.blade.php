@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ $update ? route('handleUpdateBrand', ['id' => $update['id']]) : route('handleAddBrand') }}"
            method="POST" enctype="multipart/form-data">
            <div class="box_btn_main">
                @if ($update)
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
                @else
                    <input type="submit" class="btn btn-primary gradient-buttons" value="Lưu">
                @endif
                <input type="reset" class="btn btn-secondary gradient-buttons" value="Nhập lại">
                <a class="btn btn-danger gradient-buttons" href="{{ route('listBrands') }}">Thoát</a>
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
                                @if ($errors->get('name'))
                                    <div class="alert-validate">
                                        <ul>
                                            @foreach ($errors->get('name') as $key => $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="box_input">
                                <label for="title">Trạng thái</label>
                                <select class="form-select" aria-label="Default select example" name="status">            
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
                                @if ($errors->get('status'))
                                    <div class="alert-validate">
                                        <ul>
                                            @foreach ($errors->get('status') as $key => $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right_form">
                    <div class="card">
                        <div class="card-header">Hình ảnh hãng</div>
                        <div class="card-body">
                            <div class="box_img">
                                @if ($update)
                                    @if ($update['photo'])
                                        <img src="{{ asset('upload/brand/' . $update['photo']) }}" alt="">
                                    @else
                                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                    @endif
                                @else
                                    <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                                @endif
                            </div>
                            <input type="file" class="form-control" name="photo" id="photo">
                            @if ($errors->get('photo'))
                                <div class="alert-validate">
                                    <ul>
                                        @foreach ($errors->get('photo') as $key => $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
