<?php

namespace App\Http\Controllers;

use App\Information;
use App\Models\Infomation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->groupBy('information.id','users.id')
            ->orderBy('count','DESC')
            ->take(3)
            ->get()
            ;

        $infos = Infomation::orderBy('created_at','DESC')->take(12)->get();
        
        return view('index', compact('famouses','infos'));
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
        //
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
