<div class="header_main">
    <div class="title_main"><span><ion-icon name="settings-outline"></ion-icon></span> {{ $pageName }}</div>
    <div class="box_noti_avt">
        <div class="contianer_noti">
            <div class="flex_noti">
                <span class="icon_noti" ><ion-icon name="notifications-outline"></ion-icon></span>
                <span class="click_act">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
            </div>
            <p class="numb_noti">0</p>
            <ul class="ul_noti">
                <li><a href="{{ route('orders') }}">Thông báo đơn hàng</a></li>
            </ul>
        </div>
        <div class="container_avt">
            <div class="flex_avt">
                <a href="{{ route('loadupdatemember_admins',['id' => Auth::guard('user')->user()->id]) }}">Xin chào, {{ Auth::guard('user')->user()->fullname }}</a>
                <img src="{{ (Auth::guard('user')->user()->photo != NULL)? asset('upload/member_admins/'.Auth::guard('user')->user()->photo) : asset('adminate/images/552721.png') }}" width="35" height="35" alt="">
            </div>
            <ul class="ul_avt">
                <li><a href="{{ route('loadupdatemember_admins',['id' => Auth::guard('user')->user()->id]) }}">Quản lí thông tin</a></li>
                <li><a href="{{ route('change_passwork_admin') }}">đổi mật khẩu</a></li>
                <li><a href="{{ route('handlelogout') }}">Đăng xuất</a></li>
            </ul>
        </div>
        @if(session('noti') != NULL)
            <div class="arlert_tong">
                {{ session('noti') }}
            </div>
        @endif
    </div>
</div>