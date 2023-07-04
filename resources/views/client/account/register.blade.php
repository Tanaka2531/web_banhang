@extends('client.account.index')
@section('content')
    <div class="body-register bg-radial-linear:dark-mix-white">
        <section class="register">
            <div class="register__inner">
                <div class="register__title general__title">
                    <h2>Đăng ký nhanh</h2>
                </div>
                <form class="register__form" method="post" action="">
                    <div class="register__input-list">
                        <div class="register__input-item">
                            <label class="register__label" for="username">Tên người dùng</label>
                            <input class="register__input" id="username" type="text" value="" placeholder="Tên người dùng">
                        </div>
                        <div class="register__input-item">
                            <label class="register__label" for="email">Email</label>
                            <input class="register__input" id="email" type="email" value="" placeholder="Email">
                        </div>
                        <div class="register__input-item">
                            <label class="register__label" for="phone">Số điện thoại</label>
                            <input class="register__input" id="phone" type="text" value="" placeholder="Số điện thoại" pattern="[0-9]{10}">
                        </div>
                        <div class="register__input-item">
                            <label class="register__label" for="password">Mật khẩu</label>
                            <div class="register__input-item is-password">
                                <input class="register__input" id="password" type="password" value="" placeholder="Mật khẩu">
                                <i class="register__input-icon">icon</i>
                            </div>
                        </div>
                        <div class="register__input-item">
                            <label class="register__label" for="comfirm-password">Xác nhận mật khẩu</label>
                            <div class="register__input-item is-password">
                                <input class="register__input" id="comfirm-password" type="password" value="" placeholder="Xác nhận mật khẩu">
                                <i class="register__input-icon">icon</i>
                            </div>
                        </div>
                        <div class="register__button-item">
                            <button type="submit" name="register" class="register__button">Đăng ký</button>
                            <button type="reset" class="register__button">Nhập lại</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
