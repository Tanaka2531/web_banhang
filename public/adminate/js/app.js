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

$('.list_nav_menu li').click(function() {
    if($(this).hasClass('act')) {     
        $(this).removeClass('bgk_act');
    } else {
        $(this).addClass('bgk_act');
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

$(document).on('click','.delete_main',function() {  
    Swal.fire({
        title: 'Bạn chắc chắn xóa mục này?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Xóa',
        denyButtonText: 'Không',
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).data('id');
            var type = $(this).data('type');
            var type_man = $(this).data('type_man');
            var type_blogs = $(this).data('type_blogs');
            var cate = $(this).data('cate');
            if(type_man != '' && cate == 'man') {
                window.location.href = '../../' + type + '/delete/' + id + '/' + type_man + '/' + cate;
            } else if(type_blogs != '' && type_blogs != null) {
                window.location.href = '../' + type + '/delete/' + id + '/' + type_blogs;
            } else {
                window.location.href = type + '/delete/'+ id;
            }
           
        } else if (result.isDenied) {
            
        };
    });
});

$(document).on('change','#status_product_ajax',function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type:'GET',
        url: "ajax_loadstatus", 
        data: { 
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function (respose){
        if(respose != null) {
            alert('Cập nhật trạng thái thành công');
            setTimeout(function() {
                location.reload();
            }, 100);
        }
    });
});

$(document).on('change','#status_product_ajax_1',function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type:'GET',
        url: "ajax_loadstatushot", 
        data: { 
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function (respose){
        if(respose != null) {
            alert('Cập nhật trạng thái thành công');
            setTimeout(function() {
                location.reload();
            }, 100);
        }
    });
});


$(document).on('change','#status_brand_ajax',function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type:'GET',
        url: "ajax_loadstatusbrand", 
        data: { 
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function (respose){
        if(respose != null) {
            alert('Cập nhật trạng thái thành công');
            setTimeout(function() {
                location.reload();
            }, 100);
        }
    });
});

$(document).on('change','#status_cate_ajax',function() {
    var id_status = $(this).val();
    var id_prod = $(this).data('id');

    $.ajax({
        type:'GET',
        url: "ajax_loadstatuscate", 
        data: { 
            id_status: id_status,
            id_prod: id_prod
        },
    }).done(function (respose){
        if(respose != null) {
            alert('Cập nhật trạng thái thành công');
            setTimeout(function() {
                location.reload();
            }, 100);
        }
    });
});

$(document).on('change','#status_cate1_ajax',function() {
    var id_status = $(this).val();
    var id_cate1 = $(this).data('id');

    $.ajax({
        type:'GET',
        url: "ajax_loadstatuscateone", 
        data: { 
            id_status: id_status,
            id_cate1: id_cate1
        },
    }).done(function (respose){
        if(respose != null) {
            alert('Cập nhật trạng thái thành công');
            setTimeout(function() {
                location.reload();
            }, 100);
        }
    });
});

$(document).on('change','#status_blog_ajax',function() {
    var id_status = $(this).val();
    var id_blog = $(this).data('id');

    $.ajax({
        type:'GET',
        url: "../ajax_loadstatusblog", 
        data: { 
            id_status: id_status,
            id_blog: id_blog
        },
    }).done(function (respose){
        if(respose != null) {
            alert('Cập nhật trạng thái thành công');
            setTimeout(function() {
                location.reload();
            }, 100);
        }
    });
});

$(document).on('click','.btn_dlt_gallery',function() {
    var id_photo = $(this).data('id');

    $.ajax({
        type:'GET',
        url: "../../ajax_deletegallery", 
        data: { 
            id_photo: id_photo 
        },
    }).done(function (respose){
        if(respose != null) {
            alert('Xóa ảnh thành công');
            setTimeout(function() {
                location.reload();
            }, 500);
        }
    });
});

$(document).on('change','#search_cate',function() {
    var id_cate = $(this).val();

    $.ajax({
        type:'GET',
        url: "ajax_loadproduct", 
        data: { 
            id_cate: id_cate 
        },
    }).done(function (respose){
        if(respose != null) {
           var res = ''
           $.each(respose, function(key,value) {
                res += 
                '<tr>'+
                    '<td class="text-center">'+
                        '<input class="sty_checkbox form-check-input" type="checkbox">'+
                    '</td>'+
                    '<td class="text-center">'+(key+1)+'</td>'+
                    '<td class="text-center"><img class="img_main" src="../upload/products/'+value.photo+'" width="100" height="100" alt=""></td>'+
                    '<td>'+value.name+'</td>'+
                    '<td class="text-center">'+
                        '<span class="green_status"><ion-icon name="checkmark-circle-outline"></ion-icon></span>'+
                    '</td>'+
                    '<td class="text-center">'+
                        '<div class="flex_options">'+
                            '<a href="products/update/'+value.id+'"><span><ion-icon name="create-outline"></ion-icon></span></a>'+
                            '<a href="products/delete/'+value.id+'"><span><ion-icon name="trash-outline"></ion-icon></span></a>'+
                            '<a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>'+
                        '</div>'+
                    '</td>'+
                '</tr>';
           });

           $('.load_search').html(res);
           $('#search_brand').prop('disabled', true);
           $('.reload_search').addClass('act');
        }
    });
});

$(document).on('change','#search_brand',function() {
    var id_brand = $(this).val();

    $.ajax({
        type:'GET',
        url: "ajax_loadproduct_brand", 
        data: { 
            id_brand: id_brand
        },
    }).done(function (respose){
        if(respose != null) {
           var res = ''
           $.each(respose, function(key,value) {
                res += 
                '<tr>'+
                    '<td class="text-center">'+
                        '<input class="sty_checkbox form-check-input" type="checkbox">'+
                    '</td>'+
                    '<td class="text-center">'+(key+1)+'</td>'+
                    '<td class="text-center"><img class="img_main" src="../upload/products/'+value.photo+'" width="100" height="100" alt=""></td>'+
                    '<td>'+value.name+'</td>'+
                    '<td class="text-center">'+
                        '<span class="green_status"><ion-icon name="checkmark-circle-outline"></ion-icon></span>'+
                    '</td>'+
                    '<td class="text-center">'+
                        '<div class="flex_options">'+
                            '<a href="products/update/'+value.id+'"><span><ion-icon name="create-outline"></ion-icon></span></a>'+
                            '<a href="products/delete/'+value.id+'"><span><ion-icon name="trash-outline"></ion-icon></span></a>'+
                            '<a href=""><span><ion-icon name="eye-outline"></ion-icon></span></a>'+
                        '</div>'+
                    '</td>'+
                '</tr>';
           });
           $('.load_search').html(res);
           $('#search_cate').prop('disabled', true);
           $('.reload_search').addClass('act');
        }
    });
});
