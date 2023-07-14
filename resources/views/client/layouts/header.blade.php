<?php
use App\Http\Controllers\Clients\IndexController;
?>
<section class="header__block">
    <div class="wrap-content">
        <div class="header__block-inner">
            <div class="header__block--left">
                <a class="header__logo" href="{{ route('clientIndex') }}">
                    <figure class="header__logo-inner">
                        @if (IndexController::logo()!=false)                            
                        <img src="{{ asset('upload/photo/' . IndexController::logo()->photo) }}" alt="CaoThangMobile">
                        @else
                        <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="" />
                        @endif
                        <figcaption class="figcaption-hidden">CaoThangMobile</figcaption>
                    </figure>
                </a>
            </div>
            <div class="header__block--middle">
                <form action="{{ route('search_index') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="search__block">
                        <input type="text" class="search__input" name="key_search_index" placeholder="Bạn cần tìm gì?">
                        <input type="submit" class="btn_search_index" value="Tìm kiếm">
                    </div>
                </form>
            </div>
            <div class="header__block--right d-flex justify-content-between align-items-center">
                <div class="header__info">
                    <a class="header__info-inner" href="tel:0339311897" title="Gọi ngay">
                        <div class="header__info-icon">
                            <ion-icon name="call-outline"></ion-icon>
                        </div>
                        <div class="header__info-content">
                            <div class="header__hotline-title --color-black">Hotline</div>
                            <div class="header__hotline-number --color-red">0339311897</div>
                        </div>
                    </a>
                </div>
                <div class="header__info">
                    <a class="header__info-inner" href="{{ route('cart') }}" title="Giỏ hàng của bạn">
                        <div class="header__info-icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                        <div class="header__info-content">
                            <div class="header__cart-title --color-red">Giỏ hàng</div>
                            <div class="header__cart-title --color-black">Của bạn</div>
                        </div>
                    </a>
                </div>
                <div class="header__info">
                    <div class="header__info-inner has-account">
                        <div class="header__info-icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </div>
                        <div class="header__info-content">
                            @if (Auth::guard('client')->user())
                            <a href="{{ route('clientInfo') }}">Xin chào {{ Auth::guard('client')->user()->fullname }}</a>
                            <a class="header__account-logout --color-red d-block" href="{{ route('handleClientLogout') }}" title="Đăng xuất">Đăng xuất</a>
                            @else
                            <a class="header__account-sign-in --color-red d-block" href="{{ route('clientLogin') }}" title="Đăng nhập">Đăng nhập</a>
                            <a class="header__account-register --color-black d-block" href="{{ route('clientRegister') }}" title="Đăng ký">Đăng ký</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>