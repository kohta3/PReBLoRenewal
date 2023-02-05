<header class="w-100 border-bottom">
    <div class="header row m-0">
        <div class="col-md-4">
            <img src="{{ asset('img/logo.png') }}" alt="logo" height="50px" class="m-3">
        </div>
        <div class="col-md-4 text-right btn-parent">
            <button class="btn">
                <span class="addBtn"><span class="material-symbols-outlined btn-font">send</span><span>
            </button>
        </div>
        <div class="col-md-4 d-flex align-items-center ms-auto">
            @auth
                <p class="m-0 w-100 text-right">こんにちは{{Auth::id()}}さん</p>
            @else
                <p class="m-0 w-100 text-right">こんにちはゲストさん</p>
            @endauth
        </div>
    </div>
    <div class="row m-0 d-flex align-items-center">
        <div class="col-md-6">
            <ul class="list headerMenu">
                <li><a href="{{ route('info.index')}}" class="text-dark text-decoration-none">トップ</a></li>
                <li><a href="{{ route('hotel')}}" class="text-dark text-decoration-none">ホテル</a></li>
                <li><a href="" class="text-dark text-decoration-none">お気に入り</a></li>
                <li><a href="" class="text-dark text-decoration-none">アカウント管理</a></li>
            </ul>
        </div>
        <div class="col-md-6 text-right">
            @auth
                <a href="{{Auth::logout()}}" class="text-dark text-decoration-none">ログアウト</a>
            @else
                <a href="{{route('home')}}" class="text-dark text-decoration-none">ログイン</a>
            @endauth
        </div>
    </div>
</header>
