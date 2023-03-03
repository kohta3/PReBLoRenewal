@extends('layouts.app')
@section('head')
    <title>地域・ジャンル検索</title>
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
<h1 class="ml-5 my-2">{{$pagename}}</h1>
<div class="row genreOrPref">
    @foreach ($informations as $information)
        <div class="col-md-3 genreOrPrefImg">
            <div class="KindAbsolute">
                <p>{{$information->tittle}}</p>
            </div>
            <ul class="ul">
                <li>{{$information->pref}}</li>
                <li>{{$information->city}}</li>
                <li>{{$information->created_at}}</li>
            </ul>
            <a href="{{ route('info.show',$information->id)}}"><img src="{{$information->image}}" alt=""></a>
        </div>
    @endforeach
</div>
<div class="pagenate">
    {{ $informations->onEachSide(5)->links()}}
</div>
@endsection
