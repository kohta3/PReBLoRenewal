<?php

namespace App\Libs;

require '../vendor/autoload.php';

use GuzzleHttp\Client;

class Common
{
    function rakuten($lat, $long)
    {
        $client = new Client;
        $hotelList[] = array();

        try {
            $json_res = $client->request(
                'GET',
                'https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426??',
                [
                    'query' => [
                        'applicationId' => '1001393711643575856',
                        'format' => 'json',
                        'affiliateId' => '20c8801b.9bc4906b.20c8801c.3a69e429',
                        'latitude' => $lat,
                        'longitude' => $long,
                        'datumType' => 1,
                        'hits' => 10,
                    ], 'verify' => false
                ]
            )->getBody();
            $response = json_decode($json_res, true);
            for ($i = 0; $i < count($response['hotels']); $i++) {
                $hotelList[$i] = $response['hotels'][$i]['hotel'][0]['hotelBasicInfo'];
            }
        } catch (\Throwable $th) {
            $hotelList[0] = 'nodata';
        }

        return $hotelList;
    }

    function hotepapper($x, $y){
        $client = new Client;
        $json_res = $client->request(
            'GET',
            "http://webservice.recruit.co.jp/hotpepper/gourmet/v1/",
            [
                'query' => [
                    "key" => 'f0d3cc012ab27202',
                    "count" => 10,
                    "lat" => $x,
                    "lng" => $y,
                    "format" => 'json'
                ], 'verify' => false
            ]
        )->getBody();
        $response = json_decode($json_res, true);
        return $response['results']['shop'];
    }

    function hotelSearch(){
        $client = new Client;
        $json_res = $client->request(
            'GET',
            "https://app.rakuten.co.jp/services/api/Travel/GetAreaClass/20131024?",
            [
                'query' => [
                    'applicationId' => '1001393711643575856',
                    "format" => 'json'
                ], 'verify' => false
            ]
        )->getBody();
        $area_json = json_decode($json_res, true);
        $area = $area_json['areaClasses']['largeClasses'][0]['largeClass'][1]['middleClasses'];
        return $area;
    }

    function hotelSearchShow($middleClass,$smallClass){
            $client = new Client;
            $json_res = $client->request(
                'GET',
                "https://app.rakuten.co.jp/services/api/Travel/SimpleHotelSearch/20170426??",
                [
                    'query' => [
                        'applicationId'=>'1001393711643575856',
                        'format'=>'json',
                        'affiliateId'=>'20c8801b.9bc4906b.20c8801c.3a69e429',
                        'largeClassCode'=>'japan',
                        'middleClassCode'=>$middleClass,
                        'smallClassCode'=>$smallClass
                    ], 'verify' => false,'http_errors' => false
                ]
            )->getBody();
            $hotelArea = json_decode($json_res, true);
            return $hotelArea;
    }

    function hotelLanking(){
        $client = new Client;
        $hotel=array();
        $json_res = $client->request(
            'GET',
            "https://app.rakuten.co.jp/services/api/Travel/HotelRanking/20170426?",
            [
                'query' => [
                    'format'=>'json',
                    'genre'=>'onsen',
                    'affiliateId'=>'20c8801b.9bc4906b.20c8801c.3a69e429',
                    'applicationId'=>'1001393711643575856'
                ], 'verify' => false,'http_errors' => false
            ]
        )->getBody();
        $hotelArea = json_decode($json_res, true);
        foreach ($hotelArea['Rankings'][0]['Ranking']['hotels'] as $hotelList) {
            array_push($hotel,$hotelList['hotel']);
        }
        return $hotel;
}

}
