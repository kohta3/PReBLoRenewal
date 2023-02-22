// 新規投稿画面の表示操作
$(".btnform").on('click', function () {
        $('#pop-up').fadeIn('slow');
    });

$(".pop-up-child").children('p').on('click', function () {
    $('#pop-up').fadeOut('fast');
});

// 新規投稿画面のジャンル選択フォーム操作
function selectCategory(array,value) {
    $("#genre").empty();
    $("#genre").append('<option hidden>サブカテゴリ</option>');
    array.forEach(element => {
        if (element["maintype"]==value) {
            $("#genre").append('<option value="'+element['id']+'">'+ element['category'] +'</option>');
        }
    });
}

// 市区町村の選択フォーム
function selectCity(value) {
    $("#city").empty();
    $.ajax({
        type:"GET",
        url:"https://geoapi.heartrails.com/api/json?method=getCities&prefecture="+value,
        dataType:"json"
    }).done(function(data) {
        $("#city").append('<option hidden>市区町村</option>');
        data['response']['location'].forEach(element => {
            $("#city").append('<option value="'+element['city']+'">'+ element['city'] +'</option>');
        });
    })
}


// 地図表示設定
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

// 投稿画面の画像プレビュー
function refresh_img() {
    $("#array_img").val('');
    $("#img-preview").empty();
}

$("#array_img").on('click',function() {
    refresh_img();
})


//スポット投稿のsubmitキャンセル処理
function cancelSubmit() {
    if ($('#genre').val()=='サブカテゴリ') {
        alert('ジャンルが選択されていません。');
        return false;
    }else if ($('#pref').val()=='都道府県') {
        alert('都道府県が選択されていません。');
        return false;
    }else if ($('#city').val()=='市区町村') {
        alert('市区町村が選択されていません。');
        return false;
    }else if ($('#lat').val()=='') {
        alert('場所が選択されていません。');
        return false;
    }else if ($('#long').val()=='') {
        alert('場所が選択されていません。');
        return false;
    }else if ($('#title').val()==null) {
        alert('タイトルが入力されていません。');
        return false;
    }else if ($('#comment').val()==null) {
        alert('コメントが入力されていません。');
        return false;
    }else{
        alert('確認しました。');
        return true;
    }
}

$("#array_img").change(function(array_img) {
    console.log(array_img);
    let img_array = array_img.target.files;
    var url_array = new Array(img_array.length);
    var sum_fileSize=0;

    //画像枚数が4枚以下かand画像が30MB未満か?
    //条件に一致する場合画像プレビューを表示
    if (img_array.length>=5) {
        alert("選択された画像が最大4枚を超えています。\n画像を選択しなおしてください。");
        return refresh_img();
    } else if (sum_fileSize/1024000>30) {
        for (let i = 0; i < img_array.length; i++) {
            sum_fileSize+=img_array[i].size;
        };
        alert("ファイルサイズが30Mを超えています。\n画像を選択しなおしてください。");
        return refresh_img();
    }else{
        for (let index = 0; index < img_array.length; index++) {
            url_array[index]= window.URL.createObjectURL(img_array[index]);
            $("#img-preview").append('<img src="'+url_array[index]+'" class="col-md-3 add_info_image">');
        }
    }
})

//トップページサイドバーの操作
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


//registarとloginページのフロントバリデーション
function email_validation(val){
    let reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
    let email_chk = $('#email-check');
    if(reg.test(val)){
        email_chk.addClass('material-symbols-outlined').text('check_circle').css('color','lightgreen');
        $("#email").css({'border':'1px solid lightgreen','box-shadow':'0 0 2px 2px lightgreen'});
    }else{
        email_chk.addClass('material-symbols-outlined').text('cancel').css("color",'red');
        $("#email").css({'border':'1px solid red','box-shadow':'0 0 2px 2px red'});
    }
}

function confirm_password(val) {
    let password = $("#password");
    if (password.val()==val) {
        $("#password-check").addClass('material-symbols-outlined').text('check_circle').css('color','lightgreen');
        $("#password-confirm").css({'border':'1px solid lightgreen','box-shadow':'0 0 2px 2px lightgreen'});
        password.css({'border':'1px solid lightgreen','box-shadow':'0 0 2px 2px lightgreen'});
    }else{
        $("#password-check").addClass('material-symbols-outlined').text('cancel').css("color",'red');
        $("#password-confirm").css({'border':'1px solid red','box-shadow':'0 0 2px 2px red'});
        password.css({'border':'1px solid red','box-shadow':'0 0 2px 2px red'});
    }
}


//user
function userUpdate(value) {
    let btn = $('#user_update_btn');
    if (value==$('#user_update_name').val()) {
        console.log(value==$('#user_update_name').val());
        btn.prop( 'disabled', false);
    }else{
        console.log(value==$('#user_update_name').val());
        btn.prop( 'disabled', true);
    }
}
