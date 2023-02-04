<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function SearchGenre($kindOf,$key){
        if ($kindOf==='genre') {
            $informations = DB::table('information')->where('category_id',$key)->paginate(20);
            $name = DB::table('categories')->where('id',$key)->value('category');
            $pagename = 'ジャンル-'.$name;
        }else{
            $informations = DB::table('information')->where('pref',$key)->paginate(20);
            $pagename = '都道府県-'.$key;
        }

        return view('search.search',compact('informations','pagename'));
    }

}
