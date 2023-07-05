<?php
use App\Http\Controllers\Clients\IndexController;
?>
<section class="footer--top mt-5">
    <div class="footer-article">
        <div class="wrap-content d-flex flex-wrap justify-content-between">
            <div class="footer-article--1">
                <div class="footer__contact mb-3">
                    <h2 class="footer__title">Thông tin liên hệ</h2>
                    <div class="footer__info">
                        <p>Địa chỉ: 123 abc, Phường 7, Gò Vấp, Hồ Chí Minh</p>
                        <p>Email:
                            <a style="color:blue;" href="mailto:trungquan2531@gmail.com">trungquan2531@gmail.com</a>
                        </p>
                        <p>Tư vấn:
                            <a href="tel:0339311897">0339 311 897</a>
                        </p>
                        <p>Hỗ trợ:
                            <a href="tel:0339311897">0339 311 897</a>
                        </p>
                        <p>Góp ý:
                            <a href="tel:0339311897">0339 311 897</a>
                        </p>
                    </div>
                </div>                
            </div>
            <div class="footer-article--2">
                <h2 class="footer__title">Chính sách mua hàng</h2>
                <ul class="footer-article__ul">
                    <?php for ($i = 0; $i < 5; $i++) { ?>
                    <li>
                        <a href="">Chính sách <?= $i + 1 ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-article--3">
                <div class="footer__social">
                    <h2 class="footer__title">Kết nối với chúng tôi</h2>
                    @if (IndexController::social()!=false)
                    <ul>
                        @foreach (IndexController::social() as $social)
                            <li>
                                <a class="hvr-float-shadow" href="{{ $social->link }}" target="_blank">
                                    <figure>
                                        <img src="{{ asset('upload/photo/' . $social->photo) }}"
                                            alt="{{ $social->name }}">
                                        <figcaption>{{ $social->name }}</figcaption>
                                    </figure>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @endif        
                </div>
            </div>
            <div class="footer-article--4">
                <h2 class="footer__title">Hệ thống chi nhánh</h2>
                <ul class="footer-article__ul footer__branch">
                    <?php for ($i = 0; $i < 4; $i++) { ?>
                    <li>
                        <a href="">Chi nhánh <?= $i + 1 ?>: 123 bfc, Phường 7, Gò Vấp, Hồ Chí Minh</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-powered">
        <div class="wrap-content">
            <div class="footer-copyright">
                © Bản quyền thuộc về LTC - NTQ. Cung cấp bởi LTC - NTQ.
            </div>
        </div>
    </div>
</section>
<section class="footer--bottom"></section>
