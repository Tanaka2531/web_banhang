<!DOCTYPE html>
<html lang="vi">
@include('admin.layouts.head')
<body>
    <div class="wap_main">
        <div class="wap_500"> 
            <div class="box_form_login">
                <form action="{{ route('handlelogin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box_input">
                        <label for="title">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                    </div>
                    <div class="box_input">
                        <label for="title">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                    </div>
                    <div class="btn_login">
                        <input type="submit" class="btn btn-primary" value="Đăng nhập">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('admin.layouts.js')
</body>
</html>

