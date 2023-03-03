@extends('layouts.app')

@section('body')
<div class="card mt-4 w-75 mx-auto">
    <div class="card-header">
        会員登録ありがとうございます！
    </div>
    <div class="card-body">
        <p class="text-center">
            現在、仮会員の状態です。
        </p>

        <p class="text-center">
            ただいま、ご入力頂いたメールアドレス宛に、ご本人様確認用のメールをお送りしました。
        </p>

        <p class="text-center">
            メール本文内のURLをクリックすると本会員登録が完了となります。
        </p>
        <div class="text-center">
            <a href="{{ url('/') }}" class="btn w-50">トップページへ</a>
        </div>
    </div>
</div>
@endsection
