<div class="header_main">
    <div class="title_main">{{ $pageName }}</div>
    <div class="box_noti_avt">
        <div class="contianer_noti">
            <div class="flex_noti">
                <span class="icon_noti" ><ion-icon name="notifications-outline"></ion-icon></span>
                <span class="click_act">
                    <ion-icon name="chevron-down-outline"></ion-icon>
                </span>
            </div>
            <p class="numb_noti">2</p>
            <ul class="ul_noti">
                <li><a href="">Liên hệ</a></li>
                <li><a href="">thông báo mới</a></li>
                <li><a href="">bình luận</a></li>
                <li><a href="">...</a></li>
            </ul>
        </div>
        <div class="container_avt">
            <div class="flex_avt">
                <span>Hi, {{ Auth::guard('user')->user()->fullname }}</span>
                <img src="{{ asset('adminate/images/avt.jpg') }}" width="35" height="35" alt="">
            </div>
            <ul class="ul_avt">
                <li><a href="">Quản lí thông tin</a></li>
                <li><a href="{{ route('handlelogout') }}">Đăng xuất</a></li>
                <li><a href="">...</a></li>
            </ul>
        </div>
    </div>
</div>