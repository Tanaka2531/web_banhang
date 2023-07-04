@extends('client.account.index')
@section('content')
<div class="account-section">
    <section class="account">
        <div class="account__inner">
            <div class="account__title general__title">
                <h2>Đăng nhập</h2>
            </div>
            <form class="account__form" method="post" action="">
                <div class="account__input-list">
                    <div class="account__input-item">
                        <input class="account__input" id="username" type="text" value="" placeholder="username">
                        <label class="account__label" for="username">Tên đăng nhập</label>
                    </div>
                    <div class="account__input-item">
                        <div class="account__input-item is-password">
                            <input class="account__input" id="password" type="password" value="" placeholder="abc123!@#">
                            <label class="account__label" for="password">Mật khẩu</label>
                            <i class="account__input-icon">
                                <ion-icon name="eye-off-outline"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="account__button-item">
                        <button type="submit" name="login" class="account__button">Đăng nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
