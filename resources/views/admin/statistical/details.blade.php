@extends('admin.index')
@section('body')
    <div class="box_export_cate">
        <form action="{{ route('handlestatisticalcate',['type' => $type_page]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <select class="form-select" aria-label="Default select example" name="cate_export" id="cate_export"> 
                <option selected value="0">Chọn danh mục</option>
                @foreach($categoty as $k => $v)
                    <option value="{{ $v['id'] }}">{{ ($type_page == 'members')? $v['name_role'] : $v['name']; }}</option>
                @endforeach
            </select>
            <input type="submit" class="btn btn-success btn-sm" value="Tải xuống tập tin"> 
        </form>
    </div>
@endsection