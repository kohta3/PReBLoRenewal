<header class="w-100 border-bottom">
    <div class="header row m-0">
        <div class="col-md-4">
            <img src="{{ asset('img/logo.png') }}" alt="logo" height="50px" class="m-3">
        </div>
        <div class="col-md-4 text-right btn-parent">
            @php
                $now_url =str_replace(url('/'),"",request()->fullUrl());
            @endphp
            @auth
                @if ($now_url=="")
                    <button class="btnform">
                        <span class="addBtn"><span class="material-symbols-outlined btn-font">send</span><span>
                    </button>
                @endif
            @endauth
        </div>
        <div class="col-md-4 d-flex align-items-center ms-auto">
            @auth
                <p class="m-0 w-100 text-right">こんにちは{{Auth::user()->name}}さん</p>
            @else
                <p class="m-0 w-100 text-right">こんにちはゲストさん</p>
            @endauth
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-1">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            {{-- <a class="navbar-brand" href="#">Hidden brand</a> --}}
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 headerMenu">
                @auth
                    <li class="nav-item"><a href="{{ route('index')}}" class="text-dark text-decoration-none nav-link">トップ</a></li>
                    <li class="nav-item"><a href="{{ route('hotel')}}" class="text-dark text-decoration-none nav-link">ホテル</a></li>
                    <li class="nav-item"><a href="{{url('favorite')}}" class="text-dark text-decoration-none nav-link">お気に入り</a></li>
                    <li class="nav-item"><a href="{{route('user.edit')}}" class="text-dark text-decoration-none nav-link">アカウント管理</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('index')}}" class="text-dark text-decoration-none nav-link">トップ</a></li>
                    <li class="nav-item"><a href="{{ route('hotel')}}" class="text-dark text-decoration-none nav-link">ホテル</a></li>
                @endauth
            </ul>
            @auth
                <div class="d-flex justify-content-end">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <div class="d-flex justify-content-end">
                    <a href="{{route('register')}}" class="text-decoration-none mr-3">サインアップ</a>
                    <a href="{{route('home')}}" class="text-decoration-none ml-3">ログイン</a>
                </div>
            @endauth
        </div>
      </nav>
</header>
