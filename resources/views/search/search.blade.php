@extends('layouts.app')
@section('body')
<div class="snow"><i class="fas fa-snowflake"></i></div>
<div class="snow snow2nd"><i class="fas fa-snowflake"></i></div>
<h1 class="ml-5 my-2">{{$pagename}}</h1>
<div class="row genreOrPref">
    @foreach ($informations as $information)
        <div class="col-md-3 genreOrPrefImg">
            <div class="KindAbsolute">
                <p>{{$information->tittle}}</p>
            </div>
            <ul class="ul">
                <li>{{$information->pref}}</li>
                <li>{{$information->city}}</li>
                <li>{{$information->created_at}}</li>
            </ul>
            <a href="{{ route('info.show',$information->id)}}"><img src="{{$information->image}}" alt=""></a>
        </div>
    @endforeach
</div>
<div class="pagenate">
    {{ $informations->onEachSide(5)->links()}}
</div>
@endsection
