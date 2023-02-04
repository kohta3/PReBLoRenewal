let displayImage = $(".image-parent");

$("[alt='showImage2']").mousemove(function (element) {
    let getUrl = $(this).attr('src');
    displayImage.attr('src', getUrl);
})

$('.imageChoiseLabel').on('click',function(element) {
    console.log($(this).attr('for'));
    if ($(this).attr('for')==='carousel1') {
        $('[alt="hotelImageUrl"]').attr('style','display:block;')
        $('[alt="roomImageUrl"]').attr('style','display:none;')
    }else{
        $('[alt="hotelImageUrl"]').attr('style','display:none;')
        $('[alt="roomImageUrl"]').attr('style','display:block;')
    }
})
