@extends('layouts.app')
@section('body')
<div class="snow"><i class="fas fa-snowflake"></i></div>
<div class="snow snow2nd"><i class="fas fa-snowflake"></i></div>

    {{-- session flash-massage --}}
@if (session('flash_message'))
    <div class="row m-0 text-success">
        {{session('flash_message')}}
    </div>
@elseif (session('flash_logout'))
    <div class="row m-0 text-danger">
        {{session('flash_logout')}}
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
                    <div class="col-md-4 base-relative mx-auto my-1 mx-auto">
                        <a href='{{ route('info.show',$famouses[$i]->id)}}'>
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
                        <img src="{{$info->image}}" alt="{{$info->tittle}}">
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
    <div class="pop-up" id="pop-up">
        <div class="snow">●</div>
        <div class="snow snow2nd">●</div>
        <div class="pop-up-child">
            <p>×</p>
        </div>
        <form action="/" method="get">
            <div class="pop-up-div">
                <label for="array-img">写真を選択</label>
                <input type="file" name="array-img" id="array-img"  accept=".jpg, .jpeg, .png">
            </div>

            <div class="pop-up-div">
                <label for="title">スポット名</label>
                <input type="text" name="title" id="title" >
            </div>

            <div class="pop-up-div">
                <label for="comment">コメント</label>
                <input type="text" name="comment" id="comment" >
            </div>

            <div class="pop-up-div">
                <label for="about">説明</label>
                <textarea name="about" id="about"></textarea>
            </div>

            <div class="pop-up-div">
                <label for="category">カテゴリー</label>
                <select name="category" id="category">
                    <option value="test1">test1</option>
                    <option value="test2">test2</option>
                    <option value="test3">test3</option>
                    <option value="test4">test4</option>
                </select>
            </div>

            <div class="pop-up-div">
                <label for="genre">ジャンル</label>
                <select name="genre" id="genre">
                    <option value="genre">test1</option>
                    <option value="genre">test2</option>
                    <option value="genre">test3</option>
                    <option value="genre">test4</option>
                </select>
            </div>

            <div class="pop-up-div">
                <label for="monday">open1</label>
                <input type="time" name="open1" id="open1" style="width: 30%">
            </div>

            <div class="pop-up-div">
                <label for="monday">close1</label>
                <input type="time" name="close1" id="close1" style="width: 30%">
            </div>

            <p class="fw-bold ml-3 mb-0">--------休日--------</p>
            <div class="pop-up-div">
                <label for="monday">月</label>
                <input type="checkbox" name="monday" id="monday">
                <label for="tuesday">火</label>
                <input type="checkbox" name="tuesday" id="tuesday">
                <label for="wednesday">水</label>
                <input type="checkbox" name="wednesday" id="wednesday">
                <label for="thursday">木</label>
                <input type="checkbox" name="thursday" id="thursday">
                <label for="friday">金</label>
                <input type="checkbox" name="friday" id="friday">
                <label for="saturday">土</label>
                <input type="checkbox" name="saturday" id="saturday">
                <label for="sunday">日</label>
                <input type="checkbox" name="sunday" id="sunday">
            </div>

            <div class="w-100 text-center">
                <button>投稿</button>
            </div>
        </form>
    </div>
</div>
@endsection
