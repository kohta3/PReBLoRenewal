@extends('layouts.app')
@section('body')
    <div class="mx-auto w-75 mt-4">
        <table class="mx-auto">
            @if (session('flash_message'))
                <div class="" style="background-color: rgb(252, 255, 220)">
                        {{session('flash_message')}}
                </div>
            @endif
            <tbody>
                <tr>
                    <td>ユーザー名</td>
                    <td>
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
