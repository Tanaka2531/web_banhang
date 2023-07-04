@extends('client.account.index')
@section('content')
    <div class="body-container bg-radial-linear:dark-mix-white">
        <section class="account">
            <div class="account__inner">
                <div class="account__title">
                    <h2 class="title">Đăng nhập</h2>
                </div>
                <form class="account__form" method="POST" action="">
                    @csrf
                    <div class="account__item">
                        <label class="account__label" for="username">Tên đăng nhập</label>
                        <div class="account__input">
                            <input type="text" name="username" id="username" value="{{ old('username') }}" required  autocomplete="text" autofocus> 
                        </div>
                    </div>
                    <div class="account__item">
                        <label class="account__label" for="password">Mật khẩu</label>
                        <div class="account__input">
                            <input type="password" name="password" id="password" value="{{ old('password') }}" required autocomplete="current-password">
                            <div class="account__input-icon">eyes</div>
                        </div>
                    </div>
                    <div class="account__item">
                        <div class="account__button">
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
