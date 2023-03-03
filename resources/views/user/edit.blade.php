@extends('layouts.app')
@section('head')
    <title>アカウント編集</title>
    <meta name="keyword" content="旅行 温泉 キャンプ ホテル レストラン 居酒屋 旅行 温泉">
    <meta name="description" content="飲食店と宿泊施設と観光地にジャンル分けされた施設の中からお気に入りのスポットをみつけることができます。">
    <meta property="og:url" content="https://www.preblo.site" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="旅行の投稿PReBLo" />
    <meta property="og:description" content="飲食店と宿泊施設と観光地にジャンル分けされた施設の中からお気に入りのスポットをみつけることができます。" />
    <meta property="og:site_name" content="旅行の投稿PReBLo" />
    <meta property="og:image" content="{{asset('img/screen.png')}}" />
@endsection

@section('body')
    <div class="mx-auto w-100 mt-4">
        <table class="mx-auto w-75">
            @if (session('flash_message'))
                <div class="text-success" style="background-color: rgb(252, 255, 220)">
                        {{session('flash_message')}}
                </div>
            @endif
            <tbody>
                <tr>
                    <td class="text-nowrap">ユーザー名</td>
                    <td class="text-nowrap">
                        <form method="POST" action="{{route('user.update')}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <input type="text" name='name' value="{{$user->name}}" id='user_update_name' onkeydown="userUpdate(this.value)">
                            <button id="user_update_btn" type="submit" disabled>更新</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
