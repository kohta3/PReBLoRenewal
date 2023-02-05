<?php

namespace App\Http\Controllers;

use App\Libs\Common;
use Illuminate\Http\Request;

class HotelSerchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $common = new Common();
        $area=$common->hotelSearch();
        $hotelRanking = $common->hotelLanking();
        $smallArea = array();
        for ($i=0; $i < count($area); $i++) {
            $smallAreaChild = array();
            $middleArea[$area[$i]['middleClass'][0]['middleClassCode']] = $area[$i]['middleClass'][0]['middleClassName'];
            for($k=0; $k<count($area[$i]['middleClass'][1]['smallClasses']); $k++){
                $smallAreaChild[$area[$i]['middleClass'][1]['smallClasses'][$k]['smallClass'][0]['smallClassCode']]=
                $area[$i]['middleClass'][1]['smallClasses'][$k]['smallClass'][0]['smallClassName'];
            }
            $smallArea[$area[$i]['middleClass'][0]['middleClassCode']] = $smallAreaChild;
        }
        return view('hotel.index',compact('middleArea','smallArea','hotelRanking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $middle, String $small)
    {
        $pref = $middle;
        $common = new Common();
        $hotelLists=$common->hotelSearchShow($middle,$small)['hotels'];
        $hotelList = array();
        foreach ($hotelLists as $hotel) {
            array_push($hotelList,$hotel[['hotel'][0]]);
        }
        return view('hotel.show',compact('hotelList','pref'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
