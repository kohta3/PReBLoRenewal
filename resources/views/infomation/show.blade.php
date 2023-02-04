@extends('layout.app')
@section('body')
    <div class="snow"><i class="fas fa-snowflake"></i></div>
    <div class="snow snow2nd"><i class="fas fa-snowflake"></i></div>
    <div class="w-100 row m-0">
        {{-- showコンテンツ --}}
        <section class="col-md-9 p-3">
            <div class="d-flex m-1">
                <h1>{{ $detail->tittle }}</h1>
                &ensp;
                <h2>{{ '【' . $detail->pref . $detail->city . '】' }}</h2>
            </div>
            <div class="row p-3" class="showImageParentDiv">
                <img src="{{ $detail->image }}" alt="showImage" class="image-parent">
                <div class="showImageListDiv">
                    @php
                        $imagesList = [$detail->image, $detail->image2, $detail->image3, $detail->image4];
                    @endphp
                    @foreach ($imagesList as $image)
                        @if ($image != '')
                            <img src="{{ $image }}" alt='showImage2'>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="p-3">
                <div id="mapcontainer"></div>
                <p class="map-menu1">⇓拡大⇓</p>
                <p class="map-menu2">⇑縮小⇑</p>
            </div>
            <div class="mx-auto tableShow">
                <p>
                    <label>投稿者:</label>
                    {{$user->name}}
                </p>
                <p>
                    <label>コメント:</label>
                    {{$detail->comment}}
                </p>
                <p>
                    <label>営業時間①:</label>
                    {{ $detail->donnotknow ? '不明' : $detail->opne1 . 'から' . $detail->close1 }}
                    &emsp;
                    <label>営業時間②:</label>
                    {{ $detail->secondhour　 ? $detail->opne2 . 'から' . $detail->close2 : '-' }}
                    &emsp;
                    <label>店休日:</label>
                    {{ $detail->sunday && $detail->monday && $detail->tuesday && $detail->wednesday && $detail->pursday && $detail->friday && $detail->saturday ? '' : '無し' }}
                    {{ $detail->sunday ? '日曜日' : '' }}
                    {{ $detail->monday ? '月曜日' : '' }}
                    {{ $detail->tuesday ? '火曜日' : '' }}
                    {{ $detail->wednesday ? '水曜日' : '' }}
                    {{ $detail->thursday ? '木曜日' : '' }}
                    {{ $detail->friday ? '金曜日' : '' }}
                    {{ $detail->saturday ? '土曜日' : '' }}
                    &emsp;
                    <label>駐車場:</label>
                    {{ $detail->parkingcar ? 'あり' : 'なし' }}
                    &emsp;
                    <label>駐輪場:</label>
                    {{ $detail->parkingbicycles ? 'あり' : 'なし' }}
                </p>
            </div>
        </section>
        <section class="col-md-3 p-0">
            <h1>周辺の施設情報</h1>
            {{-- 周辺の施設情報 --}}
            <div class="tab_wrap">
                <input id="tab1" type="radio" name="tab_btn" checked>
                <input id="tab2" type="radio" name="tab_btn">

                <div class="tab_area">
                    <label class="tab1_label" for="tab1">ホテル</label>
                    <label class="tab2_label" for="tab2">飲食店</label>
                </div>
                <div class="panel_area">
                    <div id="panel1" class="tab_panel">
                        @if ($hotelList[0][0]!=='nodata')
                            @foreach ($hotelList[0] as $hotel)
                            <div class="cells">
                                <a href="$hotel['hotelInformationUrl']"　class="text-left">{{ $hotel['hotelName'] }}</a>
                                <div class="HotelInfoImageDiv">
                                    <img src="{{ $hotel['hotelImageUrl'] }}" alt="hotelImageUrl">
                                    <img src="{{ $hotel['roomImageUrl'] }}" alt="roomImageUrl">
                                    <div class="text-nowrap HotelImageLabel">
                                        <label for="carousel1" class="imageChoiseLabel">●</label>
                                        <label for="carousel2" class="imageChoiseLabel">●</label>
                                    </div>
                                </div>
                                <ul class="ListStyleNonw p-0">
                                    <li>{{ $hotel['address1'] . $hotel['address2'] }}</li>
                                    <li><a href="$hotel['planListUrl']">プランを見る</a>
                                        <label
                                            class="ml-3"><i class="fas fa-star" style="color: rgb(0, 174, 255)"></i>{{$hotel['reviewAverage'] . '(' . $hotel['reviewCount'] . '件)' }}</label>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                        @else
                            <div class="cells">
                                <h1>周辺にホテルはありません</h1>
                            </div>
                        @endif
                    </div>

                    <div id="panel2" class="tab_panel">
                        @foreach ($restaurantList[0] as $restaurant)
                            <div class="cells">
                                <a href="{{$restaurant['urls']['pc']}}">{{$restaurant['name']}}</a>
                                <div class="restaurantImg-div">
                                    <img src="{{$restaurant['photo']['pc']['l']}}" alt="restaurantImg">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        var map = L.map('mapcontainer');
        let restaurantArray = <?php echo json_encode($restaurantList[0]) ?>;
        let hotelArray = <?php echo json_encode($hotelList[0]) ?>;
        function mapview(x ,y , str) {
            map.setView([x, y], 14);
            L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png',
            {attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"}).addTo(map);
            L.marker([x,y]).bindPopup(L.popup().setContent(str)).addTo(map);
        }

        function marker(x, y, str) {
            L.marker([x,y]).bindPopup(L.popup().setContent(str)).addTo(map);
        }

        mapview({{$detail->lat}} ,{{$detail->long}},'{{$detail->tittle}}')

        restaurantArray.forEach(restaurant => {
            marker(restaurant['lat'],restaurant['lng'],restaurant['name']);
        });

        hotelArray.forEach(hotel => {
            marker(hotel['latitude'],hotel['longitude'],hotel['hotelName']);
        });
    </script>
@endsection
