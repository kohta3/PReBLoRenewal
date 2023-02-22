@extends('layouts.app')

@section('body')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-3">
                <div class="card-header">
                ログイン
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">メールアドレス<span id="email-check"></span></label>
                            <input type="email" class="form-control" name="email" id="email" onchange="email_validation(this.value)" value="{{ old('email') }}" autocomplete="email" placeholder="メールアドレスを入力してください" required>
                        </div>
                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="password" class="form-control" name="password" id="password" autocomplete="email" placeholder="パスワードを入力してください" required autocomplete="current-password">
                        </div>
                        <div class="form-check text-center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">ログイン状態を保持する</label><br>

                            <button type="submit" class="btn btn-primary">ログイン</button>
                        </div>
                    </form>
                    <div class="back-animation material-symbols-outlined"><span class="flight">flight</span><span class="sailing">sailing</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
