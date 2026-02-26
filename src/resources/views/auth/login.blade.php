@extends('layouts.app')

@section('title', 'Login')

@section('header-btn')
<a href="/register">register</a>
@endsection

@section('content')

<h2 class="login__title">Login</h2>

<div class="login">
    <form action="/login" method="post">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" placeholder="例: example@test.com">
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" placeholder="例: coachtech">
        </div>

        <button type="submit">ログイン</button>
    </form>
</div>
@endsection