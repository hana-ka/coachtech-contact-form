@extends('layouts.app')

@section('title', 'Register')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header-btn')
<a href="/login">login</a>
@endsection

@section('content')
<h2 class="register__title">Register</h2>

<div class="register">
    <form action="/register" method="post">
        @csrf

        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" name="name" id="name" placeholder="例：山田 太郎">
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" placeholder="例：example@test.com">
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" placeholder="例：coachtech">
        </div>

        <div class="auth-button">
            <button type="submit">登録</button>
        </div>
    </form>
</div>
@endsection