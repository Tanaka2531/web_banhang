// Menu Scroll
function MenuScroll() {
    if ($('.menu')) {
        var headerHeight = $('#primary-header').outerHeight(true);
        var headerBlockHeight = $('.header__block').outerHeight(true);
        var menuHeight = $('.menu').outerHeight(true);

        $(window).scroll(function() {
            if ($(window).scrollTop() >= (headerHeight + 50)) {
                $('.menu').addClass('has-scroll');
                $('.slideshow').css({ marginTop: menuHeight });
            };
            if ($(window).scrollTop() <= headerBlockHeight) {
                $('.menu').removeClass('has-scroll');
                $('.slideshow').css({ marginTop: 0 });
            };
        });
    };
};

// Slideshow
function SlideShow() {
    var Swipes = new Swiper('.swiper.swiper-slideshow', {
        loop: true,
        speed: 800,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.swiper-button-next.swiper-slide-next',
            prevEl: '.swiper-button-prev.swiper-slide-prev',
        },
        scrollbar: {
            hide: true,
        },
        // pagination: {
        //     el: '.swiper-pagination',
        // },
    });
};

// News
function News() {
    var Swipes = new Swiper('.swiper.swiper-news', {
        loop: true,
        speed: 800,
        slidesPerView: 2,
        spaceBetween: 20,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: '.swiper-button-next.swiper-news-next',
            prevEl: '.swiper-button-prev.swiper-news-prev',
        },
        scrollbar: {
            hide: true,
        },
        // pagination: {
        //     el: '.swiper-pagination',
        // },
    });
};

$(document).ready(function() {
    // MenuScroll();
    SlideShow();
    News();
});