<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Libs\Common;
use App\Models\Infomation;
use App\Models\Categories;
use App\Models\Prefecture;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $mainCategory = array();
        foreach ($categories as $value) {
            array_push($mainCategory,$value->maintype);
        }
        $mainCategory = array_unique($mainCategory);
        return view('infomation.index', compact('famouses', 'infos','categories','prefecture','mainCategory'));
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
        $information = new Infomation();
        $information->tittle = $request->title;
        $information->comment = $request->comment;
        $information->pref = $request->pref;
        $information->city = $request->city;
        $information->url = $request->url;
        $information->about = $request->about?$request->about:"備考無し";
        $information->opne1 = $request->open1;
        $information->close1 = $request->close1;
        $information->opne2 = $request->open2;
        $information->close2 = $request->close2;
        $information->number = $request->tel;
        $information->category_id = $request->genre;
        $information->parkingcar = $request->parkingcar?$request->parkingcar:false;
        $information->parkingbicycles = $request->parkingbicycles?$request->parkingbicycles:false;
        $information->lat = $request->lat;
        $information->long = $request->long;
        $information->user_id = Auth::id();
        $information->user_name='unko';
        $information->review = 5;
        $information->monday=$request->monday?$request->monday:false;
        $information->tuesday=$request->tuesday?$request->tuesday:false;
        $information->wednesday=$request->wednesday?$request->wednesday:false;
        $information->thursday=$request->thursday?$request->thursday:false;
        $information->friday=$request->friday?$request->friday:false;
        $information->saturday=$request->saturday?$request->saturday:false;
        $information->sunday=$request->sunday?$request->sunday:false;
        if ($request->monday||$request->tuesday||$request->wednesday||$request->thursday||$request->friday||$request->saturday||$request->sunday) {
            $information->vacation = true;
        }
        if($request->file('array_img')!==null){
            try {
                $images = $request->file('array_img');
                foreach ( $images as $index=>$image) {
                    $path = Storage::disk('s3')->putFile('/starage', $image, 'public');
                    $url[] = Storage::disk('s3')->url($path);
                    switch ($index) {
                        case 1:
                            $information->image = $url[0];
                            break;
                        case 2;
                            $information->image2 = $url[1];
                            break;
                        case 3;
                            $information->image3 = $url[2];
                            break;
                        case 4;
                            $information->image4 = $url[3];
                            break;
                        default:
                            break;
                    }
                }
            } catch (\Throwable $th) {
                dd($th);
            }
        }else{
            $information->image ='';
            $information->image2='';
            $information->image3='';
            $information->image4='';
        }

        // try {
            $information->save();
            session()->flash('flash_success', '投稿が完了しました！ありがとうございました！');
        // } catch (\Throwable $th) {
        //     session()->flash('flash_warn', '投稿に失敗しました');
        // }

        return redirect(url('/'));
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
