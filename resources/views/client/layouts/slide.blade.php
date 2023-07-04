@if (count($slides))
<section class="slideshow">
    <div class="slideshow__list swiper swiper-slideshow">
        <div class="swiper-wrapper">
            @foreach ($slides as $slide)
                <div class="swiper-slide slideshow__item">
                    <a class="slideshow__item-inner" href="{{ $slide['link'] }}" target="_blank">
                        <div class="slideshow__photo">
                            <figure class="slideshow__photo-inner">
                                <img src="{{ asset('upload/photo/' . $slide['photo']) }}" alt="{{ $slide['name'] }}">
                                <figcaption class="figcaption-hidden">{{ $slide['name'] }}</figcaption>
                            </figure>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-button swiper-slide-prev swiper-button-prev"></div>
        <div class="swiper-button swiper-slide-next swiper-button-next"></div>
    </div>
</section>    
@endif

@if (count($banners))
<section class="banner__ads">
    <div class="wrap-content">
        <div class="banner__ads-list">
            @foreach ($banners as $banner)
                <div class="banner__ads-item">
                    <a class="banner__ads-inner" href="{{ $banner['link'] }}" target="_blank">
                        <div class="banner__ads-photo">
                            <figure class="banner__ads__photo-inner">
                                <img src="{{ asset('upload/photo/' . $banner['photo']) }}" alt="{{ $banner['name'] }}">
                                <figcaption class="figcaption-hidden">{{ $banner['name'] }}</figcaption>
                            </figure>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
