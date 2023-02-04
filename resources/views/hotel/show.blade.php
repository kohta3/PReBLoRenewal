@extends('layout.app')
@section('body')
    <div class="snow"><i class="fas fa-snowflake"></i></div>
    <div class="snow snow2nd"><i class="fas fa-snowflake"></i></div>
    <div class="w-100">
        <p class="ml-5 my-3"><a href="{{ route('hotel')}}"><i class="fas fa-caret-square-left"></i>戻る</a></p>
        @foreach ($hotelList as $hotel)
        <div class="row p-3 hotelShow">
            <div class="col-md-4">
                <img src="{{$hotel[0]['hotelBasicInfo']['hotelImageUrl']}}" alt="ホテル画像" class="hotelShowImage">
            </div>
            <div class="col-md-8">
                <p>{{$hotel[0]['hotelBasicInfo']['address2']}}</p>
                <p class="hotelShowTitle"><a href="{{$hotel[0]['hotelBasicInfo']['hotelInformationUrl']}}">{{$hotel[0]['hotelBasicInfo']['hotelName']}}</a></p>
                <p>{{$hotel[0]['hotelBasicInfo']['hotelSpecial']}}</p>
                <ul class="planAndReview w-100">
                    <li class="mr-5"><a href="{{$hotel[0]['hotelBasicInfo']['planListUrl']}}">プランを確認する</a></li>
                    <li>
                        平均レビュー
                        <i class="fas fa-star" style="color: yellow"></i>
                        {{$hotel[0]['hotelBasicInfo']['reviewAverage']}}<{{$hotel[0]['hotelBasicInfo']['reviewAverage']}}件>
                    </li>
                </ul>
                <p>{{$hotel[0]['hotelBasicInfo']['access']}}</p>
                <p>{{$hotel[0]['hotelBasicInfo']['parkingInformation']}}</p>
            </div>
        </div>
        @endforeach
    </div>
@endsection

