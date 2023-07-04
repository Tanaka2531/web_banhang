@extends('client.index')
@section('content')
    <div class="wrap-main">        
        <section class="product">
            <div class="wrap-content">
                <div class="product-detail">
                    <div class="product-detail--top">
                        <div class="product-detail__photo">
                            <figure class="product-detail_photo-inner hvr-flash-shape">
                                <img src="{{ asset('upload/products/' . $productDetail['photo']) }}"
                                    alt="{{ $productDetail['name'] }}">
                                <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                            </figure>
                        </div>
                        <div class="product-detail__info">
                            <h2 class="product-detail__name mb-2">{{ $productDetail['name'] }}</h2>
                            <div class="product-detail__rating mb-3">
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <ion-icon style="font-size:var(--font-sz-4xl); color:#F59E0B;" name="star">
                                    </ion-icon>
                                <?php } ?>
                            </div>
                            <div class="product-detail__price mb-3">
                                <p class="product-detail__label">Giá bán</p>
                                <span class="product-detail__price-new">@convert($productDetail['price_regular'])</span>
                                <span class="product-detail__price-old">@convert($productDetail['price_sale'])</span>
                            </div>
                            <div class="product-detail__properties-storage mb-3">
                                    <div class="properties-storage__item">
                                        <div class="properties-storage__name">
                                            iPhone 14
                                        </div>
                                        <div class="properties-storage__price">1</div>
                                        <div class="properties-storage__price d-none">1</div>
                                    </div>
                            </div>
                            <div class="product-detail__color">
                                <div class="product-detail__label">Màu sắc</div>
                                <div class="color__list">
                                    <?php for ($i = 0; $i < 4; $i++) { ?>
                                        <div class="color__item <?= ($i == 0) ? 'active' : null ?>">
                                            <figure class="color__photo">
                                                <img src="/assets/images/product/iphone-<?= $i + 1 ?>.png" alt="iPhone 14 128GB - Chính hãng VN/A">
                                            </figure>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail--bottom">

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
