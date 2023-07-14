<?php
use App\Http\Controllers\OrderController;
?>
@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="{{ route('updateOrder', ['id' => $orderInfo->id]) }}" method="POST" enctype="multipart/form-data">
            <div class="box_btn_main">
                @csrf
                <input type="submit" class="btn btn-primary gradient-buttons" value="Cập nhật">
            </div>
            <div class="flex_form">
                <div class="left_form full_form">
                    <div class="box_list_img">
                        <div class="card">
                            <div class="card-header">Thông tin chung</div>
                            <div class="card-body">
                                <div class="box_info">
                                    <div class="item_info">
                                        <div class="title_info">Mã đơn hàng</div>
                                        <div class="content_info" style="color:#ec2d3f;font-weight:bold;">
                                            {{ $orderInfo->code_order }}</div>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Tên khách hàng</div>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $orderInfo->name }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Số điện thoại</div>
                                        <input type="number" class="form-control" name="phone" id="phone"
                                            value="{{ $orderInfo->phone }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Email</div>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $orderInfo->email }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Địa chỉ giao hàng</div>
                                        <input type="text" class="form-control" name="address" id="address"
                                            value="{{ $orderInfo->address }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Ghi chú</div>
                                        <input type="text" class="form-control" name="note" id="note"
                                            value="{{ $orderInfo->note }}">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Hình thức thanh toán</div>
                                        <div class="content_info">
                                            {{ OrderController::orderPayments($orderInfo->payments)->name }}
                                        </div>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Trạng thái đơn hàng</div>
                                        @if ($orderInfo->status_order != 'Đã hủy')
                                            <select class="form-select" aria-label="Default select example"
                                                name="status_order">
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="Chờ xác nhận"
                                                    {{ $orderInfo->status_order == 'Chờ xác nhận' ? 'selected' : null }}>
                                                    Chờ xác nhận</option>
                                                <option value="Đã xác nhận"
                                                    {{ $orderInfo->status_order == 'Đã xác nhận' ? 'selected' : null }}>
                                                    Đã xác nhận</option>
                                                <option value="Chờ vận chuyển"
                                                    {{ $orderInfo->status_order == 'Chờ vận chuyển' ? 'selected' : null }}>
                                                    Chờ vận chuyển</option>
                                                <option value="Đã vận chuyển"
                                                    {{ $orderInfo->status_order == 'Đã vận chuyển' ? 'selected' : null }}>
                                                    Đã vận chuyển</option>
                                                <option value="Đã giao"
                                                    {{ $orderInfo->status_order == 'Đã giao' ? 'selected' : null }}>
                                                    Đã giao</option>
                                                <option value="Đã hủy"
                                                    {{ $orderInfo->status_order == 'Đã hủy' ? 'selected' : null }}>
                                                    Đã hủy</option>
                                            </select>
                                        @else
                                            <div class="content_info">{{ $orderInfo->status_order }}</div>
                                        @endif
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Trạng thái thanh toán</div>
                                        @if ($orderInfo->status_payment != 'Đã thanh toán' && $orderInfo->status_order != 'Đã hủy')
                                            <select class="form-select" aria-label="Default select example"
                                                name="status_payment">
                                                <option value="0">Chọn trạng thái</option>
                                                <option value="Chưa thanh toán"
                                                    {{ $orderInfo->status_payment == 'Chưa thanh toán' ? 'selected' : null }}>
                                                    Chưa thanh toán</option>
                                                <option value="Đã thanh toán"
                                                    {{ $orderInfo->status_payment == 'Đã thanh toán' ? 'selected' : null }}>
                                                    Đã thanh toán</option>
                                            </select>
                                        @else
                                            <div class="content_info">{{ $orderInfo->status_payment }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">Thông tin sản phẩm</div>
                            <div class="card-body">
                                <table class="table table_list_product align-middle">
                                    <thead>
                                        <tr class="sty_head_table">
                                            <th style="width: 30px;" class="text-center" scope="col">STT</th>
                                            <th style="width: 150px;" class="text-center" scope="col">HÌnh ảnh</th>
                                            <th style="width: 250px;" scope="col">Tên sản phẩm</th>
                                            <th style="width: 150px;" class="text-center" scope="col">Dung lượng</th>
                                            <th style="width: 150px;" class="text-center" scope="col">Màu sắc</th>
                                            <th style="width: 100px;" class="text-center" scope="col">Số lượng</th>
                                            <th style="width: 200px;" class="text-center" scope="col">Giá bán</th>
                                            <th style="width: 200px;" class="text-center" scope="col">Tạm tính</th>
                                        </tr>
                                    </thead>
                                    <tbody class="sty_body_table">
                                        @foreach ($orderDetails as $k => $orderDetail)
                                            <tr>
                                                <th class="text-center">{{ $k + 1 }}</th>
                                                <th class="text-center">
                                                    <img class="img_main"
                                                        onerror="{{ asset('adminate/images/noimg.jpg') }}"
                                                        src="{{ asset('upload/products/' . $orderDetail->photo) }}"
                                                        width="100" height="100" alt="{{ $orderDetail->name }}">
                                                </th>
                                                <th> {{ OrderController::productDetails($orderDetail->id_product)->name }}
                                                </th>
                                                <th class="text-center">{{ $orderDetail->name_size }}</th>
                                                <th class="text-center">{{ $orderDetail->name_color }}</th>
                                                <th class="text-center">{{ $orderDetail->quantity }}</th>
                                                <th class="txt_green text-center">
                                                    <p class="m-0" style="color:#ec2d3f;">@convert($orderDetail->price_sale)</p>
                                                    <p class="m-0" style="color:#ccc;text-decoration: line-through;">
                                                        @convert($orderDetail->price_regular)
                                                    </p>
                                                </th>
                                                <th class="text-center">
                                                    <p class="m-0" style="color:#ec2d3f;">
                                                        @convert($orderDetail->price_sale * $orderDetail->quantity)
                                                    </p>
                                                    <p class="m-0" style="color:#ccc;text-decoration: line-through;">
                                                        @convert($orderDetail->price_regular * $orderDetail->quantity)
                                                    </p>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="box_total_order">
                                    <div class="item_Ship">
                                        <span style="font-weight:bold;">Tổng tiền:</span>
                                        <span style="color:#ec2d3f;font-weight:bold;">@convert($orderInfo->total_price)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
