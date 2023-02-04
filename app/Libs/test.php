<?php

namespace App\Libs;

require 'C:\Users\Owner\Documents\workspace\PReBLoNew\vendor\autoload.php';

use GuzzleHttp\Client;

class test
{
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
        echo $area_json;
    }

}
