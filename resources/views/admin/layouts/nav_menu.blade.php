<div class="fixed_menu_bar">
    <div class="logo_main">
        <a href="#">
            <img src="{{ asset('adminate/images/img1.jpg') }}" width="50" height="50" alt="">
        </a>
        <div class="tab_zoom">
            <ion-icon name="reorder-four-outline"></ion-icon>
        </div>
    </div>
    <ul class="list_nav_menu">
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Bảng điều khiển</span></a>
        </li> 
        <li>
            <p data-vitri="1">
                <a class="a_menu"><ion-icon name="construct-outline"></ion-icon><span>Quản lý Sản Phẩm</span></a>
                <ion-icon name="chevron-down-circle-outline"></ion-icon>
            </p>
            <ul class="ul_child ul_child_1">
                <li>
                    <a href="{{ route('products') }}">Sản phẩm</a>
                </li>
                <li>
                    <a href="{{ route('listCategories') }}">Quản lý danh mục cấp 1</a>
                </li>
                <li>
                    <a href="{{ route('category_two') }}">Quản lý danh mục cấp 2</a>
                </li>
                <li>
                    <a href="{{ route('listBrands') }}">Quản lý hãng</a>
                </li>
                <li>
                    <a href="{{ route('sizes') }}">Quản lý dung lượng</a>
                </li>
                <li>
                    <a href="{{ route('colors') }}">Quản lý màu sắc</a>
                </li>
            </ul>
        </li>   
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Quản lý Đơn hàng</span></a>
        </li> 
        <li>
            <p data-vitri="2">
                <a class="a_menu"><ion-icon name="construct-outline"></ion-icon><span>Quản lý Tài khoản</span></a>
                <ion-icon name="chevron-down-circle-outline"></ion-icon>
            </p>
            <ul class="ul_child ul_child_2">
                <li>
                    <a href="{{ route('member_admins') }}">Tài khoản Quản trị</a>
                </li>
                <li>
                    <a href="">Tài khoản Thành viên</a>
                </li>
            </ul>
        </li>      
        <li>
            <a href="{{ route('blogs') }}"><ion-icon name="construct-outline"></ion-icon><span>Quản lý Tin tức</span></a>
        </li>
        
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Quản lý thống kê</span></a>
        </li>
    </ul>   
</div> 