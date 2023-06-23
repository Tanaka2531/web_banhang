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
    var vitri = $(this).data('vitri');
    if($(this).hasClass('act')) {
        $('.ul_child').removeClass('act');       
        $(this).removeClass('act');
    } else {
        $('.ul_child').removeClass('act');
        $('.ul_child_'+vitri).addClass('act');
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

$(document).on('change','#cate_product_up',function() {
    var id_cate = $(this).val();
    $.ajax({
        type:'GET',
        url: "../../ajax_loadcate", 
        data: { 
            id_cate: id_cate 
        },
    }).done(function (respose){
        if(respose != null) {
            var res = '';
            res = '<option selected value="">Chọn loại sản phẩm</option>'
            $.each (respose, function(key,value) {
                res +='<option value="'+value.id+'">'+value.name+'</option>';
            });
            $('#cate_two_product').html(res);
        }
    });
});

$(document).on('change','#cate_product_add',function() {
    var id_cate = $(this).val();
    $.ajax({
        type:'GET',
        url: "../ajax_loadcate", 
        data: { 
            id_cate: id_cate 
        },
    }).done(function (respose){
        if(respose != null) {
            var res = '';
            res = '<option selected value="">Chọn loại sản phẩm</option>'
            $.each (respose, function(key,value) {
                res +='<option value="'+value.id+'">'+value.name+'</option>';
            });
            $('#cate_two_product').html(res);
        }
    });
});

