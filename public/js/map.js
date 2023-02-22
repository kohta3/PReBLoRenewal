let count = 0;
var map = L.map('getLatLong');

//leafletでマップを表示
function init(inLat,inLong) {
    var addMarker = null;
    map.setView([inLat, inLong], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    map.on('click', function(e) {
        //クリック位置経緯度取得
        lat = e.latlng.lat;
        lng = e.latlng.lng;
        //経緯度表示
        try {
            $('#lat').val(lat);
            $('#long').val(lng);
            if (map && addMarker) {
                map.removeLayer(addMarker);
                addMarker = null;
            }
            if (map && !addMarker) {
                addMarker = L.marker([lat, lng]).addTo(map);
            }
            setAdress(lat,lng);
            alert("場所を選択しました。\n緯度: " + lat + ", 経度: " + lng);
        } catch (error) {
            alert('緯度経度の取得に失敗しました。もう一度選びなおしてください。');
        }
    });
  }

  function request_by_ajax(value) {
    count++;
    $.ajax({
        type:"GET",
        url:"https://msearch.gsi.go.jp/address-search/AddressSearch?q="+value,
        dataType:"json"
    }).done(function(data) {
        let latitudedata=data[0]['geometry']['coordinates'][1];//緯度Lat
        let Longitude = data[0]['geometry']['coordinates'][0];//経度Long
        if (count==1) {
            $('#getLatLong').fadeIn(1500);
            $('#please-add').text('地図で場所をタップしてください').fadeIn(1500);
            return init(latitudedata,Longitude);
        }else{
            return map.setView([latitudedata,Longitude],13);
        }
    }).fail(function() {
        alert("緯度経度の取得に失敗しました。もう一度やり直してください。");
    })
}

function setAdress(lat,long) {
    $.ajax({
        type: "GET",
        url: "http://geoapi.heartrails.com/api/json?method=searchByGeoLocation&x="+ long +"&y=" + lat,
        dataType : "json"
    }).done(function(data){
        $("#pref").val(data['response']['location'][0]['prefecture']);
        $("#city").val(data['response']['location'][0]['city']);
    }).fail(function() {
        console.log("http://geoapi.heartrails.com/api/xml?method=searchByGeoLocation&x="+ long +"&y=" + lat);
    });
}
