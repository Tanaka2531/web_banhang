@extends('client.index')
@section('content')
    <div class="wrap-main">
        <section class="product">
            <div class="wrap-content">
                <div class="product-detail" data-id="{{ $productDetail['id'] }}">
                    <div class="product-detail--top">
                        <div class="product-detail--top-left">
                            <div class="product-detail__photo-parent">
                                <div class="product-detail__photo-parent-list swiper parentGallery" thumbsSlider="">
                                    <div class="swiper-wrapper">
                                        <div class="product-detail__photo-parent-item swiper-slide">
                                            <figure class="product-detail_photo-inner">
                                                <img src="{{ asset('upload/products/' . $productDetail['photo']) }}"
                                                    alt="{{ $productDetail['name'] }}">
                                                <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                                            </figure>
                                        </div>
                                        @foreach ($productPhotoChild as $photoChild)
                                            <div class="product-detail__photo-parent-item swiper-slide">
                                                <figure class="product-detail_photo-inner">
                                                    <img src="{{ asset('upload/products/gallery/' . $photoChild['photo']) }}"
                                                        alt="{{ $productDetail['name'] }}">
                                                    <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                                                </figure>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="custom-swipper-button swiper-button-next"></div>
                                    <div class="custom-swipper-button swiper-button-prev"></div>
                                </div>
                            </div>
                            <div class="product-detail__photo-child">
                                <div class="product-detail__photo-child-list swiper childGallery" thumbsSlider="">
                                    <div class="swiper-wrapper">
                                        <div class="product-detail__photo-child-item swiper-slide">
                                            <figure class="product-detail_photo-inner">
                                                <img src="{{ asset('upload/products/' . $productDetail['photo']) }}"
                                                    alt="{{ $productDetail['name'] }}">
                                                <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                                            </figure>
                                        </div>
                                        @foreach ($productPhotoChild as $photoChild)
                                            <div class="product-detail__photo-child-item swiper-slide">
                                                <figure class="product-detail_photo-inner">
                                                    <img src="{{ asset('upload/products/gallery/' . $photoChild['photo']) }}"
                                                        alt="{{ $productDetail['name'] }}">
                                                    <figcaption class="figcaption-hidden">{{ $productDetail['name'] }}
                                                </figure>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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
                                @empty(!$productBrand)
                                    <div class="product-detail__attr mb-3">
                                        <p class="product-detail__label">Hãng: </p>
                                        <div class="product-detail__attr-name">{{ $productBrand['name'] }}</div>
                                    </div>
                                @endempty
                                <div class="product-detail__price mb-3">
                                    <p class="product-detail__label">Giá bán</p>
                                    <div class="product-detail__price-item">
                                        <span class="product-detail__price-new">
                                            <span>Từ</span> @convert($productDetail['price_from'])
                                            <span>đến</span> @convert($productDetail['price_to'])
                                        </span>
                                        <span class="product-detail__price-old"></span>
                                    </div>
                                </div>
                                @empty(!$sizeName)
                                    <div class="product-detail__storage mb-3">
                                        <div class="product-detail__label">Dung lượng</div>
                                        <div class="storage__list">
                                            @foreach ($sizeName as $sizes)
                                                @foreach ($sizes as $size)
                                                    <div class="storage__item" data-id="{{ $size->id }}">
                                                        <div class="storage__name">{{ $size->name }}</div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                @endempty
                                @empty(!$clrName)
                                    <div class="product-detail__color">
                                        <div class="product-detail__label">Màu sắc</div>
                                        <div class="color__list">
                                            @foreach ($clrName as $clrs)
                                                @foreach ($clrs as $clr)
                                                    <div class="color__item" data-id="{{ $clr->id }}"
                                                        style="--bg-clr:{{ $clr->code_color }};">
                                                        <span class="d-none">{{ $clr->name }}</span>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                @endempty
                            </div>
                            <div class="product-detail__criteria">
                                <div class="product-detail__criteria-list">
                                    <div class="product-detail__criteria-item">
                                        <div class="product-detail__criteria-item-inner">
                                            <div class="criteria__item-photo">
                                                <figure class="criteria__item-photo-inner">
                                                    <img src="{{ asset('adminate/images/noimg.jpg') }}" alt="">
                                                </figure>
                                            </div>
                                            <div class="criteria__item-info">
                                                <div class="criteria__item-info-inner">
                                                    <h3 class="criteria__item-name">asdasdasd</h3>
                                                </div>
                                            </div>
                                        </div>
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
