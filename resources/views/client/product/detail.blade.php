@extends('client.index')
@section('content')
    <div class="wrap-main">
        <section class="product">
            <div class="wrap-content">
                <div class="product-detail">
                    <div class="product-detail--top">
                        <div class="product-detail--top-left">
                            <div class="product-detail__photo">
                                <figure class="product-detail_photo-inner hvr-flash-shape">
                                    <img src="{{ asset('upload/products/' . $productDetail['photo']) }}"
                                        alt="{{ $productDetail['name'] }}">
                                    <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                                </figure>
                            </div>
                        </div>
                        <div class="product-detail--top-right">
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
                                    <span class="product-detail__price-new">
                                        <span>Từ</span> @convert($productDetail['price_from'])
                                        <span>đến</span> @convert($productDetail['price_to'])
                                    </span>
                                    <span class="product-detail__price-old"></span>
                                </div>
                                <div class="product-detail__storage mb-3">
                                    <div class="product-detail__label">Dung lượng</div>
                                    <div class="storage__list">
                                        @foreach ($sizeName as $sizes)
                                            @foreach ($sizes as $size)
                                                <div class="storage__item">
                                                    <div class="storage__name">{{ $size->name }}</div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-detail__color">
                                    <div class="product-detail__label">Màu sắc</div>
                                    <div class="color__list">
                                        @foreach ($clrName as $clrs)
                                            @foreach ($clrs as $clr)
                                                <div class="color__item" style="--bg-clr:{{ $clr->code_color }};">
                                                    <span class="d-none">{{ $clr->name }}</span>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
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
