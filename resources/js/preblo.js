$(".btn").on('click', function () {
        $('#pop-up').fadeIn('slow');
    });

$(".pop-up-child").children('p').on('click', function () {
    $('#pop-up').fadeOut('fast');
});

$('.map-menu1').on('click',function (element) {
    $('#mapcontainer').attr('style','height:350px; position:relative');
    $('.map-menu1').hide();
    $('.map-menu2').show();
})

$('.map-menu2').on('click',function (element) {
    $('#mapcontainer').attr('style','height:200px; position:relative');
    $('.map-menu1').show();
    $('.map-menu2').hide();
})

let Areas = ['Area0', 'Area1', 'Area2', 'Area3', 'Area4', 'Area5', 'Area6', 'Area7'];

Areas.forEach(area => {
    $('.'+area).hide();
    $('#'+area).on('click',(element)=>{
        if ($('.'+area).css('display') == 'block') {
            $('.'+area).hide();
        }else{
            $('.'+area).fadeIn(1000);
        }
    })
});

$('#kankou').on('click',()=>{
    if ($('.観光').css('display') == 'block') {
        $('.観光').hide();
    }else{
        $('.観光').fadeIn(1000);
    }
})

$('#shukuhaku').on('click',(val)=>{
    if ($('.宿泊').css('display') == 'block') {
        $('.宿泊').hide();
    }else{
        $('.宿泊').show();
    }
})

$('#inshoku').on('click',(val)=>{
    if ($('.飲食').css('display') == 'block') {
        $('.飲食').hide();
    }else{
        $('.飲食').show();
    }
})

$('#hokkaido').on('click',()=>{
    prefSelect($('.北海道・東北'));
})
$('#kanto').on('click',()=>{
    prefSelect($('.関東'));
})
$('#hokuriku').on('click',()=>{
    prefSelect($('.北陸'));
})
$('#tyubu').on('click',()=>{
    prefSelect($('.中部'));
})
$('#kansai').on('click',()=>{
    prefSelect($('.関西'));
})
$('#tyugoku').on('click',()=>{
    prefSelect($('.中国'));
})
$('#sikoku').on('click',()=>{
    prefSelect($('.四国'));
})
$('#kyushu').on('click',()=>{
    prefSelect($('.九州・沖縄'));
})

function prefSelect(params) {
    if (params.css('display')==="block") {
        params.hide();
    }else{
        params.show();
    }
}


