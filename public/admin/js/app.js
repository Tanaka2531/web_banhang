$('.tab_zoom').click(function() {
    if($(this).hasClass('act')) {
        $('.left_nav_menu').removeClass('act');
        $('.right_nav_menu').removeClass('act');
        $(this).removeClass('act');
    } else {
        $('.left_nav_menu').addClass('act');
        $('.right_nav_menu').addClass('act');
        $(this).addClass('act');
    }
});

$('.list_nav_menu li p').click(function() {
    if($(this).hasClass('act')) {
        $('.ul_child').removeClass('act');       
        $(this).removeClass('act');
    } else {
        $('.ul_child').addClass('act');
        $(this).addClass('act');
    }
});

$(document).on('click','.click_act', function() {
    if($(this).hasClass('act')) {
        $('.ul_noti').removeClass('act');
        $(this).removeClass('act');
    } else {
        $('.ul_noti').addClass('act');
        $(this).addClass('act');
    }
});

$(document).on('click','.flex_avt img', function() {
    if($(this).hasClass('act')) {
        $('.ul_avt').removeClass('act');
        $(this).removeClass('act');
    } else {
        $('.ul_avt').addClass('act');
        $(this).addClass('act');
    }
});

