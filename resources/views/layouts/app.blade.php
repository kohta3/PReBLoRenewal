<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/ fb# prefix属性: http://ogp.me/ns/ prefix属性#">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/infoShow.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://kit.fontawesome.com/eea364082e.js" crossorigin="anonymous"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3022328775537673" crossorigin="anonymous"></script>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3022328775537673"
     crossorigin="anonymous"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-204384273-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-204384273-1');
    </script>
    @yield('head')

</head>

<body>
    {{-- バナー広告 --}}
    <div class="w-100 text-center Commercial my-2">
        <a href="https://hb.afl.rakuten.co.jp/hsc/2e161105.b27509fe.20bca631.12bbb9d1/?link_type=pict&ut=eyJwYWdlIjoic2hvcCIsInR5cGUiOiJwaWN0IiwiY29sIjoxLCJjYXQiOiI0NCIsImJhbiI6IjQ2MDEzNSIsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;">
        <img src="https://hbb.afl.rakuten.co.jp/hsb/2e161105.b27509fe.20bca631.12bbb9d1/?me_id=1&me_adv_id=460135&t=pict" border="0" style="margin:2px" alt="" title="" class="mx-auto"></a>
        <a href="https://px.a8.net/svt/ejp?a8mat=3N441R+9CDXKI+AD2+2BEM4X" rel="nofollow" class="ml-4">
            <img border="0" width="468" height="60" alt="" src="https://www21.a8.net/svt/bgt?aid=220221567565&wid=001&eno=01&mid=s00000001343014009000&mc=1"></a>
            <img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=3N441R+9CDXKI+AD2+2BEM4X" alt="">
    </div>

    {{-- ヘッダー --}}
    @component('components.header')
    @endcomponent

    {{-- ボディ --}}
    @yield('body')
    <script src="{{ asset('js/preblo.js') }}"></script>
    <script src="{{ asset('js/infoShow.js') }}"></script>
</body>

</html>
