@extends('admin.index')
@section('body')
    <div class="box_statistical">
        <div class="flex_statistical">
            <div class="item_statistical">
                <a href="{{ route('loadstatistical',['type' => 'products']) }}">
                    <div class="content_statistical">
                        <p>Xuất file excel danh sách sản phẩm</p>
                    </div>
                    <div class="img_statistical">
                    <ion-icon name="download-outline"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="item_statistical">
                <a href="{{ route('loadstatisticalcate',['type' => 'products']) }}">
                    <div class="content_statistical">
                        <p>Xuất file excel danh sách sản phẩm theo danh mục cấp 1</p>
                    </div>
                    <div class="img_statistical">
                        <ion-icon name="download-outline"></ion-icon>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection