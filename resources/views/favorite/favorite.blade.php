@extends('layouts.app')
@section('body')
<div class="snow"><i class="fas fa-snowflake"></i></div>
<div class="snow snow2nd"><i class="fas fa-snowflake"></i></div>
<div class="favorite_card">
    @foreach ($favo_info as $favo)
        <div class="card favo_child" id="info{{$favo->id}}">
            <div class="favo_header">
                {{$favo->tittle}}
            </div>
            <div class="favo_body">
                <a href="{{route('info.show',$favo->id)}}"><img src="{{asset($favo->image)}}" alt="お気に入り"></a>
            </div>
        </div>
    @endforeach
</div>
@php
    $array_json=json_encode($favo_info);
@endphp
<div id="favorite_map"></div>
<script src="{{ asset('js/favorite.js') }}"></script>
<script>make_marker(<?php echo $array_json; ?>)</script>
@endsection
