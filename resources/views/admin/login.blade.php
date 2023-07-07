<!DOCTYPE html>
<html lang="vi">
@include('admin.layouts.head')
<body>
    <div class="wap_main">
        <div class="bgk_main">
            <div class="wap_500"> 
                <div class="box_form_login">
                    <div class="title_login">Đăng nhập</div>
                    <form action="{{ route('handlelogin') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box_input">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Tài khoản">
                        </div>
                        <div class="box_input">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                        </div>
                        <div class="btn_login">
                            <input type="submit" class="btn btn-primary" value="Đăng nhập">
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
    @include('admin.layouts.js')
</body>
</html>

