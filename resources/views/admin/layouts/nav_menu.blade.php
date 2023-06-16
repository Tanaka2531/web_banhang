<div class="fixed_menu_bar">
    <div class="logo_main">
        <a href="#">
            <img src="{{ asset('admin/images/img1.jpg') }}" width="50" height="50" alt="">
        </a>
        <div class="tab_zoom">
            <ion-icon name="reorder-four-outline"></ion-icon>
        </div>
    </div>
    <ul class="list_nav_menu">
        <li>
            <p>
                <a href="{{ route('products') }}"><ion-icon name="construct-outline"></ion-icon><span>Quản lý Sản Phẩm</span></a>
                <ion-icon name="chevron-down-circle-outline"></ion-icon>
            </p>
            <ul class="ul_child">
                <li>
                    <a href="{{ route('products') }}">Sản phẩm</a>
                </li>
                <li>
                    <a href="../main_cate/index_cate.html">Quản lý loại sản phẩm</a>
                </li>
                <li>
                    <a href="{{ route('sizes') }}">Quản lý dung lượng</a>
                </li>
                <li>
                    <a href="{{ route('colors') }}">Quản lý màu sắc</a>
                </li>
                <li>
                    <a href="../main_supplier/index_supplier.html">Quản lý nhà cung cấp</a>
                </li>
            </ul>
            
        </li>   
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Quản lý Đơn hàng</span></a>
        </li>      
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Quản lý Tài khoản</span></a>
        </li> 
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Quản lý Mã ưu đãi</span></a>
        </li>
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Quản lý Tin tức</span></a>
        </li>
        
        <li>
            <a href=""><ion-icon name="construct-outline"></ion-icon><span>Quản lý thống kê</span></a>
        </li>
    </ul>   
</div> 