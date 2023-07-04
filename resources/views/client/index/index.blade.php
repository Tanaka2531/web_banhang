<?php
use App\Http\Controllers\Clients\IndexController;
?>
@extends('client.index')
@section('content')
    @include('client.layouts.slide')

    @foreach (IndexController::loadLevel1Cate() as $category)
        @if ($category->photo)
            <section class="product--featured mt-5">
                <div class="wrap-content">
                    <a class="product__banner d-block mb-3" href="{{ route('categoriesList',['name_list'=>$category->name,'id_list'=>$category->id]) }}">
                        <figure class="product__banner-inner">
                            <img src="{{ asset('upload/category/' . $category->photo) }}" alt="{{ $category->name }}">
                            <figcaption class="figcaption-hidden">{{ $category->name }}</figcaption>
                        </figure>
                    </a>
                    <div class="product--featured__group">
                        <div class="product-parent__list mb-4">
                            @if (indexController::loadLevel2Cate($category->id) != false)
                                @foreach (IndexController::loadLevel2Cate($category->id) as $category_cat)
                                    <div class="product-parent__item">
                                        <a class="product-parent__item-inner" href="{{ route('categoriesCat',['name_list'=>$category->name,'id_list'=>$category->id,'name_cat'=>$category_cat->name,'id_cat'=>$category_cat->id]) }}">
                                            <div class="product-parent__photo">
                                                <figure class="product-parent__photo-inner">
                                                    <img src="{{ asset('upload/category/' . $category_cat->photo) }}"
                                                        alt="{{ $category_cat->name }}">
                                                    <figcaption class="figcaption-hidden">{{ $category_cat->name }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="product-parent__info">
                                                <h3 class="product-parent__name">{{ $category_cat->name }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @if (indexController::loadProductFeatured($category->id) != false)
                            <div class="product__list flex-list">
                                @foreach (IndexController::loadProductFeatured($category->id) as $product)
                                    @include('client.layouts.components.ProductItem')
                                @endforeach
                            </div>
                            <a class="product--featured__group-btn" href="{{ route('categoriesList',['name_list'=>$category->name,'id_list'=>$category->id]) }}">
                                Xem toàn bộ sản phẩm
                                <ion-icon name="arrow-forward"></ion-icon>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    @if (count($news))
    <section class="news--featured mt-5">
        <div class="wrap-content">
            <div class="home__title">
                <h2>Tin tức</h2>
            </div>
            <div class="news__list swiper swiper-news">
                <div class="swiper-wrapper">
                    @foreach ($news as $item)
                        <div class="swiper-slide">
                            @include('client.layouts.components.NewsItem')
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button swiper-news-prev swiper-button-prev"></div>
                <div class="swiper-button swiper-news-next swiper-button-next"></div>
            </div>
        </div>
    </section>        
    @endif
@endsection
