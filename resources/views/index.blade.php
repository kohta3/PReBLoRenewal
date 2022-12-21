@extends('layout.app')
@section('body')
<div class="snow">●</div>
<div class="snow snow2nd">●</div>
<div class="h-100 w-100 row m-0">
    {{-- サイドバー --}}
    <div class="sidebar col-md-3 Commercial">
        <h1 class="w-100">カテゴリー</h1>
        <div class="p-2 category">
            <p>観光地</p>
            <p>宿泊施設</p>
            <p>飲食店</p>
        </div>
        <h1 class="w-100">地域で探す</h1>
        <div class="p-2 area">
            <p>北海道・東北</p>
            <p>北陸</p>
            <p>関東</p>
            <p>中部</p>
            <p>近畿</p>
            <p>中国</p>
            <p>四国</p>
            <p>九州・沖縄</p>
        </div>
            @component('components.commercial2')
            @endcomponent
    </div>
    <div class="col-md-9 p-2">
        {{-- 人気な投稿 --}}
        <section id="famous">
            <h1>人気な投稿</h1>
            <div class="row p-2 text-white">
                @for ($i = 0; $i < count($famouses); $i++) 
                <div class="col-md-4 base-relative mx-auto my-1 mx-auto">
                    <img src="{{$famouses[$i]->image}}" alt="{{$i}}番目の人気">
                    <div class="relative-child1">
                        <div class="d-flex text-nowrap m-0 pl-2">
                            <h1>{{$i+1}}位</h1>
                            <h2>【{{$famouses[$i]->tittle}}】</h2>
                        </div>
                        <h3 class="m-0 pl-3">{{$famouses[$i]->pref.'>'.$famouses[$i]->city}}</h3>
                    </div>
                    <div class="relative-child2">
                        <div class="pl-3">
                            <p class="m-0">{{$famouses[$i]->comment}}</p>
                            <p class="m-0">{{$famouses[$i]->user_name}}さん&nbsp &nbsp &nbsp
                                🌟いいね×{{$famouses[$i]->count}}
                            </p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </section>
        
        <section class="d-flex justify-content-center m-3 align-items-center">
            @component('components.commercial1')
            @endcomponent
            &ensp; 
            <div class="Commercial">
                @component('components.commercial3')
                @endcomponent
            </div>
        </section>

        <section id="newAdd">
            <h1 class="mb-1">最新の投稿</h1>
            <div class="row text-white">
                @foreach ($infos as $info)
            <div class="col-md-3 base-relative mb-3">
                <img src="{{$info->image}}" alt="{{$info->tittle}}">
                <div class="relative-child1">
                    <div class="d-flex text-nowrap m-0 pl-2">
                        <h2>【{{$info->tittle}}】</h2>
                    </div>
                    <h3 class="m-0 pl-3">{{$info->pref.'>'.$info->city}}</h3>
                </div>
                <div class="relative-child2">
                    <div class="pl-3">
                        <p class="m-0">{{$info->comment}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </section>
    </div>
</div>
@endsection