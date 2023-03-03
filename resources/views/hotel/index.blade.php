@extends('layouts.app')
@section('head')
    <title>ホテル検索</title>
    <meta name="keyword" content="お気に入り 旅行 温泉 キャンプ ホテル レストラン 居酒屋">
    <meta name="description" content="地域からホテルを検索できます。好きな地域を選択してホテルを予約しましょう。">

@endsection
@section('body')
<div class="snow"><i class="fas fa-snowflake"></i></div>
<div class="snow snow2nd"><i class="fas fa-snowflake"></i></div>
<div class="h-100 w-100 m-0 index">
    <div class="text-center m-0 row w-100">
        <div class="m-0 col-md-3 hotelIndexLeft">
            <h1 class="my-3">地域で検索</h1>
            @foreach ($middleArea as $key=>$value)
                    @if ($key=='hokkaido')
                    @php $i = 0; @endphp
                    <p id="Area{{$i}}">北海道・東北</p>
                    @elseif ($key=='ibaragi')
                    @php $i = 1; @endphp
                    <p id="Area{{$i}}">関東</p>
                    @elseif ($key=='niigata')
                    @php $i = 2; @endphp
                    <p id="Area{{$i}}">北陸</p>
                    @elseif ($key=='yamanasi')
                    @php $i = 3; @endphp
                    <p id="Area{{$i}}">中部</p>
                    @elseif ($key=='shiga')
                    @php $i = 4; @endphp
                    <p id="Area{{$i}}">関西</p>
                    @elseif ($key=='tottori')
                    @php $i = 5; @endphp
                    <p id="Area{{$i}}">中国</p>
                    @elseif ($key=='tokushima')
                    @php $i = 6; @endphp
                    <p id="Area{{$i}}">四国</p>
                    @elseif ($key=='hukuoka')
                    @php $i = 7; @endphp
                    <p id="Area{{$i}}">九州</p>
                    @endif
                    <div id="{{$key}}" class="Area{{$i}}">
                        <label>{{$value}}</label>
                        <ul class="p-0">
                            @foreach ($smallArea[$key] as $keySmall=>$valueSmall)
                                <li class="listNone"><a href="{{ route('hotel.show',['middleArea'=>$key,'smallArea'=>$keySmall])}}">{{$valueSmall}}</a></li>
                            @endforeach
                        </ul>
                    </div>
            @endforeach
        </div>
        <div class="col-md-9 row mb-4 mx-0">
            <h1 class="col-md-12 text-left smart-font">ランキング</h1>
            @foreach ($hotelRanking as $hotel)
            <div class="col-md-3 my-3 hotelRank smart-font">
                <div class="w-100">
                    <a href="{{$hotel['hotelInformationUrl']}}"><img src="{{$hotel['hotelImageUrl']}}" alt="" class="hotelRankImage"></a>
                </div>
                <h3 class="text-left">{{$hotel['rank'].$hotel['hotelName']}}</h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    let AreaMap =@json($middleArea);
    for (const key in @json($middleArea)) {
        let parent = $('#'+key);
        let ul = parent.children('ul');
        ul.hide();
        parent.children('label').on('click',function(key) {
            if (ul.css('display') == 'none') {
                ul.show();
            }else{
                ul.hide();
            }
        })
    }

</script>
@endsection

