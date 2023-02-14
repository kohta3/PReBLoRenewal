<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Libs\Common;
use App\Models\Infomation;
use App\Models\Categories;
use App\Models\Prefecture;
use App\Models\User;

class InfomationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $famouses = DB::table('information')
            ->rightjoin('likes', 'information.id', '=', 'likes.information_id')
            ->join('users', 'information.user_id', '=', 'users.id')
            ->select('information.id', 'information.comment', 'information.image', 'information.pref', 'information.city', 'information.tittle', DB::raw("count(information.id) as count"))
            ->selectRaw('users.name as user_name')
            ->groupBy('information.id', 'users.id')
            ->orderBy('count', 'DESC')
            ->take(3)
            ->get();
        $infos = Infomation::orderBy('created_at', 'DESC')->take(12)->get();
        $categories = Categories::orderBy('id', 'ASC')->get();
        $prefecture = Prefecture::orderBy('id', 'ASC')->get();
        return view('infomation.index', compact('famouses', 'infos','categories','prefecture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //クリエイトページは不要
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
    public function show($id)
    {
        $detail = Infomation::find($id);
        $user =User::find($detail->user_id);
        $common = new Common();
        $hotelList[] = $common->rakuten($detail->lat,$detail->long);
        if ($hotelList[0][0]=='nodata') {
            $hotelList[] = array();
        }
        $restaurantList[] = $common->hotepapper($detail->lat,$detail->long);

        return view('infomation.show', compact('detail','hotelList','user','restaurantList'));
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
