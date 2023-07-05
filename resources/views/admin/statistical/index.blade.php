@extends('admin.index')
@section('body')
    <div class="box_statistical">
        <div class="flex_statistical">
            <div class="item_statistical">
                <a href="">
                    <div class="content_statistical">
                        <p>Thống kê sản phẩm bán chạy</p>
                    </div>
                    <div class="img_statistical">
                        <ion-icon name="phone-portrait-outline"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="item_statistical">
                <a href="">
                    <div class="content_statistical">
                        <p>Thống kê đơn hàng</p>
                    </div>
                    <div class="img_statistical">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </a>
            </div>
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
            <div class="item_statistical">
                <a href="">
                    <div class="content_statistical">
                        <p>Xuất file excel danh sách thành viên</p>
                    </div>
                    <div class="img_statistical">
                    <ion-icon name="download-outline"></ion-icon>
                    </div>
                </a>
            </div>
            <div class="item_statistical">
                <a href="{{ route('loadstatisticalcate',['type' => 'members']) }}">
                    <div class="content_statistical">
                        <p>Xuất file excel danh sách thành viên theo danh mục phân loại tài khoản</p>
                    </div>
                    <div class="img_statistical">
                        <ion-icon name="download-outline"></ion-icon>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection