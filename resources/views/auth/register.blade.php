@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        新規ユーザー登録
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">名前</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autocomplete="name">
                            </div>
                            <div class="form-group">
                                <label for="email">メールアドレス<span id="email-check"></span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samuraimart-login-input"  onchange="email_validation(this.value)" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="preblo@PReBLo.com">
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード<span id="password-check"></span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samuraimart-login-input"name="password" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">パスワード（確認用）</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" onchange="confirm_password(this.value)">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">登録する</button>
                        </form>
                        <div class="back-animation material-symbols-outlined"><span class="flight">flight</span><span class="sailing">sailing</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
