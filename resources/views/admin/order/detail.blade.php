@extends('admin.index')
@section('body')
    <div class="box_form">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="box_btn_main">
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
                                        <div class="content_info">ABCDEFG</div>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Tên khách hàng</div>
                                        <div class="content_info">Nguyễn Văn A</div>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Địa chỉ giao hàng</div>
                                        <input type="text" class="form-control" name="" id="" value="Đường 6A, P. Sáu Sáu, Quận 6, Tp. Hồ Chí Minh">
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Nội dung đính kèm</div>
                                        <textarea type="text" class="form-control" name="" id="">Gói hàng cần thận</textarea>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Hình thức thanh toán</div>
                                        <select class="form-select" aria-label="Default select example" name="status_product_hot">
                                            <option value="0" selected>Chọn hình thức</option>
                                            <option value="1">Chuyển khoảng</option>
                                            <option value="2">Trực tiếp</option>
                                            <option value="3">Khi nhận hàng</option>
                                        </select>
                                    </div>
                                    <div class="item_info">
                                        <div class="title_info">Trạng thái đơn hàng</div>
                                        <select class="form-select" aria-label="Default select example" name="status_product_hot">
                                            <option value="0" selected>Chọn trạng thái</option>
                                            <option value="1">Chưa xem</option>
                                            <option value="2">Đã xem</option>
                                            <option value="3">Chưa xác nhận</option>
                                            <option value="4">Đã xác nhận</option>
                                            <option value="5">Chưa vận chuyển</option>
                                            <option value="6">Đã vận chuyển</option>
                                            <option value="5">Đã giao</option>
                                            <option value="6">Đã hủy</option>
                                        </select>
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
                                        <th style="width: 200px;" class="text-end" scope="col">Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody class="sty_body_table">
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center"><img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="100" height="100" alt=""></th>
                                        <th>ABC</th>
                                        <th class="text-center">256GB</th>
                                        <th class="text-center">Xanh Dương</th>
                                        <th class="text-center">1</th>
                                        <th class="txt_green text-center">27.000.000đ</th>
                                        <th class="txt_red text-end" >27.000.000đ</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center"><img class="img_main" src="{{ asset('adminate/images/noimg.jpg') }}" width="100" height="100" alt=""></th>
                                        <th>ABC</th>
                                        <th class="text-center">256GB</th>
                                        <th class="text-center">Xanh Dương</th>
                                        <th class="text-center">1</th>
                                        <th class="txt_green text-center">27.000.000đ</th>
                                        <th class="txt_red text-end" >27.000.000đ</th>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="box_total_order">
                                <div class="item_Ship">
                                    <span>Tạm tính</span>
                                    <span>40.000đ</span>
                                </div>
                                <div class="item_Ship">
                                    <span>Phí ship</span>
                                    <span>40.000đ</span>
                                </div>
                                <div class="item_Ship">
                                    <span>Tổng tiền</span>
                                    <span>40.000đ</span>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </form>
    </div>
@endsection