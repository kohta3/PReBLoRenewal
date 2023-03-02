@extends('layouts.app')
@section('head')
    <title>旅行の投稿PReBLo</title>
    <meta name="keyword" content="旅行 温泉 キャンプ ホテル レストラン 居酒屋 旅行 温泉">
    <meta name="description" content="飲食店と宿泊施設と観光地にジャンル分けされた施設の中からお気に入りのスポットをみつけることができます。">
    <meta property="og:url" content="https://www.preblo.site" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="旅行の投稿PReBLo" />
    <meta property="og:description" content="飲食店と宿泊施設と観光地にジャンル分けされた施設の中からお気に入りのスポットをみつけることができます。" />
    <meta property="og:site_name" content="旅行の投稿PReBLo" />
    <meta property="og:image" content="{{asset('img/screen.png')}}" />
@endsection

@section('body')
<div class="snow"><i class="fas fa-snowflake"></i></div>
<div class="snow snow2nd"><i class="fas fa-snowflake"></i></div>

    {{-- session flash-massage --}}

    @if (session('flash_message'))
        <div class="session-flash">
            <div class="w-100 m-0 text-success text-center">
                {{session('flash_message')}}
            </div>
        </div>
    @elseif (session('flash_logout'))
        <div class="session-flash">
            <div class="w-100 m-0 text-danger text-center">
                {{session('flash_logout')}}
            </div>
        </div>
    @endif

<div class="h-100 w-100 row m-0 index">
    {{-- サイドバー --}}
    <div class="sidebar col-md-3 Commercial">
        <h1 class="w-100">カテゴリー</h1>
        <div class="p-2 category pop-bold-font">
            @foreach ($categories as $category)
                @if ($loop->index===0)
                <p id="kankou">観光地</p>
                @elseif ($loop->index===7)
                <p id="shukuhaku">宿泊施設</p>
                @elseif ($loop->index===15)
                <p id="inshoku">飲食店</p>
                @endif
                @if ($category->maintype=='観光')
                <p class="{{$category->maintype}}"><a href="{{route('search',['kindOf'=>'genre','key'=>$category->id])}}">{{$category->category}}</a></p>
                @elseif ($category->maintype=='宿泊')
                <p class="{{$category->maintype}}"><a href="{{route('search',['kindOf'=>'genre','key'=>$category->id])}}">{{$category->category}}</a></p>
                @elseif ($category->maintype=='飲食')
                <p class="{{$category->maintype}}"><a href="{{route('search',['kindOf'=>'genre','key'=>$category->id])}}">{{$category->category}}</a></p>
                @endif
            @endforeach
        </div>
        <h1 class="w-100">地域で探す</h1>
        <div class="p-2 area pop-bold-font">
            @foreach ($prefecture as $pref)
                @if ($loop->index===0)
                <p id="hokkaido">北海道・東北</p>
                @elseif ($loop->index===7)
                <p id="kanto">関東</p>
                @elseif ($loop->index===14)
                <p id="hokuriku">北陸</p>
                @elseif ($loop->index===18)
                <p id="tyubu">中部</p>
                @elseif ($loop->index===24)
                <p id="kansai">関西</p>
                @elseif ($loop->index===30)
                <p id="tyugoku">中国</p>
                @elseif ($loop->index===35)
                <p id="sikoku">四国</p>
                @elseif ($loop->index===39)
                <p id="kyushu">九州・沖縄</p>
                @endif

                @if ($loop->index<=6)
                <p class="北海道・東北"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></a></p>
                @elseif ($loop->index<=13)
                <p class="関東"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></p>
                @elseif ($loop->index<=17)
                <p class="北陸"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></p>
                @elseif ($loop->index<=23)
                <p class="中部"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></p>
                @elseif ($loop->index<=29)
                <p class="関西"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></p>
                @elseif ($loop->index<=34)
                <p class="中国"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></p>
                @elseif ($loop->index<=38)
                <p class="四国"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></p>
                @elseif ($loop->index<=47)
                <p class="九州・沖縄"><a href="{{route('search',['kindOf'=>'pref','key'=>$pref->Pref])}}">{{$pref->Pref}}</a></p>
                @endif
            @endforeach
        </div>
        @component('components.commercial2')
        @endcomponent
    </div>
    <div class="col-md-9 p-2">

        {{-- 人気な投稿 --}}
        <section id="famous">
            <h1>人気な投稿</h1>
            <div class="row text-white w-100 m-0 pop-font">
                @for ($i = 0; $i < count($famouses); $i++)
                    <div class="col-md-4 base-relative">
                        <a class="text-center" href='{{ route('info.show',$famouses[$i]->id)}}'>
                            <img src="{{$famouses[$i]->image}}" alt="{{$i}}番目の人気">
                            <div class="relative-child1 text-white">
                                <div class="d-flex text-nowrap m-0 pl-2">
                                    <h1>{{$i+1}}位</h1>
                                    <h2>【{{$famouses[$i]->tittle}}】</h2>
                                </div>
                                <h3 class="m-0 pl-3">{{$famouses[$i]->pref.'>'.$famouses[$i]->city}}</h3>
                            </div>
                            <div class="relative-child2 text-white">
                                <div class="pl-3">
                                    <p class="m-0">{{$famouses[$i]->comment}}</p>
                                    <p class="m-0">{{$famouses[$i]->user_name}}さん&nbsp &nbsp &nbsp
                                        <i class="fas fa-star" style="color: yellow"></i>いいね×{{$famouses[$i]->count}}
                                    </p>
                                </div>
                            </div>
                        </a>
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
            <div class="row text-white w-100 m-0 pop-font">
                @foreach ($infos as $info)
                <div class="col-md-3 base-relative mb-3">
                    <a href="{{ route('info.show',$info->id)}}">
                        @if ($info->image!=='')
                            <img src="{{$info->image}}" alt="{{$info->tittle}}">
                        @else
                            <img src="{{asset('img/meta1.jpg')}}" alt="最新の投稿">
                        @endif
                        <div class="relative-child1 text-white">
                            <div class="d-flex text-nowrap m-0 pl-2">
                                <h2>【{{$info->tittle}}】</h2>
                            </div>
                            <h3 class="m-0 pl-3">{{$info->pref.'>'.$info->city}}</h3>
                        </div>
                        <div class="relative-child2 text-white">
                            <div class="pl-3">
                                <p class="m-0">{{$info->comment}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </section>
    </div>
    {{-- モーダル --}}
    <div class="pop-up card" id="pop-up">
        <div class="pop-up-head">
            <div class="pop-up-child">
                <p class="material-symbols-outlined">close</p>
            </div>
         スポット投稿
        </div>
        <div class="pop-up-body">
            <form method="POST" action="/info" enctype="multipart/form-data" onsubmit="return cancelSubmit()">
                @csrf
                <div class="pop-up-div">
                    <div class="d-flex w-75">
                        <select id="category" class="form-control" onchange="selectCategory({{$categories}},this.value)" required>
                            <option hidden>メインカテゴリ</option>
                            @foreach ( $mainCategory as $main)
                                <option value="{{$main}}">{{$main}}</option>
                            @endforeach
                        </select>
                        <select name="genre" id="genre" class="form-control mx-auto" required>
                            <option hidden>サブカテゴリ</option>
                        </select>
                    </div>
                </div>

                <div class="pop-up-div">
                    <label for="array_img" class="img-btn-decolate">画像を選択する
                        <span class="material-symbols-outlined">add_a_photo</span>
                        <span style="font-size: 5px">※最大4枚</span>
                    </label>
                    <input type="file" name="array_img[]" id="array_img" multiple accept=".jpg, .jpeg, .png" class="d-none">
                </div>

                <div class="pop-up-div">
                    <div class="d-flex w-75">
                        <select name="pref" id="pref" class="form-control" onchange="selectCity(this.value)" required>
                            <option hidden>都道府県</option>
                            @foreach ($prefecture as $pref)
                                <option value="{{$pref->Pref}}">{{$pref->Pref}}</option>
                            @endforeach
                        </select>
                        <select name="city" id="city" class="form-control mx-auto" required onchange="request_by_ajax(this.value)">
                            <option hidden>市区町村</option>
                        </select>
                    </div>
                </div>

                <div class="pop-up-div">
                    <div class="w-75">
                        <label id="please-add"></label>
                        <div id="getLatLong" class="mapStyle" style="display: none"></div>
                        <input type="text" name="lat" id="lat" hidden>
                        <input type="text" name="long" id="long" hidden>
                    </div>
                </div>

                <div class="pop-up-div">
                    <input type="text" name="title" id="title" class="form-control" placeholder="スポット名(必須)" required>
                </div>

                <div class="pop-up-div">
                    <input type="text" name="comment" id="comment" class="form-control" placeholder="コメント(必須)" required>
                </div>

                <div class="pop-up-div">
                    <textarea name="about" id="about" class="form-control" placeholder="詳細・備考"></textarea>
                </div>

                <div class="pop-up-div">
                    <input type="url" name="url" id="url" class="form-control" placeholder="ホームページなど 例)https://example.com" pattern="https://.*">
                </div>

                <div class="pop-up-div">
                    <input type="tel" name="tel" id="tel" class="form-control" placeholder="XXX(X)-XXXX-XXXX" pattern="\d{1,9}-\d{1,9}-\d{1,9}">
                </div>

                <div class="mx-auto" style="width: 95%">
                    <p class="w-75 mx-auto mb-1 text-light">①open～close</p>
                    <div class="w-75 text-nowrap mx-auto">
                        <input type="time" name="open1" id="open1" style="width: 45%; text-align:center">
                        <label style="width: 10%" class="m-0 text-center">～</label>
                        <input type="time" name="close1" id="close1" style="width: 45%; text-align:center">
                    </div>
                </div>

                <div class="mx-auto" style="width: 95%">
                    <p class="w-75 mx-auto my-1 text-light">②open～close</p>
                    <div class="w-75 text-nowrap mx-auto">
                        <input type="time" name="open2" id="open2" style="width: 45%; text-align:center">
                        <label style="width: 10%" class="m-0 text-center">～</label>
                        <input type="time" name="close2" id="close2" style="width: 45%; text-align:center">
                    </div>
                </div>

                <div class="mx-auto" style="width: 95%">
                    <p class="w-75 mx-auto my-1 text-light">休日</p>
                    <div class="d-flex w-75 flex-wrap mx-auto">
                        <div class="d-flex mx-4 my-1">
                            <label for="monday" >月曜日</label>
                            <input type="checkbox" name="monday" id="monday" value=true >
                        </div>
                        <div class="d-flex mx-4 my-1">
                            <label for="tuesday" >火曜日</label>
                            <input type="checkbox" name="tuesday" id="tuesday" value=true>
                        </div>
                        <div class="d-flex mx-4 my-1">
                            <label for="wednesday" >水曜日</label>
                            <input type="checkbox" name="wednesday" id="wednesday" value=true>
                        </div>
                        <div class="d-flex mx-4 my-1">
                            <label for="thursday" >木曜日</label>
                            <input type="checkbox" name="thursday" id="thursday" value=true>
                        </div>
                        <div class="d-flex mx-4 my-1">
                            <label for="friday" >金曜日</label>
                            <input type="checkbox" name="friday" id="friday" value=true>
                        </div>
                        <div class="d-flex mx-4 my-1">
                            <label for="saturday" >土曜日</label>
                            <input type="checkbox" name="saturday" id="saturday" value=true>
                        </div>
                        <div class="d-flex mx-4 my-1">
                            <label for="sunday" >日曜日</label>
                            <input type="checkbox" name="sunday" id="sunday" value=true>
                        </div>
                    </div>
                </div>

                <div class="mx-auto" style="width: 95%">
                    <p class="w-75 mx-auto my-1 text-light">駐車場・駐輪場の有無</p>
                    <div class="w-50 text-nowrap mx-auto d-flex justify-content-between">
                        <div class="d-flex mr-3">
                            <label for="tyushajo" class="my-auto">駐車場<label class="material-symbols-outlined text-info">airport_shuttle</label></label>
                            <input type="checkbox" name="parkingcar" id="tyushajo" class="ml-1 text-left" value=true>
                        </div>
                        <div class="d-flex mr-3">
                            <label for="tyurinjo" class="my-auto">駐輪場<label class="material-symbols-outlined text-info">two_wheeler</label></label>
                            <input type="checkbox" name="parkingbicycles" id="tyurinjo" class="ml-1" value=true>
                        </div>
                    </div>
                </div>
                <div id="img-preview" class="my-2"></div>
                <div class="w-100 text-center my-3">
                    <button type="submit" class="pop-up-btn">投稿</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/map.js') }}"></script>
@endsection
